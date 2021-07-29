<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
}
