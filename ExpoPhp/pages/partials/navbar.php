<div class="navbar">
  <pre>  Hola, <?php echo $_SESSION['username']; ?>  </pre>
  <a href="orderIndex.php">Órdenes</a>
  <a href="productIndex.php" <?php if ($_SESSION['role'] !== 'admin') echo 'style="display:none;"'; ?>>Productos</a>
  <a href="usersIndex.php" <?php if ($_SESSION['role'] !== 'admin') echo 'style="display:none;"'; ?>>Usuarios</a>
  <a href="../actions/UserActions.php?action=logout">Cerrar Sesión</a>
</div>

<style>
  body {
    margin: 0 auto;
  }

  .navbar {
    margin: 0;
    background-color: #333;
    padding: 10px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
  }

  .navbar a {
    color: #fff;
    margin-right: 15px;
    text-decoration: none;
  }

  .navbar a:hover {
    text-decoration: underline;
  }
</style>