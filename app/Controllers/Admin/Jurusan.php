<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Fakultas;
use App\Models\M_Jurusan;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Jurusan();
        $this->modelFakultas = new M_Fakultas();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jurusan',
            'jurusan_list' => $this->model->get_jurusan_list(),
            'fakultas_list' => $this->modelFakultas->get_fakultas_list(),
        ];

        return view('admin/jurusan', $data);
    }

    public function addJurusan()
    {
        if (isset($_POST['buttonAddJurusan'])) {
            $val = $this->validate([
                'nama_jurusan_param' => [
                    'label' => 'Nama Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'kode_jurusan_param' => [
                    'label' => 'Kode Jurusan',
                    'rules' => 'required|is_unique[view_jurusan.kode]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan kode lain yang belum terdaftar'
                    ]
                ],
                'fakultas_kode_param' => [
                    'label' => 'Fakultas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashData('err', \Config\Services::validation()->listErrors());
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $data = [
                    'nama_jurusan_param' => $this->request->getPost('nama_jurusan_param'),
                    'kode_jurusan_param' => $this->request->getPost('kode_jurusan_param'),
                    'fakultas_kode_param' => $this->request->getPost('fakultas_kode_param')
                ];
                $success = $this->model->add_jurusan($data['kode_jurusan_param'], $data['nama_jurusan_param'], $data['fakultas_kode_param']);

                if ($success) {
                    $message = 'Jurusan <b>' . $data['nama_jurusan_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}
