<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />        
        <meta name="keywords" content="Accommodation - PRO" />
        <meta name="description" content="Accommodation - PRO" />
        <meta name="Language" content="en" />
        <title>Rentacar - PRO | <?=$title?></title>  
        <link rel="icon" href="<?=base_url()?>assets/img/pngico.png" type="image/x-icon" />



        <!-- VARS to JS -->
        <script type="text/javascript">
            var base_url = '<?=base_url()?>';
            var site_url = '<?=site_url()?>';
            var page = '<?=$page?>';
            var sub = '<?=$sub?>';
            var upsub = '<?=$upsub?>';
            var path = base_url+'assets/';
            var lang = '<?=$lang?>';
            //var system_url = 'http://localhost/_informacionisistem/excursion_&_tours/';
            var system_lang = '<?=$language?>'; 

        </script>   

        <!--DISPLAY Assets CSS & JS --> 
        <?  
            $this->montenegrin->display();
        ?>
        
        <?if($page.'/'.$sub == 'gallery/add_gallery_images'){?> 
        <link href="<?=base_url()?>assets/css/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css"> 
        <?}else{?>
        <link href="<?=base_url()?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"> 
        <?}?>

        <? if (($page=='excursions' && ($sub=='edit_v' || $sub=='add_v')) || ($page=='tours' && ($sub=='edit_v' || $sub=='add_v'))): ?>
            <!--TINY MCE EDITOR-->
            <script src="<?=$url?>assets/js/editor.js" type="text/javascript"></script>
            <script src="<?=base_url()?>assets/js/tinymce/tiny_mce.js" type="text/javascript"></script>
            <script type="text/javascript">

                tinyMCE.init({

                        mode : "textareas",
                        theme : "advanced",
                        plugins : "lists,inlinepopups,paste,directionality,xhtmlxtras",
                        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup",
                        theme_advanced_buttons2 : "",
                        theme_advanced_buttons3 : "",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : false,
                        content_css : base_url+"assets/js/tinymce/themes/advanced/skins/default/custom_content.css",
                        relative_urls:false,
                        remove_script_host:false,
                        convert_urls:false,
                        remove_linebreaks:true,
                        gecko_spellcheck:true,
                        keep_styles:false,
                        entities:"38,amp,60,lt,62,gt",
                        accessibility_focus:true,
                        tabfocus_elements:"major-publishing-actions",
                        media_strict:false,
                        paste_remove_styles:true,
                        paste_remove_spans:true,
                        paste_strip_class_attributes:"all",
                        paste_text_use_dialog:true,
                        extended_valid_elements:"article[*],aside[*],audio[*],canvas[*],command[*],datalist[*],details[*],embed[*],figcaption[*],figure[*],footer[*],header[*],hgroup[*],keygen[*],mark[*],meter[*],nav[*],output[*],progress[*],section[*],source[*],summary,time[*],video[*],wbr",
                        wpeditimage_disable_captions:false,
                        wp_fullscreen_content_css:"http://localhost/wordpress/wp-includes/js/tinymce/plugins/wpfullscreen/css/wp-fullscreen.css",
                        plugins:"inlinepopups,spellchecker,tabfocus,paste,media",
                        content_css:base_url+"assets/css/editor/editor-style.css",elements:"content",
                        wpautop:true,
                        apply_source_formatting:false,
                        theme_advanced_buttons1:"bold,italic,strikethrough,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,wp_more,|,spellchecker,wp_fullscreen,wp_adv,separator",
                        theme_advanced_buttons2:"formatselect,underline,justifyfull,forecolor,|,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo,wp_help",
                        theme_advanced_buttons3:"",
                        theme_advanced_buttons4:""

                });
            </script>
            <link rel="stylesheet" href="<?=$url?>assets/js/tinymce/themes/advanced/skins/default/ui.css">
            <link media="all" type="text/css" href="<?=$url;?>assets/css/editor-buttons.css?ver=20111114" id="editor-buttons-css" rel="stylesheet">
            <link href="<?=$url?>assets/css/qtrans.css" rel="stylesheet" type="text/css">

            <!--/TINY MCE EDITOR-->

            <? endif; ?>

        <!--PLUPLOAD UPLOAD-->
        <script type="text/javascript" src="<?=base_url()?>assets/js/plupload/plupload.full.js"></script>
        <!--/PLUPLOAD UPLOAD-->

        <!--LIGHTBOX-->
        <link href="<?=base_url()?>assets/css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.lightbox-0.5.min.js"></script>
        <!--/LIGHTBOX-->

        <!--Busy Plugin-->
        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.busy.min.js"></script> 
        <!--/Busy Plugin-->

        <!--MODAL PLUGIN-->
        <link href="<?=base_url()?>assets/css/basic-modal.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.simplemodal.js"></script>
        <!--/MODAL PLUGIN-->
        <?
            switch($page.'/'.$sub) {

                case 'reservations/view_all_reservations':?>
                <script type="text/javascript" src="<?=$url?>assets/js/reservations/reservations.js"></script> 
                <?break;

                case 'cars/edit_car';?>
                <script type="text/javascript" src="<?=$url?>assets/js/cars/edit.js"></script> 
                <?break;

                case 'cars/add_car';?>
                <script type="text/javascript" src="<?=$url?>assets/js/cars/add.js"></script> 
                <?break;
            }
        ?>

        <? if ($page=='excursions/booking' || $page=='tours/booking'): ?>

            <!-- IT-Montenegro Rentacar CSS       -->
            <link type="text/css" rel="stylesheet" href="<?=$url;?>assets/css/excursionsbooking.css">
            <link type="text/css" rel="stylesheet" href="<?=$url;?>assets/css/customer.css">  


            <!-- IT-Montenegro Rentacar JS       -->

            <script type="text/javascript" src="<?=$url?>assets/js/jquery.history.js"></script>   
            <script type="text/javascript" src="<?=$url?>assets/js/<?=$page?>/booking.js"></script>   
            <script type="text/javascript" src="<?=$url?>assets/js/jquery.idTabs.min.js"></script>   

            <? endif; ?>


    </head>

    <body>
        <? //echo $page.'/'.$sub; ?>
        <div id="wrap">

            <div id="header" class="clearfix"><? $this->load->view('header')?></div>

            <div id="content321" class="clearfix"><?=$contlayout ?></div>

            <div id="footer" class="clearfix"><? $this->load->view('footer'); ?></div>

        </div>

        <div id="modaleditor" style="display: none;">    

            <div>
                <h4 style="background-color: #E77817; color: #FFFFFF; padding: 7px 5px; width: 260px; font-size: 11px;">Rentacar PRO</h4>

                <p id='html_msg' style="line-height: 16px; color: #3D3D3D; font-weight: bold; padding: 3px 5px"></p>

                <div style="text-align: center; margin-top: 30px; width: 100%; display: none" id="close_modal_wrap">

                    <a href="javascript:" id="refreshdates" style="width: 89px; display: none;" >Refresh</a>
                    <a href="javascript:" id="close_modal" style="width: 89px;" >Close</a>
                </div>

            </div>

        </div>  

    </body>

</html>