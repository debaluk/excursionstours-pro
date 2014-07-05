// get the current date
var date = new Date();
var m = date.getMonth(),
d = date.getDate(),
y = date.getFullYear();
var enabledDaysExc; //    THIS ARRAY IS DATES THAT SHOULD BE ENABLED ON CALENDAR
var enabledDaysTr; //    THIS ARRAY IS DATES THAT SHOULD BE ENABLED ON CALENDAR
var s_date;

$('documet').ready(function() {

    $.ajax({
        url:        base_url+'reservation/exc_dates/',
        dataType:   'json',
        type:       'POST',
        success:    function(data){
            //set array that should be enabled on calendar
            enabledDaysExc = data.dates;

            if(enabledDaysExc.length>0)
                $('#datefromexc').datepicker({
                minDate: new Date(y, m, d),
                maxDate: new Date(y, m+3, d),
                numberOfMonths: 3,
                dateFormat: 'dd.mm.yy',

                onSelect: function(dateStr) {
                    chosen_date = $.datepicker.parseDate('dd.mm.yy', dateStr);
                    s_date = toTimestamp(chosen_date);
                    filterDataExc(s_date);
                    //show selected date before table
                    var mesec = chosen_date.getMonth()+1;
                    $('#filterdate_exc').html("View bookings for date: " + chosen_date.getDate() + "." + mesec + "." + chosen_date.getFullYear()); 
                },
                beforeShowDay: enableAllTheseDaysExc,
                showOn: 'button',
                buttonImage: base_url+'assets/img/backgrounds/calendar2.gif',
                buttonImageOnly: true


            });
        }
    });

    //for the first time show all data in the table
    //filterData(1292022000);
    filterDataExc();

    function filterDataExc(selected_date)
    {

        /*if(selected_date===undefined) return; */

        $.ajax({
            url:        base_url+'reservation/exc_filter/',
            data:       ({
                excdate :        selected_date 
            }),
            dataType:   'json',
            type:       'POST',
            success:    function(data){

                $('#excrows').html(data);
                //$('.tablesorter').trigger("update");

                if(data!=''){
                    
                }else{
                    $('#excrows').html("<td colspan='8'>No data<td>");
                }



            }
        });   
    }

    function toTimestamp(strDate){
        var datum = Date.parse(strDate,'dd.mm.yy');
        return datum/1000;
    }    

    function enableAllTheseDaysExc(date) {  
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        for (i = 0; i < enabledDaysExc.length; i++) {
            if($.inArray((m+1) + '-' + d + '-' + y,enabledDaysExc) != -1) {
                return [true];
            }
        }
        return [false];
    }

    //set status selected booking,  2
    $('.cancel_grid_exc').live('click',function(){

        var id = $(this).attr('id').substr(5);

        $.ajax({
            url: base_url+'reservation/excstatus/',
            dataType:   'json',
            type: 'POST',
            data:       ({
                excid :        id,
                excstatusid :    2 
            }),
            success: function(data){
                if(data){
                    //alert(data.s_date);
                    filterDataExc();
                }
            },
            dataType: 'json'
        });

    });

    /***********************************************************
    * LOADERS
    ***********************************************************/
    function loadingmain()
    {
        $.modal(
        "<div><div id='loader'><h2>Please wait...</h2><div class='animate'><img src='"+base_url+"assets/img/backgrounds/loadingfinal.gif'></div></div></div>" , {

            closeHTML: "",
            containerCss:{
                height:60,
                width:120,
                border:0
            },
            overlayCss: {
                backgroundColor: "#FFF"
            }  
        });
    }

    function loadingfinal()
    {
        $.modal(
        "<div><div id='loader'><div class='logo'><img src='"+base_url+"assets/img/logo.jpg'></div><div class='animate'><img src='"+base_url+"assets/img/backgrounds/loadingfinal.gif'></div><h2 style='margin-top:10px;'>Please wait...</h2></div></div>" , {

            closeHTML: "",
            containerCss:{
                height:160,
                width:400,
                border:0
            }  
        });
    }   


    ////////////////////////////////        Tours       //////////////////////////////////////////////////////
    $.ajax({
        url:        base_url+'reservation/tr_dates/',
        dataType:   'json',
        type:       'POST',
        success:    function(data){
            //set array that should be enabled on calendar

            enabledDaysTr = data.dates;

            if(enabledDaysTr.length>0)
                $('#datefromtr').datepicker({
                minDate: new Date(y, m, d),
                maxDate: new Date(y, m+3, d),
                numberOfMonths: 3,
                dateFormat: 'dd.mm.yy',

                onSelect: function(dateStr) {
                    chosen_date = $.datepicker.parseDate('dd.mm.yy', dateStr);
                    s_date = toTimestamp(chosen_date);
                    filterDataTr(s_date);
                    //show selected date before table
                    var mesec = chosen_date.getMonth()+1;
                    $('#filterdate_tr').html("View bookings for date: " + chosen_date.getDate() + "." + mesec + "." + chosen_date.getFullYear()); 
                },
                beforeShowDay: enableAllTheseDaysTr,
                showOn: 'button',
                buttonImage: base_url+'assets/img/backgrounds/calendar2.gif',
                buttonImageOnly: true


            });
        }
    }); 

    function enableAllTheseDaysTr(date) {  
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        for (i = 0; i < enabledDaysTr.length; i++) {
            if($.inArray((m+1) + '-' + d + '-' + y,enabledDaysTr) != -1) {
                return [true];
            }
        }
        return [false];
    } 

    function filterDataTr(selected_date)
    {
        /*if(selected_date===undefined) return;*/

        $.ajax({
            url:        base_url+'reservation/tr_filter/',
            data:       ({
                trdate :        selected_date 
            }),
            dataType:   'json',
            type:       'POST',
            success:    function(data){

                $('#trrows').html(data);
                //$('.tablesorter').trigger("update");

                if(data!=''){

                }else{
                    $('#trrows').html("<td colspan='8'>No data<td>");
                }

            }
        });   
    }
    filterDataTr();

    //set status selected booking,  2
    $('.cancel_grid_tr').live('click',function(){

        var id = $(this).attr('id').substr(5);

        $.ajax({
            url: base_url+'reservation/trstatus/',
            dataType:   'json',
            type: 'POST',
            data:       ({
                trid :        id,
                trstatusid :    2 
            }),
            success: function(data){
                if(data){
                    //alert(data.s_date);
                    filterDataTr();
                }
            },
            dataType: 'json'
        });

    });
});
