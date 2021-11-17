<?php
namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{

	public  function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->model = new UserModel();
	}

	public function index()
	{
		session();
		$data['title'] = 'Welcome to System';
		$data['validation'] = $this->validation->listErrors();

		echo view('Login/index',$data);
	}

	public function signin(){

		if(!$this->validate('signin')):
			return redirect()->back()->withInput();
		else:
			try {
				$user  = $this->model->where('username',$this->request->getVar('username'))
				    				 ->first();
			    $this->setUserSession($user);
			return redirect()->to('dashboard');

			} catch (\Exception $e) {
				return $e->getMessage();
			}
		endif;
	}


	public function register()
	{	
		session();
		$data['title'] = 'Sign Up';
		$data['validation'] = $this->validation->listErrors();

		echo view('signup/index',$data);
	}

	public function signup(){
     
			if(! $this->validate('signup')):
				return redirect()->back()->withInput();
			else:
				try {
					$newUser = [
						'username' => $this->request->getVar('username'),
						'password' => $this->request->getVar('password'),
						'role' => 'user',
						'photo' => 'assets/img/perfil.jpg',
						'name' => $this->request->getVar('name')
					];

					$this->model->save($newUser);
					session()->setFlashdata('success','Registro Exitoso!');
					return redirect()->to('/');
					
				} catch (\Exception $e) {
					return $e->getMessage();
				}

			endif;
	}
	
	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'username' => $user['username'],
			'role' => $user['role'],
			'photo' => $user['photo'],
			'name' => $user['name'],
			'isLoggedIn' => true	
		];
		session()->set($data);
	}

	
}
