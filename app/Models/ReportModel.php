<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
	protected $table                = 'reporte';
	protected $primaryKey           = 'id';

	protected $useAutoIncrement     = true;
	protected $insertID             = 0;

	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['catalogo','name','fecha_creacion','path'];


	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

}
