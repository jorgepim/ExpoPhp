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

  case 'change_password':
    $id = $_POST['id'];
    $newPassword = $_POST['new_password'];
    $userDAO->updatePassword($id, $newPassword);
    header("Location: ../index.php");
    break;

  case 'delete':
    $id = $_GET['id'];
    $userDAO->deleteUser($id);
    header("Location: ../pages/usersIndex.php");
    break;

  case 'login':
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($userDAO->loginUser($email, $password)) {
      header("Location: ../pages/usersIndex.php");
    } else {
      echo "Correo o contraseña incorrectos.";
    }
    break;

  case 'logout':
    session_start();
    session_destroy();
    header("Location: ../index.php");
    break;

  default:
    header("Location: ../index.php");
}
