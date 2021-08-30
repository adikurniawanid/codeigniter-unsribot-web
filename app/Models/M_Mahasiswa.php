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
            "SELECT m.nim, m.nama, j.nama as jurusan, f.nama as fakultas, m.angkatan
            FROM mahasiswa m
            INNER JOIN jurusan j ON j.kode = m.jurusan_kode
            INNER JOIN fakultas f ON f.kode = j.fakultas_kode
            ORDER BY 2"
        )->getResultArray();
    }
}
