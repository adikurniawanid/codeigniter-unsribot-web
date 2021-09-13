<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Kelas;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Kelas();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'Kelas',
            'kelas_list' => $this->model->get_kelas_list(),
        ];

        return view('admin/kelas', $data);
    }
}
