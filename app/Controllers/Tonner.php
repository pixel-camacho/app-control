<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tonner extends BaseController
{
    public function __construct()
	{
		$this->tonner  = model('TonnerModel');
		$this->session = session();
	}

	public function index()
	{
		echo "Tonners padre santo!!";
	}

	public function getElementById($id = null)
	{
		if($id == null):
			return "Identificador vacio";
		endif;

		try {
			$equipo = $this->tonner->where('id',$id)
			                               ->where('status', 1)
										   ->first();
			return json_encode($equipo);
		} catch (\Exception $e) {
			 return $e->getMessage();
		}
	}

	public function create()
	{
		$new_tonner = $_POST;
		$new_tonner['status'] = 1;

		if(!$this->validate('tonner_edit')):
			return redirect()->back()->withInput();
        endif;

		try {

			if(!$this->tonner->insert($new_tonner)):
				$this->session->setFlashdata('error','Ha ocurrido un problema en la operacion');
		        return redirect('dashboard');
			endif;
			   $this->session->setFlashdata('success','Tonner Agregado');
			   return redirect('dashboard');

		} catch (\Exception $e) {
			 $this->session->setFlashdata('error',$e->getMessage());
			 return redirect('dashboard');
		}
	}

	public function update($id = null)
	{
		$data = $_POST;
		if(!$this->validate('tonner_edit')):
           return redirect()->back()->withInput();
		endif;
		
		try {

			if(!$this->tonner->save($data)):
				$this->session->setFlashdata('error','Ha ocurrido un problema en la operacion');
		        return redirect('dashboard');
			endif;
                $this->session->setFlashdata('success','Tonner Actualizado');
			    return redirect('dashboard');

		} catch (\Exception $e) {
			 $this->session->setFlashdata('error',$e->getMessage());
			 return redirect('dashboard');
		}
	}

	public function delete()
	{
		$id = $_POST['id'];
		$data = ['status' => 0, 'fecha_baja' => date('Y-m-d h:i:s')];

		try {
	
			if(!$this->tonner->update($id,$data)):
				$this->session->setFlashdata('error','Ha ocurrido un problema en la operacion');
		        return redirect('dashboard');
			else:
				$this->session->setFlashdata('success','Tonner Eliminado');
				return redirect('dashboard');
			endif;

		} catch (\Exception $e) {
			$this->session->setFlashdata('error',$e->getMessage());
		    return redirect('dashboard');
		}
	}
}
