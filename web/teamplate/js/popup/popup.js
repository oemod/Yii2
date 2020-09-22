var tag=-1;

var url=window.location.href;
var msn = {
    popup: function (my, link, myclass) {
        msn.ChangeUrl('sangnx',link);
        $('div.modal-dialog').attr('class','modal-dialog');
        $('div.modal-dialog').addClass(myclass);
        $( ".modal-header h4" ).remove();
        $('.modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4></h4>');
        if ($('#myModal').data('bs.modal').isShown) {
            $('#myModal').find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        } else {
            $('#myModal').modal('show')
                .find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        }
    },

    popupjs: function (my, link,title, myclass) {
        $('div.modal-dialog').attr('class','modal-dialog');
        $('div.modal-dialog').addClass(myclass);
        $( ".modal-header h4" ).remove();
        $('.modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4>'+title+'</h4>');
        if ($('#myModal').data('bs.modal').isShown) {
            $('#myModal').find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        } else {
            $('#myModal').modal('show')
                .find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        }
    },

    message: function (my, link, myclass) {
        $('div.modal-dialog').attr('class','modal-dialog');
        $('div.modal-dialog').addClass(myclass);
        $( ".modal-header h4" ).remove();
        $( ".modal-header button" ).remove();
        if ($('#myModal').data('bs.modal').isShown) {
            $('#myModal').find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        } else {
            $('#myModal').modal('show')
                .find('#modalContent')
                .load(link);
            document.getElementById('modalHeader');
        }
        setTimeout(function(){
            $("#myModal").click();
        }, 3000);
    },

    popupProduct: function (my, link, myclass) {
        $('#myModal').attr('onclick','msn.deletePopup()');
        $('#myModal').modal('show').find('#modalContent').append('<div class="loadmore-popup"><img src="/mingo/images/icon/loading.gif"></div>');
        msn.ChangeUrl('sangnx',link);
        $('div.modal-dialog').attr('class','modal-dialog');
        $('div.modal-dialog').addClass(myclass);
        $( ".modal-header h4" ).remove();
        $('.modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4></h4>');
        if ($('#myModal').data('bs.modal').isShown) {
            $('#myModal').find('#modalContent').load(link);
            document.getElementById('modalHeader');
        } else {
            $('#myModal').modal('show').find('#modalContent').load(link);
            document.getElementById('modalHeader');
        }
    },

    ChangeUrl: function (page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = {Page: page, Url: url};
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    },

    deletePopup: function(){
        $("#myModal").on('hidden.bs.modal', function () {
            arr = url.split('/');
            console.log(arr[3]);
            if(arr[3]){
                 msn.ChangeUrl('',arr[3]);
            }else{
                 msn.ChangeUrl('','/');
            }
        });
    },
}


/**
 * Created by Xuansang on 12/2/2015.
 */

var format = function (num) {
    var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
    if (str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ",") {
            output.push(str[j]);
            if (i % 3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};
$(document).on('keyup', '#dick_price', function () {
    $(this).val(format($(this).val()));
});

$(document).on('keydown', '#dick_price', function (b) {
    if (detail.flag == true) {
        return false;
    } else {
        var a = (b.which) ? b.which : b.keyCode;
        if (a == 46 || a == 8 || a == 37 || a == 39 || a == 9 || a == 229) {
        } else {
            if (a > 31 && (a < 48 || a > 57) && (a < 96 || a > 105)) {
                return false
            }
        }
    }
});

$(document).on('keyup', '#product-price', function () {
    $(this).val(format($(this).val()));
});

$(document).on('keydown', '#product-price', function (b) {
    if (detail.flag == true) {
        return false;
    } else {
        var a = (b.which) ? b.which : b.keyCode;
        if (a == 46 || a == 8 || a == 37 || a == 39 || a == 9 || a == 229) {
        } else {
            if (a > 31 && (a < 48 || a > 57) && (a < 96 || a > 105)) {
                return false
            }
        }
    }
});

function Login() {
    $('.btlogin').hide();
    $('.loading').show();
    $.ajax({
        type: "POST",
        url: '/fontend/auth/login',
        cache: false,
        dataType: 'JSON',
        data: $('form').serialize(),
        success: function (result)
        {
            $('.alert-danger').text(result.msg);
            $('.alert-danger').css("display", "block");
            $('.btlogin').show();
            $('.loading').hide();

        }
    })
};



$(function() {

    // Textarea Auto Resize
 //   autosize($('#autosize'));

    // Select2 Box

    $("#select6").select2({ tags: true });

    $("#select2").select2({ tags: true });



});