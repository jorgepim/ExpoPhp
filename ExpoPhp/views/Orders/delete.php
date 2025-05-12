<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="../../assets/css/orders/orders.css">
    <title>Eliminar Orden</title>
</head>
<body>
    <h1>¿Está seguro de eliminar esta orden?</h1>
    <form action="delete_order.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
        <button type="submit">Eliminar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
