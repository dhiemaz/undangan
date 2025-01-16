<?php
namespace App\Models;

use CodeIgniter\Model;

class AttendeeModel extends Model {
    protected $table = 'guests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['hash', 'fullname', 'position', 'institution', 'is_attending', 'is_delegate'];
    protected $useTimestamps = false;

    public function getAttendee($hash_id)
    {
        return $this->where('hash', $hash_id)->first();
    }
}