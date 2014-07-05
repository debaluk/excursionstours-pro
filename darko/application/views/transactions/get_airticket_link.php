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

<h2> <img src="<?=$url?>assets/img/titles/generate_link.png" /> </h2>  

<form id="post" method="post" action="javascript:" name="post">

    <div class="metabox-holder has-right-sidebar" id="poststuff">

        <div id="post-body">

            <div id="post-body-content">

                <div class="postarea">
                    <h3 class="qtrans_title">Description</h3>
                    <input type="text" id="description" name="description" tabindex="1" class="qtrans_title_input" value="" />
                </div>
                
                <div class="postarea">
                    <h3 class="qtrans_title">Amount</h3>
                    <input type="text" id="amount" name="amount" tabindex="2" class="qtrans_title_input" value="" /> &nbsp; <span style="font-size: 15px; font-weight: bold; color: #333"> &euro;</span>
                </div>
                
                <div class="postarea">
                    <h3 class="qtrans_title">Email</h3>
                    <input type="text" id="email" name="email" tabindex="2" class="qtrans_title_input" value="" />
                </div>

            </div>

        </div>

    </div>


    <div id="publishing-action">

        <input type="submit" value="Generate Link" accesskey="p" tabindex="5" id="action" class="button-primary" name="save" >
        <img alt="" id="ajax-loading" class="ajax-loading" src="<?=$url?>assets/img/backgnds/wpspin_light.gif" style="visibility: hidden;">
        <div class="updated below-h2" id="message">

            <p>Link generated.</p>

        </div>
    </div>
    <div class="clear"></div>

</form>

<!--FORM SUBMIT HANDLER  --> 
<script>

    jQuery(document).ready(function() {       

        // Override default error message
        jQuery.validator.messages.required = "";

        // Override generation of error label
        $("#post").validate({
            rules: {
                description: "required",
                amount: "required",
                email:{
                    required:true,
                    email:true
                }
            },
            submitHandler: function(form) {

                $('input[type=submit]', '#post').attr('disabled', 'disabled');
                jQuery('#message').hide(); 
                
                $('#ajax-loading').css('visibility','visible');

                var form = $("#post");
                var form_data = form.serialize();

                $.ajax({
                    url: base_url+'transactions/do_generate_link',
                    dataType: 'json',
                    type: "POST",
                    data: form_data,
                    success: function (data, textStatus, xhr) {
                        jQuery('#ajax-loading').css('visibility','hidden');

                        
                        if(data.success=='success'){

                            jQuery('#message p').html('Successful Generate Link Process');
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