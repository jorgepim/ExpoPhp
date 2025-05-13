<div class="navbar">
  <span>Hola, <?php echo $_SESSION['username']; ?></span>
  <a href="orderIndex.php">Órdenes</a>
  <a href="productIndex.php" <?php if ($_SESSION['role'] !== 'admin') echo 'style="display:none;"'; ?>>Productos</a>
  <a href="usersIndex.php" <?php if ($_SESSION['role'] !== 'admin') echo 'style="display:none;"'; ?>>Usuarios</a>
  <a href="../actions/UserActions.php?action=logout">Cerrar Sesión</a>
</div>

<style>
  .navbar {
    background-color: #333;
    padding: 10px;
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