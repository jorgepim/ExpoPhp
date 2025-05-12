<?php
require_once '../includes/ProductDAO.php';

$productDAO = new ProductDAO();
$action = $_GET['action'] ?? '';

switch ($action) {
  case 'add':
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $productDAO->addProduct($name, $price, $stock);
    header("Location: ../pages/products.php");
    break;

  case 'update':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $productDAO->updateProduct($id, $name, $price, $stock);
    header("Location: ../pages/products.php");
    break;

  case 'delete':
    $id = $_GET['id'];
    $productDAO->deleteProduct($id);
    header("Location: ../pages/products.php");
    break;

  default:
    header("Location: ../pages/products.php");
}
