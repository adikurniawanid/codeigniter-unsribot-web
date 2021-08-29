<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dosen extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dosen'
        ];

        return view('admin/dosen', $data);
    }
}
