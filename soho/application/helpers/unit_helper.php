<?php
    function assert_true($assertion) {
        if($assertion) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function assert_false($assertion) {
        if($assertion) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function assert_equals($base, $check) {
        if($base === $check) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function assert_not_equals($base, $check) {
        if($base !== $check) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function assert_not_empty($assertion) {
        if(!empty($assertion)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function assert_empty($assertion) {
        if(empty($assertion)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function unit_test_report($data) {        
        $str = '<table border="1">';
        $str .= '<tr><th>Test</th><th>Name</th><th>Result</th></tr>';
        foreach($data as $key => $test){
            $str .= '<tr><td>'.$key.'</td><td>'.$test['Test Name'].'</td>';
            $str .= '<td style="background-color:'.($test['Result'] == 'Passed' ? '#00FF00' : '#FF0000').';">'.$test['Result'].'</td></tr>';
        }
        $str .= '</table>';

        return $str;
    } 
?>
