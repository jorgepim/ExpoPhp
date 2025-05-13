<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  // Si no ha iniciado sesión, redirige al login
  header("Location: ../index.php");
  exit;
}

if ($_SESSION['role'] !== 'user') {
  // Si es admin y no user, lo mandamos al panel de admin
  header("Location: userIndex.php");
  exit;
}
