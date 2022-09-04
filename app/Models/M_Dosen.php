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

    public function add_dosen($nip_param, $nama_param, $jurusan_id_param, $jenis_kelamin_id_param)
    {
        return $this->db->query(
            "INSERT INTO t_dosen (nip, nama, jurusanId, jenisKelaminId) VALUES ('$nip_param', '$nama_param', '$jurusan_id_param', '$jenis_kelamin_id_param')"
        );
    }

    public function delete_dosen($nip_param)
    {
        $this->db->query(
            "UPDATE t_mahasiswa
    SET dosenPaId =null
    WHERE dosenPaId = (SELECT id from t_dosen WHERE nip = $nip_param)"
        );
        return $this->db->query(
            "DELETE FROM t_dosen
    WHERE nip = $nip_param"
        );
    }

    public function get_detail_edit_dosen($nip_param)
    {
        return $this->db->query(
            "SELECT *
FROM dosen
WHERE nip = $nip_param"
        )->getRowArray();
    }

    public function edit_dosen($nip_param, $nama_param, $jenis_kelamin_id_param, $jurusan_kode_param)
    {
        return $this->db->query(
            "UPDATE t_dosen
        SET 
            nama = '$nama_param',
            jenisKelaminId = '$jenis_kelamin_id_param',
            jurusanId = '$jurusan_kode_param'
    WHERE nip = $nip_param"
        );
    }
}
