
<h2> <img src="<?=$url?>assets/img/titles/tour_add.png" /> </h2>  

<div id="infomessage" style="display: none;"></div>

<form name="addtour" id="addtour" method="post" action="javascript: void(null);">
    <div class="lineinput">
        <label>
            Tour name:<br />
            <input name="title" id="title" type="text" class="inputbox" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Days number:<br />
            <input name="nodays" id="nodays" type="text" class="inputbox" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Nights number:<br />
            <input name="nonights" id="nonights" type="text" class="inputbox" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Departure:<br />            

            <select class="inputbox" name="startweekday[]" multiple="multiple" title="-- Molimo odaberite">
                <?
                    $weekday = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

                    foreach ($weekday as $day) {

                        echo "<option value='". $day . "'>" . $day . "</option>";
                    }
                ?> 
            </select>
        </label>
    </div>

    <div class="lineinput">
        <label>
            Guides:<br />
            <textarea name="guides" id="guides" rows="5" class="inputbox tinymce" cols="40"></textarea>
            <i>guides for excursion details page - 50 character for best results</i><br />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Tour description:<br />
            <textarea name="description" id="description" class="inputbox tinymce" rows="5" cols="40"></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>
            Tour text:<br />
            <textarea name="tour_text" id="tour_text" rows="35" class="inputbox tinymce" cols="40"></textarea>
            <i>text for tour details page</i>
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            1/1 room price:<br />
            <input name="onebed" id="onebed" type="text" class="inputbox" /> &euro;
        </label>
    </div>

    <div class="lineinput">
        <label>
            1/2 room price:<br />
            <input name="twobed" id="twobed" type="text" class="inputbox" /> &euro;
        </label>
    </div>

    <div class="lineinput">
        <label>
            Capacity:<br />
            <input name="capacity" id="capacity" type="text" class="inputbox" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Add on during jurney:<br />    
            <textarea name="addition" id="addition" rows="5" class="inputbox" cols="40"></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>                          
            Piuckup location:<br />
            <textarea name="pickup_location" id="pickup_location" rows="5" class="inputbox tinymce" cols="40"></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>
            <input id="capacity" type="submit" value="Add tour" class="greenbtn" />
        </label>
    </div>

</form>
<script type="text/javascript">

    $(document).ready(function(){

            $('#addtour').live('submit',function(){
                    $.ajax({
                            url: base_url+'tours/tours/create',
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