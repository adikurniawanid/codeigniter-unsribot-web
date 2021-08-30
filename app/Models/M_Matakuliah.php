<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Matakuliah extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_mata_kuliah_list()
    {
        return $this->db->query(
            "SELECT m.kode, m.nama, j.nama as jurusan, m.sks, f.nama as fakultas
            FROM mata_kuliah m
            INNER JOIN jurusan j ON j.kode = m.jurusan_kode
            INNER JOIN fakultas f ON f.kode = j.fakultas_kode
            "
        )->getResultArray();
    }
}
