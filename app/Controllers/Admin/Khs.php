<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Khs;

class Khs extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Khs();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'KHS',
            'khs_list' => $this->model->get_khs_list()
        ];

        return view('admin/khs', $data);
    }
}
