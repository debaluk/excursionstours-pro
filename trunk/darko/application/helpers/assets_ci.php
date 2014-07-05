<?php

    #
    #    Image Helper
    #                

        if ( ! function_exists('image'))
        {
            function image($src = '', $index_page = FALSE)
            {
                if ( ! is_array($src) )
                {
                    $src = array('src' => $src);
                }
                
                if ( ! $src['alt'] )
                {
                    $src['alt'] = '';
                }

                $img = '<img';

                foreach ($src as $k=>$v)
                {

                    if ($k == 'src' AND strpos($v, '://') === FALSE)
                    {
                        $img .= ' src="'.ASSETPATH.'/images/'.$v.'" ';
                    }
                    else
                    {
                        $img .= " $k=\"$v\" ";
                    }
                }

                $img .= '/>';

                return $img;
            }
        }        
    
    #
    #    CSS Helper
    #    
    
        if ( ! function_exists('attach_stylesheet'))
        {
            function attach_stylesheet($file, $media = "screen")
            {
            
                $src  = ASSETPATH . '/stylesheets/';
                $src .= ( end( explode(".", $file) ) == 'css' ) ? $file : $file.'.css';                
                
                $css  = '<link rel="stylesheet ';
                $css .= 'href="'.$src.'" ';
                $css .= 'type="text/css" ';
                $css .= 'media="'.$media.'" ';
                $css .= '/>';
                                
                return $css;
            }
        }


        #
        #    Javascript Helper
        #

            if ( ! function_exists('attach_javascript'))
            {
                function attach_javascript($file)
                {

                    $src  = ASSETPATH . '/javascripts/';
                    $src .= ( end( explode(".", $file) ) == 'js' ) ? $file : $file.'.js';                
                                        
                    $script  = '<script type="text/javascript" ';
                    $script .= 'src="'.$src.'"></script>';

                    return $script;
                }
            }