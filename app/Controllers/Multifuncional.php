<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Multifuncional extends BaseController
{
    public function __construct()
	{
		$this->multifuncional = model('MultifuncionalModel');
	}

	public function index()
	{
		echo 'Multifuncional Padrino';
	}

	private function saveFlashData ($estate  = 'error', $message = 'problemas')
	{
		session()->getFlashdata($estate,$message);
		return redirect('dashboard');
	}

	public function getElementById($id = null)
	{
		if($id == null):
			return "Identificador vacio";
		endif;

		try {
			$equipo = $this->multifuncional->where('id',$id)
			                               ->where('status', 1)
										   ->first();
			return json_encode($equipo);
		} catch (\Exception $e) {
			 return $e->getMessage();
		}
	}

	public function create()
	{
		$new_multifuncional = $_POST;
		$new_multifuncional['status'] = 1;

		if(!$this->validate('addMultifuncional')):
			return redirect()->back()->withInput();
        endif;

		try {

			if(!$this->multifuncional->insert($new_multifuncional)):
			    return $this->saveFlashData('error','Ha ocurrido un problema insertando');
			endif;
			 
			return $this->saveFlashData('success','Multifuncional agregada n.n');

		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}

	public function update()
	{
		$data = $_POST;

		if(!$this->validate('updateMultifuncional')):
           return redirect()->back()->withInput();
		endif;
		
		try {
			if(!$this->multifuncional->save($data)):
				return $this->saveFlashData('error','Ha ocurrido un problema en la operacion');
			endif;
			return redirect('dashboard');
			session()->getFlashdata('success','Equipo actualizado');

		} catch (\Exception $e) {
			 return $this->saveFlashData('error',$e->getMessage());
		}
	}

	public function  delete($id = null)
	{
		$id = $this->request->getVar('id');
		$data = ['status' => 0, 'fecha_baja' => date('Y-m-d h:i:s')];

		try {
	
			if(!$this->multifuncional->update($id,$data)):
				return $this->saveFlashData('error','Ha ocurrido un eliminando equipo');
			else:
				return $this->saveFlashData('success','Multifuncional eliminado');
			endif;

		} catch (\Exception $e) {
			return $this->saveFlashData('error',$e->getMessage());
		}
	}
}
