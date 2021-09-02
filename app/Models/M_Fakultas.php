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
            "SELECT *
            FROM fakultas
            "
        )->getResultArray();
    }

    public function add_fakultas($kode_param, $nama_fakultas_param)
    {
        return $this->db->query(
            "call
            add_fakultas
            ('$kode_param', '$nama_fakultas_param')
            "
        );
    }
}
