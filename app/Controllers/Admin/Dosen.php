<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Dosen;

class Dosen extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Dosen();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dosen',
            'dosen_list' => $this->model->get_dosen_list()
        ];

        return view('admin/dosen', $data);
    }
}
