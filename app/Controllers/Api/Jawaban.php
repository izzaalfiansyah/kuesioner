<?php
namespace App\Controllers\Api;

class Jawaban extends \CodeIgniter\RESTful\ResourceController {

	protected $format = 'json';

	protected $modelName = 'App\Models\JawabanModel';

	public function index()
	{
		$response = $this->model->index($this->request->getPost());
		return $this->respond($response);
	}

	public function submit($responden_id = null)
	{
		$response = $this->model->submit($this->request->getPost(), $responden_id);
		return $this->respond($response);
	}

	public function show($responden_id = null)
	{
		$response = $this->model->show($responden_id);
		return $this->respond($response);
	}

	public function grafik()
	{
		$response = $this->model->grafik();
		return $this->respond($response);
	}

}

/* End of file Jawaban.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Controllers/api/Jawaban.php */