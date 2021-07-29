<?php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Welcome to System';
		$model = new UserModel();
		helper(['form']);

		if($this->request->getMethod() == 'post'){

         /*  $fieldName = 'username';
		   $fieldRules = 'validateUser[username,password]';
		   $model->setValidationRule($fieldName,$fieldRules);

		   $fieldNameM = 'username';
		   $fieldValidationMessage = [
			   'validateUser' => 'Usuario o password Incorrecto'
		   ];
		   $model->setValidationMessage($fieldNameM,$fieldValidationMessage);*/

			$rules = [
				'username' => 'required|min_length[4]|max_length[25]',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[username,password]'
			];

			$errors = [
				'username' => [
					'required' => 'Llenar campo de usuario',
					'min_length' => 'Nombre de usuario muy corto',
					'max_length' => 'Nombre excede el limite de caracteres'
				],
				'password' => [
					'required' => 'Llenar campo de password',
					'min_length' => 'Password ingresado muy corto',
					'max_length' => 'Su password excede el limite',
					'validateUser' => 'Usuario o password Incorrecto'
				]
				];
		
			if(!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
			}else{
				
				$user  = $model->where('username',$this->request->getVar('username'))
				               ->first();
			    $this->setUserSession($user);
                
				return redirect()->to('dashboard');
			}
		}

		echo view('Login/index',$data);
	}

	public function register(){
		
		$data = [];
		$data['title'] = 'Sign Up';
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'username' => 'required|min_length[4]|max_length[25]|is_unique[users.username]',
				'name' => 'required|min_length[8]|max_length[50]',
				'password' => 'required|min_length[8]|max_length[255]',
				'passwordConfirm' => 'matches[password]'
			];

			$errors = [
				'username' => [
					'required' => 'Llenar campo de usuario',
					'min_length' => 'Usuario muy corto',
					'max_length' => 'Nombre excede el limite de caracteres',
					'is_unique' => 'Usuario ya se encuentra disponible'
				],
				'name' => [
					'required' => 'Llenar campo de nombre',
					'min_length' => 'Nombre muy corto',
					'max_length' => 'Nombre excede el limite de caracteres'
				],
				'password' =>[
					'required' => 'Llenar campo de password',
					'min_length' => 'Password ingresado muy corto',
					'max_length' => 'Su password excede el limite',
				],
				'passwordConfirm' =>[
					'matches' => 'Los password no coinciden'
				]
				];

				if(! $this->validate($rules,$errors)){
					$data['validation'] = $this->validator;
				}else{
					$model = new UserModel();
					$newUser = [
						'username' => $this->request->getVar('username'),
						'password' => $this->request->getVar('password'),
						'role' => 'user',
						'photo' => 'assets/img/perfil.jpg',
						'name' => $this->request->getVar('name')
					];
					$model->save($newUser);
					session()->setFlashdata('success','Registro Exitoso!');
					return redirect()->to('/');
				}
		}

		echo view('signup/index',$data);
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
