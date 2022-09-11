<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kelas extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_kelas_list()
    {
        return $this->db->query(
            "select 
            k.id AS id,
            k.nama  AS nama,
       mk.nama AS mata_kuliah,
       d.nama  AS dosen,
       k.hari  AS hari,
       k.jam   AS jam,
       k.ruang AS ruang
from ((t_kelas k join t_mata_kuliah mk
       on (k.mataKuliahId = mk.id)) join t_dosen d
      on (k.dosenId = d.id));

            "
        )->getResultArray();
    }

    public function add_kelas(
        $nama_param,
        $dosen_id_param,
        $mata_kuliah_id_param,
        $hari_param,
        $jam_param,
        $ruang_param
    ) {
        return $this->db->query(
            "
INSERT INTO t_kelas (nama, dosenId,  mataKuliahId, hari, jam,ruang)
        VALUES ('$nama_param', (SELECT id FROM t_dosen WHERE nip = $dosen_id_param), '$mata_kuliah_id_param','$hari_param', '$jam_param', '$ruang_param' )"
        );
    }

    public function delete_kelas($id_param)
    {
        return $this->db->query(
            "DELETE FROM t_kelas
    WHERE id = $id_param"
        );
    }
}
