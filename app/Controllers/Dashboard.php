<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RefaccionesModel;
use App\Models\TonnerModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		$db   = db_connect();
		$multifuncionales = model('MultifuncionalModel');
		$refacciones = new RefaccionesModel($db);
		$tonner = new TonnerModel($db);

		$data['title'] = 'Welcome to Dashboard';
	    $data['refacciones'] = $refacciones->getRefacciones();
		$data['tonners'] = $tonner->getTonner();
		$data['equipos'] = $multifuncionales->where('status',1)
		                                    ->findAll();
				

		echo view('layout/header',$data);
		echo view('dashboard',$data);
		echo view('layout/footer');
	}



	public function salir(){
		session()->destroy();
		return redirect()->to('/');
	}
}
