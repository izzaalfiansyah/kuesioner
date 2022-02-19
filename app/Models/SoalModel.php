<?php
namespace App\Models;

require APPPATH . 'Libraries/PHPExcel/PHPExcel.php';
require APPPATH . 'Libraries/PHPExcel/PHPExcel/IOFactory.php';

use PHPExcel_IOFactory;

class SoalModel extends \CodeIgniter\Model {

	protected $table = 'soal';

	protected $primaryKey = 'id';

	protected $allowedFields = ['teks', 'urutan'];

	public function __construct()
	{
		parent::__construct();
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$this->orderBy('urutan', 'asc');
		$soal = $this->get()->getResultArray();

		$hasil = [
			'error' => false,
			'message' => $soal ? "data soal berhasil ditemukan" : "data soal tidak tersedia",
			'data' => $soal
		];

		return $hasil;
	}

	public function add($input)
	{
		$data = [
			'teks' => $input['teks'],
			'urutan' => count($this->findAll()) + 1
		];

		$this->validation->setRules([
			'teks' => "required|trim"
		]);

		if ($this->validation->run($data)) {
			if ($this->where(['teks' => $input['teks']])->find()) {
				$hasil = [
					'error' => true,
					'message' => "soal sudah ada"
				];
			} else {
				$this->insert($data);
				$hasil = [
					'error' => false,
					'message' => "data soal berhasil ditambah",
					'data_id' => $this->db->insertID()
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

	public function edit($input, $id)
	{
		$soal = $id ? $this->find($id) : null;

		if (!$soal) {
			$hasil = [
				'error' => true,
				'message' => "soal tidak ditemukan"
			];
			return $hasil;
		}

		$data = [
			'teks' => $input['teks']
		];

		$this->validation->setRules([
			'teks' => "required|trim"
		]);

		if ($this->validation->run($data)) {
			if ($this->where(['teks' => $input['teks'], 'id <>' => $id])->find()) {
				$hasil = [
					'error' => true,
					'message' => "soal sudah ada"
				];
			} else {
				if ($input['urutan'] !== "") {
					$soal_lain = $this->db->table('soal')->where('urutan', $input['urutan'])->get()->getRowArray();
					if ($soal_lain) {
						$this->db->table('soal')->where('id', $soal_lain['id'])->update(['urutan' => $soal['urutan']]);
					}
					$data['urutan'] = $input['urutan'];
				}
				$this->update($id, $data);
				$hasil = [
					'error' => false,
					'message' => "data soal berhasil disimpan"
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

	public function remove($id)
	{
		$soal = $id ? $this->find($id) : null;

		if (!$soal) {
			$hasil = [
				'error' => true,
				'message' => "soal tidak ditemukan"
			];
			return $hasil;
		}

		$this->delete($id);
		$hasil = [
			'error' => false,
			'message' => "data soal berhasil dihapus"
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

		$excel = explode(';base64,', $input['excel'])[1];
		$excel_nama = date('Ymdhis') . '.xls';
		$excel_path = FCPATH . '/cdn/file/' . $excel_nama;

		file_put_contents($excel_path, base64_decode($excel));

		$load_excel = PHPExcel_IOFactory::load($excel_path);
		$sheet = $load_excel->getActiveSheet()->toArray(null, true, true, true);

		unlink($excel_path);

		foreach ($sheet as $key => $item) {
			if ($key > 1) {
				$this->insert([
					'teks' => $item['A'],
					'urutan' => count($this->findAll()) + 1
				]);
			}
		}

		$hasil = [
			'error' => false,
			'message' => "data soal berhasil diimport"
		];

		return $hasil;
	}

}

/* End of file SoalModel.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Models/SoalModel.php */