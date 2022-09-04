<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function index()
	{
		if (!isset($_SESSION['user_id'])) {
			return redirect()->to(base_url('Auth/Login'));
		}

		$data = [
			'judul' => 'Dashboard',
			'data_list' => $this->db->query("SELECT (SELECT COUNT(nim) FROM t_mahasiswa) as jumlah_mahasiswa,
       (SELECT COUNT(nip) FROM t_dosen) as jumlah_dosen,
       (SELECT COUNT(kode) FROM t_mata_kuliah) as jumlah_matakuliah,
       (SELECT COUNT(kode) FROM t_jurusan) as jumlah_jurusan")->getRowArray(),
		];

		return view('admin/dashboard', $data);
	}
}
