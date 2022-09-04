<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NlToSql extends BaseController
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
			'judul' => 'NL2SQL',
		];
		return view('admin/nltosql', $data);
	}

	public function nlDataset()
	{
		if (!isset($_SESSION['user_id'])) {
			return redirect()->to(base_url('Auth/Login'));
		}

		$data = [
			'judul' => 'Dataset NL',
			'data_list' => $this->db->query("SELECT nl FROM t_dataset_nl")->getResultArray(),
		];
		return view('admin/nlDataset', $data);
	}

	public function prosesNlToSql()
	{
		if (isset($_POST['buttonProsesNlToSql'])) {
			$val = $this->validate([
				'input_param' => [
					'label' => 'Input',
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
					'judul' => 'NL2SQL',
					'resultQuery' => $this->db->query('SELECT * FROM mahasiswa')->getResultArray(),
					'text' => $this->request->getPost('input_param')
				];

				return view('admin/nltosql', $data);
				// return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
			}
		} else {
			return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
		}
	}
}
