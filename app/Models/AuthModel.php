<?php
namespace App\Models;

class AuthModel extends \CodeIgniter\Model {

	public function __construct()
	{
		parent::__construct();
		$this->validation = \Config\Services::validation();
	}

	public function login($input)
	{
		$this->validation->setRules([
			'username' => "required|trim",
			'password' => "required|trim"
		]);

		if ($this->validation->run($input)) {
			$user = $this->db->table('user')->where('username', $input['username'])->get()->getRowArray();

			if ($user) {
				if (password_verify($input['password'], $user['password'])) {
					$hasil = [
						'error' => false,
						'message' => "berhasil login",
						'data' => $user
					];
				} else {
					$hasil = [
						'error' => true,
						'message' => "password salah"
					];
				}
			} else {
				$hasil = [
					'error' => true,
					'message' => "username tidak ditemukan"
				];
			}
		} else {
			foreach ($this->validation->getErrors() as $key => $item) {
				$hasil = [
					'error' => true,
					'message' => $item,
					'field' => $key
				];
				return $hasil;
			}
		}

		return $hasil;
	}

	public function responden($input)
	{
		$this->validation->setRules([
			'nama' => "required|trim",
			'kode' => "required|trim"
		]);

		if ($this->validation->run($input)) {
			$responden = $this->db->table('responden')->where('nama', $input['nama'])->get()->getRowArray();

			if ($responden) {
				if ($input['kode'] == $responden['kode']) {
					$hasil = [
						'error' => false,
						'message' => "berhasil login",
						'data' => $responden
					];
				} else {
					$hasil = [
						'error' => true,
						'message' => "kode salah"
					];
				}
			} else {
				$hasil = [
					'error' => true,
					'message' => "data responden tidak ditemukan"
				];
			}
		} else {
			foreach ($this->validation->getErrors() as $key => $item) {
				$hasil = [
					'error' => true,
					'message' => $item,
					'field' => $key
				];
				return $hasil;
			}
		}

		return $hasil;
	}

}

/* End of file AuthModel.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Models/AuthModel.php */