
<h2> <img src="<?=$url?>assets/img/titles/all_galeries.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Gallery</th>
                <th>Link to</th>
                <th>Images</th>
                <th>Videos</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($all_galleries as $gallery): ?> 

                <?  
                //print_r($gallery); 
                    if($gallery['table']!=NULL){   
                    print_r($gallery['table']); 
                        $post = $this->posts_model->view_post($gallery['table'], $gallery[$gallery['table'].'_id']);
                        print_r($post);
                        
                    }
                ?>

                <tr <?if($k%2==0)echo 'class="tr-odd"';?>>
                    <td><a href="<?=$url?>gallery/view_edit_gallery?gallery_ID=<?=$gallery['ID']?>" class="row-title"><?=$gallery['title']?></a></td>
                    <td><?=$gallery['table']!=NULL  ?  $post['title']  :  'Not linked' ?></td>
                    <td><?=$gallery['pic_count']?></td>
                    <td><?=$gallery['vid_count']?></td>
                    <td class="center last">
                        <a href="<?=$url?>gallery/view_edit_gallery?gallery_ID=<?=$gallery['ID']?>">Edit</a> |
                        <a href="<?=$url?>gallery/delete/<?=$gallery['ID']?>" class="delete_gallery">Delete</a>
                    </td>
                </tr>                

                <? 
                    $k++;
                    endforeach; ?>

        </tbody>
    </table>

    <div class="spacer"></div>


</div>
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function() {
            /*oTable = jQuery('#example').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
            }); */

            jQuery('.delete_gallery').live('click',function(){

                    var conf = confirm("Delete gallery?")
                    if (!conf){
                        return false;
                    }

                    window.location.href = jQuery(this).attr('href');

                    return false;

            });

    } );
</script>