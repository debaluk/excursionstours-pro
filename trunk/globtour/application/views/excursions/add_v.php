<h2> <img src="<?=$url?>assets/img/titles/excursion_add.png" /> </h2> 



<div id="infomessage" style="display: none;"></div>
<form name="addexcursion" id="addexcursion" method="post" action="javascript: void(null);">
    <div class="lineinput">
        <label>
            Excursion name:<br />
            <input name="title" id="title" type="text" class="inputbox" />
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
            Excursion description:<br />
            <textarea name="description" id="description" rows="5" class="inputbox" cols="40"></textarea>
            <i>description for excursion list page</i> 
        </label>
    </div>

    <div class="lineinput">
        <label>
            Excursion text:<br />
            <textarea name="excursion_text" id="excursion_text" rows="35" class="inputbox tinymce" cols="40"></textarea>
            <i>text for excursion details page</i>  
        </label>
    </div>

    <div class="lineinput">
        <label>
            Add on during jurney:<br />
            <input name="addition" id="addition" type="text" class="inputbox" />
        </label>
    </div>

    <div class="lineinput">
        <label>
            Adult price:<br />
            <input name="adultprice" id="adultprice" type="text" class="inputbox" /> &euro;
        </label>
    </div>

    <div class="lineinput">
        <label>
            Childern price:<br />
            <input name="childprice" id="childprice" type="text" class="inputbox" /> &euro;
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
            Transportation type:<br />
            <?
                $this->load->helper('arraymaker');
                echo form_dropdown('transportsid',arraymaker($this->transportsm->readAll(),'id','title'),'class="inputbox"','class="selectbox"');
            ?>
        </label>
    </div>

    <div class="lineinput">
        <label>                          
            Piuckup location:<br />
            <textarea name="pickup_location" id="pickup_location" rows="5" class="inputbox tinymce" cols="40"></textarea>
            <i>use unordered list for best results</i> 
        </label>
    </div>

    <div class="lineinput">
        <label>
            <input type="submit" value="Add excursion" class="greenbtn" />
        </label>
    </div>

</form>
<script type="text/javascript">

    $(document).ready(function(){

            $('#addexcursion').live('submit',function(){
                    $.ajax({
                            url: base_url+'excursions/excursions/create/',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(data){
                                if(data.success == 'success'){
                                    $('#infomessage').html('Success.').fadeIn('normal');
                                    $('#addexcursion').hide();
                                    window.location.href = base_url+'excursions/excursions/views';
                                }else{
                                    $('#infomessage').html(data.message).fadeIn('normal');
                                }
                            },
                            dataType: 'json'
                    });
            });

    });

</script>