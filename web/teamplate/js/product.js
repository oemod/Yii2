var SangnxMaps = {
    upload: function(){
        //  alert('s');
        $("#product-upload").trigger('click');
    },
};
SangnxMaps.init = function(){
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete(document.getElementById('product-location'), {types: ['geocode']});
    directionsService = new google.maps.DirectionsService();
    //textutils.suggestData('member_location');
};
SangnxMaps.init();

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