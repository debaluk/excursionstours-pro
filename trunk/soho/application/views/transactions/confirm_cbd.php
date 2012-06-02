<style>
    #post input[type="text"] {

        border-color: #CCCCCC;
        border-radius: 0 0 0 0;
        border-style: solid;
        border-width: 1px;
        height: 23px;
        line-height: 23px;
        padding: 0;
        width: 21%;

    }
    #post input[type="text"].error{
        border-color:red;
    }
</style>

<h2> <img src="<?=$url?>assets/img/titles/close_bd.png" /> </h2>  

<form id="post" method="post" action="javascript:" name="post">


    <div id="publishing-action">

        <input type="submit" value="Confirm Close Business Day" accesskey="p" tabindex="5" id="action" class="button-primary" name="save" disabled="disabled">
        <img alt="" id="ajax-loading" class="ajax-loading" src="<?=$url?>assets/img/backgnds/wpspin_light.gif" style="visibility: hidden;">
        <div class="updated below-h2" id="message">

            <p>Transaction OK.</p>

        </div>
    </div>
    <div class="clear"></div>

</form>

<!--FORM SUBMIT HANDLER-->
<script>

    jQuery(document).ready(function() {       

        // Override default error message
        jQuery.validator.messages.required = "";

        // Override generation of error label
        $("#post").validate({
            submitHandler: function(form) {

                $('input[type=submit]', '#post').attr('disabled', 'disabled');
                jQuery('#message').hide(); 
                
                $('#ajax-loading').css('visibility','visible');

                var form = $("#post");
                var form_data = form.serialize();

                $.ajax({
                    url: base_url+'transactions/do_cbd',
                    dataType: 'json',
                    type: "POST",
                    data: form_data,
                    success: function (data, textStatus, xhr) {
                        jQuery('#ajax-loading').css('visibility','hidden');

                        
                        if(data.success=='success'){

                            jQuery('#message p').html('Successful close business day.');
                            jQuery('#message').show();

                            // REDIRECT
                            function promo_show(){
                                window.location.href = base_url+'transactions/view_all_transactions'; 
                            }
                            window.setTimeout(function() { promo_show(); }, 1001);

                        }else{

                            $('input[type=submit]', '#post').removeAttr('disabled');                             
                            jQuery('#message p').html(data.message);
                            jQuery('#message').show(); 
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('Error ocured...\n Server not found.');
                        $('input[type=submit]', '#post').removeAttr('disabled');
                        $('#ajax-loading').css('visibility','hidden');
                    }
                });

            },
        });

        $('input[type=submit]', '#post').removeAttr('disabled'); 


    });

</script>
<!--/FORM SUBMIT HANDLER--> 