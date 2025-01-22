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