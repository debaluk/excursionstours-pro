<?php


    /**
    * @author Logic
    * @version 1.0
    * @created 04-Mar-2012 5:05:37 PM
    */
    class Calculate
    {

        var $_ci;

        function Calculate()
        {
            $this->_ci =& get_instance();
            $this->_ci->load->library('class_model/bsession');
            $this->_ci->load->library('class_model/cars');
        }

        /* 
        *SESSION PRICE LEGEND
        * 
        * tot_price
        * pickup_loc_price
        * return_loc_price
        * 
        */


        function step1()
        {
        }

        function step2()
        {

            $tot_price = 0;

            //        Pickup and Return location price
            $tot_price += $this->_ci->bsession->get('pickup_loc_value');
            $tot_price += $this->_ci->bsession->get('return_loc_value');

            $this->_ci->bsession->set('tot_price',$tot_price);

        }

        function step3($car=NULL)
        {
            if(!isset($car)){
                $car = $this->_ci->cars->ShowDetails($this->_ci->bsession->get('car_id'));
                if(!$car){
                    echo 'Car '.$this->_ci->cars->getFlag().":";

                    switch($this->cars->getFlag()){
                        case 'error':
                            echo $this->_ci->cars->getError();
                            break;
                        case 'numrows':
                            echo $this->_ci->cars->getNumrows();
                            break;
                        case 'info':
                            echo $this->_ci->cars->getInfo();
                            break;

                    }
                }
            }
            //  reset total price
            $this->step2();

            $no_days = $this->_ci->bsession->get('no_days');
            $tot_price = $this->_ci->bsession->get('tot_price');

            //        Car price per day - and total
            switch($no_days){

                case $no_days<=3:
                    $tot_price += $car[0]->day13price*$no_days;
                    break;

                case $no_days>=4 && $no_days<=7:
                    $tot_price += $car[0]->day47price*$no_days;
                    break;

                case $no_days>=8 && $no_days<=15:
                    $tot_price += $car[0]->day815price*$no_days;
                    break;
            }

            $this->_ci->bsession->set('tot_price',$tot_price);
        }

        function extras(){

            //  reset total price
            $this->step3();

            $no_days = $this->_ci->bsession->get('no_days');
            $tot_price = $this->_ci->bsession->get('tot_price');

            if($this->_ci->bsession->get('extras')){

                $dbRet = $this->_ci->cars->ShowAccessories($this->_ci->bsession->get('car_id'));

                if($dbRet){

                    foreach($dbRet as $row1){

                        foreach($this->_ci->bsession->get('extras') as $val){

                            if($row1->id==$val){

                                $tot_price += (int)$row1->price*$no_days; 

                            }

                        }

                    }

                }else{
                    echo $this->cars->getFlag().":";

                    switch($this->cars->getFlag()){
                        case 'error':
                            echo $this->cars->getError();
                            break;
                        case 'numrows':
                            echo $this->cars->getNumrows();
                            break;
                        case 'info':
                            echo $this->cars->getInfo();
                            break;

                    }
                }


            }

            $this->_ci->bsession->set('tot_price',$tot_price);

        }

        function get($key)
        {

            return $this->_ci->session->userdata($key);

        }

        function set($key,$value)
        {

            return $this->_ci->session->set_userdata($key,$value);

        }

    }
?>