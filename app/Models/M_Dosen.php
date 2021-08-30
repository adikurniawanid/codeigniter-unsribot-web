<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Dosen extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_dosen_list()
    {
        return $this->db->query(
            "SELECT nidn, nama 
            FROM dosen
            ORDER BY 2"
        )->getResultArray();
    }
}
