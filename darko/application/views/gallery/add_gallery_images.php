<div id="wpbody-content">

    <!-- jQuery Tabs script -->
    <script type="text/javascript">

        jQuery(document).ready(function(){
                jQuery('html,body').scrollTop(0);
                jQuery('#slider').tabs({ fxFade: true, fxSpeed: 'fast' });
                //jQuery('#slider').tabs( "select", 1 ); // activate second tab 
                jQuery('#slider').css('display', 'block');

        });

    </script>

    <div style="display: none;" class="wrap" id="slider">

        <ul id="tabs">

            <li><a href="#uploadimage">Upload Images</a></li>
            <li><a href="#uploadvideo">Upload Videos</a></li>
            <li><a href="#addgallery">Add new gallery</a></li>

        </ul>

        <!--UPLOAD IMAGES-->
        <div id="uploadimage">

            <h2> <img src="<?=$url?>assets/img/titles/upload_images.png" /> </h2>

            <form accept-charset="utf-8" action="<?=$url?>gallery/submit_gallery" enctype="multipart/form-data" method="POST" id="uploadimage_form" name="uploadimage">           

                <input type="hidden" value="new-pictures" name="post_action">

                <table class="form-table">

                    <tbody>

                        <tr valign="top">

                            <th scope="row">Upload image</th>

                            <td>

                                <div id="plupload-upload-ui">

                                    <div>
                                        Choose files to upload                        
                                        <input type="button" class="button" value="Select Files" id="plupload-browse-button" style="position: relative; z-index: 0;">
                                    </div>

                                    <div id="uploadQueue"></div>

                                </div>

                            </td>

                        </tr> 

                        <tr valign="top"> 

                            <th scope="row">in to</th> 

                            <td>

                                <select id="galleryselect" name="galleryselect">
                                    <option value="0">Choose gallery</option>

                                    <? foreach($all_galleries as $one_gallery):?>
                                        <option value="<?=$one_gallery['ID']?><--delimiter!--><?=$one_gallery['path']?>" class="level-0"><?=$one_gallery['title']?></option>
                                        <? endforeach; ?>
                                </select>

                                <br>                
                                <br>

                            </td> 

                        </tr> 

                    </tbody>

                </table>

                <div class="submit">

                    <input type="button" value="Upload images" id="plupload_btn" name="uploadimage" class="button-primary">

                </div>

            </form>

        </div>
        <!--/UPLOAD IMAGES-->

        <!--UPLOAD VIDEO-->
        <div id="uploadvideo" class="clearfix">

            <div class="v-left">

                 <h2> <img src="<?=$url?>assets/img/titles/upload_videos.png" /> </h2>

                <form accept-charset="utf-8" action="<?=$url?>gallery/submit_gallery" enctype="multipart/form-data" method="POST" id="uploadvideo_form" name="uploadvideo">           

                    <input type="hidden" value="new-videos" name="post_action">

                    <table class="form-table">

                        <tbody>

                            <tr valign="top">

                                <th scope="row">Upload video</th>

                                <td>

                                    <div>

                                        <div>
                                            <input type="text" name="yt-link" id="yt-link" value="" />                       
                                            <input type="button" class="button" value="Check Link" id="yt-check" style="position: relative; z-index: 0;">
                                        </div>

                                    </div>

                                </td>

                            </tr> 
                            
                            <tr valign="top">

                                <th scope="row">Name</th>

                                <td>

                                    <div>

                                        <div>
                                            <input type="text" name="yt-name" id="yt-name" value="" />                       
                                        </div>

                                    </div>

                                </td>

                            </tr> 

                            <tr valign="top"> 

                                <th scope="row">in to</th> 

                                <td>

                                    <select id="galleryselect2" name="galleryselect2">
                                        <option value="0">Choose gallery</option>

                                        <? foreach($all_galleries as $one_gallery):?>
                                            <option value="<?=$one_gallery['ID']?><--delimiter!--><?=$one_gallery['path']?>" class="level-0"><?=$one_gallery['title']?></option>
                                            <? endforeach; ?>
                                    </select>

                                    <br>                
                                    <br>

                                </td> 

                            </tr> 

                        </tbody>

                    </table>

                    <div class="submit">

                        <input type="button" value="Upload videos" id="v-upload" name="uploadvideo" class="button-primary">

                    </div>

                </form>

            </div>

            <div class="v-left">

                <div id="video-preview"></div>

            </div>

        </div>
        <!--/UPLOAD VIDEO-->

        <!--ADD GALLERY-->
        <div id="addgallery">

            <!-- create gallery -->
            <h2> <img src="<?=$url?>assets/img/titles/add_new_gallery.png" /> </h2>

            <form accept-charset="utf-8" action="<?=$url?>gallery/submit_gallery" method="POST" id="addgallery_form" name="addgallery">

                <input type="hidden" value="new-gallery" name="post_action">            

                <table class="form-table"> 
                    <tbody>


                        <tr valign="top"> 

                            <th scope="row">New Gallery:</th> 

                            <td>

                                <input type="text" value="" name="galleryname" size="43"><br>

                                <i>( Allowed characters are: a-z, A-Z, 0-9, -, _ )</i>

                            </td>

                        </tr>

                    </tbody>

                </table>

                <div class="submit">

                    <input type="submit" value="Add gallery" name="addgallery" class="button-primary">

                </div>

            </form>

        </div>
        <!--/ADD GALLERY-->

    </div>

    <div class="clear"></div>

</div>

<!-- jQuery Add gallery script -->
<script type="text/javascript">

    jQuery(document).ready(function(){


            jQuery('input[name="addgallery"]').live('click',function(){

                    if(jQuery('input[name="galleryname"]').val()!=""){
                        jQuery('#addgallery_form').submit();
                    }else{
                        alert('Enter gallery name');
                        return false;
                    }

            });

    });

</script>

<!-- jQuery Upload Files script -->
<script type="text/javascript">

    jQuery(document).ready(function(){

            var folder = 'tempatt/';

            var uploader = new plupload.Uploader({

                    runtimes: 'flash',
                    flash_swf_url: base_url+'assets/js/plupload/plupload.flash.swf',
                    browse_button: 'plupload-browse-button ',
                    container: 'plupload-upload-ui',
                    url: base_url+'assets/js/plupload/upload.php',
                    multipart : false,
                    multipart_params: { 'datafield': folder },
                    unique_names: true ,
                    // Specify what files to browse for
                    filters : [
                        {title : "Image files", extensions : "jpg,jpeg,gif,png,JPG,JPEG,GIF,PNG"}
                    ]

            });

            uploader.settings.multipart_params.datafield = folder;    

            uploader.init();

            uploader.bind('FilesAdded', function(up, files) {        
                    // loop through the files array
                    for (var i in files) {            
                        document.getElementById('uploadQueue').innerHTML += '<div id="' + files[i].id + '">[<a href="javascript:">remove</a>] ' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <b></b></div>';            
                    }
                    //console.log(uploader.settings.multipart_params.datafield)  
            });

            uploader.bind('UploadProgress', function(up, file) {        
                    document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";        
            });

            uploader.bind('Error', function(up, args) {        
                    alert(args.code + ': ' + args.message);        
            });

            document.getElementById('plupload_btn').onclick = function() { 

                if(jQuery('#uploadQueue').children().length==0){
                    alert('Please select files to upload')
                    return false;
                }

                if(jQuery('#galleryselect').val()==0){
                    alert('Please choose gallery')
                    return false;
                }

                uploader.start();         
            };

            uploader.bind('BeforeUpload', function(up, file) {

                    galleryselect = jQuery("#galleryselect").val();

                    path = galleryselect.split("<--delimiter!-->");

                    up.settings.url =  base_url+'assets/js/plupload/upload.php'+"?gellery_path="+"pro-gallery/"+path[1]+'/';
            });


            uploader.bind('FileUploaded', function(up, file, info) {                      

                    /*console.log(up);
                    console.log(file);
                    console.log(info);*/

                    jQuery('#uploadimage_form').append('<input type="hidden" name="pictures[]" value="'+file.target_name+'" />');
                    jQuery('#uploadimage_form').append('<input type="hidden" name="pic_titles[]" value="'+file.name+'" />');

                    if( (uploader.total.uploaded) == uploader.files.length) {
                        //window.location = 'uploaded.php?file=' + encodeURIComponent(File.name);
                        //console.log("uploaded complete:"+File.name);
                        //alert("Upload complete")
                        jQuery('#uploadimage_form').submit();
                    };

            });

            jQuery('#uploadQueue a').live('click', function(){

                    jQuery(this).parent().fadeOut('slow').remove();
            })

    });

</script>

<style>
    .flash{
        background: none repeat scroll 0 0 transparent !important;
        height: 25px !important;
        left: 128px !important;
        opacity: 0 !important;
        overflow: hidden !important;
        position: absolute !important;
        top: 1px !important;
        width: 88px !important;
        z-index: 99 !important;
    }
    #uploadQueue{
        margin: 7px 0;
    }
</style>

<!-- jQuery Upload Videos script -->
<script language="JavaScript">
    $(function() {

            $('#yt-check').live('click', function(){

                    var file = $('#yt-link').val();

                    if(file == ''){
                        alert("Molio unesite link.");
                        return;
                    }

                    $('#video-preview').html('<iframe width="270" height="170" src="http://www.youtube.com/embed/'+file+'" frameborder="0" allowfullscreen></iframe>');

            });



            jQuery('input[name="uploadvideo"]').live('click',function(){

                    if(jQuery('#galleryselect2').val()!=0){
                        jQuery('#uploadvideo_form').submit();
                    }else{
                        alert('Please choose gallery')
                        return false;
                    }

            });

    });
</script>