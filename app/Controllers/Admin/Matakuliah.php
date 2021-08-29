<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Matakuliah extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Mata Kuliah'
        ];

        return view('admin/matakuliah', $data);
    }
}
