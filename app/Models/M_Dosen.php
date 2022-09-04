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
            "SELECT * FROM dosen"
        )->getResultArray();
    }

    public function add_dosen($nip_param, $nama_param)
    {
        return $this->db->query(
            "call add_dosen('$nip_param', '$nama_param')"
        );
    }

    public function delete_dosen($nip_param)
    {
        return $this->db->query(
            "call delete_dosen('$nip_param')"
        );
    }

    public function get_detail_edit_dosen($nip_param)
    {
        return $this->db->query(
            "call get_detail_edit_dosen('$nip_param')"
        )->getRowArray();
    }

    public function edit_dosen($nip_param, $nama_param)
    {
        return $this->db->query(
            "call edit_dosen('$nip_param', '$nama_param')"
        );
    }
}
