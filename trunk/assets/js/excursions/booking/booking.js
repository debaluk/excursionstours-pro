
//var system_url = 'http://sohotravel.it-montenegro.com/'; 
var system_url = 'http://www.informacionisistem.com/excursionstours-pro/'; 
//var system_url = 'http://localhost/excursionstours-pro/'; 

var result_div = 'content_exc';  
var selected_date;
var data_load ;
var cur_day;
var that;   //Buisy loader
var p = system_url+'assets/img/busy.gif';   //img path               

if(window.source_online_booking === undefined){

    source_online_booking = "sohotravel.it-montenegro.com";   
} 

$(document).ready(function(){ 


    jQuery.fn.ajaxLoader = function (conf) {
        var config = jQuery.extend({
            className:        'jquery-ajax-loader', 
            fadeDuration:    1
        }, conf);

        return this.each(function () {
            var t = jQuery(this);

            if (!this.ajaxLoaderObject) {
                var offset = t.offset();
                var dim = {
                    left:    offset.left, 
                    top:    offset.top, 
                    width:    t.outerWidth(), 
                    height:    t.outerHeight()
                };

                this.ajaxLoaderObject = jQuery('<div class="' + config.className + '"></div>').css({
                    position:    'absolute', 
                    left:        dim.left + 'px', 
                    top:        dim.top + 'px',
                    width:        dim.width + 'px',
                    height:        dim.height + 'px'
                }).appendTo(document.body).hide();
            }

            this.ajaxLoaderObject.fadeIn(config.fadeDuration);
        });
    };

    jQuery.fn.ajaxLoaderRemove = function () {
        return this.each(function () {
            if (this.ajaxLoaderObject) {
                this.ajaxLoaderObject.fadeOut(1);
            }
        });
    };  

    /***********************************************************
    * LIST & FILTER EXCURSIONS
    ***********************************************************/
    function list_excursion(){ 

        loadingmain();               

        //Data not loaded in combo jet   FIX
        var strating = $('#eb_starting').val();
        if(strating==undefined){         
            strating  ='Any'; 
        }   
        $.ajax({
            type: 'GET',
            url: system_url+'excursions/booking/e_search/?jsoncall=?',
            data: ({
                eb_starting : strating,
                eb_freetext : $('#eb_freetext').val(),
                eb_sort : $('#exc_sort').val(),
                language: system_lang
            }),
            dataType: 'jsonp',
            success: function(data){$('.'+result_div).html(data.html);$.modal.close();$('#exc_date').datepicker("hide");},
            error:function(data){alert("Error: " + data);}
        });
    }       

    function filter(){
        jQuery('#exc_list').ajaxLoader();

        //Data not loaded in combo jet   FIX
        var strating = $('#eb_starting').val();
        if(strating==undefined){         
            strating  ='Any'; 
        }   
        $.ajax({
            type: 'GET',
            url: system_url+'excursions/booking/e_filter/?jsoncall=?',
            data: ({
                eb_starting : strating,
                eb_freetext : $('#eb_freetext').val(),
                eb_sort : $('#exc_sort').val(),
                language: system_lang
            }),
            dataType: 'jsonp',
            success: function(data){
                jQuery('#exc_list').ajaxLoaderRemove(); 
                $('.hold_exc').html(data.html);
            },
            error:function(data){alert("Error: " + data);}
        });
    }

    $('#exc_submit').live('click',function(){/*that = jQuery(this).parent().busy({ img : p });*/ filter();});

    $('#exc_clear').live('click',function(){

        /*that = jQuery(this).parent().busy({ img : p })*/
        $('#eb_starting').val('Any'); 
        $('#eb_freetext').val(''); 
        $('#exc_sort').val('none');
        filter(); 

    }); 

    $('#eb_starting').live('change',function(){filter();});

    $('#exc_sort').live('change',function(){filter();});

    /***********************************************************
    * DETAILS EXCURSIONS
    ***********************************************************/
    function selexcfromlist(id){

        loadingmain();

        $.ajax({
            url:        system_url+'excursions/booking/details_booking/?jsoncall=?',
            data:       ({id : id, language: system_lang}),
            dataType:   'jsonp',
            type:       'GET',
            success:    function(data){
                $('.'+result_div).html(data.html); cal_init();calculate();$.modal.close();                  

                /*ID TABS WITH SELECTORS*/
                jQuery('#atlas_tabs ul').idTabs();

                $('#atlas_tabs > ul > li > a').click(function(){                    

                    $(this).parent().parent().find(".on").removeClass('on');

                    $(this).closest('li').addClass('on'); 

                });
            }
        });  
        return false; 
    }     

    /*$('.selexcfromlist').live('click',function(){

    var excid = $(this).attr('href');
    excid = excid.replace(/^.*#/, '');
    console.log('id='+excid) 
    $.history.load(excid);
    return false;
    });*/

    $('.exc_one').live('click',function(){
        //console.log('id='+this.id.replace(/^.*#/, ''))
        $.history.load(this.id.replace(/^.*#/, ''));     
    })

    /***********************************************************
    * $.history.init EXCURSIONS
    ***********************************************************/
    $.history.init( function(hash) 
    {
        selected_date=undefined;    //restart date on back and reload function

        var page = hash.substring(0, 2);
        var data = hash.substring(2, hash.length);

        switch (page){

            case '':                list_excursion();
                break;

            case 'ed':              selexcfromlist(data);
                break;

            case 'ec':              hash_book_info(data);                
                break;

            case 'et':              hash_excursionbooking(data);
                break;
        }
        return false;
    });

    /***********************************************************
    * JQUERY UI Calendar with event
    ***********************************************************/
    // get the current date
    var date = new Date();
    var m = date.getMonth(),
    d = date.getDate() + 1,
    y = date.getFullYear();

    function cal_init(){
        $('#exc_date').datepicker({    
            minDate: new Date(y, m, d),
            maxDate: new Date(y, m+3, d),
            dateFormat: 'dd.mm.yy',
            inline:true,
            numberOfMonths: 1,
            onSelect: function(dateStr){
                selected_date = $.datepicker.parseDate('dd.mm.yy', dateStr);
            },
            beforeShowDay: enableOneDate ,
            showOn: 'button',
            buttonImage: base_url+'assets/img/backgrounds/cal_orange.gif',
            buttonImageOnly: true
        });


        //TESTING DATE FILL CODE
        //$('#exc_date').datepicker('setDate','25.10.2010');
        //selected_date = 1;
        //$('#exc_date').datepicker("show");  
    }

    // Custom function to enable one only in jquery calender
    function enableOneDate(date) {
        var day = date.getDay();
        return [(day == cur_day), ''];
    }     

    /***********************************************************
    * Calculator
    ***********************************************************/
    $('#adults').live('change',function(){calculate();}); 
    $('#children').live('change',function(){calculate();}); 

    function calculate(){
        var adults = $('#adults').val() * $('#adult-price').text();
        var children = $('#children').val()* $('#children-price').text();
        $('#total-price').text(adults+children);
    }

    /***********************************************************
    * Confirm Availability
    ***********************************************************/
    $('#confirm').live('click',function(){ 
        that = jQuery(this).parent().busy({ img : p })
        if(check()){
            selexcavailable();
        }; 

    });

    function check(){
        if($('#adults').val()==0){
            alert ("Please select at least one adult person.");
            that.busy("hide"); 
            return false;
        }
        if(selected_date==undefined){
            alert('plese select date!');
            that.busy("hide");
            return false;
        } 
        if($('#total-price').text()=='0'){
            alert('plese select al lest one person!');
            that.busy("hide");
            return false;
        }
        return true;   
    }

    function selexcavailable(){ 

        var persons = parseInt($('#adults').val())+ parseInt($('#children').val()); 
        var c_date = toTimestamp($('#exc_date').datepicker( "getDate" ));

        $.ajax({
            url:        system_url+'excursions/booking/exc_check_aviability/?jsoncall=?',
            data:       ({
                id :            $('#exc_id').val() ,
                noadult:        parseInt($('#adults').val()), 
                noch:           parseInt($('#children').val()), 
                persons :       persons , 
                adultprice:     parseInt($('#adult-price').text()), 
                chprice:        parseInt($('#children-price').text()), 
                totalprice :    $('#total-price').text() , 
                date :          c_date
            }),
            dataType:   'jsonp',
            type:       'GET',
            success:    function(data){                             

                if(data.available==1){
                    $.history.load('ec'+ data.book_info);
                }
                else{
                    alert ("Place left: " + data.place_left)                    
                }       
                that.busy("hide");   
            }
        });
        return false; 
    }

    function hash_book_info($id){
        loadingmain();
        var my_url = system_url+'excursions/booking/book_info/'+$id+'/?jsoncall=?';

        $.ajax({
            url:        my_url,
            dataType:   'jsonp',
            type:       'GET',
            success:    function(data){                             
                $('.'+result_div).html(data.html);
                $.modal.close();   
            }
        });
        return false; 
    }

    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        return datum/1000;
    }           

    /***********************************************************
    * CUSTOMER BOOKING - EXCURSION BOOKING
    ***********************************************************/
    $('#book_now').live('click',function(){ $('#customer').submit(); })

    $('.cancel').live('click',function(){ $.modal.close(); })

    $('#customer').live('submit',function(){ 

        // Override default error message
        jQuery.validator.messages.required = "";

        // Override generation of error label 
        $("#customer").validate({
            rules: {
                a_firstName1: "required",
                email: {
                    required: true, 
                    email: true 
                },
                email1: {
                    required: true,
                    equalTo: "#email_address"
                }
            },
            errorPlacement: function(error, element){}
        });

        var is_valid_form = $("#customer").valid();
        if(is_valid_form==false) return false;

        loadingfinal();

        $.ajax({ 
            url:        system_url+'excursions/booking/book_now/?jsoncall=?&s_b_i='+source_online_booking,
            data:       $(this).serialize(),
            dataType:   'jsonp',
            type:       'GET',
            success:    function(data){
                if(data.success=='success')
                    {

                    //$.modal.close();
                    $.history.load('et'+data.booking_id);
                    return false;                   
                }
                else
                    {
                    $.modal.close();
                    $('#infomessage').fadeIn('slow');
                    $('#infomessage').html(data.message);  
                }

            }
        });

        return false; 

    })

    function hash_excursionbooking($id){

        $.ajax({ 
            url:        system_url+'excursions/booking/exc_total/'+$id+'/?jsoncall=?'+'&language: '+system_lang,
            dataType:   'jsonp',
            type:       'GET',
            success:    function(data){

                if(data.success=='success')
                    {
                    data_load = data;
                    $('.'+result_div).html(data.html);
                    $.modal.close();
                    return false;                   
                } 
            }
        })
        return false; 
    }

    /***********************************************************
    * LOADERS
    ***********************************************************/
    function loadingmain()
    {
        $.modal(
        "<div><div id='loader'><h2>Please wait...</h2><div class='animate'><img src='"+system_url+"assets/img/backgrounds/loadingfinal.gif'></div></div></div>" , {

            closeHTML: "",
            containerCss:{
                height:80,
                width:130,
                borderColor:"#dedede"
            },
            opacity:20,
            overlayCss: {
                backgroundColor: "#000000"
            }  
        });
    }

    function loadingfinal()
    {
        $.modal(
        "<div><div id='loader'><div class='logo' style='margin-top:15px'><img src='"+system_url+"assets/img/logo.jpg'></div><div class='animate'><img src='"+system_url+"assets/img/backgrounds/loadingfinal.gif'></div><h2 style='width: 385px;'>Please wait...</h2></div></div>" , 
        {
            closeHTML: "",
            containerCss:{
                height:160,
                width:400,
                borderColor:"#dedede"
            },            
            opacity:20,
            overlayCss: {
                backgroundColor: "#000000"
            }  
        },
        {onClose: function (dialog) {
                dialog.data.fadeOut('slow', function () {
                    dialog.container.hide('slow', function () {           
                        $.modal.close();           
                    });
                });
        }}
        );
    }     

});




