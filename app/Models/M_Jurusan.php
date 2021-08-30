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
            "SELECT j.kode, j.nama as jurusan, f.nama as fakultas
            FROM jurusan j
            INNER JOIN fakultas f ON j.fakultas_kode = f.kode
            ORDER BY 3,2"
        )->getResultArray();
    }
}
