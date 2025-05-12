<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../assets/css/orders/orders.css">
  <title>Gestión de Usuarios</title>
</head>

<body>
  <h1>Listado de Usuarios</h1>
  <a href="create_user.php">Registrar Nuevo Usuario</a>
  <table border="1">
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
                    <a href='delete_user.php?id={$user['id']}'>Eliminar</a>
                  </td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>