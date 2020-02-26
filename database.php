<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'php-login-with-session';
  $port = 3307; // Optional

  $connection = mysqli_connect($host, $user, $password, $database, $port);

  if (mysqli_connect_error()) {
    echo 'error';
  }
?>