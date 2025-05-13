<?php require_once __DIR__ . '/../includes/authAdmin.php'; ?>

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/general.css">
    <title>Editar Orden</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <h1>Editar Orden</h1>
    <?php
    require_once __DIR__ . '/../includes/OrderDAO.php';
    require_once __DIR__ . '/../includes/UserDAO.php';
    require_once __DIR__ . '/../includes/ProductDAO.php';

    $orderDAO = new OrderDAO();
    $userDAO = new UserDAO();
    $productDAO = new ProductDAO();

    $id = $_GET['id'] ?? null;
    if (!$id) {
        die("Error: ID de orden no proporcionado.");
    }

    $order = $orderDAO->getOrderById($id);
    if (!$order) {
        die("Error: Orden no encontrada.");
    }

    $users = $userDAO->getAllUsers();
    $products = $productDAO->getAllProducts();
    ?>

    <form action="../actions/OrderActions.php?action=update" method="post">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

        <label>Usuario:</label>
        <select name="user_id" required>
            <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id']; ?>" <?php if ($user['id'] == $order['user_id']) echo 'selected'; ?>>
                    <?php echo $user['username']; ?>
                </option>
            <?php } ?>
        </select><br>

        <label>Producto:</label>
        <select name="product_id" required>
            <?php foreach ($products as $product) { ?>
                <option value="<?php echo $product['id']; ?>" <?php if ($product['id'] == $order['product_id']) echo 'selected'; ?>>
                    <?php echo $product['name']; ?>
                </option>
            <?php } ?>
        </select><br>

        <label>Cantidad:</label>
        <input type="number" name="quantity" value="<?php echo $order['quantity']; ?>" required min="1"><br>

        <button type="submit">Actualizar</button>
        <a href="orderIndex.php">Cancelar</a>
    </form>
</body>

</html>