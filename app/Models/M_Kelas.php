<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kelas extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_kelas_list()
    {
        return $this->db->query(
            "SELECT *
            FROM kelas k
            "
        )->getResultArray();
    }
}
