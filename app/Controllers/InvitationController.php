<?php
namespace App\Controllers;

use  App\Models\AttendeeModel;
class InvitationController extends BaseController
{
    public function show($id = null) {

        return view('comming_soon');

        // $model = new AttendeeModel();
        // if ($id == null) {
        //     var_dump("here");
        //     return redirect()->back()->with('error','invitation ID is required.');
        // } else {
        //     $attendee = $model->getAttendee($id);
        //     if ($attendee == null) {
        //         return redirect()->back()->with('error','invitation ID not found.');
        //     } else {
        //         $data['attendee'] = $attendee;
        //         return view('rsvp_confirmation', $data);
        //     }
        // }
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