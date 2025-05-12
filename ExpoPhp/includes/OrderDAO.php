<?php
require_once 'DBConnection.php';

class OrderDAO
{
  private $pdo;

  public function __construct()
  {
    // Usando la conexión Singleton
    $this->pdo = DBConnection::getInstance()->getConnection();
  }

  // Obtener todas las órdenes
  public function getAllOrders()
  {
    $query = "SELECT o.id, o.user_id, u.username, p.name, o.quantity, o.order_date 
              FROM orders o 
              JOIN users u ON o.user_id = u.id 
              JOIN products p ON o.product_id = p.id";
    return $this->pdo->query($query)->fetchAll();
  }

  // Registrar una nueva orden
  public function addOrder($userId, $productId, $quantity)
  {
    $query = "INSERT INTO orders (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ':user_id' => $userId,
      ':product_id' => $productId,
      ':quantity' => $quantity
    ]);
  }

  // Obtener orden por ID
  public function getOrderById($id)
  {
    $query = "SELECT * FROM orders WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
  }

  // Eliminar una orden
  public function deleteOrder($id)
  {
    $query = "DELETE FROM orders WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':id' => $id]);
  }
}
