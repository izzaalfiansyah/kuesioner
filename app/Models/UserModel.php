<?php
namespace App\Models;

class UserModel extends \CodeIgniter\Model {

	protected $table = 'user';

	protected $primaryKey = 'id';

	protected $allowedFields = ['username', 'nama', 'password', 'email', 'nomor_telepon'];

	public function __construct()
	{
		parent::__construct();
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$user = $this->findAll();

		$hasil = [
			'error' => false,
			'message' => $user ? "data user berhasil ditemukan" : "data user tidak tersedia",
			'data' => $user
		];

		return $hasil;
	}

	public function add($input)
	{
		$data = [
			'username' => $input['username'],
			'nama' => $input['nama'],
			'password' => $input['password'] ? password_hash($input['password'], PASSWORD_DEFAULT) : '',
			'email' => $input['email'],
			'nomor_telepon' => $input['nomor_telepon']
		];

		$this->validation->setRules([
			'username' => "required|trim",
			'nama' => "required|trim",
			'password' => "required",
			'email' => "required|trim|valid_email",
			'nomor_telepon' => "required|trim|numeric"
		]);

		if ($this->validation->run($data)) {
			if ($this->where(['username' => $input['username']])->find()) {
				$hasil = [
					'error' => true,
					'message' => "username sudah digunakan"
				];
				return $hasil;
			}

			$this->insert($data);
			$hasil = [
				'error' => false,
				'message' => "data user berhasil disimpan",
				'data_id' => $this->db->insertID()
			];
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

	public function edit($input, $id)
	{
		$user = $id ? $this->find($id) : null;

		if (!$user) {
			$hasil = [
				'error' => true,
				'message' => "user tidak ditemukan"
			];
			return $hasil;
		}

		$data = [
			'username' => $input['username'],
			'nama' => $input['nama'],
			'email' => $input['email'],
			'nomor_telepon' => $input['nomor_telepon']
		];

		$this->validation->setRules([
			'username' => "required|trim",
			'nama' => "required|trim",
			'email' => "required|trim|valid_email",
			'nomor_telepon' => "required|trim|numeric"
		]);

		if ($this->validation->run($data)) {
			if ($this->where(['username' => $input['username'], 'id <>' => $id])->find()) {
				$hasil = [
					'error' => true,
					'message' => "username sudah digunakan"
				];
				return $hasil;
			}

			$this->update($id, $data);

			$hasil = [
				'error' => false,
				'message' => "data user berhasil disimpan"
			];
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

	public function remove($id)
	{
		$user = $id ? $this->find($id) : null;

		if (!$user) {
			$hasil = [
				'error' => true,
				'message' => "user tidak ditemukan"
			];
			return $hasil;
		}

		$this->delete($id);
		$hasil = [
			'error' => false,
			'message' => "data user berhasil dihapus"
		];

		return $hasil;
	}

	public function details($id)
	{
		$user = $id ? $this->find($id) : null;

		$hasil = [
			'error' => $user ? false : true,
			'message' => $user ? "data user berhasil ditemukan" : "data user tidak ditemukan",
			'data' => $user
		];

		return $hasil;
	}

}

/* End of file UserModel.php */
/* Location: .//D/laragon/www/2020/tracer/app/Models/UserModel.php */