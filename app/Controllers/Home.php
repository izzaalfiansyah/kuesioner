<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	public function siteMap()
	{
		return view('site_map');
	}

	public function help()
	{
		return view('help');
	}

	public function contact()
	{
		return view('contact');
	}

	public function aboutUs()
	{
		return view('about_us');
	}

}
