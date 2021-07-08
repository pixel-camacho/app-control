<?php

namespace App\Models;

use CodeIgniter\Model;

class TonnerModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tonner';
	protected $primaryKey           = 'idTonner';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['idMultifuncional','cantidad','status','descripcion'];

}
