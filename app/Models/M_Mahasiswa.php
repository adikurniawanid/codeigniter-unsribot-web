<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mahasiswa extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_mahasiswa_list()
    {
        return $this->db->query(
            "SELECT * FROM view_mahasiswa"
        )->getResultArray();
    }

    public function add_mahasiswa($nim_param, $nama_param, $jurusan_kode_param, $angkatan_param, $jenis_kelamin_id_param)
    {
        return $this->db->query(
            "call add_mahasiswa('$nim_param', '$nama_param', '$jurusan_kode_param', '$angkatan_param', '$jenis_kelamin_id_param')"
        );
    }

    public function delete_mahasiswa($nim_param)
    {
        return $this->db->query(
            "call delete_mahasiswa('$nim_param')"
        );
    }
}
