<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php");
  exit;
}

if ($_SESSION['role'] !== 'admin') {
  header("Location: userOrders.php");
  exit;
}
