<?php
  session_start();

  if(empty($_SESSION['username'])) {
    echo "<script>
            alert('Please login beforehand');
            document.location='index.php';
          </script>";
  }
  if ($_SESSION['level'] != "Admin") {
    echo "<script>
            alert('Invalid access');
            document.location='home_user.php';
          </script>";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard User</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron bg-success text-white">
        <h1 class="display-4">Hello, <b><?= $_SESSION['full_name']?></b></h1>
        <p class="lead">Welcome</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header">
          Change Password
        </div>
        <div class="card-body">
          <form method="post" action="change_pass.php">
            <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" class="form-control" name="old_pass" required>
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control" name="new_pass" required>
            </div>
            <div class="form-group">
              <label>Confirm New Password</label>
              <input type="password" class="form-control" name="confirm_pass" required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
