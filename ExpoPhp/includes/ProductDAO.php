<?php
require_once 'DBConnection.php';

class ProductDAO
{
  private $pdo;

  public function __construct()
  {
    // Usando la conexión Singleton
    $this->pdo = DBConnection::getInstance()->getConnection();
  }

  // Obtener todos los productos
  public function getAllProducts()
  {
    $query = "SELECT * FROM products";
    return $this->pdo->query($query)->fetchAll();
  }

  // Registrar un nuevo producto
  public function addProduct($name, $price, $stock)
  {
    $query = "INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ':name' => $name,
      ':price' => $price,
      ':stock' => $stock
    ]);
  }

  // Obtener producto por ID
  public function getProductById($id)
  {
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
  }

  // Actualizar un producto
  public function updateProduct($id, $name, $price, $stock)
  {
    $query = "UPDATE products SET name = :name, price = :price, stock = :stock WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ':id' => $id,
      ':name' => $name,
      ':price' => $price,
      ':stock' => $stock
    ]);
  }

  // Eliminar un producto
  public function deleteProduct($id)
  {
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
  }
}
