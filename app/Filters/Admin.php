<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface
{
	
	public function before(RequestInterface $request, $arguments = null)
	{
		if(session()->get('role') != 'admin')
		{
			session()->setFlashdata('warning','No tiene permisos par realizar esta operacion');
			return redirect('dashboard');
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
