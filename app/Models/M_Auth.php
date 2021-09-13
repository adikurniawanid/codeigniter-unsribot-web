<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    // public function is_username_exist($username)
    // {
    //     return $this->db->query(
    //         "call get_detail_edit_dosen('$nip_param')"
    //     )->getRowArray();
    // }
}
