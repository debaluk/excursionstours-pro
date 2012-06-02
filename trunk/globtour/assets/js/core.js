
/*
* 
* SHARED FUNCTION
* 
*/
function editor(html,w,h){

    var padding = 25;
    var margin = 15;

    cssWidth = w - ((padding*2)+(margin*2));
    cssHeight = h - ((padding*2)+(margin*2));

    $("#modaleditor").css('width',cssWidth)
    $("#modaleditor").css('height',cssHeight)

    $("#modaleditor").modal({
        opacity: 70,
        containerCss:{
            background: '#003E60',
            border: 0,
            padding: 0,
            width: w,
            height: h
        },
        overlayCss:{
            background: '#000000'
        },
        position: ["7%",''] ,
        onOpen: function (dialog) {
            dialog.overlay.fadeIn('slow', function () {
                dialog.data.hide();
                dialog.container.fadeIn('slow', function () {
                    dialog.data.fadeIn('slow',function(){


                        $('.zmodalClose').fadeIn('fast').delay(118000);

                        $("#modaleditor").html(html);

                        //setTimeout(callback,600);

                    });
                });
            });

        },
        onClose: function (dialog) {

            $.modal.close(); // must call this!

            var timeout = setTimeout("$('#modaleditor').fadeOut();",600);

        }
    })

}

$(function() {



}); 