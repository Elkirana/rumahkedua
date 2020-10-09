<!--Footer-->

<div class="footer-position">
  <?php
  if (!isset($_SESSION['user'])) {
    echo "";
  }else{


    ?>
    <div class="fabs">
     <div class="chat">
      <div class="chat_header">
       <div class="chat_option">
        <div class="header_img">
         <!-- <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/> -->
       </div>
       <span id="chat_head">Selamat Datang</span> <br><span class="online" id="chat_detail">Chat Sekarang untuk memulai Obrolan</span>
       <!-- <span id="close" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-close"></i></span> -->
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
           <script type="text/javascript">
            <?php
            $id_u = $_SESSION['user'];
            $sql_u = "SELECT * FROM tbl_user where id='$id_u' ";
            $query_u = $db->query($sql_u);
            $row_u = mysqli_num_rows($query_u);
            if ($row_u==0) {
              $uid_u = 0;
              $u_name = null;
            }else{
              $result_u = mysqli_fetch_assoc($query_u);
              $uid_u = $result_u['id'];
              $u_name = $result_u['nama_lengkap'];
            }
            ?>
            var uid = <?php echo $uid_u;?>;
            var websocket_server = 'ws://<?php echo $_SERVER['HTTP_HOST']; ?>:3030?uid='+uid;
            var uname = '<?php echo $u_name;?>';
          </script>
          <script>
           $(document).ready(function(){
             setInterval(function() {
               $("#load_results").load("ajax/submit.php?getwebsocket");
             }, 1000);
           });

         </script>
         <script src="js/websocket.js"></script>
       <?php } ?>
       <div class="footer">
        <div class="container">
         <div class="col-md-12 text-center footer-text">
          Made with love in Indonesia by &copy; elkirana <?php echo date('Y');?>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
   $(document).ready(function() {

     $('.navbar-toggle').click(function(e) {
       e.preventDefault();
       $('.navbar-mobile').slideToggle();
     });

     $('.carousel').on('slid.bs.carousel', function () {
       var listItem = $('.image-width-slider').find('.item');
       var itemActive = $('.image-width-slider').find('.active');
       var carouselLink = $('.carousel-link').find('li');
       var currentSlide = $('.image-width-slider').find('.item').index(itemActive);

       carouselLink.removeClass('active');
       $('.carousel-link').find('div.judul-kata-bunda-slider').hide();
       carouselLink.eq(currentSlide).addClass('active');
       $('.carousel-link').find('.active div.judul-kata-bunda-slider').show();
     });
             // link slider
             var linkSlider = $('.judul-kata-bunda-slider').find('a');
             linkSlider.click(function() {
               // alert($(this).attr('href'));
               window.location.href = $(this).attr('href');
             });
           });
         </script>
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
         <script src="js/jquery.min.js"></script>

         <script type="text/javascript" src="./script.js"></script>
         <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
         <script type="text/javascript">
          $(document).ready(function(){
            $('#xeformlogin').on('submit',function(e) {  //Don't foget to change the id form
              $.ajax({
                url:'ajax/user.php?login',
                data:$(this).serialize(),
                type:'POST',
                success:function(response){
                  obj = JSON.parse(response);
                        //Success Message == 'Title', 'Message body', Last one leave as it is
                        if (obj['status']!=1) {
                          Swal.fire({
                            title: obj['title'],
                            text: obj['detail'],
                            type: 'error'
                          });
                        }else{
                          location.reload();
                        }
                      },
                      error:function(data){
                        //Error Message == 'Title', 'Message body', Last one leave as it is
                        //"Oops...", "Something went wrong :(", "error"
                        swal({title: "Oops...", text: "Something went wrong :(", type: "error"},);
                      }
                    });
                e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
                return false;
              });
          });
          $(document).ready(function(){
            $('#xeformdaftar').on('submit',function(e) {  //Don't foget to change the id form
              $.ajax({
                url:'ajax/user.php?daftar',
                data:$(this).serialize(),
                type:'POST',
                success:function(response){
                  obj = JSON.parse(response);
                        //Success Message == 'Title', 'Message body', Last one leave as it is
                        if (obj['status']!=1) {
                          Swal.fire({
                            title: obj['title'],
                            text: obj['detail'],
                            type: 'error'
                          });
                        }else{
                          Swal.fire({
                            type: 'success',
                            title: 'Selamat anda berhasil mendaftar',
                            text: 'Anda dapat berkonsultasi dengan sistem livechat kami dengan login menggunakan akun anda yang telah didaftarkan.'
                          }).then((result) => {
                                // Reload the Page
                                location.reload();
                              });
                        }
                      },
                      error:function(data){
                        //Error Message == 'Title', 'Message body', Last one leave as it is
                        //"Oops...", "Something went wrong :(", "error"
                        swal({title: "Oops...", text: "Something went wrong :(", type: "error"},);
                      }
                    });
                e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
                return false;
              });
          });
        </script>
        <script>
          $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
            }
            return false;
          });
    });
  </script>
</body>
</html>