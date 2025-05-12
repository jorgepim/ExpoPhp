<?php
require_once __DIR__ . '/../../includes/OrderDAO.php';

// Verificar que el método sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    // Verificar que el ID sea válido
    if ($id > 0) {
        $orderDAO = new OrderDAO();
        $orderDAO->deleteOrder($id);

        // Redirigir a la lista de órdenes después de eliminar
        header("Location: index.php");
        exit();
    } else {
        echo "ID de orden no válido.";
    }
} else {
    echo "Método de solicitud no válido.";
}
