<?php
require_once '../includes/OrderDAO.php';

$orderDAO = new OrderDAO();
$action = $_GET['action'] ?? '';

switch ($action) {
  case 'add':
    $userId = $_POST['user_id'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if ($userId && $productId && $quantity > 0) {
      $orderDAO->addOrder($userId, $productId, $quantity);
      header("Location: ../pages/orderIndex.php?success=Orden registrada correctamente");
    } else {
      header("Location: ../pages/orderIndex.php?error=Datos inválidos");
    }
    break;

  case 'update':
    $id = $_POST['id'];
    $userId = $_POST['user_id'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if ($id && $userId && $productId && $quantity > 0) {
      $orderDAO->updateOrder($id, $userId, $productId, $quantity);
      header("Location: ../pages/orderIndex.php?success=Orden actualizada correctamente");
    } else {
      header("Location: ../pages/orderIndex.php?error=Datos inválidos");
    }
    break;

  case 'delete':
    $id = $_GET['id'];
    if ($id) {
      $orderDAO->deleteOrder($id);
      header("Location: ../pages/orderIndex.php?success=Orden eliminada");
    } else {
      header("Location: ../pages/orderIndex.php?error=ID inválido");
    }
    break;
}
