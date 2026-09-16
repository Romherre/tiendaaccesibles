<?php

class Conexion
{
    public $DB_SERVER;
    public $DB_USER;
    public $DB_PASS;
    public $DB_NAME;
    public $DB_DSN = null;
    public ?PDO $db = null;

    public function __construct()
    {
        try {
            $config = include __DIR__ . '/../config.php';
            $this->DB_SERVER = $config['db_server'];
            $this->DB_USER   = $config['db_user'];
            $this->DB_PASS   = $config['db_pass'];
            $this->DB_NAME   = $config['db_name'];

            $this->DB_DSN = "mysql:host=" . $this->DB_SERVER . ";dbname=" . $this->DB_NAME . ";charset=utf8mb4";
            $this->db = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            echo $e->getMessage();
            header("Location: /dani/views/404.php");
            exit;
        }
    }

    public function getConexion()
    {
        return $this->db;
    }
}
