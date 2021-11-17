<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RefaccioneModel;
use App\Models\TonnerModel;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->multifuncionales = model('MultifuncionalModel');
		$this->refacciones = model('RefaccionModel');
		$this->tonner = model('TonnerModel');
		$this->validator = \config\Services::validation();
	}

	public function index()
	{
		session();
		$data = [];
		$data['title'] = 'Welcome to Dashboard';
		$data['equipos'] = $this->multifuncionales->getAllComputers();
	    $data['refacciones'] = $this->refacciones->getAllParts();
		$data['tonners'] = $this->tonner->getAllTonners();
		$data['validation'] = $this->validator->listErrors();
		
		echo view('layout/header',$data);
		echo view('dashboard',$data);
		echo view('layout/footer');
	}
	
	public function editItem()
	{
	}

	public function deleteitem()
	{
	}

	public function addItem()
	{
	}

	public function salir(){
		session()->destroy();
		return redirect()->to('/');
	}
}
