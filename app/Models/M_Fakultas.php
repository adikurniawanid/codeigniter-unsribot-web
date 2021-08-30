<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Fakultas extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_fakultas_list()
    {
        return $this->db->query(
            "SELECT kode, nama
            FROM fakultas
            ORDER BY 1
            "
        )->getResultArray();
    }
}
