<?php
require_once 'DBConnection.php';

class UserDAO
{
  private $pdo;

  public function __construct()
  {
    // Usando la conexión Singleton
    $this->pdo = DBConnection::getInstance()->getConnection();
  }

  // Obtener todos los usuarios
  public function getAllUsers()
  {
    $query = "SELECT id, username, email, role, created_at FROM users";
    return $this->pdo->query($query)->fetchAll();
  }

  // Registrar un nuevo usuario (con contraseña encriptada)
  public function registerUser($username, $email, $password, $role = 'user')
  {
    $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ':username' => $username,
      ':email' => $email,
      ':password' => password_hash($password, PASSWORD_BCRYPT),
      ':role' => $role
    ]);
  }

  // Obtener usuario por ID
  public function getUserById($id)
  {
    $query = "SELECT id, username, email, role, created_at FROM users WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
  }

  // Actualizar un usuario
  public function updateUser($id, $username, $email, $role)
  {
    $query = "UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ':id' => $id,
      ':username' => $username,
      ':email' => $email,
      ':role' => $role
    ]);
  }

  // Eliminar un usuario
  public function deleteUser($id)
  {
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
  }

  // Verificar login (Autenticación)
  public function loginUser($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role'];
      return true;
    }
    return false;
  }
}
