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

    public function getAllInvitations()
    {
        $attendeeModel = new AttendeeModel();

        log_message(
            'info', 
        'BackstageController::getAllInvitations'); 
        
        // Get pagination parameters from the request
        $page = $this->request->getGet('page') ?? 1;
        $perPage = $this->request->getGet('perPage') ?? 20;

        // Fetch paginated data
        $updatedInvitations = $attendeeModel
            ->select('fullname, position, institution, status')            
            ->orderBy('fullname', 'ASC')
            ->paginate($perPage, 'default', $page);

        $total = $attendeeModel->countAllResults();

        return $this->response->setJSON([
            'data' => $updatedInvitations,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($total / $perPage),
                'totalItems' => $total,
            ],
        ]);
    }

    public function getInvitationGuests()
    {
        $guestModel = new GuestModel();

        log_message(
            'info', 
        'BackstageController::getInvitationGuests'); 
        
        // Get pagination parameters from the request
        $page = $this->request->getGet('page') ?? 1;
        $perPage = $this->request->getGet('perPage') ?? 20;

        // Fetch paginated data
        $invitationGuests = $guestModel
            ->select('guests.fullname as fullname, guests.position as position, attendees.fullname as attendee_name')    
            ->join('attendees', 'attendees.id = guests.attendee_id', 'inner')                    
            ->paginate($perPage, 'default', $page);

        $total = $guestModel->countAllResults();

        return $this->response->setJSON([
            'data' => $invitationGuests,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($total / $perPage),
                'totalItems' => $total,
            ],
        ]);
    }

    public function getInvitationDelegation()
    {
        $delegationModel = new DelegateModel();

        log_message(
            'info', 
        'BackstageController::getInvitationDelegation'); 
        
        // Get pagination parameters from the request
        $page = $this->request->getGet('page') ?? 1;
        $perPage = $this->request->getGet('perPage') ?? 20;

        // Fetch paginated data
        $invitationDelegation = $delegationModel
            ->select('delegations.fullname as fullname, delegations.position as position, attendees.fullname as attendee_name')    
            ->join('attendees', 'attendees.id = delegations.attendee_id', 'inner')                    
            ->paginate($perPage, 'default', $page);

        $total = $delegationModel->countAllResults();

        return $this->response->setJSON([
            'data' => $invitationDelegation,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($total / $perPage),
                'totalItems' => $total,
            ],
        ]);
    }

    public function getUpdatedInvitations()
    {
        $attendeeModel = new AttendeeModel();

        // Get pagination parameters from the request
        $page = $this->request->getGet('page') ?? 1;
        $perPage = $this->request->getGet('perPage') ?? 6;

        // Fetch paginated data
        $updatedInvitations = $attendeeModel
            ->select('fullname, position, institution, status')
            ->where('status IS NOT NULL', null, false)
            ->orderBy('updated_at', 'DESC')
            ->paginate($perPage, 'default', $page);

        $total = $attendeeModel
            ->where('status IS NOT NULL', null, false)
            ->countAllResults();

        return $this->response->setJSON([
            'data' => $updatedInvitations,
            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($total / $perPage),
                'totalItems' => $total,
            ],
        ]);
    }
}