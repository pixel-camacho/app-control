<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Files\UploadedFile;

class Profile extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Profile of user';
		$data['roles'] = ['user','admin'];
	

		echo view('layout/header',$data);
		echo view('profile/index');
		echo view('layout/footer');
	}

	public function updateDataUser(){
		
		$dataForm = $_POST;
		//$file = $_FILES['image'];
		$file = $this->request->getFiles();
		var_dump($file);
	}
}
