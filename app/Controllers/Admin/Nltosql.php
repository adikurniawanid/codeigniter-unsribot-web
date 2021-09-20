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
			'judul' => 'Natural Language to Structured Query Language',
		];

		return view('admin/nltosql', $data);
	}
}
