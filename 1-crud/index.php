<?php
   session_start();
   if (isset($_SESSION['UserId'])) {
     header('Location: show.php');
   } 
?>
<html>
  <head>
    <title>CRUD | LOGIN</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-content">
      <form action="action.php" method="POST"> 
        <label for="username" class="label">Username</label>
        <input type="text" name="username" class="input w-75 shadow">
        <label for="password" class="label">Password</label>
        <input type="password" name="password" class="input w-75 shadow">
        <input type="submit" value="Login" name="login" class="btn d-block w-75 btn-primary shadow">
        <div class="text-center w-75 mt-3">
          <a href="sign-up.php" class="link">Sign-up</a>
        </div>
      </form>
    </div>
  </body>
</html>