<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Djordje Zeljic
 * Date: Mar 28, 2010 8:04:03 PM
 */

if ( ! function_exists('arraymaker')) {

    function arraymaker($array, $val_key = 'id', $val_val = 'name') {
        $data = array();
        foreach($array as $one) {
            $data[$one[$val_key]] = $one[$val_val];
        }
        return $data;
    }

}

?>