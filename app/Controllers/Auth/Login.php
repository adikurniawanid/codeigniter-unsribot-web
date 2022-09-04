<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\M_Auth;

class Login extends BaseController
{

	public function __construct()
	{
		$this->model = new M_Auth();
	}

	public function index()
	{
		if (isset($_SESSION['user_id'])) {
			return redirect()->to(base_url('/'));
		}

		session()->destroy();
		$data = [
			'judul' => 'Halaman Login'
		];
		echo view('layout/header', $data);
		echo view('auth/login');
	}

	public function login()
	{
		if (isset($_POST['buttonLogin'])) {
			$val = $this->validate([
				'username_param' => [
					'label' => 'Username',
					'rules' => 'required|max_length[21]',
					'errors' => [
						'required' => '{field} tidak boleh kosong.',
						'max_length' => '{field} tidak boleh lebih dari 21 karakter.'
					]

				],
				'password_param' => [
					'label' => 'Password',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong.'
					]
				]
			]);

			if (!$val) {
				session()->setFlashData('err', \Config\Services::validation()->listErrors());
				return redirect()->to(base_url('Auth/Login'));
			} else {
				$data = [
					'username_param' => $this->request->getPost('username_param'),
					'password_param' => $this->request->getPost('password_param')
				];

				$usernameParam = $data['username_param'];
				$passwordParam = $data['password_param'];

				if (password_verify($passwordParam, "$2y$10\$fmcL7CEb3ruB/60TtvjKZOcdeR4.PiAG.nNvDrx1NGzdMN4fK1QNK")) {
					session()->set('nama', $usernameParam);
					return redirect()->to(base_url('Guest'));
				}

				$isUsernameExist = $this->model->query("
				SELECT id, password 
				FROM t_admin 
				WHERE username = '$usernameParam'
				")->getRowArray();

				if (is_null($isUsernameExist)) {
					$message = 'Username Tidak Terdaftar';
					session()->setFlashData('err', $message);
					return redirect()->to(base_url('Auth/Login'));
				} elseif (!is_null($isUsernameExist)) {
					$getPasswordHash =
						$this->model->query("
				SELECT password 
				FROM t_admin 
				WHERE username = '$usernameParam'
				")->getRowArray();

					$getPasswordHash = $getPasswordHash['password'];

					if (password_verify($passwordParam, $getPasswordHash)) {
						session()->set('user_id', $this->model->query("
						SELECT id 
						FROM t_admin 
						WHERE username = '$usernameParam'
						")->getRowArray());
						$nama = $this->model->query("
						SELECT nama 
						FROM t_admin 
						WHERE username = '$usernameParam'
						")->getRowArray();
						session()->set('nama', $nama['nama']);
						return redirect()->to(base_url('/'));
					} else {
						$message = 'Password yang Anda Masukan Salah';
						session()->setFlashData('err', $message);
						return redirect()->to(base_url('Auth/Login'));
					}
				}
			}
		} else {
			return redirect()->to(base_url('Auth/Login'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('Auth/Login'));
	}
}
