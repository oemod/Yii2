/**
 * Created by Xuansang on 12/2/2015.
 */

var settingAll = {
    init: function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete(document.getElementById('pac-input'), {types: ['geocode']});
            directionsService = new google.maps.DirectionsService();
    },
}
settingAll.init();
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
    autosize($('#autosize'));

    // Select2 Box
    $('#select1, #select2, #select3').select2();
    $("#select4").select2({ maximumSelectionLength: 2 });
    $("#select5").select2({ minimumResultsForSearch: Infinity });
    $("#select6").select2({ tags: true });

    // Toggles
    $('.toggle').toggles({
        on: true,
        height: 26
    });

    // Input Masks
    $("#date").mask("99/99/9999");
    $("#phone").mask("(999) 999-9999");
    $("#ssn").mask("999-99-9999");

    // Date Picker
    $('#datepicker').datepicker();
    $('#datepicker-inline').datepicker();
    $('#datepicker-multiple').datepicker({ numberOfMonths: 2 });

    // Time Picker
    $('#tpBasic').timepicker();
    $('#tp2').timepicker({'scrollDefault': 'now'});
    $('#tp3').timepicker();

    $('#setTimeButton').on('click', function (){
        $('#tp3').timepicker('setTime', new Date());
    });

    // Colorpicker
    $('#colorpicker1').colorpicker();
    $('#colorpicker2').colorpicker({
        customClass: 'colorpicker-lg',
        sliders: {
            saturation: {
                maxLeft: 200,
                maxTop: 200
            },
            hue: { maxTop: 200 },
            alpha: { maxTop: 200 }
        }
    });

});