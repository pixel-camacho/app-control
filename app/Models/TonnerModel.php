<?php

namespace App\Models;

use CodeIgniter\Model;

class TonnerModel extends Model
{
	protected $table                = 'tonner';
	protected $primaryKey           = 'id';

	protected $useAutoIncrement     = true;
	protected $insertID             = 0;

	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['descripcion','cantidad','multifuncional_id','status','fecha_baja'];

	// protected $validationRules      = [
	// 	'descripcion' => 'require|alpha_numeric_space',
	// 	'cantidad' => 'required|integer|min_length[1]|max_length[2]',
	// 	'multifuncional_id' => 'required|numeric|pieza_multifuncional_exit[multifuncional_id,pieza]',
	// ];

	protected $validationMessages   = [];
	protected $skipValidation       = false;

	public function  getAllTonners()
	{
		$builder = $this->db->table('tonner t');
		$builder->select('t.id, t.descripcion, t.cantidad, t.multifuncional_id AS multifuncional, m.marca, m.modelo');
		$builder->join('multifuncional m', 'm.id = t.multifuncional_id');
		$builder->where('t.status', 1);
		$result = $builder->get()->getResult();

		return $result == null ? false : $result;
	}


}
