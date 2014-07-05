function qtrans_editorInit1() {

    qtrans_isArray = function(obj) {
        if (obj.constructor.toString().indexOf('Array') == -1)
            return false;
        else
            return true;
    }

    String.prototype.xsplit = function(_regEx){
        // Most browsers can do this properly, so let them — they'll do it faster
        if ('a~b'.split(/(~)/).length === 3) { return this.split(_regEx); }

        if (!_regEx.global)
            { _regEx = new RegExp(_regEx.source, 'g' + (_regEx.ignoreCase ? 'i' : '')); }

        // IE (and any other browser that can't capture the delimiter)
        // will, unfortunately, have to be slowed down
        var start = 0, arr=[];
        var result;
        while((result = _regEx.exec(this)) != null){
            arr.push(this.slice(start, result.index));
            if(result.length > 1) arr.push(result[1]);
            start = _regEx.lastIndex;
        }
        if(start < this.length) arr.push(this.slice(start));
        if(start == this.length) arr.push(''); //delim at the end
        return arr;
    };

    qtrans_split = function(text) {
        var split_regex = /(<!--.*?-->)/gi;
        var lang_begin_regex = /<!--:([a-z]{2})-->/gi;
        var lang_end_regex = /<!--:-->/gi;
        var morenextpage_regex = /(<!--more-->|<!--nextpage-->)+$/gi;
        var matches = null;
        var result = new Object;
        var matched = false;


        jQuery.each(wp_languages_short, function(key, value) { 
            result[value] = '';
        });


        var blocks = text.xsplit(split_regex);
        if(qtrans_isArray(blocks)) {
            for (var i = 0;i<blocks.length;i++) {
                if((matches = lang_begin_regex.exec(blocks[i])) != null) {
                    matched = matches[1];
                } else if(lang_end_regex.test(blocks[i])) {
                    matched = false;
                } else {
                    if(matched) {
                        result[matched] += blocks[i];
                    } else {

                        jQuery.each(wp_languages_short, function(key, value) { 
                            result[value] += blocks[i];
                        });

                    }
                }
            }
        }
        for (var i = 0;i<result.length;i++) {
            result[i] = result[i].replace(morenextpage_regex,'');
        }
        return result;
    }        

    qtrans_use = function(lang, text) {
        var result = qtrans_split(text);
        return result[lang];
    }

    qtrans_integrate_title = function() {
        var t = document.getElementById('title');

        jQuery.each(wp_languages_short, function(key, value) { 

            t.value = qtrans_integrate(value,document.getElementById('qtrans_title_'+value).value,t.value);

        });

    }

    // Create elements
    jQuery.each(wp_languages_short, function(key, value) {

        //console.log('key:'+key+' -> value: '+value);

        var td = document.getElementById('titlediv');
        var qtd = document.createElement('div');
        var h = document.createElement('h3');
        var l = document.createTextNode('Title ('+wp_languages[key]+')');
        var tw = document.createElement('div');
        var ti = document.createElement('input');
        var slug = document.getElementById('edit-slug-box');

        ti.type = 'text';
        ti.id = 'qtrans_title_'+value;
        ti.tabIndex = '1';
        ti.value = qtrans_use(value, document.getElementById('title').value);
        ti.onchange = qtrans_integrate_title;
        ti.className = 'qtrans_title_input';
        h.className = 'qtrans_title';
        tw.className = 'qtrans_title_wrap';

        qtd.className = 'postarea';

        h.appendChild(l);
        tw.appendChild(ti);
        qtd.appendChild(h);
        qtd.appendChild(tw);
        td.parentNode.insertBefore(qtd,td);

    });

    document.getElementById('titlediv').style.display='none';
}

jQuery(document).ready(function() {

    qtrans_editorInit1(); 

});