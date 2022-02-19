<?php
namespace App\Controllers\Api;

class Responden extends \CodeIgniter\RESTful\ResourceController {

	protected $format = 'json';

	protected $modelName = 'App\Models\RespondenModel';

	public function index()
	{
		$response = $this->model->index($this->request->getPost());
		return $this->respond($response);
	}

	public function details($id = null)
	{
		$response = $this->model->details($id);
		return $this->respond($response);
	}

	public function add()
	{
		$response = $this->model->add($this->request->getPost());
		return $this->respond($response);	
	}

	public function edit($id = null)
	{
		$response = $this->model->edit($this->request->getPost(), $id);
		return $this->respond($response);
	}

	public function remove($id = null)
	{
		$response = $this->model->remove($id);
		return $this->respond($response);
	}

	public function get()
	{
		$response = $this->model->get($this->request->getPost());
		return $this->respond($response);
	}

	public function import()
	{
		$response = $this->model->import($this->request->getPost());
		return $this->respond($response);
	}

}

/* End of file Responden.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Controllers/api/Responden.php */