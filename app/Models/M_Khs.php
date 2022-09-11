<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Khs extends Model
{
     public function __construct()
     {
          $this->db = db_connect();
     }

     public function get_khs_list()
     {
          return $this->db->query(
               "select
            n.id AS id,
            m.nama                                     AS mahasiswa,
       mk.nama                                    AS mata_kuliah,
       n.rata_tugas                               AS rata_tugas,
       n.uts                                      AS uts,
       n.uas                                      AS uas,
       (n.rata_tugas + n.uts + n.uas) / 3 AS total,
       case
           when (n.rata_tugas + n.uts + n.uas) / 3 > 90 then 'A'
           when 80 < (n.rata_tugas + n.uts + n.uas) / 3 and
                (n.rata_tugas + n.uts + n.uas) / 3 <= 90 then 'B'
           when 70 < (n.rata_tugas + n.uts + n.uas) / 3 and
                (n.rata_tugas + n.uts + n.uas) / 3 <= 80 then 'C'
           when 60 < (n.rata_tugas + n.uts + n.uas) / 3 and
                (n.rata_tugas + n.uts + n.uas) / 3 <= 70 then 'D'
           when 50 < (n.rata_tugas + n.uts + n.uas) / 3 and
                (n.rata_tugas + n.uts + n.uas) / 3 <= 60 then 'E'
           else 'F' end                               AS huruf
from ((t_nilai n join t_mahasiswa m
       on (n.mahasiswaId = m.id)) join t_mata_kuliah mk
      on (n.mataKuliahId = mk.id))

"
          )->getResultArray();
     }

     public function add_khs(
          $mahasiswa_id_param,
          $mata_kuliah_id_param,
          $rata_tugas_param,
          $uts_param,
          $uas_param
     ) {
          return $this->db->query(
               "INSERT INTO t_nilai (mahasiswaId, mataKuliahId,  rata_tugas, uts, uas) VALUES ( (SELECT id FROM t_mahasiswa WHERE nim = $mahasiswa_id_param), $mata_kuliah_id_param,$rata_tugas_param, $uts_param, $uas_param)"
          );
     }

     public function delete_khs($id_param)
     {
          return $this->db->query(
               "DELETE FROM t_nilai
    WHERE id = $id_param"
          );
     }
}
