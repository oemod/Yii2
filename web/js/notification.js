var socket = io.connect('http://localhost:8891');
socket.on('notification', function (data) {
    var message = JSON.parse(data);
    $("#list_message_" + message.user_send + '_' + message.user_id).attr("id", 'list_message_' + message.user_id + '_' + message.user_send);
    if (auth != $("#user_" + message.user_id).val() && auth == message.user_id) {
        chatSocket.chatBox(message.user_id, message.username_send, message.img, message.user_send, message.username_send, message.img_send);
    }
    if (message.user_id + '_' + auth != message.rooms) {
        if (message.auth == message.user_id) {
            var html = '<li>';
            html += '<a href="#">';
            html += '<img src="' + message.img + '">';
            html += '</a>';
            html += '<div class="chat-message-text">';
            html += '<span class="arrowtop"></span>' + message.message;
            html += '<span class="arrowtop-left"></span>';
            html += '</div>';
            html += '</li>';
        } else {
            var html = '<li>';
            html += '<a href="#">';
            html += '<img src="' + message.img_send + '">';
            html += '</a>';
            html += '<div class="chat-message-text">';
            html += '<span class="arrowtop"></span>' + message.message;
            html += '<span class="arrowtop-left"></span>';
            html += '</div>';
            html += '</li>';
        }
        $("#list_message_" + message.user_id + '_' + message.user_send).append(html);
    } else {
        chatSocket.playSoundMessage();
        $("#list_message_" + message.user_id + '_' + message.user_send).append('<li><div class="chat-message-send">' + message.message + '</div></li>');
    }
    chatSocket.updateScroll("#list_message_" + message.user_id + '_' + message.user_send);
    chatSocket.updateLimit(message.user_id,message.user_send,1);
});

var chatSocket = {
    newsRoom: function (user_id, username, img, user_send, username_send, img_send) {
        socket.emit('switchRoom', user_id + '_' + user_send);
        chatSocket.chatBox(user_id, username, img, user_send, username_send, img_send);
        //var getChatroom='';
        //getChatroom= jQuery.parseJSON(data);
        //
        //var value={
        //    "authChat":[
        //        {"user_id":user_id, "username":username,"img":img, "user_send":user_send,"username_send":username_send, "img_send":img_send},
        //    ]
        //}
        //console.log(value.authChat);
        ///*getChatroom.push(value);*/
        //cookie.setCookie(auth, JSON.stringify(value),1);


    },
    chatBox: function (user_id, username, img, user_send, username_send, img_send) {
        if ($("#rooms_" + user_id + '_' + user_send).val() != user_id + '_' + user_send && $("#rooms_" + user_send + '_' + user_id).val() != user_send + '_' + user_id) {
            var html = '<div class="rooms">';
            html += '<div class="rooms-titie"><i class="fa text-success"></i>' + username + '';
            html += '<button class="btn btn-default close-rooms" type="button" onclick="chatSocket.closRoom(this)">';
            html += '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
            html += '</button>';
            html += '</div>';
            html += '<ul onscroll="chatSocket.historyMessages(\'' + user_id + '\',\'' + user_send + '\')" class="list_message" id="list_message_' + user_id + '_' + user_send + '">';
            html += '</ul>';
            html += '<form action="javascript:chatSocket.SendMessages(\'' + user_id + '\',\'' + user_send + '\')" method="post" id="form_message_' + user_id + '_' + user_send + '">';
            html += '<input type="hidden" name="rooms" id = "rooms_' + user_id + '_' + auth + '" value="' + user_id + '_' + auth + '" > ';
            html += '<input type="hidden" name="user_id" class = "user_id" id="user_' + user_id + '" value="' + user_id + '" > ';
            html += '<input type="hidden" name="username"  class = "rooms_username" value="' + username + '" > ';
            html += '<input type="hidden" name="user_send" class = "rooms_user_send" value="' + user_send + '" > ';
            html += '<input type="hidden" name="img"  class = "rooms_img" value="' + img + '" > ';
            html += '<input type="hidden" name="img_send" class = "rooms_img_send" value="' + img_send + '" > ';
            html += '<input type="hidden" name="username_send" class = "rooms_username_send" value="' + username_send + '" > ';
            html += '<input type="hidden" name="limit" class = "rooms_limit" id="limit_' + user_id + '_' + user_send +  '" value="0" > ';
            html += '<input type="text" onkeydown="chatSocket.watched(\''+user_id+'\',\''+user_send+'\')" class = "messages" name="messages" id="messages_' + user_id + '_' + user_send + '" value="" > ';
            html += '<input type="hidden" name="auth" class = "auth" value="' + auth + '" > ';
            html += '</form>';
            html += '</div>';
            $('.rooms-chat').append(html);
            chatSocket.loadMessages(user_id, user_send);
        }
    },

    closeBoxChat: function () {
        $('.media-list-contacts').hide();
        $('#chatdelete').hide();
        $('.input-search-contact').hide();
        $('.sidebar-title').hide();
    },

    openBoxChat: function () {
        $('.media-list-contacts').show();
        $('#chatdelete').show();
        $('.input-search-contact').show();
        $('.sidebar-title').show();
    },

    closRoom: function (my) {
        $(my).parents('.rooms').remove();
    },

    SendMessages: function (user_id, user_send) {
        $.ajax({
            type: "POST",
            url: "/fontend/chat/chat",
            cache: false,
            data: $('form#form_message_' + user_id + '_' + user_send).serialize(),
            success: function (result) {
                $("#messages_" + user_id + '_' + user_send).val("");
            }
        });
    },

    updateScroll: function (id) {
        $(id).scrollTop($(id)[0].scrollHeight);
    },

    loadMessages: function (user_id, user_send) {
        $.ajax({
            type: "GET",
            url: "/fontend/chat/messages?user_id=" + user_id + "&user_send=" + user_send,
            cache: false,
            dataType: "json",
            success: function (result) {
                var html = '';
                var img = result.avartar;
                $.each(result.messages, function (index, value) {
                    if (auth == value['user_id']) {
                        html += '<li>';
                        html += '<a href="#">';
                        html += '<img src="' + img[value['user_send']] + '">';
                        html += '</a>';
                        html += '<div class="chat-message-text">';
                        html += '<span class="arrowtop"></span>';
                        html += '<span class="arrowtop-left"></span>' + value['messages'];
                        html += '</div>';
                        html += '</li>';
                    } else {
                        html += '<li>';
                        html += '<div class="chat-message-send">' + value['messages'];
                        html += '</div>';
                        html += '</li>';
                    }
                });
                $("#list_message_" + user_id + '_' + user_send).append(html);
                chatSocket.updateScroll("#list_message_" + user_id + '_' + user_send);
            }
        });
    },

    loadMore: function (user_id, user_send) {
        var limit = $("#limit_" + user_id + '_' + user_send ).val();
        $.ajax({
            type: "GET",
            url: "/fontend/chat/messages?user_id=" + user_id + "&user_send=" + user_send+"&limit="+limit,
            cache: false,
            dataType: "json",
            success: function (result) {
                var html = '';
                var img = result.avartar;
                console.log(result.messages);
                    $.each(result.messages, function (index, value) {
                        if (auth == value['user_id']) {
                            html += '<li>';
                            html += '<a href="#">';
                            html += '<img src="' + img[value['user_send']] + '">';
                            html += '</a>';
                            html += '<div class="chat-message-text">';
                            html += '<span class="arrowtop"></span>';
                            html += '<span class="arrowtop-left"></span>' + value['messages'];
                            html += '</div>';
                            html += '</li>';
                        } else {
                            html += '<li>';
                            html += '<div class="chat-message-send">' + value['messages'];
                            html += '</div>';
                            html += '</li>';
                        }
                    });
                $("#list_message_" + user_id + '_' + user_send).prepend(html);
                $("#list_message_" + user_id + '_' + user_send).scrollTop(200);

            }
        });
    },

    historyMessages: function (user_id, user_send) {
        if ($("#list_message_" + user_id + '_' + user_send).scrollTop() < 30) {
            chatSocket.loadMore(user_id, user_send);
            chatSocket.updateLimit(user_id,user_send,8);
        }
    },

    playSoundMessage: function () {
        var e, a = this;
        !0 && "undefinded" != typeof Audio && (e = new Audio, "maybe" === e.canPlayType("audio/ogg") && (e.src = '/chat/audio/skype_.mp3', e.play()))
    },

    updateLimit:function(user_id,user_send,number){
       var limit = $("#limit_" + user_id + '_' + user_send ).val();
        $("#limit_" + user_id + '_' + user_send ).val(parseInt(limit)+parseInt(number));
    },
    search:function(){

        var search =$('input[name="search-user"]').val();
        $.ajax({
            type: "POST",
            url: '/fontend/chat/search-user',
            cache: false,
            data: {search:search},
            success: function (result) {
                $("ul.media-list.media-list-contacts").html(result)
            }
        })
    },
    watched :function(user_id,user_send){
        $.ajax({
            type: "POST",
            url: '/fontend/chat/watched',
            cache: false,
            data: {user_id:user_id,user_send:user_send},
            success: function (result) {
            }
        })
    },


}

