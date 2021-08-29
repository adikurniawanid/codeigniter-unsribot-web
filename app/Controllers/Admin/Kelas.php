<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Kelas'
        ];

        return view('admin/kelas', $data);
    }
}
