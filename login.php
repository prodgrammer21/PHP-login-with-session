<?php 
  require('./database.php');

  session_start();

  /* Functions */
  function pathTo($destination) {
    echo "<script>window.location.href = '/php-login-with-session/$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set Default Invalid */
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    pathTo('home');
  }
  
  if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
      echo "Please fill up all fields";
    } else {
      $queryValidate = "SELECT * FROM accounts WHERE username = '$username' AND password = md5('$password')";
      $sqlValidate = mysqli_query($connection, $queryValidate);
      $rowValidate = mysqli_fetch_array($sqlValidate);

      if (mysqli_num_rows($sqlValidate) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $rowValidate['username'];

        pathTo('home');
      } else {
        $_SESSION['status'] = 'invalid';

        echo 'Invalid Credential';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
</head>
<body>
  <form action="/php-login-with-session/login.php" method="post">
    <input type="text" name="username" placeholder="Enter your username"/>
    <input type="password" name="password" placeholder="Enter your password"/>
    <input type="submit" name="login" value="LOGIN"/>
  </form>
</body>
</html>