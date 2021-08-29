<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Mahasiswa'
        ];

        return view('admin/mahasiswa', $data);
    }
}
