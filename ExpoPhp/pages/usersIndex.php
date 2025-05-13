<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: userOrders.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../assets/css/indexes.css">
  <title>Gestión de Usuarios</title>
</head>

<body>
  <?php include 'partials/navbar.php'; ?>

  <h1>Listado de Usuarios</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre de Usuario</th>
      <th>Email</th>
      <th>Rol</th>
      <th>Fecha de Registro</th>
      <th>Acciones</th>
    </tr>
    <?php

    require_once __DIR__ . '/../includes/UserDAO.php';

    $userDAO = new UserDAO();
    $users = $userDAO->getAllUsers();

    foreach ($users as $user) {
      echo "<tr>";
      echo "<td>{$user['id']}</td>";
      echo "<td>{$user['username']}</td>";
      echo "<td>{$user['email']}</td>";
      echo "<td>{$user['role']}</td>";
      echo "<td>{$user['created_at']}</td>";
      echo "<td>
                    <a href='usersEdit.php?id={$user['id']}'>Editar</a> | 
               <a style='background-color: red; color:white;'' href='#' onclick='confirmDelete({$user['id']})'>Eliminar</a>
            </td>";
      echo "</tr>";
    }
    ?>
  </table>

  <script>
    function confirmDelete(userId) {
      if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
        window.location.href = "../actions/UserActions.php?action=delete&id=" + userId;
      }
    }
  </script>

</html>