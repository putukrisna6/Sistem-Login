<?php
  session_start();

  if(empty($_SESSION['username'])) {
    echo "<script>
            alert('Please login beforehand');
            document.location='index.php';
          </script>";
  }

  require_once "../koneksi.php";
  $fetch_details = mysqli_query($koneksi, "SELECT * FROM tuser_details JOIN tuser ON tuser_id = tuser.id WHERE tuser_id = '$_SESSION[id]'");
  $get_details = mysqli_fetch_array($fetch_details);
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
             <div
                 class="collapse navbar-collapse" id="navcol-1">
                 <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item"><a class="nav-link" href="../home_user.php">Home</a></li>
                     <li class="nav-item"><a class="nav-link active" href="user/profile.php">Profile</a></li>
                 </ul>
         </div>
         </div>
     </nav>
     <main class="page landing-page">
       <section class="clean-block clean-product dark">
          <div class="container">
              <div class="block-heading">
                  <h2 class="text-info">Profile</h2>
              </div>
              <div class="block-content">
                  <div class="product-info">
                      <div>
                          <ul class="nav nav-tabs" role="tablist" id="myTab">
                              <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">Details</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#events">Events</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#change_password">Change Password</a></li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                              <div class="tab-pane active fade show description" role="tabpanel" id="description" style="margin: 0px;">
                                <table class="table table-borderless" >
                                  <tbody>
                                    <tr>
                                      <th scope="row">Username</th>
                                      <td>:</td>
                                      <td><?=$get_details['username']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Name</th>
                                      <td>:</td>
                                      <td><?=$get_details['full_name']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">NRP</th>
                                      <td>:</td>
                                      <td><?=$get_details['nrp']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Department</th>
                                      <td>:</td>
                                      <td><?=$get_details['departemen']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Title</th>
                                      <td>:</td>
                                      <td><?=$get_details['jabatan']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Email</th>
                                      <td>:</td>
                                      <td><?=$get_details['email']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Phone Number</th>
                                      <td>:</td>
                                      <td><?=$get_details['hp']?></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="container">
                                  <a href="user_edit_profile.php?page=edit" class="btn btn-warning text-white" style="display: inline-block;">Edit</a>
                                </div>
                              </div>
                              <div class="tab-pane fade show specifications" role="tabpanel" id="events">
                                  <h1>This is a placeholder event</h1>
                              </div>
                              <div class="tab-pane fade show" role="tabpanel" id="change_password">
                                <div class="container" style="margin-top: 60px;">
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
                              </div>
                          </div>
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
     <script src="../assets/js/jquery.min.js"></script>
     <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
     <script src="../assets/js/smoothproducts.min.js"></script>
     <script src="../assets/js/theme.js"></script>
 </body>

 </html>
