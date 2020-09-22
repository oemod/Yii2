

$('.list-avt img').hover(function(){
    var data = $(this).attr('data-hover');
    $('.box-bn').each(function(){
        $(this).removeClass('active-box');
    })
    $('#'+data).addClass('active-box');
});


$('.box-tab-pp ul li').hover(function(){
    var box = $(this).attr('box');
    $('.box-inner').each(function(){
        $(this).removeClass('active-box');
    });

    $('#'+box).addClass('active-box');
});


$(window).scroll(function () {
    var scroll = $('header#header').height()+ $('nav#nav-bar').height();
    if ($(window).scrollTop() > scroll) {
        $("header#scroll").css({"display": "block","z-index": "2"});
    } else {
        $("header#scroll").css({"display": "none", "top": "inherit"});
    }
});

// detail

var Contact = {
    Phone: function () {
        var x = document.forms["tuvan"]["phone"].value;

        if (x == ""){
            alert("Vui lòng nhập đầy đủ thông tin !");
            return false;
        }
        $.ajax({
            type: "GET",
            url: '/fontend/default/order',
            cache: false,
            data: $('form#tuvan').serialize(),
            success: function (result) {
                alert("Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất !");
            }
        })
    },
    Phone2: function () {
        var url = window.location.href;
        $("#url").val(url);
        var x = document.forms["dk-sidebar"]["phone"].value;
        if (x == ""){
            alert("Vui lòng nhập đầy đủ thông tin !");
            return false;
        }
        $.ajax({
            type: "GET",
            url: '/fontend/default/order',
            cache: false, data: $('form#dk-sidebar').serialize(),
            success: function (result) {
                alert("Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất !");
            }
        })
    },
    Phone3: function () {
        var x = document.forms["lien-he"]["phone"].value;
        if (x == ""){
            alert("Vui lòng nhập đầy đủ thông tin !");
            return false;
        }
        $.ajax({
            type: "GET",
            url: '/fontend/default/order',
            cache: false, data: $('form#lien-he').serialize(),
            success: function (result) {
                alert("Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất !");
            }
        })
    },
    Phone4: function () {
        var url = window.location.href;
        $("#name").val(url);
        var x = document.forms["order-form_100"]["phone"].value;
        if (x == ""){
            alert("Vui lòng nhập đầy đủ thông tin !");
            return false;
        }
        $.ajax({
            type: "GET",
            url: '/fontend/default/order',
            cache: false, data: $('form#order-form_100').serialize(),
            success: function (result) {
                alert("Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất !");
            }
        })
    },
}


setTimeout(function () {
    $('#box-getphone').fadeIn();
    setTimeout(function () {
        $('#box-getphone').fadeIn();
    }, 50000);
}, 20000);
$('.getbox-close').click(function () {
    $('#box-getphone.active').hide();
});

// muc luc
$(document).ready(function () {
    $('body').scrollspy({target: "#ftwp-container", offset: 50});
    $("#ftwp-container a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({scrollTop: $(hash).offset().top}, 800, function () {
                window.location.hash = hash;
            });
        }
    });
});