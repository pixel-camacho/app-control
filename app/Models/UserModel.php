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
	protected $allowedFields        = ['username','password','tole','photo','name'];
	protected $beforeInsert         = ['beforeInsert'];
	protected $beforeUpdate         = ['beforeUpdated'];

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
