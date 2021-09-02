<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Home;

class QueryData extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function index()
	{
		$data = [
			'judul' => 'Query Select Data',
		];

		return view('admin/queryData', $data);
	}

	public function prosesQuery()
	{
		if (isset($_POST['buttonProsesQuery'])) {
			$val = $this->validate([
				'sql_param' => [
					'label' => 'SQL Query',
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
					'judul' => 'Query Select Data',
					'result' => $this->request->getPost('sql_param'),
				];

				try {
					$resultQuery = $this->db->query($data['result'])->getResultArray();
					$data = [
						'judul' => 'Query Select Data',
						'result' => $this->request->getPost('sql_param'),
						'resultQuery' => $resultQuery,
					];
				} catch (\Throwable $th) {
					$message = 'Query gagal diproses. Silahkan periksa kembali query';
					session()->setFlashData('err', $message);
					return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
				}

				return view('admin/queryData', $data);
				// return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
			}
		} else {
			return redirect()->to($_SERVER['HTTP_REFERER'])->withInput();
		}
	}
}
