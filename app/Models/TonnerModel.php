<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TonnerModel {

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
       $this->db =& $db;    
    }

    function getTonner(){

        $builder = $this->db->table('tonner t');
        $builder->select('t.idTonner ,t.descripcion,t.cantidad,t.status, concat(m.marca," ",m.modelo) as multifuncional');
        $builder->join('multifuncional m','m.idMultifuncional = t.idMultifuncional');
        $query = $builder->get()->getResultArray();

        return $query;
    }
}