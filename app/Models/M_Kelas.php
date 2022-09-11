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
}
