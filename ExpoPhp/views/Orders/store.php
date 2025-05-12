<?php
require_once __DIR__ . '/../../includes/OrderDAO.php';

// Verificar que los datos se envíen correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    // Validar que los campos no estén vacíos
    if ($userId > 0 && $productId > 0 && $quantity > 0) {
        $orderDAO = new OrderDAO();
        $orderDAO->addOrder($userId, $productId, $quantity);

        // Redirigir a la lista de órdenes después de guardar
        header("Location: index.php");
        exit();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}
