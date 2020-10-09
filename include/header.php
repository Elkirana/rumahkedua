<?php
session_start();
include 'sys/core.php';
if (isset($_SESSION['user'])) {
  $user_id = $_SESSION['user'];
  $sql_user = "SELECT * FROM tbl_user WHERE id ='$user_id' ";
  $run_query = $db->query($sql_user);
  $data_user = mysqli_fetch_assoc($run_query);
  $name = $data_user['nama_lengkap'];
  $picture = '';
  $status_login = 1;
  if ($data_user['status_user']=='admin') {
     echo '<script language="javascript">document.location="dashboard/admin";</script>';
  }elseif ($data_user['status_user']=='psikolog') {
      echo '<script language="javascript">document.location="dashboard/psikolog";</script>';
  }else{
   echo "";
  }
}else{
  // echo '<script language="javascript">document.location="../index.php";</script>';
  // die();
   $status_login = 0;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US" class="no-js">
   <!--<![endif]-->
   <head>
      <meta charset="utf-8">
      <title>Rumah Kedua</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="assets/home/images/logo.png">
      <!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,300|Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'> -->
      <!-- CSS -->
      <link href="assets/home/css/bootstrap.css" rel="stylesheet">
      <!-- Custom CSS -->
      <!-- <link media="none" onload="if(media!='all')media='all'" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
      <!-- <link media="none" onload="if(media!='all')media='all'" href="assets/home/css/material-icon.css" rel="stylesheet"> -->
      <link href="assets/home/fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" >
      <link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css"/>
      <!-- Script -->
      <script src="assets/home/js/jquery-2.2.4.min.js"></script>
      <script src="assets/home/js/bootstrap.min.js"></script>
      <script src="assets/home/js/lazyload.min.js"></script>
      <script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>

      <link href="assets/home/css/new-index.css" rel="stylesheet">
      <link rel="stylesheet" href="./style.css">
      <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
      <script type="text/javascript">
         $('#chat_with').val();
      </script>
   </head>

   <body>
      <header id="header">
         <!--V2-->
         <!-- Navigation -->
         <!--Nav Menu-->
         <nav class="navbar nav-menu">
            <div class="container sm-head">
               <div class="col-xs-12 col-sm-2">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle navbar-toggle-mobile" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><i class="fa fa-navicon"></i></button>
                     <a href="./"><img src="assets/home/images/logo.png" alt="" class="logo navbar-brand img-responsive"></a>
                  </div>
               </div>
               <div class="col-sm-10 hidden-xs">
                  <div class="navbar-menu">
                     <div class="login-search pull-right">
                        <?php

                        if (!isset($_SESSION['user'])) {
                           
                        ?>
                        <a id="register" class="btn btn-oval btn-yellow mr-15" data-target="#daftarModal" data-toggle="modal" data-gtm-vis-first-on-screen-10593582_5="8223" data-gtm-vis-total-visible-time-10593582_5="100" data-gtm-vis-has-fired-10593582_5="1">DAFTAR / MASUK</a>
                     <?php }else{ ?>
                        <div class="dropdown">
                           <div data-toggle="dropdown" class="dropdown-user">
                              <img class="kiri" data-src="assets/home/images/co4.png" class="img-responsive lazy-load-img" alt="" style="width: 32px;"> Hi, <?php echo $data_user['username'];?>  <span class="fa fa-caret-down downrow"></span>
                           </div>
                           <ul class="dropdown-menu list">
                              <li class="hvr-bubble-top">
                                 <a href="profile.php">Profilku</a>
                                 <a href="logout.php">Keluar</a>
                              </li>
                           </ul>
                        </div>
                     <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
            </div>
            <!-- /.container-fluid -->
         </nav>
         <!-- begin navbar mobile -->
         <div class="visible-xs">
            <ul class="navbar-mobile">
               <!-- <li class=""><a href="">Curhat</a></li> -->
               <?php

               if (!isset($_SESSION['user'])) {

               ?>
                  <li><a href="artikel.php">Artikel</a></li>
                  <li><a id="register" href="#" data-target="#daftarModal" data-toggle="modal">DAFTAR / MASUK</a></li>
                <?php }else{ ?>
                  <li><a href="artikel.php">Artikel</a></li>
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="logout.php">Keluar</a></li>
                <?php }?>
            </ul>
         </div> 
         <!-- end navbar mobile -->
         <!--Daftar & Login-->
         <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalLabel" >
            <div class="modal-dialog wd-daftar-login" role="document">
               <div class="modal-content daftarContent">
                  <div class="modal-header-daftar">
                     <button type="button" class="close close-daftar-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <img data-src="assets/home/images/logo.png" alt="" class="icon-ibunda lazy-load-img">
                     <ul class="link1-masuk" role="tablist">
                        <li role="presentation" dataId="register" class="active"><a class="link1" href="#daftar" id="register" role="tab" data-toggle="tab">DAFTAR</a></li>
                        <li role="presentation" dataId="login"><a class="link1" href="#masuk" id="login" role="tab" data-toggle="tab">MASUK</a></li>
                     </ul>
                  </div>
                  <div class="tab-content">
                     <!--daftar-->
                     <div role="tabpanel" class="daftarBody tab-pane fade in active" id="daftar">
                        <div class="col-xs-12 col-sm-12">
                           <form id="xeformdaftar" role="form" autocomplete="off" method="post">
                              <div class="form-group input-daftar">
                                 <input type="text" name="email" placeholder="Email" required>
                              </div>
                              <hr class="input-email">
                              <div class="form-group input-daftar">
                                 <input type="text" name="username" placeholder="Username" required>
                              </div>
                              <hr class="input-email">
                              <div class="form-group input-daftar">
                                 <input type="text" name="nama_lengkap" value="" placeholder="Nama Lengkap" required>
                              </div>
                              <hr class="input-email">
                              <div class="form-group input-daftar">
                                 <input type="password" name="password" placeholder="Password" required>
                              </div>
                              <hr class="input-email">
                              <div class="form-group input-daftar select-gender">
                                 <select class="pilih-genre" name="image" placeholder="Jenis Kelamin" required>
                                    <option value="">Jenis Kelamin</option>
                                    <option class="inputSelected" value="<?php echo enurl('L');?>" >Pria</option>
                                    <option class="inputSelected" value="<?php echo enurl('P');?>" >Wanita</option>
                                 </select>
                              </div>
                              <hr class="input-email">
                              <br clear="both">
                              <input type="hidden" value="" name="refer_from">
                              <br clear="both" />
                              <div class="col-sm-12 btn-center">
                                 <button type="submit" class="btn btn-oval btn-yellow">DAFTAR</button>
                              </div>
                           </form>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <!--login core/auth/facebook-->
                     <div role="tabpanel" class="daftarBody tab-pane fade" id="masuk">
                        <div class="col-xs-12 col-sm-12">
                           <form id="xeformlogin" role="form" method="post" >
                              <div class="form-group input-daftar">
                                 <input type="text" name="username" placeholder="Email atau Username" data-validation-engine="validate[required]" required>
                                 <!-- <a href="#" class="lupa forgot_password">Lupa ?</a> -->
                              </div>
                              <hr class="input-email">
                              <div class="form-group input-daftar">
                                 <input type="password" name="password" placeholder="Password" data-validation-engine="validate[required]" required>
                                 <!-- <a href="#" class="lupa forgot_password">Lupa ?</a> -->
                              </div>
                              <hr class="input-email">
                              <div class="col-sm-12 btn-center">
                                 <input type="submit" name="submit" class="btn btn-oval btn-yellow" value="Masuk">
                              </div>
                           </form>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end Daftar & Login-->
         <!--End Disable Curhat-->
      </header>
      <div style="display: none;">
         {chatid}
         
         <div id="load_results">

         </div>
      </div>
      
