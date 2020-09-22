var Main={
	open_menu:function(open){
		if(open==0){
			$(".navbar-primary,.navbar-right").show();
			$(".toogle-menu,.navbar-right").attr("onclick","Main.open_menu(1)");}
			else{
				$(".navbar-primary,.navbar-right").hide();
				$(".toogle-menu,.navbar-right").attr("onclick","Main.open_menu(0)");
			}
		},
	}



$(window).scroll(function () {
	var scroll = $('header#header-mb').height()+ $('header#header-mb__time').height();
	if ($(window).scrollTop() > scroll) {
		$("header#header-scroll-mb").css({"display": "block","z-index": "2"});

	} else {
		$("header#header-scroll-mb").css({"display": "none", "top": "inherit"});
	}
});

var Contact = {
    Phone: function () {
        var x = document.forms["dk-mb"]["phone"].value;

        if (x == ""){
            alert("Vui lòng nhập đầy đủ thông tin !");
            return false;
        }
        $.ajax({
            type: "GET",
            url: '/fontend/default/order',
            cache: false,
            data: $('form#dk-mb').serialize(),
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
    $('#box-getphone').hide();
});

$("form").submit(function () {
    $('#box-getphone').hide();
});