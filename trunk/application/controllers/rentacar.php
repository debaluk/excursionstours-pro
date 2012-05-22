<?php
    require_once($application_folder."/controllers/navigator.php");
    class Rentacar extends Navigator 
    {

        var $data ;

        function __construct()
        {
            parent::__construct();

            $this->load->library(array(
                    'class_model/booking',
                    'class_model/bsession',
                    'class_model/cars',
                    'class_model/calculate',
                    'class_model/communicator'
                )); 

            $this->load->helper( array(
                    'timemaker',
                    'calculate_days'
                ));

            $this->data['info_sis_url'] = 'http://www.informacionisistem.com/rentacar/assets/cars/';         
            $this->data['info_sis_url'] = 'http://localhost/rentacar-pro/';         

        }

        function index(){

            $this->home();

        }

        function home(){

            $locs = $this->booking->locations();
            if($locs){

                $this->data['title'] = 'Basic information';
                $this->data['layout_id'] = 'layout1';
                $this->data['locations'] = $locs;

                $this->core_site('rentacar','home',NULL,$this->data);

            }else echo 'Error ocured. Locations';     

        }

        function browse_fleet(){

            $this->data['browse_fleet'] = TRUE;
            $cars = $this->cars->BrowseFleet();
            //print_r($this->bsession->get_all_data());
            if($cars){

                $this->data['car_list'] = $cars;

                $locs = $this->booking->locations();
                if($locs){

                    $this->data['locations'] = $locs;

                }else echo 'Error ocured.';

                $this->data['title'] = 'Select your vehicle';
                $this->data['layout_id'] = 'layout2';

                $this->core_site('rentacar','car_list',NULL,$this->data);

            }else{

                echo $this->cars->getFlag();

                switch($this->cars->getFlag()){
                    case 'error':
                        echo $this->cars->getError();
                        break;
                    case 'numrows':
                        echo 'numrows: '.$this->cars->getNumrows();
                        break;
                    case 'info':
                        echo $this->cars->getInfo();
                        break;

                }

            }   

        }

        function details(){

            if(!isset($_GET['id']))
                redirect(base_url());

            $car = $this->cars->ShowDetails($_GET['id']);
            if($car){
                $this->data['car'] = $car;
                $this->bsession->step3($car);
                $this->calculate->step3($car);

                $images = $this->cars->ShowImages($_GET['id']);

                if($images){
                    $this->data['images'] = $images;
                }

                $video = $this->cars->ShowVideo($_GET['id']);

                if($video){
                    $this->data['video'] = $video;
                }

                $this->data['title'] = 'Select your vehicle';
                $this->data['layout_id'] = 'layout_details';

                $this->core_site('rentacar','car_details',NULL,$this->data);

            }else{
                echo 'Car '.$this->cars->getFlag().":";

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

        function step_2(){

            $this->bsession->step2();

            $this->bsession->check_session();

            $dFrom = $this->bsession->get('pickup_date').' '.$this->bsession->get('fullfrom');
            $dTo = $this->bsession->get('return_date').' '.$this->bsession->get('fullto');

            $cars = $this->cars->SearchFleet($dFrom,$dTo);
            //print_r($this->bsession->get_all_data());
            //print_r($cars);
            if($cars){

                $this->data['car_list'] = $cars;

                $this->bsession->set('no_days', calculateDays($dFrom,$dTo));                
                $this->data['no_days'] = $this->bsession->get('no_days');

                $this->calculate->step2();

                $locs = $this->booking->locations();
                if($locs){

                    $this->data['locations'] = $locs;

                }else echo 'Error ocured.';
                
                $images = $this->cars->ShowImages($this->input->post('carid'));

                if($images){
                    $this->data['images'] = $images;
                }

                $this->data['title'] = 'Select your vehicle';
                $this->data['layout_id'] = 'layout2';

                $this->core_site('rentacar','car_list',NULL,$this->data);

            }else{

                $this->data['flag'] = $this->cars->getFlag();

                switch($this->cars->getFlag()){
                    case 'error':
                        $this->data['msg'] = $this->cars->getError();
                        break;
                    case 'numrows':
                        $this->data['msg'] = 'cars available in this period: '.$this->cars->getNumrows();
                        $this->data['flag'] = '';
                        break;
                    case 'info':
                        $this->data['msg'] = $this->cars->getInfo();
                        break;

                }

                $locs = $this->booking->locations();
                if($locs){

                    $this->data['title'] = 'Basic information';
                    $this->data['layout_id'] = 'layout1';
                    $this->data['locations'] = $locs;

                    $this->core_site('rentacar','home',NULL,$this->data);

                }else echo 'Error ocured.';

            }   

        }

        function getCarQuote() {

            $this->bsession->step2();

            $this->bsession->check_session();

            $dFrom = $this->bsession->get('pickup_date').' '.$this->bsession->get('fullfrom');
            $dTo = $this->bsession->get('return_date').' '.$this->bsession->get('fullto');

            $this->bsession->set('no_days', calculateDays($dFrom,$dTo));                
            $this->data['no_days'] = $this->bsession->get('no_days');

            $this->calculate->step2();

            $car = $this->cars->ShowDetails($this->input->post('carid'));
            if($car){

                //print_r($car);
                $this->data['car'] = $car;
                $this->bsession->step3($car);
                $this->calculate->step3($car);

                $images = $this->cars->ShowImages($this->input->post('carid'));

                if($images){
                    $this->data['images'] = $images;
                }

                $video = $this->cars->ShowVideo($this->input->post('carid'));

                if($video){
                    $this->data['video'] = $video;
                }

                $this->data['title'] = 'Select your vehicle';
                $this->data['layout_id'] = 'layout_details';

                $this->data['ispost'] = TRUE;

                $this->core_site('rentacar','car_details',NULL,$this->data);

            }else{
                echo 'Car '.$this->cars->getFlag().":";

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

            //print_r($this->bsession->get_all_data());

        }

        function step_3(){            

            $this->bsession->check_session();

            if(!isset($_GET['id']))
                redirect(base_url());

            $car = $this->cars->ShowDetails($_GET['id']);
            if($car){

                //print_r($car);
                $this->data['car'] = $car;
                $this->bsession->step3($car);
                $this->calculate->step3($car);

                //Select bigger car                
                $dFrom = $this->bsession->get('pickup_date').' '.$this->bsession->get('fullfrom');
                $dTo = $this->bsession->get('return_date').' '.$this->bsession->get('fullto');
                $car_bigger = $this->cars->ShowDetails($_GET['id'],'_bigger',$dFrom,$dTo);

                if($car_bigger){
                    $this->data['car_bigger'] = $car_bigger;
                }

                $accessories = $this->cars->ShowAccessories($this->bsession->get('car_id'));
                if($accessories){

                    //print_r($accessories);
                    $this->data['accessories'] = $accessories;
                    $this->calculate->extras();

                }else{
                    //echo 'Accessories '.$this->cars->getFlag().":";
                    $this->data['ac_numrows'] = 0;

                    switch($this->cars->getFlag()){
                        case 'error':
                            //echo $this->cars->getError();
                            break;
                        case 'numrows':
                            //echo $this->cars->getNumrows();
                            break;
                        case 'info':
                            //echo $this->cars->getInfo();
                            break;

                    }
                }

                $this->data['title'] = 'Confirmation';
                $this->data['layout_id'] = 'layout3';

                $this->core_site('rentacar','finish',NULL,$this->data);


            }else{
                echo 'Car '.$this->cars->getFlag().":";

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

        function show_accessories($carId){

            $dbRet = $this->cars->ShowAccessories($carId);

            if($dbRet){
                $this->data['accessories'] = $dbRet;
                $this->load->view('rentacar/optional_accessories', $this->data);

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

        function set_accessories(){

            $this->bsession->extras();
            $html='';

            /* Post optional accesories
            * If set, get data and tot_price
            */
            $extras = $this->bsession->get('extras');

            if(isset($extras)){

                $dbRet = $this->cars->ShowAccessories($this->bsession->get('car_id'));

                foreach($dbRet as $row1){

                    foreach($this->bsession->get('extras') as $val){

                        if($row1->id==$val){

                            $html.='<li><strong>'.$row1->type.'</strong> - <small>price: '.$row1->price.' &euro; / day</small></li>';

                        }

                    }

                }

                $this->calculate->extras();

            }

            $ret = array('action'=>TRUE,'html'=>$html,'tot_price'=>$this->bsession->get('tot_price'));
            echo json_encode($ret);

        }

        function show_terms(){

            $this->load->view('rentacar/terms_conditions');

        }

        function process_booking(){

            $this->bsession->client();

            $dbRet = $this->booking->AddToBooking($this->bsession->get_all_data());
            if($dbRet){

                $this->bsession->booking($dbRet[0]->id);
                echo json_encode(array('response'=>TRUE, 'msg'=>'OK', 'json'=>$dbRet));

            }else{

                $msg = $this->booking->getFlag().":";

                switch($this->booking->getFlag()){
                    case 'error':
                        $msg.= $this->booking->getError();
                        break;
                    case 'numrows':
                        $msg.= $this->booking->getNumrows();
                        break;
                    case 'info':
                        $msg.= $this->booking->getInfo();
                        break;

                }

                echo json_encode(array('response'=>FALSE, 'msg'=>$msg));

            }

        }

        function show_order(){

            //echo 'id:'.$this->input->get('id');
            if(!$this->input->get('id'))
                redirect(base_url());
            //echo '<br /><br />';
            //print_r($this->bsession->get_all_data());
            $dbRet = $this->booking->ShowOrder($this->input->get('id'));

            $order = $this->booking->test_response($dbRet);
            //print_r($order);
            if(!$order){
                echo $this->booking->getFlag().":";

                switch($this->booking->getFlag()){
                    case 'error':
                        echo $this->booking->getError();
                        break;
                    case 'numrows':
                        echo $this->booking->getNumrows();
                        break;
                    case 'info':
                        echo $this->booking->getInfo();
                        break;

                }
                die();
            }

            $order = $this->booking->test_response($dbRet[0]);

            if($order){
                //print_r($order); 
                $this->data['order'] = $order;

                $order_extras = $this->booking->test_response($dbRet[1]);

                if($order_extras){
                    //print_r($order_extras);
                    $this->data['order_extras'] = $order_extras;
                }else{
                    //echo 'Accessories '.$this->booking->getFlag().":";

                    switch($this->booking->getFlag()){
                        case 'error':
                            echo $this->booking->getError();
                            break;
                        case 'numrows':
                            //echo $this->booking->getNumrows();
                            break;
                        case 'info':
                            echo $this->booking->getInfo();
                            break;

                    }
                }

                $car = $this->cars->ShowDetails($order[0]->carid);
                if($car){
                    $this->data['car'] = $car;
                }else{
                    echo 'Car '.$this->cars->getFlag().":";

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

                $this->data['title'] = 'Order information';
                $this->data['layout_id'] = 'layout2';

                $this->core_site('rentacar','order',NULL,$this->data);

            }else{
                echo $this->booking->getFlag().":";

                switch($this->booking->getFlag()){
                    case 'error':
                        echo $this->booking->getError();
                        break;
                    case 'numrows':
                        echo $this->booking->getNumrows();
                        break;
                    case 'info':
                        echo $this->booking->getInfo();
                        break;

                }
            }

        }

        function printSession(){

            print_r($this->session->all_userdata());

            echo json_encode(array('response'=>TRUE, 'msg'=>'OK'));

        }
    }  
?>
