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

  require_once "koneksi.php";
  if (isset($_GET['page'])) {
    if($_GET['page'] == "delete") {
      $delete = mysqli_query($koneksi, "DELETE FROM tuser WHERE id = '$_GET[id]'");
      if($delete) {
        echo "<script>
                alert('Delete Success');
                document.location='home_admin.php';
              </script>";
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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/User-Rating-F19690.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><img id="main-logo" src="assets/img/logo/logo.png"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
            <div class="jumbotron text-white" style="background-color: #101010;">
                <div class="container">
                  <h1>Hello, <b><?= $_SESSION['full_name']?></b></h1>
                  <p class="lead">Welcome to ITS Debating Society Admin Dashboard</p>
                  <hr class="my-4">
                  <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
                </div>
            </div>
        <section>
        <section class="clean-block features">
          <div class="container">
            <div class="card">
              <div class="heading" style="margin: 10px;">
                  <h3 class="text-center">User List</h3>
                  <a href="admin/add_user.php" class="btn btn-success">Add</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                    <?php
                      $no = 1;
                      $tampil = mysqli_query($koneksi, "SELECT * FROM tuser WHERE level LIKE 'User' ORDER BY id ASC");
                      while($data = mysqli_fetch_array($tampil)) :
                     ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$data['username']?></td>
                      <td><?=$data['full_name']?></td>
                      <td>
                        <a href="admin/edit_user.php?page=edit&id=<?=$data['id']?>" class="btn btn-warning text-white">Edit</a>
                        <a href="home_admin.php?page=delete&id=<?=$data['id']?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Del</a>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </table>
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
