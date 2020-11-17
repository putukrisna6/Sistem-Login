<?php
  session_start();

  if(empty($_SESSION['username'])) {
    echo "<script>
            alert('Please login beforehand');
            document.location='index.php';
          </script>";
  }
  if ($_SESSION['level'] != "User") {
    echo "<script>
            alert('Invalid access');
            document.location='home_admin.php';
          </script>";
  }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - ITS Debating Society</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/User-Rating-F19690.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
          
          <a class="navbar-brand logo" href="#"><img id="main-logo" src="assets/img/logo/logo.png"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="home_user.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="edit_profile.php">Edit Profile</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section>
            <div class="jumbotron text-white" style="background-color: #4da2e3;">
                <div class="container">
                  <h1>Hello, <b><?= $_SESSION['full_name']?></b></h1>
                  <p class="lead">Welcome to ITS Debating Society User Dashboard</p>
                  <hr class="my-4">
                  <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
                </div>
            </div>
        <section>
        <section class="clean-block features">
          <div class="user-body"><span class="heading">Your Performance</span>
                <p>This is a placeholder performance</p>
                <hr style="border:3px solid #f1f1f1">
                <div class="rg-row">
                    <div class="side">
                        <div>
                            <p>Speech</p>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-5"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>
                            <p>150</p>
                        </div>
                    </div>
                    <div class="side">
                        <div>
                            <p>Adjudication</p>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-4"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>
                            <p>63</p>
                        </div>
                    </div>
                    <div class="side">
                        <div>
                            <p>Framing</p>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-3"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div>
                            <p>15</p>
                        </div>
                    </div>
                </div>
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
