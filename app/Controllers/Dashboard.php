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
	

	public function getElementId($id,$catalogo){
		$result = [];

        if($catalogo === 'equipo'){
			$result = $this->multifuncionales->where('status',1)
			->where('id',$id)
			->findAll();
		}else if($catalogo === 'refaccion'){
             $result = $this->refacciones->refaccionForId($id);
		}else{
            $result = $this->tonner->tonnerForId($id);
		}
		
	  return json_encode($result[0]);
	}

	public function editItem(){
		$data = $_POST;
		$update = null;

	    if(isset($data['serie'])){	
		  $update = $this->multifuncionales->update($data['id'],$data);
		}else if(isset($data['pieza'])){
	      $update =	$this->refacciones->edit($data['id'],$data);
		}else if(isset($data['descripcion'])){
		  $update = $this->tonner->edit($data['id'],$data);
		}

		if(!$update){
			session()->setFlashdata('error','Error actaulizando informacion');
		    return  redirect('dashboard');
		}

		session()->setFlashdata('success','Elemento actualizado');
		return  redirect('dashboard');
	}

	public function deleteitem(){
        
		$catalogo = $this->request->getVar('catalogo');
		$id = $this->request->getVar('id');
		$data = ['status' => 0, 'fecha_baja' => date('Y-m-d h:i:s')];
		$delete = null;
	                                                            
		if($catalogo === 'multifuncional'){
			$delete = $this->multifuncionales->update($id,$data);
		}else if($catalogo === 'refaccion'){
			$delete = $this->refacciones->delete($id,$data);
		}else{
			$delete = $this->tonner->delete($id,$data);
		}
		if(!$delete){
			session()->setFlashdata('error','Problemas al eliminar');
			return redirect('dashboard');
		}

		session()->setFlashdata('success','Eliminado del inventario');
		return redirect('dashboard');
	}

	public function addItem(){

	    $newData = $_POST;
		$newData['status'] = 1;

		if(array_key_exists('modelo',$newData)){
			$this->add($this->multifuncionales,$newData);
		}else if(array_key_exists('pieza',$newData)){
			$this->addSegundo('refaccion',$this->refacciones,$newData);
		}else{
			$this->addSegundo('tonner',$this->tonner,$newData);
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
