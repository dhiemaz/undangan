<?php
namespace App\Controllers;

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
        
        log_message('info', 'InvitationController::show attendee by invitationID'. ' - ' . json_encode(['invitationID' => $invitationID]), ['id' => $invitationID]);
            
        if ($id == null) {    
            log_message('error', 'InvitationController::show - invitation ID is required.', ['invitationID' => $invitationID]);
            return redirect()->back()->with('error','invitation ID is required.');
        } else {
            $model = new AttendeeModel();

            //$decodedInvitationID = urldecode($encodedInvitationID);
            $attendee = $model->getAttendee(  urlencode($invitationID));  
            log_message('info', 'InvitationController::getAttendee' . ' - ' . json_encode(['invitationID' => $invitationID,'attendee' => $attendee]), ['$invitationID' => $invitationID,'attendee' => $attendee]);          
            if ($attendee == null) {
                log_message('error', 'InvitationController::show - attendee not found.', ['invitationID' => $invitationID]);
                return redirect()->back()->with('error','attendee not found.');
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
}