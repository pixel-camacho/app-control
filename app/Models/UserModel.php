<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{



	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['username','password','role','photo','name'];
	protected $beforeInsert         = ['beforeInsert'];
	protected $beforeUpdate         = ['beforeUpdated'];

	protected $validationRules = [
			'username' => 'required|min_length[4]|max_length[25]|is_unique[users.username]',
			'name' => 'required|min_length[8]|max_length[50]',
			'password' => 'required|min_length[8]|max_length[255]'
	];

	protected $validationMessages = [
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
		]
		];

	protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);
		return $data;
	}

	protected function beforeUpdated(array $data){
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data){
		if(isset($data['data']['password'])){
			$data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
		}
		return $data;
	}

}
