<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Refaccion extends BaseController
{

	public  function __construct()
	{
	 $this->refaccion = model('RefaccionModel');	
	}

	public function index()
	{
		echo "Refacciones padre santo!";
	}

	
	public  function getElementById($id = null)
	{
		if($id == null):
			return "Identificador vacio";
		endif;

		try {
			$equipo = $this->refaccion->where('id',$id)
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


	public function update($id = null)
	{

	}

	public  function delete($id = null)
	{

	}
}
