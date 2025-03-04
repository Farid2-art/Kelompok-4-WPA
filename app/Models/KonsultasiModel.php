<?php

namespace App\Models;
use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $allowedFields = ['user_id', 'dokter_id', 'jadwal'];

    public function getDokter()
    {
        return $this->db->table('users')->where('role', 'dokter')->get()->getResultArray();
    }
}
