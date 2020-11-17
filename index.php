<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if ($_SESSION['level'] === "User") {
      header("location: home_user.php");
    }
    else {
      header("location: home_admin.php");
    }
    exit;
  }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - ITS Debating Society</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <!-- <link href="assets/bootstrap/css/floating-labels.css" rel="stylesheet"> -->
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
          <img id="main-logo" src="assets/img/logo/logo.png">
          <a class="navbar-brand logo" href="#"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading"><img id="logo_login" src="assets/img/logo/logo.png">
                    <h2 class="text-info">Log In</h2>
                    <p>Please enter your login credentials.</p>
                </div>
                <form method="post" action="login.php">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Enter your username" required autofocus>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                      <label>Access Level</label>
                      <select class="form-control" name="level">
                        <option value="">Select Access Level</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                      </select>
                    </div>
                    <button
                        class="btn btn-primary btn-block" type="submit">Log In</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2020 Putu Krisna Andyartha</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
