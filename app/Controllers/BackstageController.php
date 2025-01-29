<?php
namespace App\Controllers;

use  App\Models\AttendeeModel;
use App\Models\DelegateModel;
use App\Models\GuestModel;

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
            ->limit(6) // Limit to last 5 activities
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

        log_message('info', 'BackstageController::getAllInvitations' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage]));          

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

        log_message('info', 'BackstageController::getAllInvitations' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage, 'searchQuery' => $searchQuery]));          

        // Fetch paginated data
        $invitations = $attendeeModel
            ->select('title, fullname, position, institution, status, type')  
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

        log_message('info', 'BackstageController::searchGuests' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage, 'searchQuery' => $searchQuery]));          

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

        log_message('info', 'BackstageController::searchDelegations' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage, 'searchQuery' => $searchQuery]));          

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

        log_message('info', 'BackstageController::getInvitationGuests' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage]));          

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

        log_message('info', 'BackstageController::getInvitationDelegation' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage]));          

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

    log_message('info', 'BackstageController::getUpdatedInvitations' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage]));          

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

    public function getEventChart(){
        // Load the AttendeeModel
        $attendeeModel = new AttendeeModel();

        // Query for total invitations
        $totalInvitations = $attendeeModel->countAllResults();

        // Query for confirmed invitations (status in ['attend', 'delegate', 'attend with guests'])
        $confirmedCount = $attendeeModel
            ->whereIn('status', ['attend',
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
        $invitation = $attendeeModel->find($id);
        if (!$invitation) {
            log_message('error', 'BackstageController::findAttendeeByID' . ' - ' . json_encode(['attendee' => $invitation]), ['id' => $id, 'status' => $status]);
            return $this->response
                ->setStatusCode(404) // Not Found
                ->setJSON([
                    'success' => false,
                    'message' => 'Invitation not found.',
                ]);
        }

        try {
            // Update the status
            $updated = $attendeeModel->update($id, ['status' => $status]);
            return $this->response
                ->setStatusCode(200) // OK
                ->setJSON([
                    'success' => true,
                    'message' => 'Invitation successfully check-in.',
                ]);
        } catch (\Exception $e) {
            log_message('error', 'BackstageController::findAttendeeByID' . ' - ' . json_encode(['error' => $e]), ['id' => $id, 'status' => $status]);
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
            $result = $guestModel->where('id', $id)->set(['status' => $status])->update();
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
            $result = $delegationModel->where('id', $id)->set(['status' => $status])->update();
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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
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
    public function getInvitationData(){

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

        log_message('info', 'BackstageController::show attendee by invitationID'. ' - ' . json_encode(['token' => $token]), ['token' => $token]);
            
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
}