<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - ITS Debating Society</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><img id="main-logo" src="../assets/img/logo/logo.png"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../home_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="edit_password.php">Edit Profile</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
              <div class="block-heading">
                  <h2 class="text-info">Edit Profile Info</h2>
              </div>
              <p class="text-center">Change Password</p>
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
                <button type="reset" class="btn btn-danger">Reset</button>
              </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2020 Putu Krisna Andyartha</p>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>
