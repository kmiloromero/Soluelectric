<?php
  require_once ("../config/session.php");
  require_once ('../config/database.php');

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0) {
      $_SESSION['user_id'] = $results['id'];  
      header('Location: ../index.php');
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>