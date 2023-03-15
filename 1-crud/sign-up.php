<html>
  <head>
    <title>CRUD | SIGN-UP</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-content">
      <form action="action.php" method="POST"> 
        <label for="username" class="label">Full Name</label>
        <input type="text" name="full_name" class="input w-75 shadow">
        <label for="password" class="label">Username</label>
        <input type="text" name="username" class="input w-75 shadow">
        <label for="password" class="label">Password</label>
        <input type="password" name="password" class="input w-75 shadow">
        <input type="submit" value="Sign-up" name="sign-up" class="btn d-block w-75 btn-primary shadow">
        <div class="text-center w-75 mt-3">
          <a href="index.php" class="link">Login</a>
        </div>
      </form>
    </div>
  </body>
</html>