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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="post" action="cek_login.php">
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Form Login</h1>
        <p>Enter your login credentials</p>
      </div>

      <div class="form-label-group">
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label>Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label>Password</label>
      </div>

      <div class="form-label-group">
        <select class="form-control" name="level">
          <option value="">Select Access Level</option>
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>

    </form>
  </body>
</html>
