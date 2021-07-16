<?php

namespace App\Models;
use CodeIgniter\Model;

class MultifuncionalModel extends Model
{
	protected $table                = 'multifuncional';
	protected $primaryKey           = 'idMultifuncional';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['marca','modelo','cantidad','serie','status','fechaBaja'];

	protected $validationRules = [
		'marca' => 'required',
		'modelo' => 'required|is_unique[multifuncional.modelo]',
		'cantidad' => 'required|is_natural',
		'serie' => 'required|string',
	];

	protected $validationMessages = [
		'marca' => [
			'required' => 'Llenar campo de marca'
		],
		'modelo' => [
			'required' => 'Llenar campo de modelo',
			'is_unique' => 'Modelo ya existente'
		],
		'cantidad' => [
			'required' => 'Llenar la cantidad',
			'is_natural' => 'No es un numero valido'
		],
		'serie' => [
			'required' => 'Serie vacia',
			'string' => 'No es un formato aceptado'
		]
		];

}
