<?php
  require_once ('../config/database.php');

  $message = '';

  if (!empty($_POST['nombrec']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['mensaje'])) {
    $sql = "INSERT INTO consulta (nombrec, email, telefono, mensaje) VALUES (:nombrec, :email, :telefono, :mensaje)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombrec', $_POST['nombrec']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':mensaje', $_POST['mensaje']);

 

    if ($stmt->execute()) {
        header('Location: ../index.php');
    } else {
      $message = 'Lo sentimos no se pudo procesar su Consulta';
    }
  }


?>