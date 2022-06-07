<?php
  require_once ('../config/database.php');

  $message = '';

  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header('Location: ../index.php');
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>