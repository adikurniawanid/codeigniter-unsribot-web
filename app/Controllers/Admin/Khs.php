<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Khs;
use App\Models\M_Mahasiswa;
use App\Models\M_Matakuliah;

class Khs extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Khs();
        $this->modelMahasiswa = new M_Mahasiswa();
        $this->modelMataKuliah = new M_Matakuliah();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'KHS',
            'khs_list' => $this->model->get_khs_list(),
            'mahasiswa_list' => $this->modelMahasiswa->get_mahasiswa_list(),
            'mata_kuliah_list' => $this->modelMataKuliah->get_mata_kuliah_list(),
        ];

        return view('admin/khs', $data);
    }

    public function addKhs()
    {

        if (isset($_POST['buttonModalAddKhs'])) {

            $val = $this->validate([
                'mahasiswa_param' => [
                    'label' => 'Mahasiswa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ]
            ]);

            if (!$val) {

                session()->setFlashData('err', \Config\Services::validation()->listErrors());
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $data = [
                    'mahasiswa_param' => $this->request->getPost('mahasiswa_param'),
                    'mata_kuliah_id_param' => $this->request->getPost('mata_kuliah_id_param'),
                    'rata_tugas_param' => $this->request->getPost('rata_tugas_param'),
                    'uts_param' => $this->request->getPost('uts_param'),
                    'uas_param' => $this->request->getPost('uas_param')
                ];

                $success = $this->model->add_khs($data['mahasiswa_param'], $data['mata_kuliah_id_param'], $data['rata_tugas_param'], $data['uts_param'], $data['uas_param']);

                if ($success) {
                    $message = 'Khs berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteKhs($id_param)
    {
        $success = $this->model->delete_khs($id_param);

        if ($success) {
            $message = 'Khs berhasil dihapus';
            session()->setFlashData('message', $message);
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}
