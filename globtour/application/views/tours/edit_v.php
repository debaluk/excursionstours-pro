
<h2> <img src="<?=$url?>assets/img/titles/tour_edit.png" /> </h2>     

<div id="infomessage" style="display: none;"></div>

<form name="addtour" id="addtour" method="post" action="javascript: void(null);">
    <input type="hidden" name="id" value="<?=$tour['id']?>"/>
    <div class="lineinput">
        <label>
            Tour name:<br />
            <input name="title" id="title" type="text" class="inputbox" value="<?=$tour['title']?>" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Days number:<br />
            <input name="nodays" id="nodays" type="text" class="inputbox" value="<?=$tour['nodays']?>"/>
        </label>
    </div>

    <div class="lineinput">
        <label>
            Nights number:<br />
            <input name="nonights" id="nonights" type="text" class="inputbox" value="<?=$tour['nonights']?>"/>
        </label>
    </div>

    <div class="lineinput">                  
        <label>
            Departure date:<br /> 
            <input id="startdate" name="startdate[]" type="text" class="inputbox tagger" style="width: 324px; margin-right: 4px;" /> 
        </label>
    </div>

    <div class="lineinput">
        <label>
            Guides:<br />
            <textarea name="guides" id="guides" rows="5" class="inputbox tinymce" cols="40"><?=$tour['guides'];?></textarea>
               <i>guides for excursion details page - 50 character for best results</i><br /> 
        </label>
    </div>

    <div class="lineinput">
        <label>
            Tour description:<br />
            <textarea name="description" id="description" class="inputbox tinymce" rows="5" cols="40"><?=$tour['description']?></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>
            Tour text:<br />
            <textarea name="tour_text" id="tour_text" rows="35" class="inputbox tinymce" cols="40"><?=$tour['tour_text']?></textarea>
            <i>text for tour details page</i>
        </label>
    </div>

    <div class="lineinput">
        <label>
            1/1 room price:<br />     
            <input name="onebed" id="onebed" type="text" class="inputbox" value="<?=$tour['Cena Jednokrevetne']?>"/> &euro;
        </label>
    </div>

    <div class="lineinput">
        <label>
            1/2 room price:<br />     
            <input name="twobed" id="twobed" type="text" class="inputbox" value="<?=$tour['Cena Dvokrevetne']?>"/> &euro;
        </label>
    </div>

    <div class="lineinput">
        <label>
            Capacity:<br />
            <input name="capacity" id="capacity" type="text" class="inputbox" value="<?=$tour['capacity']?>" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Add on during jurney:<br />
            <input name="addition" id="addition" type="text" class="inputbox" value="<?=$tour['addition']?>" />
        </label>
    </div>

    <div class="lineinput">
        <label>                          
            Piuckup location:<br />
            <textarea name="pickup_location" id="pickup_location" rows="5" class="inputbox tinymce" cols="40"><?=$tour['pickup_location']?></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>
            <input id="capacity" type="submit" value="Edit tour" class="greenbtn" />
        </label>
    </div>

</form>   

<script type="text/javascript">
    (function($){

        $.fn.addTag = function(v){
            var r = v.split(',');
            for(var i in r){
                n = r[i];//.replace(/([^a-zA-Z0-9ŠšĐđŽžČčĆćЉљЊњЕеРрТтЗзУуИиОоПпШшЂђЖжАаСсДдФфГгХхЈјКкЛлЧчЋћЏџЦцВвБбНнМм\s\-\_])|^\s|\s$/g, '');
                if(n == '') return false;
                var fn = $(this).data('name');
                var i = $('<input type="hidden" />').attr('name',fn).val(n);
                var t = $('<li />').text(n).addClass('tagName')
                .click(function(){
                    // remove
                    var hidden = $(this).data('hidden');
                    $(hidden).remove();
                    $(this).remove();
                })
                .data('hidden',i);
                var l = $(this).data('list');
                $(l).append(t).append(i);
            }
        };
    })(jQuery); 
    $(document).ready(function(){
        $('.tagger').each(function(i){
            $(this).data('name', $(this).attr('name'));
            $(this).removeAttr('name');
            var b = $('<button type="button" class="sbutton sbtndodaj" style="margin-left: 7px;">Add</button>').addClass('tagAdd')
            .click(function(){
                var tagger = $(this).data('tagger');
                $(tagger).addTag( $(tagger).val() );
                $(tagger).val('');
                $(tagger).stop();
            })
            .data('tagger', this);
            var l = $('<ul />').addClass('tagList');
            $(this).data('list', l);
            $(this).after(l).after(b);
        })
        .bind('keypress', function(e){
            if( 13 == e.keyCode){
                //console.log(e.keyCode);
                $(this).addTag( $(this).val() );
                $(this).val('');
                $(this).stop();
                return false;
            }
        }); 
        $('#addtour').live('submit',function(){
            var numItems = $('.tagName').length
            if(numItems==0){
                alert ("Please select at least one departure date");
                return false;
            }
            $.ajax({
                url: base_url+'tours/tours/update',
                data: $(this).serialize(),
                type: 'POST',
                dataType:'json',
                success:function(data){
                    if(data.success == 'success'){
                        $('#infomessage').html('Success.').fadeIn('normal');
                        $('#addtour').remove();
                        window.location.href = base_url+'tours/tours/views';
                    }else{
                        $('#infomessage').html(data.message).fadeIn('normal');
                    }
                }
            });

        });

    });
</script>
<script type="text/javascript">
    $(function(){     
        // get the current date
        var date = new Date();
        var m = date.getMonth(),
        d = date.getDate() + 1,
        y = date.getFullYear();
        // Datepicker
        $('#startdate').datepicker({ 
            showOn: 'button',
            buttonImage: base_url+'assets/img/backgrounds/calendar2.gif',
            buttonImageOnly: true,
            minDate: new Date(y, m, d),
            maxDate: new Date(y, m+6, d),
            dateFormat: 'dd.mm.yy',
            inline:true,
            numberOfMonths: 3

        });

        $('#startdate').datepicker($.datepicker.regional['fr']);

        $('#startdate').click(function(){
            $('#startdate').datepicker("show");  
        });  

        //PARSE TAGS
        $('#startdate').addTag('<? echo $startdate;?>');     

    });
</script>