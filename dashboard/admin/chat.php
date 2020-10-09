<?php include 'include/header.php'; ?>
<div id="scrollHeight">
  
</div>
        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Chat Masuk</h1>
                                <ol class="breadcrumb float-right">
                                    <a href="historychat.php" class="btn btn-primary">History Chat</a>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> User List Chat</h3>
                                </div>
                                <!-- end card-header -->

                                <div class="card-body">
                                  <div id="userlist">
                                    
                                  </div>
                                  <script type="text/javascript">
                                    $(document).ready(function(){
                                      setInterval(function() {
                                        $("#userlist").load("ajax/getmessage.php?list");
                                      }, 1000);
                                    });
                                  </script>
                                   <!-- 
                                   <span class="chat_msg_item " style="max-width: 100%;text-align: center;background: initial;color: #ced9e0;">Tidak ada chat user yang masuk.</span> -->
                                </div>
                                <!-- end card-body -->

                            </div>
                            <!-- end card -->

                        </div>
                        
                        <div class="col-md-9">
                            <div class="card mb-3">
                                <select class="form-control" id="chat_with" style="display: none;">
                                    <?php
                                    if (isset($_GET['id'])) {
                                        if (!empty($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $id = deurl($id);
                                        }else{
                                            $die = 1;
                                        }
                                    }else{
                                        $die = 1;
                                        $id = null;
                                    }
                                    $sql = "SELECT * FROM tbl_user where id='$id' ";
                                    $query = $db->query($sql);
                                    $result = mysqli_fetch_assoc($query);
                                    $row = mysqli_num_rows($query);
                                    if ($row==0) {
                                        $die = 1;
                                    }else{
                                        $die = 0;
                                    }
                                    echo '<option value="'.$result['id'].'">'.$result['nama_lengkap'].'</option>';
                                    $sql_his = "SELECT * FROM tbl_chat where id_user ='$id' order by id desc";
                                    $query_his = $db->query($sql_his);
                                    $result_his = mysqli_fetch_assoc($query_his);
                                    $id_chat = $result_his['id'];
                                  ?>
                                </select>
                                <?php
                                    if ($die==1) {
                                        echo '<div class="card-header">
                                    <div class="text-center"><h3>Live Chat Dengan User</h3></div>
                                </div>
                                <div class="card-body">

                                    <div class="chat_converse" id="chat">
                                        <span class="chat_msg_item " style="max-width: 100%;text-align: center;background: initial;color: #ced9e0;">Silahkan Pilih List User, untuk memulai chat dengan user.</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <table width="100%">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                                <!-- end card -->

                                </div>
                                <!-- end col -->

                                </div>
                                <!-- end row -->

                                </div>
                                <!-- END container-fluid -->

                                </div>
                                <!-- END content -->

                                </div>';
                                include 'include/footer.php';
                                        die();
                                    }

                                ?>
                                <div style="display: none;">
                                  <div id="chat_head"></div>
<div id="chat_detail"></div>
                                </div>                
                                <!-- end card-header -->
                                <div class="card-header">
                                    <table width="100%">
                                        <tr>
                                            <td align="left"><h3><?php echo ucwords(strtolower($result['nama_lengkap'])); ?></h3></td>
                                            <td style="text-align: right;"><h3>Akhiri</h3></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-body">

                                    <div class="chat_converse" id="chat">
                                        <div class="direct-chat-messages" id="message_box"></div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                                <div class="card-footer">
                                    <table width="100%">
                                        <tr>
                                            <td><input class="form-control" type="text" name="message" placeholder="Type Message ..." id="ln" placeholder="Send a message" class="chat_field chat_message"></td>
                                            <td align="center" width="2px;"><button class="btn"><i class="far fa-paper-plane"></i></button></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->
        <div id="template_left_message" style="display: none">
        <span class="chat_msg_item chat_msg_item_user">{message}</span>
        <!-- <span class="status">{time}</span> -->
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript">
        <?php 
          $id_u = $_SESSION['user'];
          $sql_u = "SELECT * FROM tbl_user where id='$id_user' ";
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
         var resp = $('#status_resp').html();
         var pop_up = $('#pop_up').html();
         $(document).ready(function(){
            $.ajax({
          url: 'ajax/submit.php?checkmessagew',
          type: 'POST',
          data: {id_user:uid, to_id:<?php echo deurl($_GET['id']);?>, id_chat:<?php echo $id_chat; ?>},
          success: function(response) {
            obj = JSON.parse(response);
            if (obj['status']==0) {
                  // websocket.send(JSON.stringify(msg));
                  resp = pop_up.replace('{message}', obj['detail']);
                  $('#message_box').append(resp);
              }else if (obj['status']==3) {
                  // resp = resp.replace('{status_resp}', 'efg');
                  $('#message_box').append(obj['detail']);
              }else{
                  $('#message_box').append(obj['detail']);
              }
          }
      });
        });
         
      </script>
<?php include 'include/footer.php'; ?>
<script type="text/javascript">
            //whether the chat window should auto scroll to the bottom to show new messages
            var autoScroll = true;

            function ScrollChat(){
                $('#chat').scrollTop($('#chat')[0].scrollHeight).trigger('scroll');
            }

            //This would be equivalent to the function 
            //that retreives your messages from the server at an interval
            function RefreshMessages(){
                //replace this line with your AJAX function that retrieves messages
                $('#msg-template').clone().appendTo('#chat');
                //put this line in the success/complete function in your AJAX call
                if(autoScroll){ ScrollChat(); }
            }
            setInterval(RefreshMessages, 5);

            ScrollChat();

            $('#chat').on('scroll', function(){
                if($(this).scrollTop() < this.scrollHeight - $(this).height()){
                    autoScroll = false;
                }
                else{
                    autoScroll = true;
                }
            });
        </script>

        <script src="../../js/websocket.js"></script>