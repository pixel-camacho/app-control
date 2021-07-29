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
        $builder->where('t.status', 1);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function delete($id, $data){

        $sql = $this->db->table('tonner');
        $sql->where('idTonner',$id);
        $sql->update($data);

        return true;
    }

    function add (Array $data)
    {
        $sql = $this->db->table('tonner');
        $sql->insert($data);

        return true;
    }


}