<?php
  // call database
  require_once "koneksi.php";

  $pass = md5($_POST['password']);
  $username = mysqli_escape_string($koneksi, $_POST['username']);
  $password = mysqli_escape_string($koneksi, $pass);
  $level = mysqli_escape_string($koneksi, $_POST['level']);

  // check username
  $check_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username = '$username' AND level = '$level'");
  $validate_user = mysqli_fetch_array($check_user);

  if ($validate_user) {
    // check password
    if($password == $validate_user['password']) {
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $validate_user['username'];
      $_SESSION['full_name'] = $validate_user['full_name'];
      $_SESSION['level'] = $validate_user['level'];
      $_SESSION['id'] = $validate_user['id'];

      if($level == "User") {
        header('location:home_user.php');
      }
      else if($level == "Admin") {
        header('location:home_admin.php');
      }
    }
    else {
      echo "<script>
              alert('Login Failed');
              document.location='index.php';
            </script>";
    }
  }
  else {
    echo "<script>
            alert('Login Failed');
            document.location='index.php';
          </script>";
  }

 ?>
