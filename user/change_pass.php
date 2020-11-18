<?php
  require_once "../koneksi.php";

  $old_password = md5($_POST['old_pass']);
  $id = $_POST['user_id'];

  echo $id;

  $display = mysqli_query($koneksi, "SELECT * FROM tuser WHERE
                          id = '$id' and password = '$old_password'
                        ");
  $data = mysqli_fetch_array($display);

  if($data) {
    $new_password = $_POST['new_pass'];
    $confirm_password = $_POST['confirm_pass'];

    if($new_password == $confirm_password) {
      $okay_password = md5($confirm_password);
      $change = mysqli_query($koneksi, "UPDATE tuser SET password = '$okay_password' WHERE id = '$id'");

      if($change) {
        echo "<script>
                alert('Password is changed');
                document.location='profile.php';
              </script>";
      }
    }
    else {
      echo "<script>
              alert('Please reconfirm new password');
              document.location='profile.php#change_password';
            </script>";
    }
  }
  else {
    echo "<script>
            alert('The entered old password does not match');
            document.location='profile.php#change_password';
          </script>";
  }
 ?>
