<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="../../assets/css/orders/orders.css">
    <title>Gestión de Órdenes</title>
</head>
<body>
    <h1>Listado de Órdenes</h1>
    <a href="create.php">Registrar Nueva Orden</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        <?php
        require_once __DIR__ . '/../../includes/OrderDAO.php';

        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getAllOrders();

        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>{$order['id']}</td>";
            echo "<td>{$order['username']}</td>";
            echo "<td>{$order['name']}</td>";
            echo "<td>{$order['quantity']}</td>";
            echo "<td>{$order['order_date']}</td>";
            echo "<td><a href='edit.php?id={$order['id']}'>Editar</a> | <a href='delete.php?id={$order['id']}'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>