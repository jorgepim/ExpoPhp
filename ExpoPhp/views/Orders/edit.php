<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="../../assets/css/orders/orders.css">
    <title>Editar Orden</title>
</head>
<body>
    <h1>Editar Orden</h1>
    <?php
   require_once __DIR__ . '/../../includes/OrderDAO.php';

    $orderDAO = new OrderDAO();
    $order = $orderDAO->getOrderById($_GET['id']);
    ?>
    <form action="update_order.php" method="post">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
        <label>Usuario ID:</label>
        <input type="text" name="user_id" value="<?php echo $order['user_id']; ?>" required><br>
        <label>Producto ID:</label>
        <input type="text" name="product_id" value="<?php echo $order['product_id']; ?>" required><br>
        <label>Cantidad:</label>
        <input type="number" name="quantity" value="<?php echo $order['quantity']; ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>