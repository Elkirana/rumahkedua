<?php include 'include/header.php'; ?>
<div id="page">
<section id="main">
   <?php
      if (isset($_GET['id'])) {
         if (!empty($_GET['id'])) {
            $id_post = $_GET['id'];
         }else{
            $id_post = '';
         }
      }else{
         $id_post = '';
      }

      if (!empty($id_post)) {
         $id_post = deurl($id_post);
         // echo $id_post;
         $sql = "SELECT * FROM tbl_post where id='$id_post' ";
         $query = $db->query($sql);
         $row = mysqli_num_rows($query);
         if ($row==0) {
            echo '<div class="c404">
      <p class="h404">404</p>
      <p><span class="h403">Maaf Halaman Yang Anda </span><br><span class="det404">Cari Tidak Ada</span></p>
   </div>';
         }else{
            $result = mysqli_fetch_assoc($query);
            $id_kategori = $result['id_kategori'];
            $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
            $qeury_cat1 = $db->query($sql_cat1);
            $row_cat1 = mysqli_num_rows($qeury_cat1);
            if ($row_cat1==0) {
               $kategori = "Null";
               $cat = '';
            }else{
               $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
               $kategori = $result_cat1['nama_kategori'];
               $cat = enurl($result_cat1['id']);
            }
            $id_user = $result['id_user'];

            $sql_user1 = "SELECT * FROM tbl_user where id = '$id_user' ";
            $qeury_user1 = $db->query($sql_user1);
            $row_user1 = mysqli_num_rows($qeury_user1);
            if ($row_user1==0) {
               $nama_user1 = "Unknown";
            }else{
               $result_user1 = mysqli_fetch_assoc($qeury_user1);
               $nama_user1 = $result_user1['nama_lengkap'];
            }
            echo '<div class="container">
         <ol class="breadcrumb kata-bunda-atas breadcrumb-ibunda-detail">
            <li><a href="artikel.php"><em>Artikel</em></a></li>
            <li><a href="artikel.php?categori='.$cat.'"><em>'.$kategori.'</em></a></li>
            <li class="active"><a href="#"><em>'.$result['judul_post'].'</em></a></li>
         </ol>
      </div>
      <!-- end breadcrumb ibunda -->
      <!--Title Slide-->
      <div class="container">
         <div class="kata-bunda-detail-image" style="background: url(assets/home/images/uploads/'.$result['gambar_post'].');">
            <div class="container">
               <div class="judul-kata-bunda-detail">
                  <span class="kategori"> '.$kategori.' </span>          
                  <h1>'.$result['judul_post'].'</h1>
                  <span class="publish"><em>Oleh</em><b> '.$nama_user1.' </b></span>
               </div>
            </div>
         </div>
      </div>
      <!--End Title Slide-->
      <!--Container-->
      <div class="container content-bunda sm-kata-bunda-detail">
         <div>
            <!--Left Content-->
            <div class="col-md-12 block-komentar">
               <div class="media-curhat" id="detailcurhat">
                  <p><span style="font-weight: 400;">'.$result['isi_post'].'</p>
                  <p><strong>&nbsp;</strong></p>
                  <p><br /><br /><br /><br /><br /></p>
                  </p>
               </div>
               <hr>
            </div>
            <!--End Left Content-->
         </div>
      </div>';
         }
      }else{
         echo '<div class="c404">
      <p class="h404">404</p>
      <p><span class="h403">Maaf Halaman Yang Anda </span><br><span class="det404">Cari Tidak Ada</span></p>
   </div>';
      }
   ?>
<!-- End Container -->
</section><!--  #main -->
</div><!-- .wrap < #main -->
<?php include 'include/footer.php'; ?>