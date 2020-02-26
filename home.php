<?php 
  require('./session.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <span><strong>WELCOME MGA BOSS!</strong></span>
  <form action="/php-login-with-session/logout.php" method="post">
    <input type="submit" value="LOGOUT" />
  </form>
</body>
</html>