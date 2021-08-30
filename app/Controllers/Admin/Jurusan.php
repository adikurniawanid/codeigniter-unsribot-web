<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Fakultas;
use App\Models\M_Jurusan;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Jurusan();
        $this->modelFakultas = new M_Fakultas();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jurusan',
            'jurusan_list' => $this->model->get_jurusan_list(),
            'fakultas_list' => $this->modelFakultas->get_fakultas_list(),
        ];

        return view('admin/jurusan', $data);
    }
}
