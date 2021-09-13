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
			return redirect()->to(base_url('Admin'));
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
						return redirect()->to(base_url('Admin'));
					} else {
						$message = 'Password yang Anda Masukan Salah';
						session()->setFlashData('err', $message);
						return redirect()->to(base_url('Auth/Login'));
					}
				}

				// if ($usernameEmailExist == true) {

				// 	$status = $this->model->get_user_status($data['email_username_param']);

				// 	if ($status == 0) {
				// 		$passwordHash = $this->model->get_password_hash($data['email_username_param']);

				// 		if (password_verify($data['password_param'], $passwordHash)) {
				// 			$success = true;
				// 			$role = $this->model->get_user_role($data['email_username_param']);
				// 		} else {
				// 			$success = false;
				// 		}

				// 		session()->set('user_id', $this->model->get_user_id_by_username_email($data['email_username_param']));
				// 		$user_information = $this->model->get_user_information($this->session->get('user_id'));
				// 		session()->set('nama', $user_information['nama']);
				// 		session()->set('email', $user_information['email']);
				// 		session()->set('jenisKelaminId', $user_information['jenis_kelamin_id']);
				// 		session()->set('noHp', $user_information['no_hp']);
				// 		session()->set('instansi', $user_information['instansi']);

				// 		if ($success && $role == 1) {
				// 			return redirect()->to(base_url('Admin'));
				// 		} elseif ($success && $role == 2) {
				// 			return redirect()->to(base_url('user'));
				// 		} else {
				// 			$message = 'Password yang diinput salah';
				// 			session()->setFlashData('err', $message);
				// 			return redirect()->to(base_url('Auth/Login'));
				// 		}
				// 	} elseif ($status == 1) {
				// 		$message = 'User Telah dinonaktifkan';
				// 		session()->setFlashData('err', $message);
				// 		return redirect()->to(base_url('Auth/Login'));
				// 	} else {
				// 		$message = 'User Telah dinonaktifkan. Silahkan hubungi admin';
				// 		session()->setFlashData('err', $message);
				// 		return redirect()->to(base_url('Auth/Login'));
				// 	}
				// }
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
