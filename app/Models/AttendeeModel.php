<?php
namespace App\Models;

use CodeIgniter\Model;

class AttendeeModel extends Model {
    protected $table = 'attendees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'hash_id', 'confirmed', 'bring_guests', 'confirmed_at'];
    protected $useTimestamps = false;

    public function isAttendeeRegistered($hash_id)
    {
        return $this->where('hash_id', $hash_id)->first();
    }
}