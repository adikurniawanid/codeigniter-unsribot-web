<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class Home extends BaseController
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
			'judul' => 'Home',
			'data_list' => $this->db->query("SELECT nl FROM t_dataset_nl")->getResultArray(),
		];

		return view('guest/dashboard', $data);
	}

	public function addNLDataset()
	{
		if (isset($_POST['buttonAddNL'])) {
			$val = $this->validate([
				'nl_param' => [
					'label' => 'Kalimat tanya atau perintah',
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
					'nl_param' => $this->request->getPost('nl_param')
				];

				$nl_param = $data['nl_param'];
				$nama_param = session()->get('nama');

				$success = $this->db->query("INSERT INTO t_dataset_nl (nl,guest_name) VALUES ('$nl_param', '$nama_param')");

				if ($success) {
					$message = 'Data berhasil ditambahkan';
					session()->setFlashData('message', $message);
					return redirect()->to($_SERVER['HTTP_REFERER']);
				}
			}
		} else {
			return redirect()->to($_SERVER['HTTP_REFERER']);
		}
	}
}
