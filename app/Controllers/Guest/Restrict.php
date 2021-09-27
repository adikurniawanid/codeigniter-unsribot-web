<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class Restrict extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function index()
	{
		if (!isset($_SESSION['nama'])) {
			return redirect()->to(base_url('Auth/Login'));
		}

		$data = [
			'judul' => 'Restrict'
		];

		return view('guest/restrict', $data);
	}
}
