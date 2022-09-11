<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Dosen;
use App\Models\M_Kelas;
use App\Models\M_Matakuliah;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Kelas();
        $this->modelMataKuliah = new M_Matakuliah();
        $this->modelDosen = new M_Dosen();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'Kelas',
            'kelas_list' => $this->model->get_kelas_list(),
            'mata_kuliah_list' => $this->modelMataKuliah->get_mata_kuliah_list(),
            'dosen_list' => $this->modelDosen->get_dosen_list(),
        ];

        return view('admin/kelas', $data);
    }

    public function addKelas()
    {
        if (isset($_POST['buttonModalAddKelas'])) {
            $val = $this->validate([
                'nama_param' => [
                    'label' => 'Nama',
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
                    'nama_param' => $this->request->getPost('nama_param'),
                    'dosen_id_param' => $this->request->getPost('dosen_id_param'),
                    'mata_kuliah_id_param' => $this->request->getPost('mata_kuliah_id_param'),
                    'hari_param' => $this->request->getPost('hari_param'),
                    'jam_param' => $this->request->getPost('jam_param'),
                    'ruang_param' => $this->request->getPost('ruang_param'),
                ];

                $success = $this->model->add_kelas($data['nama_param'], $data['dosen_id_param'], $data['mata_kuliah_id_param'], $data['hari_param'], $data['jam_param'], $data['ruang_param']);

                if ($success) {
                    $message = 'Kelas <b>' . $data['nama_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteKelas($id_param)
    {
        $success = $this->model->delete_kelas($id_param);

        if ($success) {
            $message = 'Kelas berhasil dihapus';
            session()->setFlashData('message', $message);
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function editKelas($id_param)
    {
        $data = [
            'judul' => 'Edit Mahasiswa',
            // 'mahasiswa' => $this->model->get_detail_edit_mahasiswa(),
            // 'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
            // 'dosen_list' => $this->modelDosen->get_dosen_list(),
        ];

        echo view('admin/kelasEdit', $data);

        // if (isset($_POST['buttonModalAddKelas'])) {
        //     $val = $this->validate([
        //         'nama_param' => [
        //             'label' => 'Nama',
        //             'rules' => 'required',
        //             'errors' => [
        //                 'required' => '{field} tidak boleh kosong.',
        //             ]
        //         ]
        //     ]);

        //     if (!$val) {
        //         session()->setFlashData('err', \Config\Services::validation()->listErrors());
        //         return redirect()->to($_SERVER['HTTP_REFERER']);
        //     } else {
        //         $data = [
        //             'nama_param' => $this->request->getPost('nama_param'),
        //             'dosen_id_param' => $this->request->getPost('dosen_id_param'),
        //             'mata_kuliah_id_param' => $this->request->getPost('mata_kuliah_id_param'),
        //             'hari_param' => $this->request->getPost('hari_param'),
        //             'jam_param' => $this->request->getPost('jam_param'),
        //             'ruang_param' => $this->request->getPost('ruang_param'),
        //         ];

        //         $success = $this->model->add_kelas($data['nama_param'], $data['dosen_id_param'], $data['mata_kuliah_id_param'], $data['hari_param'], $data['jam_param'], $data['ruang_param']);

        //         if ($success) {
        //             $message = 'Kelas <b>' . $data['nama_param'] . '</b> berhasil ditambahkan';
        //             session()->setFlashData('message', $message);
        //             return redirect()->to($_SERVER['HTTP_REFERER']);
        //         }
        //     }
        // } else {
        //     return redirect()->to($_SERVER['HTTP_REFERER']);
        // }
    }
}
