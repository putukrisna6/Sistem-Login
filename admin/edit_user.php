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

  require_once "../koneksi.php";
  if(isset($_POST['bsave'])) {
    if($_GET['page'] == "edit") {
      $okay_password = md5($_POST['new_pass']);
      $edit = mysqli_query($koneksi, "UPDATE tuser set
                                      username = '$_POST[username]',
                                      full_name = '$_POST[full_name]',
                                      password = '$okay_password'
                                      WHERE id = '$_GET[id]'
                            ");
      if($edit) {
        echo "<script>
                alert('Edit Success');
                document.location='../home_admin.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Error');
                document.location='edit_user.php';
              </script>";
      }
    }
  }
  if (isset($_GET['page'])) {
    if ($_GET['page'] == "edit") {
      $tampil = mysqli_query($koneksi, "SELECT * FROM tuser WHERE id = '$_GET[id]'");
      $data = mysqli_fetch_array($tampil);

      if($data) {
        $vusername = $data['username'];
        $vfullname = $data['full_name'];
        $vpassword = $data['password'];
      }
    }
  }
 ?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Home - ITS Debating Society</title>
     <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
     <link rel="stylesheet" href="../assets/css/smoothproducts.css">
     <link rel="stylesheet" href="../assets/css/User-Rating-F19690.css">
 </head>

 <body>
     <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
         <div class="container"><a class="navbar-brand logo" href="#"><img id="main-logo" src="../assets/img/logo/logo.png"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
         <section class="clean-block features" style="margin-top: 75px;">
          <div class="container" id="form-mhs">
            <h1 class="text-center">Edit User Info</h1>
            <form action="" method="post">
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="text" name="username" value="<?=@$vusername?>" placeholder="Input Username" required="">
                </div>
                <div class="form-group">
                  <label>Full Name</label>
                  <input class="form-control" type="text" name="full_name" value="<?=@$vfullname?>" placeholder="Input Full Name" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="new_pass" placeholder="New Password" required="">
                </div>
                <button type="submit" name="bsave" class="btn btn-success">Save</button>
                <button type="reset" name="reset" class="btn btn-warning text-white">Reset</button>
                <a href="../home_admin.php" class="btn btn-danger">Cancel</a>
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
