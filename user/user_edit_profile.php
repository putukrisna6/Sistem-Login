<?php
  session_start();

  if(empty($_SESSION['username'])) {
    echo "<script>
            alert('Please login beforehand');
            document.location='index.php';
          </script>";
  }

  require_once "../koneksi.php";
  if(isset($_POST['bsave'])) {
    if($_GET['page'] == "edit") {
      $edit = mysqli_query($koneksi, "UPDATE tuser set
                                      username = '$_POST[nusername]',
                                      full_name = '$_POST[nfull]'
                                      WHERE id = '$_POST[oid]'
                            ");
      $edit_details = mysqli_query($koneksi, "UPDATE tuser_details set
                                      nrp = '$_POST[nnrp]',
                                      departemen = '$_POST[ndepartment]',
                                      jabatan = '$_POST[ntitle]',
                                      email = '$_POST[nemail]',
                                      hp = '$_POST[nhp]'
                                      WHERE tuser_id = '$_POST[oid]'
                                    ");
      if($edit) {
        echo "<script>
                alert('Edit Success');
                document.location='profile.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Error');
                document.location='user_edit_profile.php';
              </script>";
      }
    }
  }
  if (isset($_GET['page'])) {
    if ($_GET['page'] == "edit") {
      $tampil = mysqli_query($koneksi, "SELECT * FROM tuser_details JOIN tuser ON tuser_id = tuser.id WHERE tuser_id = '$_SESSION[id]'");
      $data = mysqli_fetch_array($tampil);

      if($data) {
        $vusername = $data['username'];
        $vfullname = $data['full_name'];
        $vnrp = $data['nrp'];
        $vdepartment = $data['departemen'];
        $vtitle = $data['jabatan'];
        $vemail = $data['email'];
        $vphone = $data['hp'];
      }
    }
  }


 ?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Profile - ITS Debating Society</title>
     <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
     <link rel="stylesheet" href="../assets/css/smoothproducts.css">
     <link rel="stylesheet" href="../assets/css/User-Rating-F19690.css">
 </head>

 <body>
     <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
         <div class="container"><a class="navbar-brand logo" href="#"><img id="main-logo" src="../assets/img/logo/logo.png"><strong>IDS </strong>Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

         </div>
     </nav>
     <main class="page landing-page">
       <section class="clean-block clean-form dark">
         <div class="container">
           <div class="block-heading">
               <h2 class="text-info">Edit Profile Info</h2>
           </div>
           <form method="post" action="">
             <input type="hidden" name="oid" value="<?=$_SESSION['id']?>">
             <div class="form-group">
               <label>Username</label>
               <input type="text" class="form-control" name="nusername" value="<?=$vusername?>" placeholder="Input Username" required>
             </div>
             <div class="form-group">
               <label>Full Name</label>
               <input type="text" class="form-control" name="nfull" value="<?=$vfullname?>" placeholder="Input Full Name" required>
             </div>
             <div class="form-group">
               <label>NRP</label>
               <input type="text" class="form-control" name="nnrp" value="<?=$vnrp?>" placeholder="Input NRP" required>
             </div>
             <div class="form-group">
               <label>Department</label>
               <input type="text" class="form-control" name="ndepartment" value="<?=$vdepartment?>" placeholder="Input Department" required>
             </div>
             <div class="form-group">
               <label>Title</label>
               <input type="text" class="form-control" name="ntitle" value="<?=$vtitle?>" placeholder="Input Title" required>
             </div>
             <div class="form-group">
               <label>Email</label>
               <input type="email" class="form-control" name="nemail" value="<?=$vemail?>" placeholder="Input Email" required>
             </div>
             <div class="form-group">
               <label>Phone Number</label>
               <input type="text" class="form-control" name="nhp" value="<?=$vnrp?>" placeholder="Input Phone Number" required>
             </div>
             <button type="submit" name="bsave" class="btn btn-primary">Save</button>
             <button type="reset" class="btn btn-warning text-white">Reset</button>
             <a href="profile.php" class="btn btn-danger">Cancel</a>
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
