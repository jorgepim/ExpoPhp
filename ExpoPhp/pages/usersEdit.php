<?php require_once __DIR__ . '/../includes/authAdmin.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../assets/css/general.css">
  <title>Editar Usuario</title>
</head>

<body>
  <?php include 'partials/navbar.php'; ?>

  <h1>Editar Usuario</h1>

  <?php
  // Habilitar errores para depuración
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once __DIR__ . '/../includes/UserDAO.php';

  $userDAO = new UserDAO();
  $id = $_GET['id'] ?? null;

  if (!$id) {
    die("Error: ID de usuario no proporcionado.");
  }

  $user = $userDAO->getUserById($id);
  if (!$user) {
    die("Error: Usuario no encontrado.");
  }
  ?>

  <form action="../actions/UserActions.php?action=update" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <label for="username">Nombre de Usuario:</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

    <label for="role">Rol:</label>
    <select name="role" required>
      <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>Usuario</option>
      <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Administrador</option>
    </select>

    <br><br>
    <button type="submit">Guardar Cambios</button>
    <a href="usersIndex.php">Cancelar</a>
  </form>
</body>

</html>