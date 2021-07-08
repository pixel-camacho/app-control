<?php

namespace App\Models;

use CodeIgniter\Model;

class RefaccionModel extends Model
{
	protected $table                = 'refaccion';
	protected $primaryKey           = 'idRefaccion';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['pieza','cantidad','idMultifuncional','status','fechaBaja'];


}
