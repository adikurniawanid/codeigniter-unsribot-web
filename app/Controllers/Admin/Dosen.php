<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Dosen;

class Dosen extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Dosen();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dosen',
            'dosen_list' => $this->model->get_dosen_list()
        ];

        return view('admin/dosen', $data);
    }

    public function addDosen()
    {
        if (isset($_POST['buttonAddDosen'])) {
            $val = $this->validate([
                'nama_param' => [
                    'label' => 'Nama Dosen',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'nip_param' => [
                    'label' => 'NIP',
                    'rules' => 'required|is_unique[view_dosen.NIP]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan {field} lain yang belum terdaftar'
                    ]
                ]
            ]);
            if (!$val) {
                session()->setFlashData('err', \Config\Services::validation()->listErrors());
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $data = [
                    'nama_param' => $this->request->getPost('nama_param'),
                    'nip_param' => $this->request->getPost('nip_param')
                ];

                $success = $this->model->add_dosen($data['nip_param'], $data['nama_param']);
                if ($success) {
                    $message = 'Dosen <b>' . $data['nama_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteDosen($nip_param)
    {
        $success = $this->model->delete_dosen($nip_param);

        if ($success) {
            $message = 'Dosen <b>' . $nip_param . '</b> berhasil dihapus';
            session()->setFlashData('message', $message);
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}
