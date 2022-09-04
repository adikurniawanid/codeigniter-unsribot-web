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
            "SELECT * FROM mahasiswa"
        )->getResultArray();
    }

    public function add_mahasiswa(
        $nim_param,
        $nama_param,
        $jurusan_kode_param,
        $angkatan_param,
        $jenis_kelamin_id_param,
        $dosen_pa_nip_param,
        $ipk_param
    ) {
        return $this->db->query(
            "call add_mahasiswa('$nim_param', 
            '$nama_param', 
            '$jurusan_kode_param', 
            '$angkatan_param', 
            '$jenis_kelamin_id_param',
            '$dosen_pa_nip_param',
            '$ipk_param'
            )"
        );
    }

    public function delete_mahasiswa($nim_param)
    {
        return $this->db->query(
            "call delete_mahasiswa('$nim_param')"
        );
    }

    public function get_detail_edit_mahasiswa($nim_param)
    {
        return $this->db->query(
            "SELECT m.*, djk.* 
        FROM t_mahasiswa m
    INNER JOIN t_detail_jenis_kelamin djk ON djk.id = m.jenisKelaminId
            WHERE m.nim = ('$nim_param')"
        )->getRowArray();
    }

    public function edit_mahasiswa(
        $nim_param,
        $nama_param,
        $jurusan_kode_param,
        $angkatan_param,
        $jenis_kelamin_id_param,
        $dosen_pa_nip_param,
        $ipk_param
    ) {
        return $this->db->query(
            "
            UPDATE t_mahasiswa
    SET nama = ('$nama_param'),
        jurusanId = ('$jurusan_kode_param'), 
        angkatan = ('$angkatan_param'), 
        jenisKelaminId = ('$jenis_kelamin_id_param'),
        ipk = ('$ipk_param')
        WHERE nim = ('$nim_param'); 
    
    CASE 
        WHEN ($dosen_pa_nip_param) LIKE 'null'
        THEN
        UPDATE t_mahasiswa
            SET dosenPaId = null        
        WHERE nim = ('$nim_param'); 

        ELSE
        UPDATE t_mahasiswa
            SET dosenPaId = ($dosen_pa_nip_param)
        WHERE nim = ('$nim_param'); 
        END CASE;
            "
        );
    }
}
