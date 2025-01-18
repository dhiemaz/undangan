<?php
namespace App\Models;

use CodeIgniter\Model;

class AttendeeModel extends Model {
    protected $table = 'attendees_event';
    protected $primaryKey = 'id';
    protected $allowedFields = ['hash', 'fullname', 'position', 'institution', 'status'];
    protected $useTimestamps = false;

    public function getAttendee($hash_id)
    {
        return $this->where('hash', $hash_id)->first();
    }

    public function isAttendeeRegistered($hash_id): bool {
        return $this->where('hash', $hash_id)->countAllResults() > 0; // 'hash', $hash_
    }
}