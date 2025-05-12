<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="../../assets/css/orders/orders.css">
    <title>Registrar Orden</title>
</head>
<body>
    <h1>Registrar Nueva Orden</h1>
    <form method="post" action="store.php">
        Usuario ID: <input type="number" name="user_id" required><br>
        Producto ID: <input type="number" name="product_id" required><br>
        Cantidad: <input type="number" name="quantity" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
