<?php

namespace App\Models;
use App\Config\Database;

class Cidadao {

    private $db;

    public function __construct()
    {
        $this->db = new Database();  // Criar instância da classe de conexão
    }

    public function getAllCidadao()
    {
        $sql = "SELECT * FROM cidadaos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function salvar($data)
    {
        return $this->db->insert('cidadaos', $data);
    }

}