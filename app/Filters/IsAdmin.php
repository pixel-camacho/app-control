<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAdmin implements FilterInterface
{
	
	public function before(RequestInterface $request, $arguments = null)
	{
		if(session()->get('role') == 'admin')
		{
			$this->session->setFlashdata('success','Eres administrador n.n');
			return redirect('dashboard');
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
