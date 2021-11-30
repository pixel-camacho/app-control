<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Multifuncional extends BaseController
{
    public function __construct()
	{
		$this->multifuncional = model('MultifuncionalModel');
		$this->session = session();
	}

	public function index()
	{

		echo 'Multifuncional Padrino';
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

	private function generarSerie($length = 12)
    {
       $caracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
       $logitud = strlen($caracteres);
       $randomString = "";

        for ($i = 0; $i < $length; $i++) {
           $randomString .= $caracteres[rand(0, $logitud - 1)];
        }
         return $randomString;
    }

	public function create()
	{
		$new_multifuncional = $_POST;
		$new_multifuncional['status'] = 1;
		$new_multifuncional['serie'] = $this->generarSerie();

		if(!$this->validate('addMultifuncional')):
			return redirect()->back()->withInput();
        endif;

		try {

			if(!$this->multifuncional->insert($new_multifuncional)):
			    $this->session->setFlashdata('error','Ha ocurrido un problema insertando');
				return redirect('dashboard');
			endif;
			    $this->sesssion->setFlashData('success','Multifuncional agregada');
				return redirect('dashboard');

		} catch (\Exception $e) {
			 $this->session->setFlasdata('error',$e->getMessage());
			 return redirect('dashboard');
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
				 $this->session->setFlashData('error','Ha ocurrido un problema en la operacion');
				 return redirect('dashboard');
			endif;
			     $this->session->setFlashData('success','Multiduncional Actualizado');
				 return redirect('dashboard'); 
				 
		} catch (\Exception $e) {
			  $this->session->setFlashData('error',$e->getMessage());
			  return redirect('dashboard');
		}
	}

	public function  delete($id = null)
	{
		$id = $this->request->getVar('id');
		$data = ['status' => 0, 'fecha_baja' => date('Y-m-d h:i:s')];

		try {
	
			if(!$this->multifuncional->update($id,$data)):
			    $this->session->setFlashData('error','Ha ocurrido un problema eliminando equipo');
				return redirect('dashboard');
			else:
			    $this->session->setFlashData('success','Multifuncional eliminado');
				return redirect('dashboard');
			endif;

		} catch (\Exception $e) {
			return $this->session->setFlashData('error',$e->getMessage());
			return redirect('dashboard');
		}
	}
}
