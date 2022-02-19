<?php
namespace App\Controllers\Api;

class Auth extends \CodeIgniter\RESTful\ResourceController {

	protected $format = 'json';

	protected $modelName = 'App\Models\AuthModel';

	public function login()
	{
		$response = $this->model->login($this->request->getPost());
		return $this->respond($response);
	}

	public function responden()
	{
		$response = $this->model->responden($this->request->getPost());
		return $this->respond($response);
	}

}

/* End of file Auth.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Controllers/api/Auth.php */