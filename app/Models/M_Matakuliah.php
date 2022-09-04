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
            "SELECT * FROM mata_kuliah
            "
        )->getResultArray();
    }

    public function add_mata_kuliah($kode_mk_param, $nama_mk_param, $semester_param, $sks_param, $jurusan_kode_param)
    {
        return $this->db->query(
            "INSERT INTO t_mata_kuliah (kode, nama, semester, sks, jurusanId)
            VALUES ('$kode_mk_param', '$nama_mk_param', '$semester_param', '$sks_param', (SELECT id FROM t_jurusan WHERE kode = '$jurusan_kode_param'))"
        );
    }

    public function delete_mata_kuliah($kode_mk_param)
    {
        return $this->db->query(
            "DELETE FROM t_mata_kuliah
            WHERE kode= '$kode_mk_param'
            "
        );
    }

    public function get_detail_edit_mata_kuliah($kode_mk_param)
    {
        return $this->db->query(
            "SELECT * FROM mata_kuliah
        WHERE kode = '$kode_mk_param'
            "
        )->getRowArray();
    }

    public function edit_mata_kuliah($kode_mk_param, $nama_mk_param, $semester_param, $sks_param, $jurusan_kode_param)
    {
        return $this->db->query(
            "UPDATE t_mata_kuliah
        SET nama = '$nama_mk_param',
            semester = '$semester_param',
            sks = '$sks_param',
            jurusanId = ( SELECT id FROM t_jurusan WHERE kode =  '$jurusan_kode_param')
    WHERE kode = '$kode_mk_param';
            "
        );
    }
}
