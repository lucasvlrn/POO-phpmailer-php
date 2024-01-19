<?php
class Connect
{
    private  $db_host = "localhost";
    private  $db_user = "root";
    private  $db_name = "db_test";
    private  $db_password = "";

    public function ConnectDb()
    {
        $dns = "mysql:host=$this->db_host; dbname=$this->db_name";
        try {
            $connection = new PDO($dns, $this->db_user, $this->db_password);
            return $connection;
        } catch (PDOException $e) {
            echo 'Conexão falha ' . $e->getMessage();
        }
    }
}

$conexao = new Connect;
$conexao->ConnectDb();
