<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Asset {

    private $CI;

    function Asset(){
        $this->CI = & get_instance();
    } 

    var $configAssets = array();

    private $pageflag = '';  //   OPTIONS -> { page, sub, upsub }
    private $layoutflag = '';  //   OPTIONS -> { site, cms }
    private $sufix = '';  //   OPTIONS -> { _cms }


    function initialze_assets($page, $sub, $upsub){
        
        $cfgAssets = $this->CI->config->getConfig();

        foreach($cfgAssets as $item=>$value){

            if(substr($item,0,7)=='assets_'){
                
               $this->configAssets[substr($item,7,strlen($item))] = $value;   
               
            }

        }
        
        /*
        *  assets in config file ends with _cms
        *  if layout flag is set to cms,
        *  assets that ending with _cms will be readed
        */
        if($this->layoutflag=='cms'){ 
            $this->sufix = '_cms'; 
        }
        
        /*
        * initialze assets that load for every page
        * site assets loads first
        */ 
        foreach($this->configAssets['startassets'.$this->sufix] as $key=>$value){ 
            $this->putAsset($key, $value); 
        }

        /*
        * initialze page assets
        * page assets loads afther site assets
        */
        $this->getPageAssets($page, $sub, $upsub);


        /*
        * initialze assets that load for every page
        * at the end afther site and page assets
        */
        foreach($this->configAssets['endassets'.$this->sufix] as $key=>$value){    
            $this->putAsset($key, $value); 
        }

    }

    function flag($fl){

        $this->pageflag = $fl;

    }
    
    function layoutflag($fl){

        $this->layoutflag = $fl;

    }

    function getPageAssets($page, $sub, $upsub){

        /*
        * if array not exisit exit
        */

        if(!isset($this->configAssets[$page.$this->sufix])) return;

        /*
        * check if page assets exist
        * put assets in montenegrin to load
        */

        if(isset($this->configAssets[$page.$this->sufix]['assets'])){

            foreach($this->configAssets[$page.$this->sufix]['assets'] as $key=>$value){
                $this->putAsset($key, $value);
            }

        }

        /*
        * check page flag
        * if not sub or upsub then exit
        */
        if($this->pageflag=='page') return;

        /*
        * check if sub assets exist
        * put assets in montenegrin to load
        */

        if(isset($this->configAssets[$page.$this->sufix][$sub]['assets'])){

            foreach($this->configAssets[$page.$this->sufix][$sub]['assets'] as $key=>$value){
                $this->putAsset($key, $value);
            }

        }

        /*
        * check page flag
        * if not upsub then exit
        */
        if($this->pageflag=='sub') return;

        if(isset($this->configAssets[$page.$this->sufix][$sub][$upsub]['assets'])){

            foreach($this->configAssets[$page.$this->sufix][$sub][$upsub]['assets'] as $key=>$value){
                $this->putAsset($key, $value);
            }

        }

        /*
        * check page flag
        * if upsub then exit
        */
        if($this->pageflag=='upsub') return; 

    }

    /*
    * put assets to montenegrin
    * depending on flag
    * css or js
    */ 
    function putAsset($key, $value){

        switch($value){
            case 'css':
                $this->CI->montenegrin->css($key);
                break;
            case 'js':
                $this->CI->montenegrin->js($key);
                break;
        }

    }

}
