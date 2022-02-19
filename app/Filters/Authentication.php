<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authentication implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		$session = \Config\Services::session();
		$url = explode('/', uri_string());
		
		for ($i=0; $i < 5; $i++) { 
			$path[] = empty($url[$i]) ? "" : $url[$i];
		}

		if ($path[0] == 'auth') {
			if ($session->has('id')) {
				if ($session->get('level') == '1') {
					return redirect()->to(base_url('/admin'));
				} else {
					return redirect()->to(base_url('/responden'));
				}
			}
		} else {
			if (!$session->has('id') && ($path[0] == 'admin' || $path[0] == 'responden')) {
				return redirect()->to(base_url('/auth/responden'));
			}
			if ($path[0] == 'admin') {
				if ($session->get('level') == '2') {
					return redirect()->to(base_url('/responden'));
				}
			}
			if ($path[0] == 'responden') {
				if ($session->get('level') == '1') {
					return redirect()->to(base_url('/admin'));
				}
			}
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response)
	{
		
	}

}

/* End of file Authentication.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Filters/Authentication.php */
