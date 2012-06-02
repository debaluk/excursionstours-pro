
<h2> <img src="<?=$url?>assets/img/titles/all_thumbnail_size.png" /> </h2>


<div class="updated below-h2" id="message" <? if(isset($_GET['m'])) echo 'style="display:block; width: 98%;float: none; margin:0; margin-bottom:13px"';?>>

    <p>
        <?if(isset($_GET['m'])) echo 'All Thumbnails successfuly created.'?>
    </p>

</div>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Thumnail Size</th>
                <th>Description</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=0;
                foreach($all_posts as $post): ?> 

                <tr <?if($k%2==0)echo 'class="tr-odd"';?>>

                    <? $dimension = unserialize($post['user_data']); ?>

                    <td><strong><?=$dimension['w'].' x '. $dimension['h']?></strong></td>
                    <td><?=$post['description']?></td>
                    <td class="center last">
                        <a href="<?=$url?>settings/view_edit_thimbnail_size?post_ID=<?=$post['ID']?>">Edit</a> |
                        <a href="<?=$url?>settings/delete/<?=$post['ID']?>" class="delete_post">Delete</a>
                    </td> 

                </tr>                                      

                <? 
                    $k++;
                    endforeach; ?>

        </tbody>
    </table>

    <div class="spacer"></div>
    <div id="publishing-action">
        <div class="all_thumbnails_again">
            <a href="<?=$url?>gallery/create_thumbnails_again" title="Create All Thubmnail To New Sizes" class="button-primary">Create All Thubmnail To New Sizes</a>
            <img alt="" id="ajax-loading" class="ajax-loading" src="<?=$url?>assets/img/backgnds/wpspin_light.gif" style="visibility: hidden;">
            <div class="description" style="visibility: hidden;">Please be patient.<br> This may take a few moments.</div>
        </div>
    </div>

</div>

<div class="spacer"></div>


<!--</div>--> 
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function() {

            jQuery('.delete_post').live('click',function(){

                    var conf = confirm("Delete <?=ucfirst($post_type)?>?")
                    if (!conf){
                        return false;
                    }

                    window.location.href = jQuery(this).attr('href');

                    return false;

            });

            jQuery('.button-primary').live('click',function(){

                    if (jQuery(this).attr('href')=='javascript:'){
                        return false;
                    }

                    var conf = confirm("Are you sure to create all thumbnaiols again. This may take up to 2 min?")
                    if (!conf){
                        return false;
                    }

                    $('#ajax-loading').css('visibility','visible');
                    $('.all_thumbnails_again .description').css('visibility','visible');

                    window.location.href = jQuery(this).attr('href');

                    jQuery(this).attr('href','javascript:')

                    return false;

            });

    } );
</script>
