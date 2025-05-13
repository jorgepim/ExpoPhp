<?php
require_once '../includes/UserDAO.php';

$userDAO = new UserDAO();
$action = $_GET['action'] ?? '';

switch ($action) {
  case 'register':
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userDAO->registerUser($username, $email, $password);
    header("Location: ../pages/usersIndex.php");
    break;

  case 'update':
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $userDAO->updateUser($id, $username, $email, $role);
    header("Location: ../pages/usersIndex.php");
    break;

  case 'delete':
    $id = $_GET['id'];
    $userDAO->deleteUser($id);
    header("Location: ../pages/usersIndex.php");
    break;

  case 'login':
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $userDAO->loginUser($email, $password);

    if ($user) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role'];
      header("Location: ../pages/usersIndex.php");
    } else {
      echo "Correo o contraseña incorrectos.";
    }
    break;


  case 'logout':
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    break;

  default:
    header("Location: ../index.php");
}
