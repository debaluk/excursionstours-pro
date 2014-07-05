qtrans_integrate = function(lang, lang_text, text) {
    var texts = qtrans_split(text);
    var moreregex = /<!--more-->/i;
    var text = '';
    var max = 0;
    var morenextpage_regex = /(<!--more-->|<!--nextpage-->)+$/gi;

    texts[lang] = lang_text;

    jQuery.each(wp_languages_short, function(key, value) { 

        texts[value] = texts[value].split(moreregex);
        if(!qtrans_isArray(texts[value])) {
            texts[value] = [texts[value]];
        }
        if(max < texts[value].length) max = texts[value].length;

    });

    for(var i=0; i<max; i++) {
        if(i >= 1) {
            text += '<!--more-->';
        }

        jQuery.each(wp_languages_short, function(key, value) { 

            if(texts[value][i] && texts[value][i]!=''){
                text += '<!--:'+value+'-->';
                text += texts[value][i];
                text += '<!--:-->';
            }

        });

    }
    text = text.replace(morenextpage_regex,'');
    return text;
}

switchEditors.go = function(id, lang) {

    //console.log('switchEditors:'+lang)
    id = id || 'content';
    lang = lang || 'toggle';

    if ( 'toggle' == lang ) {
        if ( ed && !ed.isHidden() )
            lang = 'html';
        else
            lang = 'tmce';
    } else if( 'tinymce' == lang ) 
        lang = 'tmce';

    var inst = tinyMCE.get('qtrans_textarea_' + id);
    var vta = document.getElementById('qtrans_textarea_' + id);
    var ta = document.getElementById(id);
    var dom = tinymce.DOM;
    var wrap_id = 'wp-'+id+'-wrap';

    // update merged content
    if(inst && ! inst.isHidden()) {
        //tinyMCE.triggerSave();
        qtrans_save(tinyMCE.get('qtrans_textarea_content').getContent());
        //console.log(tinyMCE.get('qtrans_textarea_content').getContent())
    } else {
        qtrans_save(vta.value);
        //console.log('qtrans_save:')
    }


    // check if language is already active
    if(lang!='tmce' && lang!='html' && document.getElementById('qtrans_select_'+lang).className=='wp-switch-editor switch-tmce switch-html') {
        return;
    }

    if(lang!='tmce' && lang!='html') {
        //console.log(qtrans_get_active_language())
        document.getElementById('qtrans_select_'+qtrans_get_active_language()).className='wp-switch-editor';
        document.getElementById('qtrans_select_'+lang).className='wp-switch-editor switch-tmce switch-html';
    }                
    // switch content
    qtrans_assign('qtrans_textarea_'+id,qtrans_use(lang,ta.value));
}

qtrans_assign = function(id, text) {
    var inst = tinyMCE.get(id);
    var ta = document.getElementById(id);
    if(inst && ! inst.isHidden()) {
        text = switchEditors.wpautop(text);
        inst.execCommand('mceSetContent', null, text);
    } else {
        ta.value = text;
    }
}

qtrans_save = function(text) {
    //console.log('save')

    var ta = document.getElementById('content');

    ta.value = qtrans_integrate(qtrans_get_active_language(),text,ta.value);
    //console.log(ta.value)

    return ta.value;
}

qtrans_get_active_language = function() {

    if(document.getElementById('qtrans_select_'+'me').className=='wp-switch-editor switch-tmce switch-html')
        return 'me';

    if(document.getElementById('qtrans_select_'+'en').className=='wp-switch-editor switch-tmce switch-html')
        return 'en';

    if(document.getElementById('qtrans_select_'+'ru').className=='wp-switch-editor switch-tmce switch-html')
        return 'ru';

    if(document.getElementById('qtrans_select_'+'fr').className=='wp-switch-editor switch-tmce switch-html')
        return 'fr';

    if(document.getElementById('qtrans_select_'+'al').className=='wp-switch-editor switch-tmce switch-html')
        return 'al';

}

// Create elements
jQuery.each(wp_languages_short, function(key, value) {

    //console.log('key:'+key+' -> value: '+value);

    var bc = document.getElementById('wp-content-editor-tools');
    var mb = document.getElementById('wp-content-media-buttons');
    var ls = document.createElement('a');
    var l = document.createTextNode(wp_languages[key]);
    ls.id = 'qtrans_select_'+value;
    ls.className = 'wp-switch-editor';
    ls.onclick = function() { switchEditors.go('content',value); };
    ls.appendChild(l);
    bc.insertBefore(ls,mb);

});

var waitForTinyMCE = window.setInterval(function() {
    if(typeof(tinyMCE) !== 'undefined' && typeof(tinyMCE.get2) == 'function' && tinyMCE.get2('content')!=undefined) {
        tinyMCE.get2('content').remove();
        window.clearInterval(waitForTinyMCE);

    }
}, 250);

function qtrans_editorInit2() {

    //console.log(languages[0])
    document.getElementById('qtrans_select_me').className='wp-switch-editor switch-tmce switch-html';
    var text = document.getElementById('content').value;
    qtrans_assign('qtrans_textarea_content',qtrans_use('me',text));

}

if(typeof(wpOnload)!='undefined') wpOnload2 = wpOnload;

jQuery(document).ready(function() {

    qtrans_editorInit2();

    jQuery('#qtrans_imsg').hide();

    jQuery('#content').hide();    

    // Activate TinyMCE if it's the user's default editor
    jQuery('#qtrans_textarea_content').show();

});