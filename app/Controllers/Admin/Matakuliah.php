<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Jurusan;
use App\Models\M_Matakuliah;

class Matakuliah extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Matakuliah();
        $this->modelJurusan = new M_Jurusan();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('Auth/Login'));
        }

        $data = [
            'judul' => 'Mata Kuliah',
            'mata_kuliah_list' => $this->model->get_mata_kuliah_list(),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
        ];

        return view('admin/matakuliah', $data);
    }

    public function addMataKuliah()
    {
        if (isset($_POST['buttonAddMataKuliah'])) {
            $val = $this->validate([
                'kode_mk_param' => [
                    'label' => 'Kode Mata Kuliah',
                    'rules' => 'required|is_unique[mata_kuliah.kode]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan {field} lain yang belum terdaftar'
                    ]
                ],
                'nama_mk_param' => [
                    'label' => 'Nama Mata Kuliah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'semester_param' => [
                    'label' => 'Semester',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ],
                'jurusan_kode_param' => [
                    'label' => 'Jurusan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ],
                'sks_param' => [
                    'label' => 'SKS',
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
                    'kode_mk_param' => $this->request->getPost('kode_mk_param'),
                    'nama_mk_param' => $this->request->getPost('nama_mk_param'),
                    'semester_param' => $this->request->getPost('semester_param'),
                    'jurusan_kode_param' => $this->request->getPost('jurusan_kode_param'),
                    'sks_param' => $this->request->getPost('sks_param'),
                ];
                $success = $this->model->add_mata_kuliah($data['kode_mk_param'], $data['nama_mk_param'], $data['semester_param'], $data['sks_param'], $data['jurusan_kode_param']);

                if ($success) {
                    $message = 'Mata Kuliah <b>' . $data['nama_mk_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteMatakuliah($kode_mk_param)
    {
        $success = $this->model->delete_mata_kuliah($kode_mk_param);

        if ($success) {
            $message = 'Mata Kuliah <b>' . $kode_mk_param . '</b> berhasil dihapus';
            session()->setFlashData('message', $message);
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function editMatakuliah($kode_param)
    {
        $data = [
            'judul' => 'Edit Mata Kuliah',
            'mata_kuliah' => $this->model->get_detail_edit_mata_kuliah($kode_param),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
        ];

        echo view('admin/matakuliahEdit', $data);

        if (isset($_POST['buttonEditMataKuliah'])) {
            $val = $this->validate([
                'kode_mk_param' => [
                    'label' => 'Kode Mata Kuliah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'nama_mk_param' => [
                    'label' => 'Nama Mata Kuliah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'semester_param' => [
                    'label' => 'Semester',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ],
                'jurusan_id_param' => [
                    'label' => 'Jurusan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ],
                'sks_param' => [
                    'label' => 'SKS',
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
                    'kode_mk_param' => $this->request->getPost('kode_mk_param'),
                    'nama_mk_param' => $this->request->getPost('nama_mk_param'),
                    'semester_param' => $this->request->getPost('semester_param'),
                    'jurusan_id_param' => $this->request->getPost('jurusan_id_param'),
                    'sks_param' => $this->request->getPost('sks_param'),
                ];

                $success = $this->model->edit_mata_kuliah($data['kode_mk_param'], $data['nama_mk_param'], $data['semester_param'], $data['sks_param'], $data['jurusan_id_param']);

                if ($success) {
                    $message = 'Mata Kuliah <b>' . $data['nama_mk_param'] . '</b> berhasil diedit';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }
}
