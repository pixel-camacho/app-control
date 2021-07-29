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
		$validator = \config\Services::validation();

		$data['title'] = 'Welcome to Dashboard';
	    $data['refacciones'] = $refacciones->getRefacciones();
		$data['tonners'] = $tonner->getTonner();
		$data['equipos'] = $multifuncionales->where('status',1)
		                                    ->findAll();
		$data['validation'] = $validator;
		

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
			$update = $refacciones->delete($id,$data);
			if(!$update) return;
		
		}else{
			$update = $tonners->delete($id,$data);
			if(!$update) return;
		}

		session()->setFlashdata('success','Eliminado del inventario');
		return redirect('dashboard');
	}

	public function addItem(){
        
		$conecc = db_connect();
		$equipo = model('MultifuncionalModel');
		$refacciones = new RefaccionesModel($conecc);
		$tonners = new TonnerModel($conecc);

	    $newData = $_POST;
		$newData['status'] = 1;

		if(array_key_exists('modelo',$newData)){

			$this->add($equipo,$newData);
		}else if(array_key_exists('pieza',$newData)){

			$this->addSegundo('refaccion',$refacciones,$newData);
		}else{

			$this->addSegundo('tonner',$tonners,$newData);
		}

		return redirect('dashboard');
	}

	private function add($modelo,$data){

			if($modelo->save($data) === false){
				session()->setFlashdata('errors',$modelo->errors());
			}else{
				session()->setFlashdata('success','Agregado al inventario.');
			}
	}

	private function addSegundo($text,$modelo,$data){

		if(!$this->validate($text)){
			return redirect()->back()->withInput();
		}else{
		    $modelo->add($data);
			session()->setFlashdata('success','Agregado al inventario.');
		}

	}

	public function salir(){
		session()->destroy();
		return redirect()->to('/');
	}
}
