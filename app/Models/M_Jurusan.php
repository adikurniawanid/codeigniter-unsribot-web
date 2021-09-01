<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Jurusan extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_jurusan_list()
    {
        return $this->db->query(
            "SELECT * FROM view_jurusan"
        )->getResultArray();
    }

    public function add_jurusan($kode_jurusan_param, $nama_fakultas_param, $kode_fakultas_param)
    {
        return $this->db->query(
            "call
            add_jurusan
            ('$kode_jurusan_param', '$nama_fakultas_param', '$kode_fakultas_param')
            "
        );
    }

    public function delete_jurusan($kode_jurusan_param)
    {
        return $this->db->query(
            "call
            delete_jurusan
            ('$kode_jurusan_param')
            "
        );
    }
}
