<?php
namespace App\Controllers;

require __DIR__ . '/vendor/autoload.php'; // Load Google API Client

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

use  App\Models\AttendeeModel;
use App\Models\DelegateModel;
use App\Models\GuestModel;
use CodeIgniter\I18n\Time;
class InvitationController extends BaseController
{
    
    public function show($id = null) {
        // $invitationID = urlencode($id);

        $invitationID = preg_replace_callback(
            '/[^a-zA-Z0-9_\-\.]/',
            function ($matches) {
                return '%' . strtoupper(dechex(ord($matches[0])));
            },
            $id
        );
        
        $invitationID = rawurldecode($invitationID);

        log_message('info', 'InvitationController::show attendee by invitationID'. ' - ' . json_encode(['invitationID' => $invitationID]), ['id' => $invitationID]);
            
        if ($id == null) {    
            log_message('error', 'InvitationController::show - invitation ID is required.', ['invitationID' => $invitationID]);
            $data['attendee'] = null;                
            return view('rsvp_confirmation', $data);
        } else {
            $model = new AttendeeModel();

            //$decodedInvitationID = urldecode($encodedInvitationID);
            $attendee = $model->getAttendee(  rawurldecode($invitationID));  
            log_message('info', 'InvitationController::getAttendee' . ' - ' . json_encode(['invitationID' => $invitationID,'attendee' => $attendee]), ['$invitationID' => $invitationID,'attendee' => $attendee]);          
            if ($attendee == null) {
                log_message('error', 'InvitationController::show - attendee not found.', ['invitationID' => $invitationID]);
                
                $data['attendee'] = null;                
                return view('rsvp_confirmation', $data);                
            }
            
            $data['attendee'] = $attendee;                
            return view('rsvp_confirmation', $data);
        }
    }

    public function confirm()
    {
        $invitationID = $this->request->getPost('_invitationID');
        $status = $this->request->getPost('status');
        $qty_confirmation = $this->request->getPost('qty_confirmation');
        log_message(
            'info', 
            'InvitationController::confirm - ' . json_encode(['invitationID' => $invitationID, 'status' => $status, 'qty_confirmation' => $qty_confirmation])
        );

        $attendeeModel = new AttendeeModel();
        $attendee = $attendeeModel->getAttendee($invitationID);

        if (isset($attendee['status'])) {
            log_message(
                'error', 
                'InvitationController::confirm - '. $attendee['fullname'] . ' has already responded.' . ' - status = ' . $attendee['status']
            );
            
            $success = false;
            $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
            $message = $success ? 'Thank you for your response!' : 'An error occurred.';

            // Response array
            $response = [
                'success' => $success,
                'redirectUrl' => $redirectUrl,
                'message' => $message,
            ];

            // Return JSON response
            return $this->response->setJSON($response);            
        } 


        if ($status == 'attend') { 
            // insert guests if any
            if ($qty_confirmation > 0) {            
                if (isset($_POST['guest_list']) && is_array($_POST['guest_list'])) {
                    $GuestModel = new GuestModel();
                    try {
                        foreach ($_POST['guest_list'] as $key => $guest) {
                            $name = htmlspecialchars($guest['name'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
                            $position = htmlspecialchars($guest['position'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
            
                            $GuestModel->save([
                                'attendee_id'=> $attendee['id'],
                                'fullname'=> $name,
                                'position'=> $position,
                                'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                            ]);
            
                            log_message(
                                'info', 
                            'InvitationController::confirm - '. $attendee['fullname'] . ' inserting guest - ' . $name . ' - ' . $position.' - created_at = ' . Time::now('Asia/Jakarta', 'en_US') 
                            ); 
                        }

                        // update attendee status
                        if ($status == 'attend') {
                            $status = 'attend with guests';
                        }
                                
                        $updatedAt = Time::now('Asia/Jakarta', 'en_US');
                        $attendeeModel->update($attendee['id'], [
                            'status'=> $status,
                            'updated_at' => $updatedAt,
                        ]);

                        log_message(
                            'info', 
                            'InvitationController::confirm - '. $attendee['fullname'] . ' status successfully updated.' . ' - status = ' . $status . ' - updated_at = ' . $updatedAt
                        );

                        $success = true;
                        $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                        $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                        // Response array
                        $response = [
                            'success' => $success,
                            'redirectUrl' => $redirectUrl,
                            'message' => $message,
                        ];

                        // Return JSON response
                        return $this->response->setJSON($response); 

                    } catch(\Exception $e) {
                        log_message(
                            'error', 
                            'InvitationController::confirm - '. $attendee['fullname'] . ' inserting guest - error : ' . $e->getMessage()
                        );

                        $success = false;
                        $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                        $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                        // Response array
                        $response = [
                            'success' => $success,
                            'redirectUrl' => $redirectUrl,
                            'message' => $message,
                        ];

                        // Return JSON response
                        return $this->response->setJSON($response); 
                    }                
                }
            } else {
                try {
                    $updatedAt = Time::now('Asia/Jakarta', 'en_US');
                    $attendeeModel->update($attendee['id'], [
                        'status'=> $status,
                        'updated_at' => $updatedAt,
                    ]);

                    $this->updateGoogleSheetAttendee($attendee['id'], $attendee['fullname'], $status);            

                    log_message(
                    'info', 
                'InvitationController::confirm - '. $attendee['fullname'] . ' status successfully updated.' . ' - status = ' . $status . ' - updated_at = ' . $updatedAt
                    );

                    $success = true;
                    $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                    $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                    // Response array
                    $response = [
                        'success' => $success,
                        'redirectUrl' => $redirectUrl,
                        'message' => $message,
                    ];

                    // Return JSON response
                    return $this->response->setJSON($response); 
                } catch (\Exception $e) {
                    log_message(
                        'error', 
                        'InvitationController::confirm - '. $attendee['fullname'] . ' updating status - error : ' . $e->getMessage()
                    );
    
                    $success = false;
                    $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                    $message = $success ? 'Thank you for your response!' : 'An error occurred.';
    
                    // Response array
                    $response = [
                        'success' => $success,
                        'redirectUrl' => $redirectUrl,
                        'message' => $message,
                    ];
    
                    // Return JSON response
                    return $this->response->setJSON($response);                     
                }                
            }        
        } else if ($status == 'delegate') {
            if (isset($_POST['guest_list']) && is_array($_POST['guest_list'])) {
                $DelegateModel = new DelegateModel();
                try {
                    foreach ($_POST['guest_list'] as $key => $guest) {
                        $name = htmlspecialchars($guest['name'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
                        $position = htmlspecialchars($guest['position'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
        
                        $DelegateModel->save([
                            'attendee_id'=> $attendee['id'],
                            'fullname'=> $name,
                            'position'=> $position,
                            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                        ]);
        
                        log_message(
                            'info', 
                        'InvitationController::confirm - '. $attendee['fullname'] . ' inserting delegation - ' . $name . ' - ' . $position.' - created_at = ' . Time::now('Asia/Jakarta', 'en_US') 
                        ); 
                    }
        
                    $updatedAt = Time::now('Asia/Jakarta', 'en_US');
                    $attendeeModel->update($attendee['id'], [
                        'status'=> $status,
                        'updated_at' => $updatedAt,
                    ]);

                    $this->updateGoogleSheetAttendee($attendee['id'], $attendee['fullname'], $status);            

                    log_message(
                        'info', 
                        'InvitationController::confirm - '. $attendee['fullname'] . ' status successfully updated.' . ' - status = ' . $status . ' - updated_at = ' . $updatedAt
                    );

                    $success = true;
                    $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                    $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                    // Response array
                    $response = [
                        'success' => $success,
                        'redirectUrl' => $redirectUrl,
                        'message' => $message,
                    ];

                    // Return JSON response
                    return $this->response->setJSON($response); 

                } catch(\Exception $e) {
                    log_message(
                        'error', 
                        'InvitationController::confirm - '. $attendee['fullname'] . ' inserting guest - error : ' . $e->getMessage()
                    );

                    $success = false;
                    $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                    $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                    // Response array
                    $response = [
                        'success' => $success,
                        'redirectUrl' => $redirectUrl,
                        'message' => $message,
                    ];

                    // Return JSON response
                    return $this->response->setJSON($response); 
                }                
            }
        } else {
            try {
                $updatedAt = Time::now('Asia/Jakarta', 'en_US');
                $attendeeModel->update($attendee['id'], [
                    'status'=> $status,
                    'updated_at' => $updatedAt,
                ]);

                $this->updateGoogleSheetAttendee($attendee['id'], $attendee['fullname'], $status);            
    
                log_message(
            'info', 
            'InvitationController::confirm - '. $attendee['fullname'] . ' status successfully updated.' . ' - status = ' . $status . ' - updated_at = ' . $updatedAt
                );
    
                $success = true;
                $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                $message = $success ? 'Thank you for your response!' : 'An error occurred.';
    
                // Response array
                $response = [
                    'success' => $success,
                    'redirectUrl' => $redirectUrl,
                    'message' => $message,
                ];
    
                // Return JSON response
                return $this->response->setJSON($response); 
            } catch (\Exception $e) {
                log_message(
                    'error', 
                    'InvitationController::confirm - '. $attendee['fullname'] . ' updating status - error : ' . $e->getMessage()
                );

                $success = false;
                $redirectUrl = base_url('invitation/' . $invitationID); // URL to redirect
                $message = $success ? 'Thank you for your response!' : 'An error occurred.';

                // Response array
                $response = [
                    'success' => $success,
                    'redirectUrl' => $redirectUrl,
                    'message' => $message,
                ];

                // Return JSON response
                return $this->response->setJSON($response); 
            }
        }
    }   

    private function updateGoogleSheetAttendee($id, $name, $status)
    {
        // Google Sheets Setup
        $client = getClient();
        $service = new Sheets($client);
        $spreadsheetId = "1cy0DIQFvGdgwBUWIAh4k0cSxhiRxOa7Xi3wJFzTKWAM"; // Replace with your actual Sheet ID
        $sheetName = "Attendees"; // Replace with your actual Sheet Name

        // Fetch Data from Google Sheet
        $range = "$sheetName!A:G"; // Get all columns (A to M)
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues(); // Convert response to array

        // Name to find and new Kehadiran status
        // $namaToFind = "Yulianto Setiawan"; // Name to search in Column D (Index 3)
        // $newStatus = "TRUE"; // Update Kehadiran to TRUE in Column M (Index 12)

        log_message('info', 'InvitationController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'fullname' => $name, 'status' => $status]), ['id' => $id, 'fullname' => $name, 'status'=> $status]);

        // Check if data exists
        if (empty($values)) {
            log_message('error', 'InvitationController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'fullname' => $name, 'status' => $status, 'result' => "No data found in the Google Sheet"]), ['id' => $id, 'fullname' => $name, 'status'=> $status]);
            return false;
        }

        // Find the row with matching "Nama" and update Column M
        $updated = false;
        foreach ($values as $rowIndex => $row) {
            if (isset($row[2]) && $row[2] === $name) { // Column D = Index 3
                $updateRange = "$sheetName!F" . ($rowIndex + 1); // Column M, 1-based index
                $updateValues = [[$status]]; // New value

                // Prepare update request
                $body = new ValueRange([
                    'values' => $updateValues
                ]);

                $params = ['valueInputOption' => 'USER_ENTERED'];

                // Execute update
                $service->spreadsheets_values->update(
                    $spreadsheetId,
                    $updateRange,
                    $body,
                    $params
                );                                
                $updated = true;

                log_message('info', 'InvitationController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'fullname' => $name, 'status' => $status, 'result' => "Updated row " . ($rowIndex + 1) . " in column M with " . $status. ""]), ['id' => $id, 'fullname' => $name, 'status'=> $status]);
                return true;                
            }
        }

        // If no match found
        if (!$updated) {
            log_message('error', 'InvitationController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'fullname' => $name, 'status' => $status, 'result' => "No match found for '$name'"]), ['id' => $id, 'fullname' => $name, 'status'=> $status]);
            return false;
        }
    }

    private function getClient()
    {
        $client = new Client();
        $client->setApplicationName('BRI Microfinance 2025 Google Sheet API');
        $client->setScopes([Sheets::SPREADSHEETS]);
        $client->setAuthConfig('../pikobar-dev-4580b-46ee917f71ef.json'); // Your Google API credentials
        $client->setAccessType('offline');
        return $client;
    }
}