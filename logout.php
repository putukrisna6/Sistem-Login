<?php
  session_start();
  unset($_SESSION['loggedin']);
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['full_name']);
  unset($_SESSION['level']);
  unset($_SESSION['id']);
  session_destroy();
  echo "<script>
          alert('Logout success');
          document.location='index.php';
        </script>";
 ?>
