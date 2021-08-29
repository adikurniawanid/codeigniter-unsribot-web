<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jurusan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Jurusan'
        ];

        return view('admin/jurusan', $data);
    }
}
