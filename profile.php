<?php include 'include/header.php'; 
if (!isset($_SESSION['user'])) {
   echo '<script language="javascript">document.location="./";</script>';
   include 'include/footer';
   die();
}else{
   echo "";
}
?>
<style type="text/css">
   .chat_converse {
     position: sticky;
     background: #fff;
     margin: 0px 0 0px 0;
     height: 300px;
     min-height: 0;
     font-size: 12px;
     line-height: 18px;
     overflow-y: auto;
     width: 100%;
     float: right;
  }
  .chat_msg_item {
     position: relative;
     margin: 8px 0 15px 0;
     margin-right: 0px;
     margin-bottom: 15px;
     margin-right: 15px;
     margin-bottom: 15px;
     padding: 8px 10px;
     max-width: 60%;
     display: block;
     word-wrap: break-word;
     border-radius: 3px;
     -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
     animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
     clear: both;
     z-index: 999;
  }
  .chat_msg_item_admin {
     margin-left: 20px;
     float: left;
     background: rgba(0, 0, 0, 0.03);
     color: #666;
  }
  .chat_msg_item_user {
    margin-right: 20px;
    float: right;
    background: #2ed2c9;
    color: #eceff1;
    margin-bottom: 1px;
}
</style>
<div id="page">
<section id="main">
   <!--V2-->
   <!-- Breadcrumb -->
   <div class="container">
      <ol class="breadcrumb kata-bunda-atas breadcrumb-ibunda-detail">
         <li><a href="profile.php"><em>profil</em></a></li>
         <li class="active"><em> <?php echo $data_user['nama_lengkap'];?></em></li>
      </ol>
   </div>
   <!--End Breadcrumb-->
   <div class="container profil">
      <div class="col-sm-offset-5 col-sm-2 col-xs-offset-3 col-xs-6 text-center">
         <img src="assets/home/images/c<?php if(deurl($data_user['image'])=="P"){echo "e";}else{echo "o";}?>4.png" class="img-responsive" />
      </div>
      <div class="col-sm-12 col-xs-12 text-center">
         <div class="theme">
            <h3> <?php echo $data_user['nama_lengkap'];?></h3>
         </div>
         <!-- <h5><a class="edit" href="edit">Edit Profil</a></h5> -->
      </div>
   </div>
   <div class="container profil-content">
      <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active"><a href="#curhatku" aria-controls="curhatku" data-toggle="tab">History Chat</a></li>
      </ul>
      <div class="tab-content list-curhatku">
         <div role="tabpanel" id="curhatku" class="tab-pane fade in active">
            
            <?php
               $chatsow = 0;
               if (isset($_GET['chatid'])) {
                  if (!empty($_GET['chatid'])) {
                     $chatid = deurl($_GET['chatid']);
                     $sqlcek = "SELECT * FROM tbl_chat where id='$chatid' and status_chat='selesai' ";
                     $querycek = $db->query($sqlcek);
                     $rowcek = mysqli_num_rows($querycek);
                     if ($rowcek!=0) {
                        $chatsow = 1;
                     }else{
                     }
                  }
               }
               if ($chatsow==0) {
                  $id_x = $data_user['id'];
                  $sql = "SELECT * FROM tbl_chat where id_user='$id_x' and status_chat='selesai' order by tanggal_chat asc ";
                  $query = $db->query($sql);
                  $row = mysqli_num_rows($query);
                  if ($row==0) {
                     echo "<p>Chat Not found</p>";
                  }else{
                     echo '<div class="table-responsive">
                     <table class="table">
                     <tbody>';
                     while ($result=mysqli_fetch_assoc($query)) {
                        echo '<tr>
                        <td>27 Januari 2020</td>
                        <td><a href="?chatid='.enurl($result['id']).'">Detail</a></td>
                        </tr>';
                     }
                     
                     echo '</tbody>
                     </table>
                     </div>';
                  }
               }else{
                  $id_x = $data_user['id'];

                  $resultcek = mysqli_fetch_assoc($querycek);
                  
                  $id_chat = deurl($_GET['chatid']);
                  $sqlchat = "SELECT * FROM chat_history where id_chat='$id_chat' order by id asc ";
                  $querychat = $db->query($sqlchat);
                  $id_tujuan = "";
                  while ($resultchat = mysqli_fetch_assoc($querychat)) {
                     if ($resultchat['id_pengirim']==$id_x) {
                        $id_tujuan .= $resultchat['id_penerima'];
                        break;
                     }
                     if ($resultchat['id_penerima']==$id_x) {
                        $id_tujuan .= $resultchat['id_pengirim'];
                        break;
                     }
                  }

                  $sql_cw = "SELECT * FROM tbl_user where id='$id_tujuan' ";
                  $query_cw = $db->query($sql_cw);
                  $row_cw = mysqli_num_rows($query_cw);
                  if ($row_cw==0) {
                     echo "Chat With UNK User";
                  }else{
                     $result_cw = mysqli_fetch_assoc($query_cw);
                     echo "Chat with ".ucwords($result_cw['nama_lengkap']);
                  }
                  echo '<div class="chat_converse" id="chat">
                  <div class="direct-chat-messages" id="message_box">';
                  echo '<span id="last_resp" class="chat_msg_item chat_msg_item_admin">'.$resultcek['chat_tentang'].'</span>';

                  $sq = "SELECT * FROM chat_history where id_chat='$id_chat' order by id asc ";
                  $qr = $db->query($sq);
                  while ($rez = mysqli_fetch_assoc($qr)) {
                     if ($rez['id_pengirim']==$id_x) {
                        echo '<span id="last_resp" class="chat_msg_item chat_msg_item_admin">'.$rez['isi_chat'].'</span>';
                     }
                     if ($rez['id_penerima']==$id_x) {
                        echo '<span id="last_resp" class="chat_msg_item chat_msg_item_user">'.$rez['isi_chat'].'</span>';
                     }
                  }

                  
                  echo'
                  </div>
                  </div>';
                  echo '<div class="text-center">
                  <a href="./profile.php">Back</a>
                  </div>';
               }
            ?>
            
         </div>
         
      </div>
   </div>
</section>
<!--  #main -->
</div><!-- .wrap < #main -->
<?php include 'include/footer.php'; ?>