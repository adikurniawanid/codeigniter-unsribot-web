<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Jurusan;
use App\Models\M_Mahasiswa;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Mahasiswa();
        $this->modelJurusan = new M_Jurusan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Mahasiswa',
            'mahasiswa_list' => $this->model->get_mahasiswa_list(),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
        ];

        return view('admin/mahasiswa', $data);
    }
}
