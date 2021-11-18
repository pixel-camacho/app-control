<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reports extends BaseController
{
	public function index()
	{
		$data = [];
		$data['catalogos'] = ['Multifuncionales','Refacciones','Tonner'];
		$data['title'] = 'This is Report';
		
		echo view('layout/header',$data);
		echo view('report/index');
		echo view('layout/footer');
	}


	public  function reportGenerate(){

		$data = $_POST;
		var_dump($data);
	}
}
