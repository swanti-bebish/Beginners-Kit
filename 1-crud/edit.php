<?php
  session_start();
  if (!isset($_SESSION['UserId'])) {
    header('Location: index.php');
  } 
  $servername = "localhost";
  $uname = "root";
  $pass = "";
  $dbname = "crud";

  //Create connection
  $conn = new mysqli($servername, $uname, $pass, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $current_user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='".$_SESSION['UserId']."' limit 1"));
?>
<html>
  <head>
    <title>CRUD | EDIT USER</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="main-content">
      <form action="action.php" method="POST"> 
        <label for="username" class="label">Full Name</label>
        <input type="text" name="full_name" value="<?php echo $current_user['full_name'] ?>" class="input w-75 shadow">
        <label for="password" class="label">Username</label>
        <input type="text" name="username" value="<?php echo $current_user['username'] ?>" class="input w-75 shadow">
        <label for="password" class="label">Password</label>
        <input type="password" name="password" value="<?php echo $current_user['password'] ?>" class="input w-75 shadow">
        <input type="submit" value="Update" name="update" class="btn d-block w-75 btn-primary shadow">
      </form>
      <form action="action.php" method="POST">
        <input type="submit" value="Delete" name="delete" class="btn d-block w-75 btn-danger shadow">
      </form>
    </div>
  </body>
</html>