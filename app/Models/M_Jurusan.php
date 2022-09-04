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
            "SELECT j.kode, j.nama, f.nama as fakultas  FROM t_jurusan j INNER JOIN t_fakultas f on j.fakultasId = f.id"
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

    public function get_detail_edit_jurusan($kode_jurusan_param)
    {
        return $this->db->query(
            "call get_detail_edit_jurusan('$kode_jurusan_param')"
        )->getRowArray();
    }

    public function edit_jurusan($kode_jurusan_param, $nama_fakultas_param, $kode_fakultas_param)
    {
        return $this->db->query(
            "call
            edit_jurusan
            ('$kode_jurusan_param', '$nama_fakultas_param', '$kode_fakultas_param')
            "
        );
    }
}
