<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Fakultas;

class Fakultas extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Fakultas();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'Fakultas',
            'fakultas_list' => $this->model->get_fakultas_list(),
        ];

        return view('admin/fakultas', $data);
    }
}
