<?php require_once __DIR__ . '/../includes/authAdmin.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/indexes.css">
    <title>Gestión de Órdenes</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <h1>Listado de Órdenes</h1>

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
        require_once __DIR__ . '/../includes/OrderDAO.php';

        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getAllOrders();

        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>{$order['id']}</td>";
            echo "<td>{$order['username']}</td>";
            echo "<td>{$order['name']}</td>";
            echo "<td>{$order['quantity']}</td>";
            echo "<td>{$order['order_date']}</td>";
            echo "<td>
                    <a href='orderEdit.php?id={$order['id']}'>Editar</a> | 
                    <a style='background-color: red; color:white;' href='../actions/OrderActions.php?action=delete&id={$order['id']}' 
                       onclick=\"return confirm('¿Estás seguro de eliminar esta orden?');\">Eliminar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>