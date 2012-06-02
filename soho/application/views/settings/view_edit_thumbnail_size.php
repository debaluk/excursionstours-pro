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

<?  

    if($post_action=='edit'){?> <h2>Edit Thumbnail Size <a class="add-new-h2" href="<?=$url?>settings/view_add_thimbnail_size">Add New</a> </h2>

    <?}else {?> <h2> <img src="<?=$url?>assets/img/titles/new_thumbnail_size.png" /> </h2> <?}         
?> 

<form id="post" method="post" action="javascript:" name="post">

    <input type="hidden" value="<?=$post_action;?>" name="post_action" id="post_action">
    <input type="hidden" value="<?=$post_type;?>" name="post_type" id="post_type">
    <?        
        if($post_action=='edit'){?>
        <input type="hidden" value="<?=$post['ID'];?>" name="post_ID" id="post_ID">
        <?}
    ?>

    <div class="metabox-holder has-right-sidebar" id="poststuff">

        <div id="post-body">

            <div id="post-body-content">

                <?if($post_action=='edit') $dimension = unserialize($post['user_data']);?>
            
                <div class="postarea">
                    <h3 class="qtrans_title">Width</h3>
                    <input type="text" id="width" name="width" tabindex="1" class="qtrans_title_input" value="<?if($post_action=='edit')echo $dimension['w'];?>" />
                </div>

                <div class="postarea">
                    <h3 class="qtrans_title">Height</h3>
                    <input type="text" id="height" name="height" tabindex="2" class="qtrans_title_input" value="<?if($post_action=='edit')echo $dimension['h'];?>" />
                </div>
                
                <div class="postarea">
                    <h3 class="qtrans_title">Description</h3>
                    <input type="text" id="description" name="description" tabindex="3" class="qtrans_title_input" value="<?if($post_action=='edit')echo $post['description'];?>" />
                </div>

            </div>

        </div>

    </div>

    <?        
        if($post_action=='edit'){?>
        <div id="delete-action">
            <a href="<?=$url?>settings/delete/<?=$post['ID']?>" class="submitdelete deletion delete_post">Move to Trash</a>
        </div>
        <?};        
    ?>


    <div id="publishing-action">

        <input type="submit" value="<?if($post_action=='edit'){echo 'Update';}else echo 'Create New Thumbnail Size';?>" accesskey="p" tabindex="5" id="action" class="button-primary" name="save" disabled="disabled">
        <img alt="" id="ajax-loading" class="ajax-loading" src="<?=$url?>assets/img/backgnds/wpspin_light.gif" style="visibility: hidden;">
        <div class="updated below-h2" id="message">

            <p><?=ucfirst($post_type)?> updated.</p>

        </div>
    </div>
    <div class="clear"></div>

</form>

<!--POST DELETE HANDLER--> 
<script type="text/javascript">
    jQuery(document).ready(function() {

            jQuery('.delete_post').live('click',function(){

                    var conf = confirm("Delete Thumbnail Size?")
                    if (!conf){
                        return false;
                    }

                    window.location.href = jQuery(this).attr('href');

                    return false;

            });

    } );
</script>
<!--/POST DELETE HANDLER-->

<!--FORM SUBMIT HANDLER-->
<script>

    jQuery(document).ready(function() {       

            // Override default error message
            jQuery.validator.messages.required = "";

            // Override generation of error label
            $("#post").validate({
                    errorPlacement: function(error, element) {
                        /*element.parent("div").addClass('error');*/
                    },
                    debug:true,
                    rules: {
                        width: "required",
                        height: "required"
                    },
                    submitHandler: function(form) {

                        $('input[type=submit]', '#post').attr('disabled', 'disabled');

                        $('#ajax-loading').css('visibility','visible');

                        var form = $("#post");
                        var form_data = form.serialize();

                        $.ajax({
                                url: base_url+'settings/submit_post',
                                dataType: 'json',
                                type: "POST",
                                data: form_data,
                                success: function (data, textStatus, xhr) {
                                    jQuery('#ajax-loading').css('visibility','hidden');

                                    if(data.action==true){

                                        jQuery('#message').show();

                                        // REDIRECT
                                        function promo_show(){
                                            window.location.href = base_url+'settings/view_all_thimbnail_size'; 
                                        }
                                        window.setTimeout(function() { promo_show(); }, 1001);

                                    }else{

                                        $('#post').removeAttr('disabled');                             
                                        alert(data.msg)  
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