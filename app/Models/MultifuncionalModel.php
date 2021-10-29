<?php

namespace App\Models;
use CodeIgniter\Model;

class MultifuncionalModel extends Model
{
	protected $table                = 'multifuncional';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','marca','modelo','cantidad','serie','status','fecha_baja'];

	protected $validationRules = [
		'marca' => 'required',
		'modelo' => 'required|is_unique[multifuncional.modelo]',
		'cantidad' => 'required|is_natural',
		'serie' => 'required|string',
	];

	public function getAllComputers(){

		$builder = $this->db->table('multifuncional m');
		$builder->select('m.id,m.marca,m.modelo,m.cantidad,m.serie');
		$builder->where('m.status', 1);
		$result = $builder->get()->getResultArray();

		return $result == null ? false : $result;
	}


}
