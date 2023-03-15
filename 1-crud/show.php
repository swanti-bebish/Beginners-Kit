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
    <title>CRUD | USER</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="header text-end">
      <a href="logout.php" class="btn btn-danger shadow text-decoration-none">Log-out</a>
    </div>
    <div class="main-content text-center">
      <strong>Hello!</strong>
      <br>
      <span><?php echo $current_user['full_name'] ?></span>
      <a href="edit.php" class="btn btn-success shadow text-decoration-none">Edit</a>
    </div>
    <div class="secondary-content">
      <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "id: " . $row['id']. " | Full Name: " . $row['full_name']. " | Username: " . $row['username']. "<br>";
          } 
        } else {
          echo "0 results";
        }
      ?>
    </div>
  </body>
</html>