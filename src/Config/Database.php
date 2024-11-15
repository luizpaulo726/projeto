<?php
namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private $host = 'db';  // Nome do serviço MySQL definido no docker-compose
    private $dbName = 'cadastro_cidadao';
    private $username = 'root';
    private $password = 'Blue@2021';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        if ($this->pdo) {
            return;
        }

        try {
            // Usar a porta padrão 3306 do MySQL no container
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};port=3306;charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro de conexão: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function insert($table, $data)
    {
        if (empty($data)) {
            throw new \Exception("Os dados para inserção não podem estar vazios.");
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if (!$stmt->execute()) {
            throw new \Exception("Falha ao inserir dados: " . implode(" - ", $stmt->errorInfo()));
        }

        return true;
    }

}
