(function($){

        $.fn.addTag = function(v){
            var r = v.split(',');
            for(var i in r){
                n = r[i];//.replace(/([^a-zA-Z0-9ŠšĐđŽžČčĆćЉљЊњЕеРрТтЗзУуИиОоПпШшЂђЖжАаСсДдФфГгХхЈјКкЛлЧчЋћЏџЦцВвБбНнМм\s\-\_])|^\s|\s$/g, '');
                if(n == '') return false;
                var fn = $(this).data('name');
                var i = $('<input type="hidden" />').attr('name',fn).val(n);
                var t = $('<li />').text(n).addClass('tagName')
                .click(function(){
                        // remove
                        var hidden = $(this).data('hidden');
                        $(hidden).remove();
                        $(this).remove();
                })
                .data('hidden',i);
                var l = $(this).data('list');
                $(l).append(t).append(i);
            }
        };
})(jQuery); 
$(document).ready(function(){
        $('.tagger').each(function(i){
                $(this).data('name', $(this).attr('name'));
                $(this).removeAttr('name');
                var b = $('<button type="button" class="sbutton sbtndodaj" style="margin-left: 7px;">Dodaj</button>').addClass('tagAdd')
                .click(function(){
                        var tagger = $(this).data('tagger');
                        $(tagger).addTag( $(tagger).val() );
                        $(tagger).val('');
                        $(tagger).stop();
                })
                .data('tagger', this);
                var l = $('<ul />').addClass('tagList');
                $(this).data('list', l);
                $(this).after(l).after(b);
        })
        .bind('keypress', function(e){
                if( 13 == e.keyCode){
                    //console.log(e.keyCode);
                    $(this).addTag( $(this).val() );
                    $(this).val('');
                    $(this).stop();
                    return false;
                }
        }); 
        $('#addtour').live('submit',function(){
                var numItems = $('.tagName').length
                if(numItems==0){
                    alert ("Please select at least one departure date")
                }
                $.ajax({
                        url: site_url+'tours/tours/update',
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType:'json',
                        success:function(data){
                            if(data.success == 'success'){
                                $('#infomessage').html('Uredili ste turu.').fadeIn('normal');
                                $('#addtour').remove();
                            }else{
                                $('#infomessage').html(data.message).fadeIn('normal');
                            }
                        }
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