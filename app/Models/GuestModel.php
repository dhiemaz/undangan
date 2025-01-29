<?php
namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model {
    protected $table = 'guests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'attendee_id', 'fullname', 'position', 'status'];
    protected $useTimestamps = false;

    public function getGuestById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getGuestByAttId($AttId){
        return $this->where('attendee_id', $AttId)->findAll();
    } 
}