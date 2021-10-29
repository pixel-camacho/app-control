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
	protected $allowedFields        = ['username','password','role','photo','name'];

	protected $beforeInsert         = ['beforeInsert'];
	protected $beforeUpdate         = ['beforeUpdated'];

	/*protected $validationRules = [
			'username' => 'required|min_length[4]|max_length[25]|is_unique[users.username]|validateUser[username,password]',
			'name' => 'required|min_length[3]|max_length[30]',
			'password' => 'required|min_length[8]|max_length[50]'
	];*/


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
