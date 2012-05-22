/*
*      ADD EXCURSION JS FILE
*      28.05.2010
*/

$(document).ready(function(){

        $('#addexcursion').live('submit',function(){
                $.ajax({
                        url: site_url+'index.php/excursions/excursions/update/',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data){
                            if(data.success == 'success'){
                                $('#infomessage').html('Uredili ste izlet.').fadeIn('fast');
                                $('#addexcursion').hide();
                                window.location.href = site_url+'excursions/excursions/views';
                            }else{
                                $('#infomessage').html(data.message).fadeIn('normal');
                            }
                        },
                        dataType: 'json'
                });
        });
    
        tinyMCE.init({

                mode : "specific_textareas",
                editor_selector : "tinymce",
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

});