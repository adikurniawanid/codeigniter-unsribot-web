<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }
}
