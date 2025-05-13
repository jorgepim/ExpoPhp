<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/orders/orders.css">
    <title>Registrar Orden</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <h1>Registrar Nueva Orden</h1>
    <?php
    require_once __DIR__ . '/../includes/UserDAO.php';
    require_once __DIR__ . '/../includes/ProductDAO.php';

    $userDAO = new UserDAO();
    $productDAO = new ProductDAO();
    $users = $userDAO->getAllUsers();
    $products = $productDAO->getAllProducts();
    ?>
    <form method="post" action="../actions/OrderActions.php?action=add">
        <label>Usuario:</label>
        <select name="user_id" required>
            <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
            <?php } ?>
        </select><br>

        <label>Producto:</label>
        <select name="product_id" required>
            <?php foreach ($products as $product) { ?>
                <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
            <?php } ?>
        </select><br>

        <label>Cantidad:</label>
        <input type="number" name="quantity" required min="1"><br>

        <button type="submit">Guardar</button>
        <a href="orderIndex.php">Cancelar</a>
    </form>
</body>

</html>