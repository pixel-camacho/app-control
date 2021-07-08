<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Welcome to Dashboard';

		echo view('layout/header',$data);
		echo view('dashboard');
		echo view('layout/footer');
	}



	public function salir(){
		session()->destroy();
		return redirect()->to('/');
	}
}
