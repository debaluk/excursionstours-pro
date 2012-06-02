<?php


/**
* @author AbordageSol
* @version 1.0
* @created 03-Mar-2012 11:53:02 AM
*/
require_once("ErrorHandler.php");
class Cars extends errorHandler
{

    var $_ci;

    function Cars()
    {
        $this->_ci =& get_instance();
    }

    /**
    * 
    * @param category
    */
    function BrowseFleet($category=NULL)
    {
        if($category==NULL){

            //echo "BrowseFleet -> category NULL";

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('all_cars');

            return $this->test_response($srv_res);

        }else{

            echo "BrowseFleet -> category $category";

        }
    }

    /**
    * 
    * @param d_to
    * @param d_from
    */
    function SearchFleet($d_from = NULL, $d_to = NULL)
    {
        if($d_from==NULL&&$d_to==NULL){

            return $this->BrowseFleet();

        }else if($d_from!=NULL&&$d_to!=NULL){

                //echo "SearchFleet -> <br />$d_from <br /> $d_to";

                //Get Data - informacionisistem.com
                $post = array(
                'dateTimeFrom'=>$d_from,
                'dateTimeTo'=>$d_to
                );

                $srv_res = $this->_ci->communicator->communicate('available_cars', $post);

                return $this->test_response($srv_res);        

                //print_r($srv_res);

            }else{

                echo 'Error ocured.<br /> One of date is note set.';
                exit();

        }
    }

    /**
    * 
    * @param car_id
    */
    function ShowAccessories($car_id)
    {
        if(!isset($car_id)){
            echo 'Error ocured.<br /> car_id is not set.';
            exit();
        }

        //echo "<br />ShowAccessories -> $car_id";

        //Get Data - informacionisistem.com
        $post = array( 
        'id'=>$car_id
        );

        $srv_res = $this->_ci->communicator->communicate('accessories', $post);

        return $this->test_response($srv_res);

    }

    /**
    * 
    * @param car_id
    */
    function ShowDetails($car_id, $sufix='',$d_from = NULL, $d_to = NULL)
    {
        if(!isset($car_id)){
            echo 'Error ocured.<br /> car_id is not set.';
            exit();
        }

        //echo "<br />ShowDetails -> $car_id";

        //Get Data - informacionisistem.com
        $post = array( 
        'id'=>$car_id
        );

        //select bigger car
        if(isset($d_from)){
            $post['dateTimeFrom'] = $d_from;
            $post['dateTimeTo'] = $d_to;
        }

        $srv_res = $this->_ci->communicator->communicate('get_car'.$sufix, $post);

        return $this->test_response($srv_res);

    }    

    /**
    * 
    * @param car_id
    */
    function ShowImages($car_id)
    {
        if(!isset($car_id)){
            echo 'Error ocured.<br /> car_id is not set.';
            exit();
        }

        //Get Data - informacionisistem.com
        $post = array( 
        'id'=>$car_id
        );

        $srv_res = $this->_ci->communicator->communicate('get_car_images', $post);

        return $this->test_response($srv_res);

    }  
    
    /**
    * 
    * @param car_id
    */
    function ShowVideo($car_id)
    {
        if(!isset($car_id)){
            echo 'Error ocured.<br /> car_id is not set.';
            exit();
        }

        //Get Data - informacionisistem.com
        $post = array( 
        'id'=>$car_id
        );

        $srv_res = $this->_ci->communicator->communicate('get_car_video', $post);

        return $this->test_response($srv_res);

    }      

}