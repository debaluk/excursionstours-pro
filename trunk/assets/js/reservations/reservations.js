$(document).ready(function(){

    var that;

    // click on end
    $('.end').live('click',function(){
        var id = $(this).attr('id').substr(4);
        $.ajax({
            url: base_url+'reservation/end_booking',
            type: 'POST',
            dataType: 'json',
            data: ({
                id:id
            }),
            success: function(data){
                if(data.success == 'success'){
                    $('#end_'+id).parent().parent().fadeOut(100,function(){
                        $(this).remove();
                    });
                }else{
                    alert('Error!');
                }
            }
        });
    });

    $('.stopbooking').live('click',function(){
        var id = $(this).attr('id').substr(5);
        $.ajax({
            url: base_url+'reservation/stop_booking',
            type: 'POST',
            dataType: 'json',
            data: ({
                id:id
            }),
            success: function(data){
                if(data.success == 'success'){
                    $('#stop_'+id).parent().parent().fadeOut(100,function(){
                        $(this).remove();
                    });
                }else{
                    alert('Error!');
                }
            }
        });
    });

    $('.changebooking').live('click', function(){

        $('#changebooking').remove();

        var id = this.id;
        id = id.substr(9, id.length);

        var html = '<tr id="changebooking"><td colspan="7" style="padding:0 0 0 210px; background-color:#EDEDED;"><div class="widgetSection"><h4>Change reservation date</h4>'+
        '<table cellspacing="0" cellpadding="0" border="0" style="padding-left:5px"><tbody><tr><td colspan="3" style="padding:0">Return date/time</td></tr><tr><td class="dates" style="padding:0"><div style="position: absolute; display: none;" id="return"></div><input type="text" name="dateto" id="dateto" size="25" disabled="disabled"/></td><td class="dates" style="padding: 0 5px;">'+ html2 +'</td><td></td></tr></tbody></table>'+
        '<a href="javascript:" id="closedates" class="closedates" style="width:43px; display:none;">Close</a><a href="javascript:" id="changedates_'+id+'" class="changedates" style="width:95px; display:none;">Change Date</a><span style="clear:both"></span>'+
        '</div><span style="clear:both"></span></td></tr>';

        var elem = $(this).parent().parent();

        elem.after(html);

        var from_id = $('#from_date_hid_'+id).val();
        var to_id = $('#to_date_hid_'+id).val();

        var datetimefrom;
        var datetimeto;

        var date = new Date();    

        //  SYSTEM START DATE
        var limiter = 0;

        var m = date.getMonth(),
        d = date.getDate() + limiter,
        y = date.getFullYear();


        $('#dateto').datepicker({
            minDate: from_id,
            dateFormat: 'dd.mm.yy',
            showOn: 'button',
            buttonImage: base_url+'assets/img/backgnds/cal.gif',
            buttonImageOnly: true,
            onSelect: function(dateStr) {

                var depart = $.datepicker.parseDate('dd.mm.yy', dateStr);
                var mindate = $.datepicker.parseDate('dd.mm.yy', from_id);

                if(dates.compare(depart,mindate)==0){
                    //console.log('equals');

                    var wholeList = $('#fullto');

                    var $dd = $('#fullto');
                    var $options = $('option', $dd);

                    // loop over all question lists
                    $options.each(function(){
                        // push each option value and text into an array

                        $(this).attr( 'disabled', 'disabled'  );

                        if($(this).val()==$('#from_time_hid_'+id).val()) return false;



                    }
                    );

                    //console.log('ok')

                } 

            }
        })

        // SET TIME & DATE
        var sel_time = $('#to_time_hid_'+id).val();
        $('#fullto').val(sel_time);
        //console.log('settime:'+typeof(sel_time))

        $('#dateto').datepicker('setDate', to_id);

        $('.widgetSection').show('slow', function(){
            $('.closedates').fadeIn();
            $('.changedates').fadeIn();
        });


    });

    $('#closedates').live('click', function(){
        $('.widgetSection').hide('fast', function(){
            $('#changebooking').remove();   
        });

    });

    $('.changedates').live('click', function(){

        var id=this.id;
        id=id.substr(12,id.length)

        datetimeto = $('#dateto').val() + ' ' + $('#fullto option:selected').val() + ':00';

        //console.log('id:'+id)
        //console.log('dateto:'+datetimeto)

        $.ajax({
            url: base_url+'reservation/check_modify_date',
            type: 'POST',
            data: ({
                carbookingid: id,
                datetom: datetimeto
            }),
            dataType: 'json',
            success: function(data){

                that.busy("hide");
                display(data.msg, data.action);
            }
        })


    });

    $("#refreshdates").live('click', function(){
        window.location.reload();
    })

    function display(msg, action){

        //console.log('msg: '+msg)
        //console.log('action: '+action)

        $("#modaleditor #html_msg").html(msg);

        $("#modaleditor").modal({

            opacity: 70,
            containerCss:{
                background: '#FFFFFF',
                border: 0,
                padding: 0,
                width: 270,
                height: 150
            },
            overlayCss:{
                background: '#000000'
            },
            position: ["7%",''] ,
            onOpen: function (dialog) {
                dialog.overlay.fadeIn('slow', function () {
                    dialog.data.hide();
                    dialog.container.fadeIn('slow', function () {
                        dialog.data.slideDown('slow',function(){

                            $('.zmodalClose').fadeIn('fast').delay(118000);

                            $('.simplemodal-container').css('height','inherit')



                            if(action==true){
                                $('#close_modal_wrap').fadeIn('slow');
                                $('#close_modal').hide();
                                $('#refreshdates').show();
                            }else{
                                $('#close_modal_wrap').fadeIn('slow');    
                            }







                        });
                    });
                });

            },
            onClose: function (dialog) {
                dialog.data.fadeOut('slow', function () {
                    dialog.container.slideUp('slow', function () {
                        dialog.overlay.fadeOut('slow', function () {
                            $.modal.close(); // must call this!
                        });
                    });
                });
            },
            closeClass: 'zmodalClose'
        });
        $('.zmodalClose').css({
            'margin-right':'0',
            'margin-top':'0',
            'display':'none'
        });
    }

    $('#close_modal').live('click', function(){
        $.modal.close(); // must call this! 
        $('#close_modal_wrap').hide();
    })

    $('.changedates').live('click', function() { 


        that = $(this).busy({ position : 'center', hide : true });

    });

    //$('#promjeni_675').trigger('click');



});

// Source: http://stackoverflow.com/questions/497790
var dates = {
    convert:function(d) {
        // Converts the date in d to a date-object. The input can be:
        //   a date object: returned without modification
        //  an array      : Interpreted as [year,month,day]. NOTE: month is 0-11.
        //   a number     : Interpreted as number of milliseconds
        //                  since 1 Jan 1970 (a timestamp) 
        //   a string     : Any format supported by the javascript engine, like
        //                  "YYYY/MM/DD", "MM/DD/YYYY", "Jan 31 2009" etc.
        //  an object     : Interpreted as an object with year, month and date
        //                  attributes.  **NOTE** month is 0-11.
        return (
        d.constructor === Date ? d :
        d.constructor === Array ? new Date(d[0],d[1],d[2]) :
        d.constructor === Number ? new Date(d) :
        d.constructor === String ? new Date(d) :
        typeof d === "object" ? new Date(d.year,d.month,d.date) :
        NaN
        );
    },
    compare:function(a,b) {
        // Compare two dates (could be of any type supported by the convert
        // function above) and returns:
        //  -1 : if a < b
        //   0 : if a = b
        //   1 : if a > b
        // NaN : if a or b is an illegal date
        // NOTE: The code inside isFinite does an assignment (=).
        return (
        isFinite(a=this.convert(a).valueOf()) &&
        isFinite(b=this.convert(b).valueOf()) ?
        (a>b)-(a<b) :
        NaN
        );
    },
    inRange:function(d,start,end) {
        // Checks if date in d is between dates in start and end.
        // Returns a boolean or NaN:
        //    true  : if d is between start and end (inclusive)
        //    false : if d is before start or after end
        //    NaN   : if one or more of the dates is illegal.
        // NOTE: The code inside isFinite does an assignment (=).
        return (
        isFinite(d=this.convert(d).valueOf()) &&
        isFinite(start=this.convert(start).valueOf()) &&
        isFinite(end=this.convert(end).valueOf()) ?
        start <= d && d <= end :
        NaN
        );
    }
}
