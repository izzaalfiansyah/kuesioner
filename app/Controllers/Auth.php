<?php
namespace App\Controllers;

class Auth extends \App\Controllers\BaseController {

	public function index()
	{
		return view('auth/login');
	}

	public function responden()
	{
		return view('auth/responden');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function cek($id = null, $level = null)
	{
		if (empty($id) || empty($level)) {
			return redirect()->to(base_url('/auth/responden'));
		}
		
		$this->session->set([
			'id' => $id,
			'level' => $level
		]);

		if ($level == '1') {
			return redirect()->to(base_url('/admin'));
		} else {
			return redirect()->to(base_url('/responden'));
		}
	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/auth/responden'));
	}

}

/* End of file Auth.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Controllers/Auth.php */