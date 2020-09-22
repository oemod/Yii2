
(function ($) {
    "use strict";

    var thienhoaScript = {
        defaultOwlCarousel: function () {
            var owlSlider = $('.owl-sliders');
            owlSlider.owlCarousel({
                nav : false,
                dots: true,
                loop: true,
                margin: 15,
                autoplay: true,
                autoplaySpeed: 3000,
                animateOut: 'fadeOut',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1024: {
                        items: 1
                    }
                }
            });

            var owlReviews = $(".owl-slider-intro");
            owlReviews.owlCarousel({
                autoplay : true,
                autoplaySpeed: 1000,
                nav : false,
                loop: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }
            });
            var owlProcedure = $(".owl-procedure");
            owlProcedure.owlCarousel({
                autoplay : true,
                autoplaySpeed: 1000,
                nav : false,
                loop: true,
                margin: 15,
                responsive: {
                    0: {
                        items: 4
                    },
                    768: {
                        items: 5
                    },
                    1024: {
                        items: 5
                    }
                }
            });
        },
        menuResponsive: function () {
            var $itemMenuHasChild = $('.menu-primray__mobile li.menu-item-has-children > a'),
                $iconMenuHasChild = "<span class='pkthienhoa-menu-has-children'><i class='fa fa-angle-down'></i></span>";


            $itemMenuHasChild.after($iconMenuHasChild);
            
            $('li.menu-item-has-children .pkthienhoa-menu-has-children').on('click', function () {
                var $this = $(this),
                    thisLi = $this.closest('li'),
                    thisUl = thisLi.closest('ul');

                if (thisLi.is('.show-dropdown-menu')) {
                    thisLi.removeClass('show-dropdown-menu');
                }
                else {
                    thisUl.find('> li').removeClass('show-dropdown-menu');
                    thisLi.addClass('show-dropdown-menu');
                }
            });
        },
        templateUtils: function () {
            //== Add class backtotop
            $(window).scroll(function () {
                var scroll = $(window).scrollTop(),
                    backtotop = $('.backtotop'),
                    topbar = $('.topbar');

                if (scroll >= 100) {
                    backtotop.addClass('active');
                    topbar.addClass('active');
                } else {
                    backtotop.removeClass('active');
                    topbar.removeClass('active');
                }

            });

            //== Animation back to top
            $('.backtotop').click(function () {
                $('html,body').animate({scrollTop: 0}, 800);
                return false;
            });

            //== Vertical Tab
            //
            $("div.tab-controls>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        },
        handleClass: function () {
            function add_class(args) {
                if (args.length <= 0) {
                    return false;
                }
                var current = args[0].split(' ');
                if (typeof current[2] !== 'undefined') {
                    setTimeout(function () {
                        $(current[0]).addClass(current[1]);
                        args.shift();
                        add_class(args);
                    }, current[2]);
                } else {
                    $(current[0]).addClass(current[1]);
                    args.shift();
                    add_class(args);
                }
            }

            $(document).on('click', '[data-add-class]', function () {
                var _t = $(this);
                var _val = _t.data('add-class');
                var _arrs = _val.split(' | ');
                add_class(_arrs);
            });

            function toggle_class(args) {
                if (args.length <= 0) {
                    return false;
                }
                var current = args[0].split(' ');
                if (typeof current[2] !== 'undefined') {
                    setTimeout(function () {
                        $(current[0]).toggleClass(current[1]);
                        args.shift();
                        toggle_class(args);
                    }, current[2]);
                } else {
                    $(current[0]).toggleClass(current[1]);
                    args.shift();
                    toggle_class(args);
                }
            }

            $(document).on('click', '[data-toggle-class]', function () {
                var _t = $(this);
                var _val = _t.data('toggle-class');
                var _arrs = _val.split(' | ');
                toggle_class(_arrs);
            });

            function hover_add_class(args) {
                if (args.length <= 0) {
                    return false;
                }
                var current = args[0].split(' ');
                if (typeof current[2] !== 'undefined') {
                    setTimeout(function () {
                        $(current[0]).addClass(current[1]);
                        args.shift();
                        add_class(args);
                    }, current[2]);
                } else {
                    $(current[0]).addClass(current[1]);
                    args.shift();
                    add_class(args);
                }
            }

            $('[data-hover-add-class]').hover(function () {
                var _t = $(this);
                var _val = _t.data('hover-add-class');
                var _arrs = _val.split(' | ');
                hover_add_class(_arrs);
            });

            function remove_class(args) {
                if (args.length <= 0) {
                    return false;
                }
                var current = args[0].split(' ');
                if (typeof current[2] !== 'undefined') {
                    setTimeout(function () {
                        $(current[0]).removeClass(current[1]);
                        args.shift();
                        remove_class(args);
                    }, current[2]);
                } else {
                    $(current[0]).removeClass(current[1]);
                    args.shift();
                    remove_class(args);
                }
            }

            $(document).on('click', '[data-remove-class]', function () {
                var _t = $(this);
                var _val = _t.data('remove-class');
                var _arrs = _val.split(' | ');
                remove_class(_arrs);
            });

            function hover_remove_class(args) {
                if (args.length <= 0) {
                    return false;
                }
                var current = args[0].split(' ');
                if (typeof current[2] !== 'undefined') {
                    setTimeout(function () {
                        $(current[0]).removeClass(current[1]);
                        args.shift();
                        remove_class(args);
                    }, current[2]);
                } else {
                    $(current[0]).removeClass(current[1]);
                    args.shift();
                    remove_class(args);
                }
            }

            $('[data-hover-remove-class]').hover(function () {
                var _t = $(this);
                var _val = _t.data('hover-remove-class');
                var _arrs = _val.split(' | ');
                hover_remove_class(_arrs);
            });
        },
        behaviorWidget: function() {
           
        },
        importFont: function() {
            // WebFont.load({
            //     google: {
            //         families: ['Open Sans', 'Oswald']
            //     }
            // });
        },
        popUp: function () {
            setTimeout(function(){
                $('#popup_ad').removeClass("hidden_te").addClass("show_te");
            }, 1000);

            $('#popup_ad .close_po').click(function() {
                $("#popup_ad").removeClass("show_te").addClass("hidden_te");
            });

            // var counter = 0;
            // if($("#popup_ad").hasClass("hidden_te")) {
            //     var looper = setInterval(function(){
            //         $('#popup_ad').removeClass("hidden_te").addClass("show_te");
            //         counter++;
            //         if(counter> = 2) {
            //             clearInterval(looper);
            //         }
            //     }, 60000);
            // }
            // 
            var counter = 0;
            if($("#popup_ad").hasClass("hidden_te")) {
                setInterval(function(){
                    $('#popup_ad').removeClass("hidden_te").addClass("show_te");
                }, 60000);
            }
        },
        init: function () {
           	this.handleClass();
            this.templateUtils();
            this.defaultOwlCarousel();
            this.behaviorWidget();
            this.menuResponsive();
            this.importFont();
            //this.popUp();
        }
    };

    $(function () {
        thienhoaScript.init();
    });
})(jQuery);



var Sangnx = {

    order: function () {
        var a=$("#phone" ).val();
        if(a){
            alert('Bạn đã đặt Hẹn Thành Công chúng tôi sẽ liên hệ với bạn thời gian sớm nhất');
        }
        $.ajax({
            type: "POST",
            url: '/fontend/default/order',
            cache: false,
            data: $('#order-form').serialize(),
            success: function (result) {

            }
        })
    },
}


var xdo ={
    chat:function () {
        $("#chat-mobile-auto").click(function(){
            $("#LRdiv2").show();
        });
    }
}


