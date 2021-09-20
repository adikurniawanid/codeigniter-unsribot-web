<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Nltosql extends BaseController
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
			'judul' => 'NL to SQL',
			'resultQuery' => $this->db->query('SELECT * FROM mahasiswa')->getResultArray()
		];

		return view('admin/nltosql', $data);
	}
}
