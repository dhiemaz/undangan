<?php

namespace App\Controllers;

require __DIR__ . '../../../vendor/autoload.php'; // Load Google API Client

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;


use  App\Models\AttendeeModel;
use App\Models\DelegateModel;
use App\Models\GuestModel;
use CodeIgniter\I18n\Time;

class BackStageController extends BaseController
{
    public function index()
    {
        return view('backstage/login'); // Load the login form view
    }

    public function dashboard()
    {
        return view('backstage/dashboard'); // Load the login form view
    }

    public function invitations()
    {
        return view('backstage/partials/invitations'); // Return a view
    }

    public function guests()
    {
        return view('backstage/partials/guests'); // Return a view
    }

    public function delegations()
    {
        return view('backstage/partials/delegations'); // Return a view
    }

    public function overview()
    {
        return view('backstage/partials/overview'); // Return a view
    }

    public function checkIn()
    {
        return view('backstage/partials/check_in'); // Return a view
    }

    public function manualCheckIn()
    {
        return view('backstage/partials/manual_check_in'); // Return a view
    }

    public function getSummaryCount()
    {
        $attendeeModel = new AttendeeModel();

        log_message('info', 'BackstageController::getSummaryCount');

        // Fetch counts based on the 'status' column
        $invitationCount = $attendeeModel->countAll();
        $confirmedAllCount = $attendeeModel->where('status IS NOT NULL', null, false)->countAllResults();
        $attendCount = $attendeeModel->where('status', 'attend')->countAllResults();
        $attendWithGuestCount = $attendeeModel->where('status', 'attend with guests')->countAllResults();
        $delegateCount = $attendeeModel->where('status', 'delegate')->countAllResults();
        $inattendCount = $attendeeModel->where('status', 'inattend')->countAllResults();

        // Return the results as an array or JSON if needed
        return $this->response->setJSON([
            'total_invitations' => $invitationCount,
            'total_confirmed' => $confirmedAllCount,
            'attend' => $attendCount,
            'attend_with_guests' => $attendWithGuestCount,
            'delegates' => $delegateCount,
            'inattend' => $inattendCount,
        ]);
    }

    public function getRecentActivities()
    {
        $attendeeModel = new AttendeeModel();

        log_message('info', 'BackstageController::getRecentActivities');

        // Fetch the last 5 activities based on status update
        $activities = $attendeeModel
            ->select('fullname, status, updated_at') // Select relevant fields
            ->where('status IS NOT NULL', null, false) // Ensure status is updated
            ->orderBy('updated_at', 'DESC') // Order by most recent
            ->limit(8) // Limit to last 5 activities
            ->findAll();

        // Return JSON response
        return $this->response->setJSON(['activities' => $activities]);
    }

    /**
     * Get all invitations
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getAllInvitations()
    {
        $attendeeModel = new AttendeeModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);

        log_message('info', 'BackstageController::getAllInvitations' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage]));

        // Fetch paginated data
        $updatedInvitations = $attendeeModel
            ->select('id, title, fullname, position, institution, status, type')
            ->orderBy('fullname', 'ASC')
            ->paginate($perPage, 'default', $page);

        $totalItems = $attendeeModel->countAllResults();

        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $updatedInvitations,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function searchInvitations()
    {
        $attendeeModel = new AttendeeModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);
        $searchQuery = $this->request->getGet('query') ?? '';

        log_message('info', 'BackstageController::getAllInvitations' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage, 'searchQuery' => $searchQuery]));

        // Fetch paginated data
        $invitations = $attendeeModel
            ->select('id, title, fullname, position, institution, status, type')
            ->like('fullname', $searchQuery)
            ->orderBy('fullname', 'ASC')
            ->paginate($perPage, 'default', $page);

        $totalItems = $attendeeModel
            ->like('fullname', $searchQuery)
            ->countAllResults();

        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $invitations,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function searchGuests()
    {
        $guestModel = new GuestModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);
        $searchQuery = $this->request->getGet('query') ?? '';

        log_message('info', 'BackstageController::searchGuests' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage, 'searchQuery' => $searchQuery]));

        // Fetch paginated data
        $invitationGuests = $guestModel
            ->select('guests.id, "Bapak" as title, guests.fullname as fullname, guests.position as position, attendees_event.institution as institution, attendees_event.fullname as attendee_name, guests.status')
            ->like('guests.fullname', $searchQuery)
            ->join('attendees_event', 'attendees_event.id = guests.attendee_id', 'inner')
            ->paginate($perPage, 'default', $page);

        $totalItems = $guestModel
            ->like('fullname', $searchQuery)
            ->countAllResults();

        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $invitationGuests,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function searchDelegations()
    {
        $delegationModel = new DelegateModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);
        $searchQuery = $this->request->getGet('query') ?? '';

        log_message('info', 'BackstageController::searchDelegations' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage, 'searchQuery' => $searchQuery]));

        // Fetch paginated data
        $invitationDelegation = $delegationModel
            ->select('delegations.id, "Bapak" as title, delegations.fullname as fullname, delegations.position as position, attendees_event.institution as institution, attendees_event.fullname as attendee_name, delegations.status')
            ->like('delegations.fullname', $searchQuery)
            ->join('attendees_event', 'attendees_event.id = delegations.attendee_id', 'inner')
            ->paginate($perPage, 'default', $page);

        $totalItems = $delegationModel
            ->like('fullname', $searchQuery)
            ->countAllResults();

        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $invitationDelegation,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function getInvitationGuests()
    {
        $guestModel = new GuestModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);

        log_message('info', 'BackstageController::getInvitationGuests' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage]));

        // Fetch paginated data
        $invitationGuests = $guestModel
            ->select('guests.id,"Bapak" as title, guests.fullname as fullname, guests.position as position, attendees_event.institution as institution, attendees_event.fullname as attendee_name, guests.status as status')
            ->join('attendees_event', 'attendees_event.id = guests.attendee_id', 'inner')
            ->paginate($perPage, 'default', $page);

        $totalItems = $guestModel->countAllResults();
        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $invitationGuests,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function getInvitationDelegation()
    {
        $delegationModel = new DelegateModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);

        log_message('info', 'BackstageController::getInvitationDelegation' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage]));

        // Fetch paginated data
        $invitationDelegation = $delegationModel
            ->select('delegations.id,"Bapak" as title, delegations.fullname as fullname, delegations.position as position, attendees_event.institution as institution, attendees_event.fullname as attendee_name, delegations.status')
            ->join('attendees_event', 'attendees_event.id = delegations.attendee_id', 'inner')
            ->paginate($perPage, 'default', $page);

        $totalItems = $delegationModel->countAllResults();
        $totalPages = (int) ceil($totalItems / $perPage);

        return $this->response->setJSON([
            'data' => $invitationDelegation,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    /**
     * Summary of getUpdatedInvitations
     * API to get updated invitations action
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getUpdatedInvitations()
    {
        $attendeeModel = new AttendeeModel();

        // Retrieve pagination parameters with default values
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 6);

        log_message('info', 'BackstageController::getUpdatedInvitations' . ' - ' . json_encode(['page' => $page, 'perPage' => $perPage]));

        // Fetch paginated data
        $updatedInvitations = $attendeeModel
            ->select('title, fullname, position, institution, status, type')
            ->where('status IS NOT NULL', null, false)
            ->orderBy('updated_at', 'DESC')
            ->paginate($perPage, 'default', $page);

        // Calculate total records for pagination
        $totalItems = $attendeeModel
            ->where('status IS NOT NULL', null, false)
            ->countAllResults();

        $totalPages = (int) ceil($totalItems / $perPage);

        // Prepare and return the response
        return $this->response->setJSON([
            'data' => $updatedInvitations,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
            ],
        ]);
    }

    public function getEventChart()
    {
        // Load the AttendeeModel
        $attendeeModel = new AttendeeModel();

        // Query for total invitations
        $totalInvitations = $attendeeModel->countAllResults();

        // Query for confirmed invitations (status in ['attend', 'delegate', 'attend with guests'])
        $confirmedCount = $attendeeModel
            ->whereIn('status', [
                'attend',
                'delegate',
                'attend with guests'
            ])
            ->countAllResults();

        // Query for check-ins (status in ['check-in'])
        $checkInCount = $attendeeModel
            ->where('status', 'check-in')
            ->countAllResults();

        // Assuming guests count separately (adjust as needed)
        $guestCount = $attendeeModel
            ->where('status', 'attend with guests')
            ->countAllResults();

        // Prepare the response data
        $data = [
            'values' => [
                $totalInvitations, // Total invitations
                $checkInCount,     // Check-ins
                $confirmedCount,   // Confirmed (attend, delegate, attend with guests)                
            ],
            'labels' => ["Total", "Check-In", "Confirmed", "Guests"]
        ];

        // Return JSON response
        return $this->response->setJSON($data);
    }

    public function invitationCheckIn()
    {
        // Load the AttendeeModel
        $attendeeModel = new AttendeeModel();

        // Decode the JSON payload
        $jsonPayload = $this->request->getBody(); // Get raw input stream
        $requestData = json_decode($jsonPayload, true); // Decode JSON to an associative array

        // Validate input
        if (!isset($requestData['id']) || !isset($requestData['status'])) {
            return $this->response
                ->setStatusCode(400) // Bad Request
                ->setJSON([
                    'success' => false,
                    'message' => 'ID and status are required.',
                ]);
        }

        $id = (int) ($requestData['id']); // ID of the invitation
        $status = $requestData['status']; // New status to update

        log_message('info', 'BackstageController::invitationCheckIn' . ' - ' . json_encode(['id' => $id, 'status' => $status]));

        // Check if the record exists
        $attendee = $attendeeModel->where('id', $id)->first();        
        if (!$attendee) {
            log_message('error', 'BackstageController::findAttendeeByID' . ' - ' . json_encode(['attendee' => $attendee]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(404) // Not Found
                ->setJSON([
                    'success' => false,
                    'message' => 'Invitation not found.',
                ]);
        }

        try {
            log_message('info', 'BackstageController::invitationCheckIn' . ' - ' . json_encode(['id' => $id, 'status' => $status, 'attendee'=> $attendee]));

            $updatedAt = Time::now('Asia/Jakarta', 'en_US');
            $attendeeModel->update($id ,['status' => $status,'updated_at' => $updatedAt]);
        
            // update google sheet
            $this->updateGoogleSheetAttendee($id, $status);            
            return $this->response
                ->setStatusCode(200) // OK
                ->setJSON([
                    'success' => true,
                    'message' => 'Invitation successfully check-in.',
                ]);
        } catch (\Exception $th) {
            log_message('error', 'BackstageController::findAttendeeByID' . ' - ' . json_encode(['error' => $th->getMessage()]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(500) // Internal Server Error
                ->setJSON([
                    'success' => false,
                    'message' => 'Failed to update status. Please try again later.',
                ]);
        }
    }

    public function guestCheckIn()
    {
        // Load the GuestModel
        $guestModel = new GuestModel();

        // Decode the JSON payload
        $jsonPayload = $this->request->getBody(); // Get raw input stream
        $requestData = json_decode($jsonPayload, true); // Decode JSON to an associative array

        // Validate input
        if (!isset($requestData['id']) || !isset($requestData['status'])) {
            return $this->response
                ->setStatusCode(400) // Bad Request
                ->setJSON([
                    'success' => false,
                    'message' => 'ID and status are required.',
                ]);
        }

        $id = (int) ($requestData['id']); // ID of the invitation
        $status = $requestData['status']; // New status to update

        log_message('info', 'BackstageController::guestCheckIn' . ' - ' . json_encode(['id' => $id, 'status' => $status]));

        $guest = $guestModel->where('id', $id)->first();
        log_message('info', 'Guest Found: ' . json_encode($guest));
        if (!$guest) {
            log_message('error', 'BackstageController::findGuestByID' . ' - ' . json_encode(['guest' => $guest]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(404) // Not Found
                ->setJSON([
                    'success' => false,
                    'message' => 'Guest not found.',
                ]);
        }

        try {
            // Update the status
            $updatedAt = Time::now('Asia/Jakarta', 'en_US');
            $result = $guestModel->where('id', $id)->set(['status' => $status, 'updated_at'=> $updatedAt])->update();
            log_message('info', 'BackstageController::guestCheckIn - Status updated: ' . json_encode($result));

            return $this->response
                ->setStatusCode(200) // OK
                ->setJSON([
                    'success' => true,
                    'message' => 'Guest successfully check-in.',
                ]);
        } catch (\Exception $e) {
            log_message('error', 'BackstageController::findGuestByID' . ' - ' . json_encode(['error' => $e]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(500) // Internal Server Error
                ->setJSON([
                    'success' => false,
                    'message' => 'Failed to update status. Please try again later.',
                ]);
        }
    }

    public function delegationCheckIn()
    {
        // Load the GuestModel
        $delegationModel = new DelegateModel();

        // Decode the JSON payload
        $jsonPayload = $this->request->getBody(); // Get raw input stream
        $requestData = json_decode($jsonPayload, true); // Decode JSON to an associative array

        // Validate input
        if (!isset($requestData['id']) || !isset($requestData['status'])) {
            return $this->response
                ->setStatusCode(400) // Bad Request
                ->setJSON([
                    'success' => false,
                    'message' => 'ID and status are required.',
                ]);
        }

        $id = (int) ($requestData['id']); // ID of the invitation
        $status = $requestData['status']; // New status to update

        log_message('info', 'BackstageController::guestCheckIn' . ' - ' . json_encode(['id' => $id, 'status' => $status]));

        $delegation = $delegationModel->where('id', $id)->first();
        log_message('info', 'Delegation Found: ' . json_encode($delegation));
        if (!$delegation) {
            log_message('error', 'BackstageController::findDelegationByID' . ' - ' . json_encode(['guest' => $delegation]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(404) // Not Found
                ->setJSON([
                    'success' => false,
                    'message' => 'Delegation not found.',
                ]);
        }

        try {
            // Update the status
            $updatedAt = Time::now('Asia/Jakarta', 'en_US');
            $result = $delegationModel->where('id', $id)->set(['status' => $status, 'updated_at'=> $updatedAt])->update(['status'=> $status]);
            log_message('info', 'BackstageController::delegationCheckIn - Status updated: ' . json_encode($result));

            return $this->response
                ->setStatusCode(200) // OK
                ->setJSON([
                    'success' => true,
                    'message' => 'Delegation sucessfully check-in.',
                ]);
        } catch (\Exception $e) {
            log_message('error', 'BackstageController::findDelegationByID' . ' - ' . json_encode(['error' => $e]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(500) // Internal Server Error
                ->setJSON([
                    'success' => false,
                    'message' => 'Failed to update status. Please try again later.',
                ]);
        }
    }

    public function invitationRegistrationAndCheckIn()
    {
        // Load the AttendeeModel
        $attendeeModel = new AttendeeModel();

        // Decode the JSON payload
        $jsonPayload = $this->request->getBody(); // Get raw input stream
        $requestData = json_decode($jsonPayload, true); // Decode JSON to an associative array

        // Validate input
        if (!isset($requestData['hash'], $requestData['fullname'], $requestData['position'], $requestData['company'], $requestData['status'])) {
            return $this->response
                ->setStatusCode(400) // Bad Request
                ->setJSON([
                    'success' => false,
                    'message' => 'hash, fullname, position, company, and status are required.',
                ]);
        }

        // Extract input fields
        $hashData = $requestData['hash'];
        $fullname = $requestData['fullname'];
        $position = $requestData['position'];
        $company = $requestData['company'];
        $status = $requestData['status'];

        // Log the request data
        log_message('info', 'BackstageController::invitationRegistrationAndCheckIn - ' . json_encode([
            'fullname' => $fullname,
            'position' => $position,
            'company' => $company,
            'status' => $status,
        ]));

        // Insert data into the database
        try {
            $attendeeId = $attendeeModel->insert([
                'hash' => $hashData,
                'fullname' => $fullname,
                'position' => $position,
                'institution' => $company,
                'status' => $status,
                'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at' => Time::now('Asia/Jakarta', 'en_US')
            ]);

            if ($attendeeId) {
                return $this->response
                    ->setStatusCode(201) // Created
                    ->setJSON([
                        'success' => true,
                        'message' => 'Invitation registered and checked-in successfully.',
                        'data' => [
                            'id' => $attendeeId,
                            'fullname' => $fullname,
                            'position' => $position,
                            'company' => $company,
                            'status' => $status,
                        ],
                    ]);
            } else {
                return $this->response
                    ->setStatusCode(500) // Internal Server Error
                    ->setJSON([
                        'success' => false,
                        'message' => 'Failed to register and check-in. Please try again later.',
                    ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in invitationRegistrationAndCheckIn: ' . $e->getMessage());
            return $this->response
                ->setStatusCode(500) // Internal Server Error
                ->setJSON([
                    'success' => false,
                    'message' => 'An error occurred. Please try again later.',
                ]);
        }
    }

    // API to get invitation data
    public function getInvitationData()
    {

        // Decode the JSON payload
        $jsonPayload = $this->request->getBody(); // Get raw input stream
        $requestData = json_decode($jsonPayload, true); // Decode JSON to an associative array
        log_message('info', 'BackstageController::getAttendee' . ' - ' . json_encode(['request' => $requestData]));

        // Validate input
        if (!isset($requestData['data'])) {
            return $this->response
                ->setStatusCode(400) // Bad Request
                ->setJSON([
                    'success' => false,
                    'message' => 'request payload are required.',
                ]);
        }

        $data = $requestData['data'];
        log_message('info', 'BackstageController::getAttendee' . ' - ' . json_encode(['data' => $data]));

        $parts = explode("/", $data);
        if (isset($parts[0]) && strlen($parts[0]) > 2) {
            $rawToken = $parts[0];
        } else {
            $rawToken = $parts[1];
        }

        // Remove leading "/" and replace "+" with " "
        $token = str_replace("+", " ", ltrim($rawToken, "/"));

        log_message('info', 'BackstageController::show attendee by invitationID' . ' - ' . json_encode(['token' => $token]), ['token' => $token]);

        $model = new AttendeeModel();
        //$decodedInvitationID = urldecode($encodedInvitationID);
        $attendee = $model->getAttendee($token);
        log_message('info', 'BackstageController::getAttendee' . ' - ' . json_encode(['token' => $token, 'attendee' => $attendee]), ['$token' => $token, 'attendee' => $attendee]);
        if ($attendee == null) {
            log_message('error', 'BackstageController::show - attendee not found.', ['token' => $token]);

            return $this->response->setStatusCode(404)->setJSON([
                'data' => null,
                'message' => 'Invitations not found',
            ]);
        }

        return $this->response->setStatusCode(200)->setJSON([
            'data' => $attendee,
        ]);
    }

    private function updateGoogleSheetAttendee($id, $status)
    {
        log_message('info', 'BackstageController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'status' => $status]), ['id' => $id, 'status'=> $status]);
        try {
            // Google Sheets Setup        
            $client = $this->getClient();
            $service = new Sheets($client);
            $spreadsheetId = "1yrYbzNa6bzlDp6gsr6YGFfrwz3vU5E4oVci96M-BpR0"; // Replace with your actual Sheet ID
            $sheetName = "Attendees"; // Replace with your actual Sheet Name

            // Fetch Data from Google Sheet
            $range = "$sheetName!A:G"; // Get all columns (A to M)
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues(); // Convert response to array

            // Check if data exists
            if (empty($values)) {
                log_message('error', 'BackstageController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'status' => $status, 'result' => "No data found in the Google Sheet"]), ['id' => $id, 'status' => $status]);
                return false;
            }

            // Find the row with matching "Nama" and update Column M
            $updated = false;
            foreach ($values as $rowIndex => $row) {
                if (isset($row[0]) && $row[20] === $id) { // Column A = Index 0 (ID)
                    $updateRange = "$sheetName!F" . ($rowIndex + 1); // Column F (RSVP Status)
    
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
    
                    log_message('info', 'BackstageController::updateGoogleSheetAttendee - Updated row ' . ($rowIndex + 1) . ' in column F with ' . $status);
                    return true;
                }
            }

            // If no match found
            if (!$updated) {
                log_message('error', 'BackstageController::updateGoogleSheetAttendee' . ' - ' . json_encode(['id' => $id, 'status' => $status, 'result' => "No match found for ID '$id'"]), ['id' => $id, 'status' => $status]);
                return false;
            }
        } catch (\Throwable $th) {
            log_message('error', '' . $th->getMessage(), ['id' => $id, 'status' => $status]);
            //return false;
            throw $th;
        }        
    }

    private function getClient()
    {
        try {
            $client = new Client();
            $client->setApplicationName('BRI Microfinance 2025 Google Sheet API');
            $client->setScopes([Sheets::SPREADSHEETS]);
            $client->setAuthConfig(ROOTPATH . 'pikobar-dev-4580b-46ee917f71ef.json'); // Your Google API credentials
            $client->setAccessType('offline');
            return $client;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
