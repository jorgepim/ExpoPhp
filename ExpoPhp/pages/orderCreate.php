<?php require_once __DIR__ . '/../includes/authUser.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/general.css">
    <title>Registrar Orden</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit;
    }

    include 'partials/navbar.php';

    require_once __DIR__ . '/../includes/ProductDAO.php';
    $productDAO = new ProductDAO();
    $products = $productDAO->getAllProducts();
    ?>

    <h1>Registrar Nueva Orden</h1>

    <form method="post" action="../actions/OrderActions.php?action=add">
        <!-- user_id oculto desde la sesión -->
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <label>Producto:</label>
        <select name="product_id" required>
            <?php foreach ($products as $product) { ?>
                <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
            <?php } ?>
        </select><br>

        <label>Cantidad:</label>
        <input type="number" name="quantity" required min="1"><br>

        <button type="submit">Guardar</button>
        <a href="userOrders.php">Cancelar</a>
    </form>
</body>

</html>