<?php
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

  // User Creation
  if (isset($_POST['sign-up'])) { 
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (full_name, username, password) VALUES ('$full_name', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
      header('Location: index.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }

  // User Login or Reading
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' limit 1");
    
    if (mysqli_num_rows($sql) == 1) {
      $data = mysqli_fetch_array($sql);
      // echo $data["id"];
      // echo "User found";
      session_start();
      $_SESSION['UserId'] = $data['id'];
      header('Location: show.php');
    } else {
       echo "User not found";
    }
  } 

  // User Update
  if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();
    $sql = "UPDATE users SET full_name='".$full_name."', username='".$username."', password='".$password."' WHERE id=".$_SESSION['UserId'];
    if ($conn->query($sql) === TRUE) {
      header('Location: index.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }

  // User Delete
  if (isset($_POST['delete'])) {
    session_start();
    $sql = "DELETE FROM users WHERE id=".$_SESSION['UserId'];
    if ($conn->query($sql) === TRUE) {
      header('Location: logout.php');
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }

?>