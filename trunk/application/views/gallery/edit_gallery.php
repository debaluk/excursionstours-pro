<div class="wrap">

    <h2>Gallery :: <?=$gallery['title']?></h2>

    <form accept-charset="utf-8" action="<?=$url?>gallery/submit_gallery" method="POST" class="nggform" id="updategallery">

        <input type="hidden" value="edit-gallery" name="post_action" id="post_action">
        <input type="hidden" value="<?=$gallery['ID']?>" name="gallery_ID">

        <div id="poststuff">    

            <div class="postbox " id="gallerydiv">

                <h3>Gallery settings</h3>

                <div class="inside">

                    <table class="form-table" id="fix-style">

                        <tbody>

                            <tr>

                                <th align="left">Title:</th>

                                <th align="left"><input type="text" value="<?=$gallery['title']?>" name="title" size="50"></th>

                            </tr>

                            <tr>

                                <th align="right">Link to:</th>

                                <th align="left">

                                    <select name="pageid">
                                        <option value="0">Not linked</option>

                                        <!--$page_type = Page, arrangements, cars etc...-->
                                        <!--SPECIFY IN POST_MODEL-->

                                        <?foreach($page_types as $page_type):?>

                                            <optgroup label="<?=ucfirst($page_type);?>">
                                            <?
                                           // echo $page_type;
                                                $rows = $this->posts_model->view_related_post($page_type);
                                                //print_r($rows);
                                                $selected = '';

                                                foreach($rows as $post):?>

                                                <? if($post['id']==$gallery['posts_ID']) $selected = 'selected="selected"'; ?>

                                                <option <?=$selected?> value="<?=$post['id']?>" class="level-0"> <?=$post['title']?></option>

                                                <? 
                                                    $selected ='';
                                                    endforeach; ?>

                                            <? endforeach; ?>

                                    </select>

                                </th>

                            </tr>

                        </tbody>

                    </table>

                    <div class="submit">

                        <input type="submit" value="Save Changes" name="updatepictures" class="button-primary action">

                    </div>

                </div>

            </div>

        </div> <!-- poststuff -->

    </form>  

    <? if(count($pictures)>0):?>

        <h2> <img src="<?=$url?>assets/img/titles/pictures.png" /> </h2>

        <form accept-charset="utf-8" action="<?=$url?>gallery/picture_order" method="POST"> 

            <input type="hidden" value="<?=$gallery['ID']?>" name="gallery_ID">

            <table cellspacing="0" class="widefat fixed" id="pro-listimages">

                <thead>
                    <tr>
                        <th class="manage-column column" id="thumbnail" scope="col">Thumbnail</th>
                        <th class="manage-column column-filename" id="filename" scope="col">Filename</th>
                        <th class="manage-column column last" scope="col">Order</th>
                    </tr>
                </thead>

                <tbody id="the-list">



                    <?  
                        $k=1;
                        foreach($pictures as $picture): ?> 

                        <tr <?if($k%2==0)echo 'class="tr-odd"';?>>
                            <?

                                $pic_pices = explode('.',$picture['name']);
                                $pic_title = $pic_pices[0];

                            ?>

                            <?
                                $pic_arr = explode('.',$picture['filename']);
                                $thumb_filename = $pic_arr[0].'_105x79_exacttop.'.$pic_arr[1];
                                $preview_filename = 'thumbnail/'.$pic_arr[0].'_454x340_exacttop.'.$pic_arr[1];

                            ?>

                            <td class="column-thumbnail">
                                <a rel="lightbox" title="<?=$picture['name']?>" href="<?=$url?>pro-gallery/<?=$gallery['path']?>/<?=$preview_filename?>">

                                    <img src="<?=$url?>pro-gallery/<?=$gallery['path']?>/thumbnail/<?=$thumb_filename?>" />

                                </a>
                            </td>

                            <td>
                                <strong>
                                    <?=$pic_title?>

                                </strong>
                                <br><?=date('m.d.Y',$picture['date_time'])?>
                                <!--<br>1055 x 959 pixel -->                           
                                <p>
                                </p>

                                <div class="row-actions">
                                    <span class="view">
                                        <a title="View &quot;<?=$picture['name']?>&quot;" href="<?=$url?>pro-gallery/<?=$gallery['path']?>/<?=$picture['filename']?>" class="shutter">View</a> | </span>
                                    <span class="delete">
                                        <a onclick="javascript:check=confirm( 'Delete &quot;<?=$picture['name']?>&quot; ?');if(check==false) return false;" href="<?=$url?>gallery/delete_picture/<?=$picture['ID']?>/<?=$gallery['ID']?>" class="submitdelete">Delete</a></span>

                                </div>

                                <p></p>

                            </td>

                            <td class="column-order last">

                                <input name="picture-order[]" value="<?=$picture['order']?>" tabindex="<?=$k+5?>" />

                            </td>

                        </tr>

                        <? 
                            $k++;
                            endforeach; ?>


                </tbody>

            </table>

            <div class="submit" style="margin-top: 23px;">

                <input type="submit" value="Save Order" name="pictures-order" class="button-primary action">

            </div>

        </form>
        <? if(count($videos)>0)echo '<br />';?>
        <? endif; ?>

    <? if(count($videos)>0):?>

        <script type="text/javascript" src="<?=$url?>assets/js/mootools.js"></script>
        <script type="text/javascript" src="<?=$url?>assets/js/swfobject.js"></script>

        <script type="text/javascript" src="<?=$url?>assets/js/videobox.js"></script>
        <link rel="stylesheet" href="<?=$url?>assets/css/videobox.css" type="text/css" media="screen" />  

        <h2> <img src="<?=$url?>assets/img/titles/videos.png" /> </h2>

        <form accept-charset="utf-8" action="<?=$url?>gallery/video_order" method="POST"> 

            <input type="hidden" value="<?=$gallery['ID']?>" name="gallery_ID">

            <table cellspacing="0" class="widefat fixed" id="pro-listimages">

                <thead>
                    <tr>
                        <th class="manage-column column" id="thumbnail" scope="col">Thumbnail</th>
                        <th class="manage-column column-filename" id="filename" scope="col">Filename</th>
                        <th class="manage-column column last" scope="col">Order</th>
                    </tr>
                </thead>

                <tbody id="the-list">



                    <?  
                        $k=1;
                        foreach($videos as $video): ?> 

                        <tr <?if($k%2==0)echo 'class="tr-odd"';?>>

                            <td class="column-thumbnail">
                                <div class="yt-logo"><img src="<?=$url?>assets/img/yt-logo.png" /> </div>
                                <a href="http://www.youtube.com/watch?v=<?=$video['link']?>" rel="vidbox 600 400" title="<?=$video['name']?>">
                                    <img src="<?=$url?>pro-gallery/<?=$gallery['path']?>/videos/thumbnail/<?=$video['link']?>_105x79_exacttop.jpg" />
                                </a>

                            </td>

                            <td>
                                <strong>
                                    <?=$video['name']?>

                                </strong>
                                <br><?=date('m.d.Y',$video['date_time'])?>                           

                                <div class="row-actions">
                                    <span class="view">      
                                        <a href="http://www.youtube.com/watch?v=<?=$video['link']?>" rel="vidbox  600 400" title="View &quot;<?=$video['name']?>&quot;"> View</a> | </span>
                                    <span class="delete">
                                        <a onclick="javascript:check=confirm( 'Delete &quot;<?=$video['name']?>&quot; ?');if(check==false) return false;" href="<?=$url?>gallery/delete_video/<?=$video['ID']?>/<?=$gallery['ID']?>" class="submitdelete">Delete</a></span>

                                </div> 

                            </td>

                            <td class="column-order last">

                                <input name="video-order[]" value="<?=$video['order']?>" tabindex="<?=$k+5?>" />

                            </td>

                        </tr>

                        <? 
                            $k++;
                            endforeach; ?>


                </tbody>

            </table>

            <div class="submit" style="margin-top: 23px;">

                <input type="submit" value="Save Order" name="pictures-order" class="button-primary action">

            </div>

        </form>

        <? endif; ?>

</div>

<!-- jQuery Add gallery script -->
<script type="text/javascript">

    jQuery(document).ready(function(){


            jQuery('input[name="updatepictures"]').live('click',function(){

                    if(jQuery('input[name="title"]').val()!=""){
                        jQuery('#addgallery_form').submit();
                    }else{
                        alert('Enter gallery title');
                        return false;
                    }

            });

    });

</script>
<script type="text/javascript">
    jQuery(function() {

            jQuery('a[rel=lightbox]').lightBox({   
                    overlayBgColor: '#000',
                    overlayOpacity: 0.6,
                    imageLoading: base_url+'assets/img/lightbox/loading.gif',
                    imageBtnClose: base_url+'assets/img/lightbox/close.gif',
                    imageBtnPrev: base_url+'assets/img/lightbox/prev.gif',
                    imageBtnNext: base_url+'assets/img/lightbox/next.gif',
                    imageBlank : base_url+'assets/img/lightbox/blank.gif',
                    containerResizeSpeed: 350,
                    txtImage: 'Image',
                    txtOf: 'of'
            });
    });
</script>