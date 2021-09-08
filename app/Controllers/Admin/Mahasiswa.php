<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Dosen;
use App\Models\M_Jurusan;
use App\Models\M_Mahasiswa;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Mahasiswa();
        $this->modelJurusan = new M_Jurusan();
        $this->modelDosen = new M_Dosen();
    }

    public function index()
    {
        $data = [
            'judul' => 'Mahasiswa',
            'mahasiswa_list' => $this->model->get_mahasiswa_list(),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
            'dosen_list' => $this->modelDosen->get_dosen_list(),
        ];

        return view('admin/mahasiswa', $data);
    }

    public function addMahasiswa()
    {
        if (isset($_POST['buttonAddMahasiswa'])) {
            $val = $this->validate([
                'nim_param' => [
                    'label' => 'NIM',
                    'rules' => 'required|is_unique[t_mahasiswa.nim]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan {field} lain yang belum terdaftar'
                    ]
                ],
                'nama_param' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'jurusan_id_param' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'tahun_angkatan_param' => [
                    'label' => 'Tahun Angkatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'jenis_kelamin_id_param' => [
                    'label' => 'Jenis Kelamin',
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
                    'nim_param' => $this->request->getPost('nim_param'),
                    'nama_param' => $this->request->getPost('nama_param'),
                    'jurusan_id_param' => $this->request->getPost('jurusan_id_param'),
                    'tahun_angkatan_param' => $this->request->getPost('tahun_angkatan_param'),
                    'jenis_kelamin_id_param' => $this->request->getPost('jenis_kelamin_id_param'),
                    'pa_id_param' => $this->request->getPost('pa_id_param'),
                ];

                $success = $this->model->add_mahasiswa($data['nim_param'], $data['nama_param'], $data['jurusan_id_param'], $data['tahun_angkatan_param'], $data['jenis_kelamin_id_param'], $data['pa_id_param']);
                if ($success) {
                    $message = 'Mahasiswa <b>' . $data['nama_param'] . '</b> berhasil ditambahkan';
                    session()->setFlashData('message', $message);
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteMahasiswa($nim_param)
    {
        $success = $this->model->delete_mahasiswa($nim_param);

        if ($success) {
            $message = 'Mahasiswa <b>' . $nim_param . '</b> berhasil dihapus';
            session()->setFlashData('message', $message);
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function editMahasiswa($nim_param)
    {
        $data = [
            'judul' => 'Edit Mahasiswa',
            'mahasiswa' => $this->model->get_detail_edit_mahasiswa($nim_param),
            'jurusan_list' => $this->modelJurusan->get_jurusan_list(),
            'dosen_list' => $this->modelDosen->get_dosen_list(),
        ];

        echo view('admin/mahasiswaEdit', $data);

        if (isset($_POST['buttonEditMahasiswa'])) {
            $val = $this->validate([
                'nim_param' => [
                    'label' => 'NIM',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} tersebut telah digunakan, silahkan gunakan {field} lain yang belum terdaftar'
                    ]
                ],
                'nama_param' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'jurusan_id_param' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'tahun_angkatan_param' => [
                    'label' => 'Tahun Angkatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'jenis_kelamin_id_param' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashData('err', \Config\Services::validation()->listErrors());
                return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
            } else {
                $data = [
                    'nim_param' => $this->request->getPost('nim_param'),
                    'nama_param' => $this->request->getPost('nama_param'),
                    'jurusan_id_param' => $this->request->getPost('jurusan_id_param'),
                    'tahun_angkatan_param' => $this->request->getPost('tahun_angkatan_param'),
                    'jenis_kelamin_id_param' => $this->request->getPost('jenis_kelamin_id_param'),
                    'pa_id_param' => $this->request->getPost('pa_id_param'),
                ];

                $success = $this->model->edit_mahasiswa($data['nim_param'], $data['nama_param'], $data['jurusan_id_param'], $data['tahun_angkatan_param'], $data['jenis_kelamin_id_param'], $data['pa_id_param']);

                if ($success) {
                    $message = 'Mahasiswa <b>' . $data['nama_param'] . '</b> berhasil diedit';
                    session()->setFlashData('message', $message);
                    return redirect()->to(base_url('Admin/Mahasiswa'));
                } else {
                    return redirect()->to(base_url('Admin/Mahasiswa'));
                }
            }
        }
    }
}
