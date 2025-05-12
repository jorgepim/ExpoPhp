<?php
class DBConnection
{
  private static $instance = null;
  private $pdo;

  private $host = "localhost";
  private $dbname = "SimpleCRUD";
  private $username = "spring_user";
  private $password = "123321";

  // Método privado para evitar múltiples instancias
  private function __construct()
  {
    try {
      $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Error de conexión: " . $e->getMessage());
    }
  }

  // Método público estático para obtener la única instancia
  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new DBConnection();
    }
    return self::$instance;
  }

  // Método para obtener la conexión PDO
  public function getConnection()
  {
    return $this->pdo;
  }
}
