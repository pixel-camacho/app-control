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
        $builder->where('r.status', 1);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function delete( Int $id, Array $data){

        $sql = $this->db->table('refaccion');
        $sql->where('idRefaccion',$id);
        $sql->update($data);
        
        return true;

    }

    function add (Array $data)
    {
        $sql = $this->db->table('refaccion');
        $sql->insert($data);

        return true;
    }

}