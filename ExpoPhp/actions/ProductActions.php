<?php
require_once '../includes/ProductDAO.php';

$productDAO = new ProductDAO();
$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'add':
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $productDAO->addProduct($name, $price, $stock);
            header("Location: ../pages/productIndex.php?message=Producto agregado exitosamente");
            exit;
        
        case 'update':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $productDAO->updateProduct($id, $name, $price, $stock);
            header("Location: ../pages/productIndex.php?message=Producto actualizado exitosamente");
            exit;
        
        case 'delete':
            $id = $_GET['id'];
            $productDAO->deleteProduct($id);
            echo "Producto eliminado correctamente";
            exit;
        
        default:
            header("Location: ../pages/productIndex.php?error=Acción no reconocida");
            exit;
    }
} catch (Exception $e) {
    header("Location: ../pages/productIndex.php?error=" . urlencode($e->getMessage()));
    exit;
}
