var websocket = false;
var js_flood = 0;
var status_websocket = 0;
$(document).ready(function() {
    start(websocket_server);
});
function scrolldiv() {
    $("#chat_converse").prop({
        scrollTop: $("#chat_converse").prop("scrollHeight")
    })
}
function waitForSocketConnection(socket, callback){
    setTimeout(
        function () {
            if (socket.readyState === 1) {
                if(callback != null){
                    callback();
                }
                return;

            } else {

                waitForSocketConnection(socket, callback);
            }

            }, 5); // wait 5 milisecond for the connection...
}
// function scrollToBottom(){
//   const messages = document.getElementById('chatx');
//   const messagesid = document.getElementById('chat_converse');  
//   messages.scrollTop = messagesid.offsetTop;
// }
function start(websocketServerLocation){
    websocket = new WebSocket(websocketServerLocation);
    websocket.onopen = function(ev) {
            //console.log(ev);
            status_websocket = 1;
        };
        $('#ln').keypress(function( event ) {
            if ( event.which == 13 || event.keyCode == 13 ) {
                var mymessage = $(this).val(); //get message text
                var myname = uname; //get user name
                var resp = $('#status_resp').html();
                if ( mymessage.length > 0 ) {
                    if ( js_flood == 0 ) {
                        var to_id = $('#chat_with').val();
                        var to_name = $('#chat_with option[value="'+to_id+'"]').text();
                        var msg = {
                            message: mymessage,
                            name: myname,
                            uid: uid,
                            to_id: to_id,
                            to_name: to_name
                        };

                        $.ajax({
                            url: 'ajax/submit.php?checkstatus',
                            type: 'POST',
                            data: {id : 1, to_id: to_id, uid: uid, message:mymessage},

                            success: function(response) {
                                obj = JSON.parse(response);
                                //Success Message == 'Title', 'Message body', Last one leave as it is
                                if (obj['status']==1) {
                                    websocket.send(JSON.stringify(msg));
                                }else if (obj['status']==3) {
                                    
                    // 
                                    websocket.send(JSON.stringify(msg));
                                    // console.log('asdasd');
                                }else{
                                    resp = resp.replace('{status_resp}', obj['detail']);
                                    $('#message_box').append(resp);
                                }
                            }
                        });
                        
                        flood_js();
                    } else {
                        $('#ln').val('');
                    }
                }
                var obj = document.getElementById('ln');
                obj.value = '';
                obj.focus();
                event.preventDefault();
            }
        });
        $(document).on("click","input[id='ln']", function(){             
            var to_id = $('#chat_with').val();
            var msg = {
                seen: 'read',
                uid: uid,
                to_id: to_id
            };
            websocket.send(JSON.stringify(msg));
            flood_js();
        });
        $('input[type=submit]').click(function() {
            // alert('assd');
            var mymessage = document.getElementById("ln").value;
            var myname = uname; //get user name
            if ( mymessage.length > 0 ) {
                if ( js_flood == 0 ) {
                    var to_id = $('#chat_with').val();
                    var to_name = $('#chat_with option[value="'+to_id+'"]').text();
                    var msg = {
                        message: mymessage,
                        name: myname,
                        uid: uid,
                        to_id: to_id,
                        to_name: to_name
                    };
                    websocket.send(JSON.stringify(msg));
                    flood_js();
                } else {
                    $('#ln').val('');
                }
            }
            var obj = document.getElementById('ln');
            obj.value = '';
            obj.focus();
            event.preventDefault();

        });


        // scrollToBottom();
        websocket.onmessage = function(ev) {
            // console.log(ev.data);
            var msg = JSON.parse(ev.data); //PHP sends Json data
            var umsg = msg.message; //message text
            var name = msg.name; //user name
            var timemsg = msg.timemsg;
            var user_image = msg.user_image;
            var log_send = msg.receive;
            console.log(name);
            
            var resp = $('#status_resp').html();
            var to_id = $('#chat_with').val();

            if ( name != uname ) {
                //If the sender of the message is another user
                var template_message = $('#template_right_message').html();
                // var tem_name = $('#namanya').html();
                document.getElementById("chat_head").innerHTML = name;
                document.getElementById("chat_detail").innerHTML = 'Obrolan Dimulai';
            } else {
                var template_message = $('#template_left_message').html();
                // document.getElementById("chat_head").innerHTML = 'asd';
                // document.getElementById("chat_detail").innerHTML = 'Obrolan Dimulaix';
            }
            var message = template_message.replace('{name}', name);
            message = message.replace('{time}', timemsg);
            message = message.replace('{message}', umsg);
            if ( user_image != null && user_image != '' ){
                message = message.replace('{image}', '<img class="direct-chat-img" src="img/'+user_image+'" alt="Message User Image">');
            }else{
                message = message.replace('{image}', '');
            }
            
            $.ajax({
              url: 'ajax/submit.php?checkmessage',
              type: 'POST',
              data: {id_user : to_id, to_id:uid},

              success: function(response) {
                obj = JSON.parse(response);
                if (obj['status']==1) {
                    if (log_send == 'send') { 
                        $('#message_box').append(message);
                        resp = resp.replace('{status_resp}', 'Harap tunggu, Kami akan merespond pesan anda.');
                        $('#message_box').append(resp);
                    }
                }
                if (obj['status']==3) {
                    $('#message_box').append(message);
                }
              }
            });
            scrolldiv();
        };

        websocket.onclose = function(ev){
            if ( status_websocket === 1 ) {
                status_websocket = 0;
            }
            setTimeout(function(){start(websocketServerLocation)}, 1000);
        };
        websocket.onerror = function(ev) {
            console.log('Error '+JSON.stringify(ev));
        };
    }

    function flood_js() {
        var interval_flood = setInterval(function() {
            if ( js_flood == 0 ) {
                js_flood = 1;
            } else {
                js_flood = 0;
                clearInterval(interval_flood);
            }
        }, 300);
    }
