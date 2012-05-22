$(function (){ 
    var ajax_loader = '<img src="'+base_url+'assets/img/loader/ajax-loader.gif" />';

    popc = function () {
        $('#popup').fadeOut(500, function(){
            $('#popup #box #main_cont').html(ajax_loader);
        });
    };
    popup_box = function (data) {
        $('#popup').fadeIn(500, function () {
            $('#popup #box #main_cont').load(data.url);
        });
    };
});