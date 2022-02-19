<?php
namespace App\Models;

require APPPATH . 'Libraries/PHPExcel/PHPExcel.php';
require APPPATH . 'Libraries/PHPExcel/PHPExcel/IOFactory.php';

use PHPExcel_IOFactory;

class RespondenModel extends \CodeIgniter\Model {

	protected $table = 'responden';

	protected $primaryKey = 'id';

	protected $allowedFields = [
		'nama', 
		'usia', 
		'jenis_kelamin', 
		'pendidikan_terakhir', 
		'alamat', 
		'tanggal_lahir', 
		'status_pendidikan', 
		'status_pernikahan', 
		'nomor_telepon', 
		'foto',
		'kode'
	];

	public function __construct()
	{
		parent::__construct();
		$this->validation = \Config\Services::validation();
	}

	public function index($input)
	{
		$builder = $this->db->table($this->table);

		if ($input['length']) {
			$builder->limit((int) $input['length'], (int) $input['start']);
		}

		$like = [];
		if ($input['search']['value']) {
			$search = $input['search']['value'];
			$like = [
				'nama' => $search,
				'alamat' => $search,
				'tanggal_lahir' => $search,
				'pendidikan_terakhir' => $search
			];
			$builder->orLike($like);
		}

		$responden = $builder->get()->getResultArray();

		$hasil = [
			'error' => false,
			'message' => $responden ? "data responden ditemukan" : "data responden tidak ditemukan",
			'data' => $responden
		];

		if ($input['draw']) {
			$hasil['draw'] = $input['draw'];
			$hasil['recordsTotal'] = count($this->findAll());
			$hasil['recordsFiltered'] = count($this->orLike($like)->findAll());
		}

		return $hasil;
	}

	public function details($id)
	{
		$responden = $id ? $this->find($id) : "";

		$hasil = [
			'error' => $responden ? false : true,
			'message' => $responden ? "data responden ditemukan" : "data responden tidak ditemukan",
			'data' => $responden
		];

		return $hasil;
	}

	public function add($input)
	{
		$responden = $id ? $this->find($id) : "";

		$data = [
			'nama' => $input['nama'],
			'usia' => $input['usia'],
			'jenis_kelamin' => $input['jenis_kelamin'],
			'pendidikan_terakhir' => $input['pendidikan_terakhir'],
			'alamat' => $input['alamat'],
			'tanggal_lahir' => $input['tanggal_lahir'],
			'status_pendidikan' => $input['status_pendidikan'],
			'status_pernikahan' => $input['status_pernikahan'],
			'nomor_telepon' => $input['nomor_telepon'],
			'kode' => substr(bin2hex(PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(12) : random_bytes(12)), 0, 12)
		];

		$this->validation->setRules([
			'nama' => "required|trim",
			'usia' => "required|numeric|trim",
			'jenis_kelamin' => "required|trim",
			'pendidikan_terakhir' => "required|trim",
			'alamat' => "required|trim",
			'tanggal_lahir' => "required|date|trim",
			'status_pendidikan' => "required|trim",
			'status_pernikahan' => "required|trim",
			'nomor_telepon' => "required|numeric|trim"
		]);

		if ($this->validation->run($data)) {
			if ($input['foto']) {
				$foto = base64_decode(explode(';base64,', $input['foto'])[1]);
				$foto_nama = 'RES' . date('Ymdhis') . '.png';
				file_put_contents(FCPATH . '/cdn/img/responden/' . $foto_nama, $foto);
				$data['foto'] = $foto_nama;
			}

			$this->insert($data);

			$hasil = [
				'error' => false,
				'message' => "data berhasil disimpan",
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
		$responden = $id ? $this->find($id) : "";

		if (!$responden) {
			$hasil = [
				'error' => true,
				'message' => "data responden tidak ditemukan"
			];
			return $hasil;
		}

		$data = [
			'nama' => $input['nama'],
			'usia' => $input['usia'],
			'jenis_kelamin' => $input['jenis_kelamin'],
			'pendidikan_terakhir' => $input['pendidikan_terakhir'],
			'alamat' => $input['alamat'],
			'tanggal_lahir' => $input['tanggal_lahir'],
			'status_pendidikan' => $input['status_pendidikan'],
			'status_pernikahan' => $input['status_pernikahan'],
			'nomor_telepon' => $input['nomor_telepon']
		];

		$this->validation->setRules([
			'nama' => "required|trim",
			'usia' => "required|numeric|trim",
			'jenis_kelamin' => "required|trim",
			'pendidikan_terakhir' => "required|trim",
			'alamat' => "required|trim",
			'tanggal_lahir' => "required|date|trim",
			'status_pendidikan' => "required|trim",
			'status_pernikahan' => "required|trim",
			'nomor_telepon' => "required|numeric|trim"
		]);

		if ($this->validation->run($data)) {
			if ($input['kode']) {
				$data['kode'] = $input['kode'];
			}

			if ($input['foto']) {
				$foto = base64_decode(explode(';base64,', $input['foto'])[1]);
				$foto_nama = 'RES' . date('Ymdhis') . '.png';
				file_put_contents(FCPATH . '/cdn/img/responden/' . $foto_nama, $foto);
				$data['foto'] = $foto_nama;

				if ($responden['foto']) {
					unlink(FCPATH . '/cdn/img/responden/' . $responden['foto']);
				}
			}

			$this->update($id, $data);

			$hasil = [
				'error' => false,
				'message' => "data berhasil disimpan"
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
		$responden = $id ? $this->find($id) : null;

		if (!$responden) {
			$hasil = [
				'error' => true,
				'message' => "data responden tidak diketahui"
			];
			return $hasil;
		}

		if ($responden['foto']) {
			unlink(FCPATH . '/cdn/img/responden/' . $responden['foto']);
		}

		$this->delete($id);

		$hasil = [
			'error' => false,
			'message' => "data responden berhasil dihapus"
		];

		return $hasil;
	}

	public function get($input)
	{
		$where = [];

		if ($input['nama']) {
			$where['nama'] = $input['nama'];
		}

		$responden = $this->where($where)->find()[0];

		$hasil = [
			'error' => $responden ? false : true,
			'message' => $responden ? "data berhasil ditemukan" : "data tidak tersedia",
			'data' => $responden
		];

		return $hasil;
	}

	public function import($input)
	{
		if (empty($input['excel'])) {
			$hasil = [
				'error' => true,
				'message' => "file excel tidak diketahui"
			];
			return $hasil;
		}

		$excel_nama = date('Ymdhis') . '.xls';
		$excel = explode(';base64,', $input['excel'])[1];
		$excel_path = FCPATH . '/cdn/file/' . $excel_nama;

		file_put_contents($excel_path, base64_decode($excel));

		$load_excel = PHPExcel_IOFactory::load($excel_path);
		$sheet = $load_excel->getActiveSheet()->toArray(null, true, true, true);

		unlink($excel_path);

		foreach ($sheet as $key => $item) {
			if ($key > 1) {
				$this->insert([
					'nama' => $item['A'],
					'usia' => $item['B'],
					'jenis_kelamin' => strtotime($item['C']) == 'l' ? "1" : "2",
					'nomor_telepon' => $item['D'],
					'pendidikan_terakhir' => $item['E'],
					'alamat' => $item['F'],
					'tanggal_lahir' => date('Y-m-d', strtotime($item['G'])),
					'status_pendidikan' => $item['H'],
					'status_pernikahan' => $item['I'],
					'kode' => substr(bin2hex(PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(12) : random_bytes(12)), 0, 12)
				]);
			}
		}

		$hasil = [
			'error' => false,
			'message' => "data responden berhasil diimport"
		];

		return $hasil;
	}

}

/* End of file RespondenModel.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Models/RespondenModel.php */