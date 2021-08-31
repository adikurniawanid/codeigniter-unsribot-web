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
            "SELECT * FROM view_dosen"
        )->getResultArray();
    }

    public function add_dosen($nip_param, $nama_param)
    {
        return $this->db->query(
            "call add_dosen('$nip_param', '$nama_param')"
        );
    }
}
