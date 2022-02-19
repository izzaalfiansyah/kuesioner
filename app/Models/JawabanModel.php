<?php
namespace App\Models;

class JawabanModel extends \CodeIgniter\Model {

	protected $table = 'jawaban';

	protected $primaryKey = 'id';

	protected $allowedFields = ['responden_id', 'jawaban', 'created_at', 'updated_at'];

	public function __construct()
	{
		parent::__construct();
		$this->validation = \Config\Services::validation();
	}

	public function index($input)
	{
		$builder = $this->db->table($this->table);
		$builder->select('jawaban.*, responden.nama as responden_nama');
		$builder->join('responden', 'responden.id = jawaban.responden_id', 'left');

		if ($input['length']) {
			$builder->limit($input['length'], $input['start']);
		}

		$like = [];
		if ($input['search']['value']) {
			$like = [
				'responden.nama' => $input['search']['value'],
				'jawaban.created_at' => $input['search']['value']
			];
			$builder->orLike($like);
		}

		$jawaban = $builder->get()->getResultArray();

		$hasil = [
			'error' => false,
			'message' => $jawaban ? "data jawaban berhasil ditemukan" : "data jawaban tidak tersedia",
			'data' => $jawaban
		];

		if ($input['draw']) {
			$hasil['draw'] = $input['draw'];
			$hasil['recordsTotal'] = count($this->findAll());
			$hasil['recordsFiltered'] = count($this->join('responden', 'responden.id = jawaban.responden_id', 'left')->orLike($like)->findAll());
		}

		return $hasil;
	}

	public function submit($input, $responden_id)
	{
		if (empty($responden_id)) {
			$hasil = [
				'error' => true,
				'message' => "responden tidak diketahui"
			];
			return $hasil;
		}

		$data = [
			'responden_id' => $responden_id,
			'jawaban' => $input['jawaban'] ? serialize($input['jawaban']) : ""
		];

		$this->validation->setRules([
			'jawaban' => "required"
		]);

		if ($this->validation->run($data)) {
			$jawaban = $this->where('responden_id', $responden_id)->find();

			if ($jawaban) {
				$this->update($jawaban[0]['id'], $data);
			} else {
				$this->insert($data);
			}
			$hasil = [
				'error' => false,
				'message' => "data jawaban berhasil disimpan"
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

	public function show($responden_id)
	{
		if (empty($responden_id)) {
			$hasil = [
				'error' => true,
				'message' => "responden tidak diketahui"
			];
			return $hasil;
		}

		$jawaban = $this->where('responden_id', $responden_id)->find();

		$hasil = [
			'error' => $jawaban ? false : true,
			'message' => $jawaban ? "data jawaban berhasil ditemukan" : "data jawaban tidak ditemukan",
			'data' => $jawaban[0]
		];

		if ($hasil['data']) {
			$hasil['data']['jawaban'] = unserialize($hasil['data']['jawaban']);
		}

		return $hasil;
	}

	public function grafik()
	{
		$sudah_mengisi = count($this->findAll());
		$belum_mengisi = count($this->db->table('responden')->get()->getResultArray()) - $sudah_mengisi;

		$hasil = [
			'error' => false,
			'message' => "data berhasil ditemukan",
			'data' => [
				'sudah_mengisi' => $sudah_mengisi,
				'belum_mengisi' => $belum_mengisi
			]
		];

		return $hasil;
	}

}

/* End of file JawabanModel.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Models/JawabanModel.php */