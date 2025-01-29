<?php
namespace App\Models;

use CodeIgniter\Model;

class DelegateModel extends Model {
    protected $table = 'delegations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'attendee_id', 'fullname', 'position', 'status'];
    protected $useTimestamps = false;

    public function getDelegateById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getDelegateByAttId($AttId){
        return $this->where('attendee_id', $AttId)->findAll();
    } 
}