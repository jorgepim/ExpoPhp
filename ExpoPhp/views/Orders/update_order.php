<?php
require_once __DIR__ . '/../../includes/OrderDAO.php';

// Verificar que el método sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    // Validar que los campos no estén vacíos
    if ($id > 0 && $userId > 0 && $productId > 0 && $quantity > 0) {
        $orderDAO = new OrderDAO();
        $orderDAO->updateOrder($id, $userId, $productId, $quantity);

        // Redirigir a la lista de órdenes después de actualizar
        header("Location: index.php");
        exit();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}
