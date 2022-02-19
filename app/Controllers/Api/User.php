<?php
namespace App\Controllers\Api;

class User extends \CodeIgniter\RESTful\ResourceController {

	protected $format = 'json';

	protected $modelName = 'App\Models\UserModel';

	public function index()
	{
		$response = $this->model->index();
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

	public function details($id = null)
	{
		$response = $this->model->details($id);
		return $this->respond($response);
	}

}

/* End of file User.php */
/* Location: .//D/laragon/www/2020/tracer/app/Controllers/api/User.php */