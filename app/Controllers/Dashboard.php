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

	public function deleteitem(){
        
		$db = db_connect();
		$catalogo = $this->request->getVar('catalogo');
		$id = $this->request->getVar('id');
		$data = ['status' => 0, 'fechaBaja' => date('Y-m-d h:i:s')];

		//Modelo
		$multifuncionales = model('MultifuncionalModel');
		$refacciones =  new RefaccionesModel($db);
		$tonners = new TonnerModel($db);
	                                                            
		if($catalogo === 'multifuncional'){
			$update = $multifuncionales->update($id,$data);
			if(!$update) return;

		}else if($catalogo === 'refaccion'){
			$update = $refacciones->deleteRefaccion($id,$data);
			if(!$update) return;
		
		}else{
			$update = $tonners->deleteTonner($id,$data);
			if(!$update) return;
		}

		session()->setFlashdata('success','Elemento eliminado del inventario');
		return redirect('dashboard');
	}

	public function addElement(){
        
		$equipo = model('MultifuncionalModel');

	    $newData = $_POST;
		$newData['status'] = 1;

		 if($equipo->save($newData)){
			 session()->setFlashdata('success','Equipo agregado al inventario');
		 }

		 return redirect('dashboard');
	}



	public function salir(){
		session()->destroy();
		return redirect()->to('/');
	}
}
