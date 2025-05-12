<?php
require_once '../includes/OrderDAO.php';

$orderDAO = new OrderDAO();
$action = $_GET['action'] ?? '';

switch ($action) {
  case 'add':
    $userId = $_POST['user_id'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $orderDAO->addOrder($userId, $productId, $quantity);
    header("Location: ../pages/orders.php");
    break;

  case 'delete':
    $id = $_GET['id'];
    $orderDAO->deleteOrder($id);
    header("Location: ../pages/orders.php");
    break;

  default:
    header("Location: ../pages/orders.php");
}
