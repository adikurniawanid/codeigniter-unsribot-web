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
        $ipk_param,
        $suliet_param,
        $program_studi_id_param
    ) {
        return $this->db->query(
            "
INSERT INTO t_mahasiswa (nim, nama,  angkatan, suliet, ipk,jurusanId, jenisKelaminId, dosenPaId, programStudiId)
        VALUES ('$nim_param', '$nama_param', '$angkatan_param','$suliet_param', '$ipk_param','$jurusan_kode_param', '$jenis_kelamin_id_param', (SELECT id FROM t_dosen WHERE nip = $dosen_pa_nip_param),'$program_studi_id_param' )"
        );
    }

    public function delete_mahasiswa($nim_param)
    {
        return $this->db->query(
            "DELETE FROM t_mahasiswa
    WHERE nim = '$nim_param'"
        );
    }

    public function get_detail_edit_mahasiswa($nim_param)
    {
        return $this->db->query(
            "SELECT * FROM mahasiswa WHERE nim = '$nim_param'"
        )->getRowArray();
    }

    public function edit_mahasiswa(
        $nim_param,
        $nama_param,
        $jurusan_kode_param,
        $angkatan_param,
        $jenis_kelamin_id_param,
        $dosen_pa_nip_param,
        $ipk_param,
        $suliet_param,
        $program_studi_id_param
    ) {
        return $this->db->query(

            "UPDATE t_mahasiswa
    SET nama = '$nama_param',
    jurusanId = '$jurusan_kode_param',
    angkatan = '$angkatan_param',
    jenisKelaminId = '$jenis_kelamin_id_param',
    ipk = '$ipk_param',
    suliet = '$suliet_param',
    dosenPaId = (SELECT id FROM t_dosen WHERE nip = '$dosen_pa_nip_param'),
    programStudiId = '$program_studi_id_param'
        WHERE nim = '$nim_param'; "
        );
    }
}
