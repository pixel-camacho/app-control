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
	protected $allowedFields        = ['marca','modelo','cantidad','seris','status','fechaBaja'];

}
