<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Jurusan;
use App\Models\M_Matakuliah;

class Matakuliah extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Matakuliah();
        $this->modelJurusan = new M_Jurusan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Mata Kuliah',
            'mata_kuliah_list' => $this->model->get_mata_kuliah_list(),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
        ];

        return view('admin/matakuliah', $data);
    }
}
