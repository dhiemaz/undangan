<?php
namespace App\Controllers;

use  App\Models\AttendeeModel;
class AttendanceController extends BaseController
{
    public function index()
    {
        return view('rsvp_confirmation');
    }

    public function confirm()
    {
        $hash_id = $this->request->getPost('hash_id');
        $confirmed = $this->request->getPost('confirmed');
        $guests = $this->request->getPost('guests');        
        
        $attendeeModel = new AttendeeModel();
        $attendee = $attendeeModel->isAttendeeRegistered($hash_id);

        if ($attendee['confirmed_at'] != null) {
            $data['message'] = "Mohon maaf, peserta sudah melakukan konfirmasi pada tanggal " . $attendee['confirmed_at'] . ".";
        } else {
            $attendeeModel->update([
                'confirmed' => $confirmed,
                'bring_guests' => $guests,
                'confirmed_at' => date('Y-m-d H:i:s'),
            ]);            
            $data['message'] = "Terima kasih. {$attendee['name']}., atas konfirmasi anda.";        
        }

        return view('confirmation', $data);
    }

    public function submit()
    {
        return view('submit_recorded');
    }
}
