<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Fakultas extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Fakultas'
        ];

        return view('admin/fakultas', $data);
    }
}
