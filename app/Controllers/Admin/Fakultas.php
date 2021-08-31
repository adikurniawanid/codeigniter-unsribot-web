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
        $data = [
            'judul' => 'Fakultas',
            'fakultas_list' => $this->model->get_fakultas_list(),
        ];

        return view('admin/fakultas', $data);
    }

    public function addFakultas()
    {
        if (isset($_POST['buttonAddFakultas'])) {
            $val = $this->validate([
                'nama_fakultas_param' => [
                    'label' => 'Nama Fakultas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'kode_param' => [
                    'label' => 'Kode Fakultas',
                    'rules' => 'required|is_unique[view_fakultas.kode]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan kode lain yang belum terdaftar'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashData('err', \Config\Services::validation()->listErrors());
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $data = [
                    'nama_fakultas_param' => $this->request->getPost('nama_fakultas_param'),
                    'kode_param' => $this->request->getPost('kode_param')
                ];

                $success = $this->model->add_fakultas($data['kode_param'], $data['nama_fakultas_param']);

                if ($success) {
                    $message = 'Fakultas <b>' . $data['nama_fakultas_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}
