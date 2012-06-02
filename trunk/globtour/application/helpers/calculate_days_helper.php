<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function calculateDays($datefrom, $dateto, $type=TRUE) {
        if($type == TRUE) {
            $days = ceil((strtotime($dateto) - strtotime($datefrom)) / 86400); // 60 * 60 * 24 = day
        }else {
            $days = ceil(($dateto - $datefrom) / 86400); // 60 * 60 * 24 = day
        }
        return $days;
    }


?>