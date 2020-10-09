<?php include 'include/header.php'; ?>
      <div id="page">
      <section id="main">
      <!--V2-->
      <!-- NAV SUB MENU -->
      <div class="nav-sub-menu hidden-xs">
         <div class="container">
            <div class="sub-menu">
               <ul class="nav nav-tabs " role="tablist" id="categori">
                  <?php
                     $sql_cat = "SELECT * FROM tbl_kategori ";
                     $qeury_cat = $db->query($sql_cat);
                     echo '<li role="semua" class=""><a href="artikel.php">Semua</a></li>';
                     while ($result_cat = mysqli_fetch_assoc($qeury_cat)) {
                        echo '<li role="'.enurl($result_cat['id']).'" class=""><a href="artikel.php?categori='.enurl($result_cat['id']).'">'.ucwords(strtolower($result_cat['nama_kategori'])).'</a></li>';
                     }

                  ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- END NAV SUB MENU -->
      <!--Slider-->
      <div class="slideBanner">
         <div class="header_banner">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
               <?php
               $listcarousel = '';
               $listjudul = '';
               $listbanner = '';

               $slide = '<!-- Indicators -->
               <ol class="carousel-indicators">
                  {listcarousel}
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner image-width-slider" role="listbox">
                  <ul class="container carousel-link">
                     {listjudul}
                  </ul>
                  {listbanner}';
              
               $sql_slide = "SELECT * FROM tbl_post where status_slider ='1'";
               $query_slide = $db->query($sql_slide);
               $row_slide = mysqli_num_rows($query_slide);
               $no = 0;
               if ($row_slide==0) {
                  $sql_slide = "SELECT * FROM tbl_post where status_slider ='0' order by tanggal_post desc ";
                  $query_slide = $db->query($sql_slide);
                  while ($result_slide = mysqli_fetch_assoc($query_slide)) {
                     if ($no>=3) {
                        break;
                     }
                     $id_kategori = $result_slide['id_kategori'];
                     $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                     $qeury_cat1 = $db->query($sql_cat1);
                     $row_cat1 = mysqli_num_rows($qeury_cat1);
                     if ($row_cat1==0) {
                        $kategori = "Semua";
                     }else{
                        $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
                        $kategori = $result_cat1['nama_kategori'];
                     }
                     $id_user = $result_slide['id_user'];

                     $sql_user1 = "SELECT * FROM tbl_user where id = '$id_user' ";
                     $qeury_user1 = $db->query($sql_user1);
                     $row_user1 = mysqli_num_rows($qeury_user1);
                     if ($row_user1==0) {
                        $nama_user1 = "Unknown";
                     }else{
                        $result_user1 = mysqli_fetch_assoc($qeury_user1);
                        $nama_user1 = $result_user1['nama_lengkap'];
                     }

                     if ($no>=1) {
                        $active = '';
                     }else{
                        $active = ' active';
                     }
                     $judul = $result_slide['judul_post'];
                     if (strlen($judul)>=55) {
                        $judul = substr($judul, 0, 51)." ...";

                     }else{
                        $judul = $judul;
                     }
                     $subjudul = substr($result_slide['isi_post'], 0, 81)." ...";

                     $listbanner_template ='<div class="item'.$active.'">
<img  class=" item lazy-load-img" src="assets/home/images/uploads/'.$result_slide['gambar_post'].'">
                     <div class="carousel-caption">
                     <div class="posit text-left">
                     <p class="cat">'.$kategori.'</p>
                     <a id="pub2" href="post.php?id='.enurl($result_slide['id']).'">
                     <h1 class="catj">'.$judul.'</h1>
                     </a>
                     <p class="pub1 publish"><em>oleh</em><b> '.$nama_user1.'</b></p>
                     </div>
                     </div></div>';
                     $listcarousel .= "<li data-target=\"#myCarousel\" data-slide-to=\"".$no."\"></li>\n";
                     // $listjudul = str_replace('{judul}', $judul, $listjudul_template);
                     $listjudul_template = '<li data-target="#myCarousel" data-slide-to="'.$no.'" class="">
                     <a href="post.php?id='.enurl($result_slide['id']).'" class="hidden-xs hidden-sm">
                     <p>'.$subjudul.'</p>
                     </a>
                     </li>';
                     $listjudul .= $listjudul_template;
                     $listbanner .= $listbanner_template;
                     $no++;
                  }
               }else{
                  while ($result_slideok = mysqli_fetch_assoc($query_slide)) {
                     $sql_slide = "SELECT * FROM tbl_post where status_slider ='1' order by tanggal_post desc ";
                     $query_slide = $db->query($sql_slide);
                     while ($result_slide = mysqli_fetch_assoc($query_slide)) {
                        if ($no>=3) {
                           break;
                        }
                        $id_kategori = $result_slide['id_kategori'];
                        $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                        $qeury_cat1 = $db->query($sql_cat1);
                        $row_cat1 = mysqli_num_rows($qeury_cat1);
                        if ($row_cat1==0) {
                           $kategori = "Semua";
                        }else{
                           $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
                           $kategori = $result_cat1['nama_kategori'];
                        }
                        $id_user = $result_slide['id_user'];

                        $sql_user1 = "SELECT * FROM tbl_user where id = '$id_user' ";
                        $qeury_user1 = $db->query($sql_user1);
                        $row_user1 = mysqli_num_rows($qeury_user1);
                        if ($row_user1==0) {
                           $nama_user1 = "Unknown";
                        }else{
                           $result_user1 = mysqli_fetch_assoc($qeury_user1);
                           $nama_user1 = $result_user1['nama_lengkap'];
                        }

                        if ($no>=1) {
                           $active = '';
                        }else{
                           $active = ' active';
                        }
                        $judul = $result_slide['judul_post'];
                        if (strlen($judul)>=55) {
                           $judul = substr($judul, 0, 51)." ...";

                        }else{
                           $judul = $judul;
                        }
                        $subjudul = substr($result_slide['isi_post'], 0, 81)." ...";

                        $listbanner_template ='<div class="item'.$active.'">
   <img  class=" item lazy-load-img" src="assets/home/images/uploads/'.$result_slide['gambar_post'].'">
                        <div class="carousel-caption">
                        <div class="posit text-left">
                        <p class="cat">'.$kategori.'</p>
                        <a id="pub2" href="post.php?id='.enurl($result_slide['id']).'">
                        <h1 class="catj">'.$judul.'</h1>
                        </a>
                        <p class="pub1 publish"><em>oleh</em><b> '.$nama_user1.'</b></p>
                        </div>
                        </div></div>';
                        $listcarousel .= "<li data-target=\"#myCarousel\" data-slide-to=\"".$no."\"></li>\n";
                        // $listjudul = str_replace('{judul}', $judul, $listjudul_template);
                        $listjudul_template = '<li data-target="#myCarousel" data-slide-to="'.$no.'" class="">
                        <a href="post.php?id='.enurl($result_slide['id']).'" class="hidden-xs hidden-sm">
                        <p>'.$subjudul.'</p>
                        </a>
                        </li>';
                        $listjudul .= $listjudul_template;
                        $listbanner .= $listbanner_template;
                        $no++;
                     }
                  }
                  if ($row_slide<=2) {
                     $sql_slide = "SELECT * FROM tbl_post where status_slider ='0' order by tanggal_post desc ";
                     $query_slide = $db->query($sql_slide);
                     while ($result_slide = mysqli_fetch_assoc($query_slide)) {
                        if ($no>=3) {
                           break;
                        }
                        $id_kategori = $result_slide['id_kategori'];
                        $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                        $qeury_cat1 = $db->query($sql_cat1);
                        $row_cat1 = mysqli_num_rows($qeury_cat1);
                        if ($row_cat1==0) {
                           $kategori = "Semua";
                        }else{
                           $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
                           $kategori = $result_cat1['nama_kategori'];
                        }
                        $id_user = $result_slide['id_user'];

                        $sql_user1 = "SELECT * FROM tbl_user where id = '$id_user' ";
                        $qeury_user1 = $db->query($sql_user1);
                        $row_user1 = mysqli_num_rows($qeury_user1);
                        if ($row_user1==0) {
                           $nama_user1 = "Unknown";
                        }else{
                           $result_user1 = mysqli_fetch_assoc($qeury_user1);
                           $nama_user1 = $result_user1['nama_lengkap'];
                        }

                        if ($no>=1) {
                           $active = '';
                        }else{
                           $active = ' active';
                        }
                        $judul = $result_slide['judul_post'];
                        if (strlen($judul)>=55) {
                           $judul = substr($judul, 0, 51)." ...";

                        }else{
                           $judul = $judul;
                        }
                        $subjudul = substr($result_slide['isi_post'], 0, 81)." ...";

                        $listbanner_template ='<div class="item'.$active.'">
   <img  class=" item lazy-load-img" src="assets/home/images/uploads/'.$result_slide['gambar_post'].'">
                        <div class="carousel-caption">
                        <div class="posit text-left">
                        <p class="cat">'.$kategori.'</p>
                        <a id="pub2" href="post.php?id='.enurl($result_slide['id']).'">
                        <h1 class="catj">'.$judul.'</h1>
                        </a>
                        <p class="pub1 publish"><em>oleh</em><b> '.$nama_user1.'</b></p>
                        </div>
                        </div></div>';
                        $listcarousel .= "<li data-target=\"#myCarousel\" data-slide-to=\"".$no."\"></li>\n";
                        // $listjudul = str_replace('{judul}', $judul, $listjudul_template);
                        $listjudul_template = '<li data-target="#myCarousel" data-slide-to="'.$no.'" class="">
                        <a href="post.php?id='.enurl($result_slide['id']).'" class="hidden-xs hidden-sm">
                        <p>'.$subjudul.'</p>
                        </a>
                        </li>';
                        $listjudul .= $listjudul_template;
                        $listbanner .= $listbanner_template;
                        $no++;
                     }
                  }
               }
               $slide = str_replace('{listcarousel}', $listcarousel, $slide);
               $slide = str_replace('{listjudul}', $listjudul, $slide);
               $slide = str_replace('{listbanner}', $listbanner, $slide);
               
               echo $slide;
               ?>
               
                  <!-- Controls -->
                  <a class="left carousel-control hidden-xs hidden-sm" href="#myCarousel" role="button" data-slide="prev" style="left:-15px;">
                  <span class="prevBut" aria-hidden="true"><img src="assets/home/images/kiri.png"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control hidden-xs hidden-sm" href="#myCarousel" role="button" data-slide="next" style="right:15px;">
                  <span class="nextBut" aria-hidden="true"><img src="assets/home/images/kanan.png"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      <!--End Slider-->
      <!--Artikel Pilihan-->
      <div class="container">
         <!-- Begin Content -->      
         <div class="gallery-top ">
            <?php
               if (isset($_GET['categori'])) {
                  $id_kategori = deurl($_GET['categori']);
                  $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                  $qeury_cat1 = $db->query($sql_cat1);
                  $row_cat1 = mysqli_num_rows($qeury_cat1);
                  if ($row_cat1==0) {
                     $kategori = "Artikel Terbaru";
                     $where = "";
                  }else{
                     $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
                     $kategori = $result_cat1['nama_kategori'];
                     $where = "where id_kategori='$id_kategori' ";
                  }
               }else{
                  $kategori = "Artikel Terbaru";
                  $where = "";
               }
            ?>
            <h2><?php echo $kategori; ?></h2>
            <img data-src="assets/home/images/Shape.png" class="img-responsive lazy-load-img">
         </div>
         <div id="horizontalTab" class="curhat-tabs-menu">
            <ul id="index" class="curhat-tabs-list hidden-xs">
               <?php
               $sql_cat = "SELECT * FROM tbl_kategori ";
               $qeury_cat = $db->query($sql_cat);
               echo '<li role="semua" class=""><a href="artikel.php">Semua</a></li>
               ';
               while ($result_cat = mysqli_fetch_assoc($qeury_cat)) {
                  echo '
               <li>|</li>
               <li role="'.enurl($result_cat['id']).'" class=""><a href="artikel.php?categori='.enurl($result_cat['id']).'">'.ucwords(strtolower($result_cat['nama_kategori'])).'</a></li>';
               }
               ?>
            </ul>
            <div class="nav-sub-mobile visible-xs curhat_tabs">
               <div class="form-group col-xs-12">
                  <select id="dynamic_select" class="pilih-genre form-control select-category">
                     <?php
                     $sql_cat = "SELECT * FROM tbl_kategori ";
                     $qeury_cat = $db->query($sql_cat);
                     echo '<option value="artikel.php">Semua</option>
                     ';
                     while ($result_cat = mysqli_fetch_assoc($qeury_cat)) {
                        echo '
                        <option value="artikel.php?categori='.enurl($result_cat['id']).'">'.ucwords(strtolower($result_cat['nama_kategori'])).'</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <!-- Curhat tabs konten -->
        <!-- sorting box -->
         <div class="curhat-tabs-container">
            <div class="tab-1 artikel-content">
               <?php
                  $sql_post = "SELECT * FROM tbl_post ".$where;
                  $query_post = $db->query($sql_post);
                  $no = 0;
                  while ($result_post = mysqli_fetch_assoc($query_post)) {
                     $no++;
                     $id_kategori = $result_post['id_kategori'];
                     $sql_cat1 = "SELECT * FROM tbl_kategori where id = '$id_kategori' ";
                     $qeury_cat1 = $db->query($sql_cat1);
                     $row_cat1 = mysqli_num_rows($qeury_cat1);
                     if ($row_cat1==0) {
                        $kategori = "Semua";
                        $id_kategori = '';
                     }else{
                        $result_cat1 = mysqli_fetch_assoc($qeury_cat1);
                        $kategori = $result_cat1['nama_kategori'];
                        $id_kategori = enurl($result_cat1['id']);
                     }
                     $id_user = $result_post['id_user'];

                     $sql_user1 = "SELECT * FROM tbl_user where id = '$id_user' ";
                     $qeury_user1 = $db->query($sql_user1);
                     $row_user1 = mysqli_num_rows($qeury_user1);
                     if ($row_user1==0) {
                        $nama_user1 = "Unknown";
                     }else{
                        $result_user1 = mysqli_fetch_assoc($qeury_user1);
                        $nama_user1 = $result_user1['nama_lengkap'];
                     }
                     echo '<div class="list-articles col-xs-12 col-sm-4">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <div class="back-post-kategori">
                           <a class="post-kategori" href="artikel.php?categori='.$id_kategori.'">'.$kategori.'</a>
                        </div>
                        <a class="link-post-detail" hhref="post.php?id='.enurl($result_post['id']).'""><div class="list-image lazy-load-img" style="background: url(assets/home/images/uploads/'.$result_post['gambar_post'].');"></div></a>
                     </div>
                     <div class="panel-footer">
                        <h4 class="title-articles"><a class="link-post-detail" href="post.php?id='.enurl($result_post['id']).'">'.$result_post['judul_post'].'</a></h4>
                        <div class="media">
                           <div class="media-body media-icon">
                              <div class="post-media-user pull-left">
                                 <em>oleh</em><strong> '.$nama_user1.'</strong>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>';
                     if ($no>=6) {
                        break;
                     }
                  }
               ?>
               <div class="clearfix"></div>
            </div>
            <!-- <div class="btn-center hidden-xs">
               <a href="ajax/getpost.php"><button class="loadMore btn">Lainnya</button></a>
            </div>
            <div class="btn-center visible-xs">
               <a href="ajax/getpost.php"><button class="btn-more-long btn-oval-more">Lainnya</button></a>
            </div> -->
         </div>
          </div>
         
      </div>
      <!--End Artikel Pilihan-->
      <!--Curhat disini-->
      <!-- <div class="main-banner">
         <h2 class="hidden-xs">Mau  Curhat Sama  Bunda?</h2>
         <div class="visible-xs mau-curhat"><img src="assets/home/images/mau-curhat-1.png"></div>
         <div class="btn-center">
           <button class="btn-curhat-disini btn" id="curhatDisini" >CURHAT DISINI</button>
         
         </div>
         </div> -->
      <!--End Curhat disini-->
      <?php include 'include/footer.php'; ?>
      