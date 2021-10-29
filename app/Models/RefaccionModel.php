<?php

namespace App\Models;

use CodeIgniter\Model;

class RefaccionModel extends Model
{
	protected $table                = 'refaccion';
	protected $primaryKey           = 'id';

	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['pieza','cantidad','multifuncional_id','status','fecha_baja'];

	protected $validationRules      = [
		'pieza' => 'required|alpha_numeric_space',
		'cantidad' => 'required|integer|min_length[1]|max_length[2]',
		'multifuncional_id' => 'required|numeric|pieza_multifuncional_exit[multifuncional_id,pieza]',
	];
	protected $validationMessages   = [];
	protected $skipValidation       = false;


	public function getAllParts()
	{
		$builder = $this->db->table('refaccion r');
		$builder->select('r.id,r.pieza,r.cantidad,r.multifuncional_id AS multifuncional');
		$builder->where('status',1);
		$result = $builder->get()->getResultArray();

		return $result == null ? false : $result;
	}

	



}
