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
			    return $this->saveFlashData('success','Equipo actualizado');

		} catch (\Exception $e) {
			 return $this->saveFlashData('error',$e->getMessage());
		}
	}

	public function  delete($id = null)
	{

	}
}
