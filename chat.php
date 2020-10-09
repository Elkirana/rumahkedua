<?php
session_start();
include 'sys/core.php';
if (isset($_SESSION['user'])) {
  $user_id = $_SESSION['user'];
  $sql_user = "SELECT * FROM tbl_user WHERE id = ".$user_id;
  $run_query = $db->query($sql_user);
  $data_user = mysqli_fetch_assoc($run_query);
  $name = $data_user['nama_lengkap'];
  $picture = '';
  echo $user_id;
}else{
  echo '<script language="javascript">document.location="../index.php";</script>';
  die();
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Chat</title>
      <link rel="stylesheet" href="./style.css">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
   </head>
   <script type="text/javascript">
      $('#chat_with').val();
    </script>
   <body>
    <div id="load_results">
      
    </div>
      
      {chatid}
      <div class="fabs">
         <div class="chat">
            <div class="chat_header">
               <div class="chat_option">
                  <div class="header_img">
                     <!-- <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/> -->
                  </div>
                  <span id="chat_head">Selamat Datang</span> <br><span class="online">Chat Sekarang untuk memulai Obrolan</span>
                  <span id="close" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-close"></i></span>
               </div>
            </div>
            <div id="chat_converse" class="chat_conversion chat_converse">
                <div class="direct-chat-messages" id="message_box">
                </div>
                <div id="chatx"></div>
              <span class="status">&nbsp;</span><br>
            </div>
            <div class="fab_field">
               <a id="fab_send" class="fab"><i class="zmdi zmdi-mail-send"></i></a>
                <!-- <input type="submit" name="submit" class="zmdi zmdi-mail-send"> -->
               <!-- <textarea id="chatSend" name="chat_message" placeholder="Send a message" class="chat_field chat_message"></textarea> -->
               <input type="text" name="message" placeholder="Type Message ..." id="ln" placeholder="Send a message" class="chat_field chat_message">
            </div>
         </div>
         <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
      </div>
      <div id="template_left_message" style="display: none">
        <span class="chat_msg_item chat_msg_item_user">{message}</span>
        <!-- <span class="status">{time}</span> -->
      </div>
      <div id="status_resp" style="display: none;">
        <span id="last_resp" class="chat_msg_item " style="max-width: 100%;text-align: center;background: initial;color: #ced9e0;">{status_resp}</span>
      </div>
      <div id="template_right_message" style="display: none">
        <!-- {name} -->
        <!-- {time} -->
        <!-- {image} -->
        <span class="chat_msg_item chat_msg_item_admin">
          <!-- <div class="chat_avatar">
           <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/>
         </div> -->
         {message}
        <!-- <span class="status2">Just now. Not seen yet</span> -->
       </span>
      </div>
      <div id="pop_up" style="display: none">
        <!-- {name} -->
        <!-- {time} -->
        <!-- {image} -->
        <span id="last_resp" class="chat_msg_item chat_msg_item_admin">
          <!-- <div class="chat_avatar">
           <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/>
         </div> -->
         {message}
        <!-- <span class="status2">Just now. Not seen yet</span> -->
       </span>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript">
         var uid = <?php echo $user_id;?>;
         var websocket_server = 'ws://<?php echo $_SERVER['HTTP_HOST']; ?>:3030?uid='+uid;
         var uname = 'El';
      </script>
      <script>
        $(document).ready(function(){
            setInterval(function() {
                $("#load_results").load("ajax/submit.php?getwebsocket");
            }, 1000);
        });

    </script>
      <script src="js/websocket.js"></script>
      <script type="text/javascript" src="./script.js"></script>
   </body>
</html>