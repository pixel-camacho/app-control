<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class RefaccionesModel {

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        
    }


    function getRefacciones(){

        $builder = $this->db->table('refaccion r');
        $builder->select('r.idRefaccion,r.pieza,r.cantidad,r.status,r.idMultifuncional, concat(m.marca," ",m.modelo) as multifuncional');
        $builder->join('multifuncional m', 'm.idMultifuncional = r.idMultifuncional');
        $query = $builder->get()->getResultArray();

        return $query;
    }

}