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
            ->limit(5) // Limit to last 5 activities
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
            ->select('"Bapak" as title, guests.fullname as fullname, guests.position as position, attendees.institution as institution, attendees.fullname as attendee_name')    
            ->like('guests.fullname', $searchQuery)
            ->join('attendees', 'attendees.id = guests.attendee_id', 'inner')                    
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

    public function getInvitationGuests()
    {
        $guestModel = new GuestModel();

        // Get pagination parameters from the request
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = (int) ($this->request->getGet('perPage') ?? 20);

        log_message('info', 'BackstageController::getInvitationGuests' . ' - ' . json_encode(['page' => $page,'perPage' => $perPage]));          

        // Fetch paginated data
        $invitationGuests = $guestModel
            ->select('"Bapak" as title, guests.fullname as fullname, guests.position as position, attendees.institution as institution, attendees.fullname as attendee_name')    
            ->join('attendees', 'attendees.id = guests.attendee_id', 'inner')                    
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
            ->select('"Bapak" as title, delegations.fullname as fullname, delegations.position as position, attendees_event.institution as institution, attendees_event.fullname as attendee_name')    
            ->join('attendees_event', 'attendees.id = delegations.attendee_id', 'inner')                    
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
                    'message' => 'Status updated successfully.',
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

    // API to get invitation data
    public function getInvitationData($id = null){
        $invitationID = preg_replace_callback(
            '/[^a-zA-Z0-9_\-\.]/',
            function ($matches) {
                return '%' . strtoupper(dechex(ord($matches[0])));
            },
            $id
        );
        
        $invitationID = rawurldecode($invitationID);

        log_message('info', 'BackstageController::show attendee by invitationID'. ' - ' . json_encode(['invitationID' => $invitationID]), ['id' => $invitationID]);
            
        if ($id == null) {    
            log_message('error', 'BackstageController::show - invitation ID is required.', ['invitationID' => $invitationID]);
            return $this->response->setJSON([
                    'data' => null,
            ],400);
        } else {
            $model = new AttendeeModel();

            //$decodedInvitationID = urldecode($encodedInvitationID);
            $attendee = $model->getAttendee(  rawurldecode($invitationID));  
            log_message('info', 'InvitationController::getAttendee' . ' - ' . json_encode(['invitationID' => $invitationID,'attendee' => $attendee]), ['$invitationID' => $invitationID,'attendee' => $attendee]);          
            if ($attendee == null) {
                log_message('error', 'InvitationController::show - attendee not found.', ['invitationID' => $invitationID]);

                return $this->response->setStatusCode(404)->setJSON(['data' => null,
                    'message' => 'Invitations not found',
                ]);
            }
            
            return $this->response->setStatusCode(200)->setJSON([
                'data' => $attendee,
            ]);  
        }
    }
}