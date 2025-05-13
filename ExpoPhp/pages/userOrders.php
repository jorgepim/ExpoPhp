<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../../assets/css/indexes.css">
  <title>Mis Órdenes</title>
</head>

<body>
  <?php include 'partials/navbar.php'; ?>

  <h1>Mis Órdenes</h1>
  <?php
  session_start();
  require_once __DIR__ . '/../includes/OrderDAO.php';

  if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
  }

  $userId = $_SESSION['user_id'];
  $orderDAO = new OrderDAO();
  $orders = $orderDAO->getOrdersByUserId($userId);
  ?>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Fecha</th>
    </tr>
    <?php
    foreach ($orders as $order) {
      echo "<tr>";
      echo "<td>{$order['id']}</td>";
      echo "<td>{$order['name']}</td>";
      echo "<td>{$order['quantity']}</td>";
      echo "<td>{$order['order_date']}</td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>