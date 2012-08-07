<?php 

    class excursions_m extends CI_Model {

        var $errors = '';
        private $fields = array('title','guides','description','excursion_text','addition','pickup_location');


        function excursions_m () {
            parent::__construct(); 

        }

        function create() {
            if($this->validate()) {

                // Pickup locations
                $_POST['pickup_location'] = implode('__!__',$_POST['item']['tags']);
                unset($_POST['item']);
                
                //Translate class                 
                foreach($this->fields as $f){
                    $_POST[$f] = $this->translate->updatePost("", $_POST[$f]);
                }
                
                //Weekday
                $startweekday = implode(',',$_POST['startweekday']);

                unset($_POST['startweekday']);
                $_POST['startweekday'] = $startweekday;

                $this->firephp->log($_POST['startweekday']);

                $this->db->insert('excursions',$_POST);
                /*$productdata = array(
                'productcategory'=>1,
                'productdescriptionid'=>$this->db->insert_id()
                );
                $this->db->insert('products',$productdata); */



                echo json_encode(array('success'=>'success'));
            }else {
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function read($id) {

            $res = $this->db->select('*')
            ->from('excursions')
            /*->join('transports','transports.id = excursions.transportsid','left')
            ->join('products','products.productdescriptionid = excursions.id','left')*/
            ->where('id',$id)
            ->get()->row_array();

            //Translate class
            foreach($this->fields as $f){
                //echo $res[$f]."<br>";
                $res[$f] = $this->translate->getArray($res[$f], TRUE);
            }    
            //print_r($res);

            return $res;


        }

        function readAll() {
            $res = $this->db->order_by('adultPrice','asc')->get('excursions')->result_array();

            foreach($res as $key=>$value){
                //echo $value['title']; 

                //Translate class
                foreach($this->fields as $f){
                    $res[$key][$f] = $this->translate->getArray($value[$f], TRUE);
                    if($res[$key][$f]=='')$res[$key][$f]='-Please translate-';
                }


            }

            return $res;
        }

        function update() {
            if($this->validate()) {
                //print_r($_POST);               

                //get db post
                $post = $this->db->get_where('excursions', array('id'=> $_POST['id']))->result_array();

                // Pickup locations
                $_POST['pickup_location'] = implode('__!__',$_POST['item']['tags']);
                unset($_POST['item']);
                
                //Translate class
                foreach($this->fields as $f){
                    $_POST[$f] = $this->translate->updatePost($post[0][$f], $_POST[$f]);
                }

                //Weekday
                $startweekday = implode(',',$_POST['startweekday']);

                unset($_POST['startweekday']);
                $_POST['startweekday'] = $startweekday;               

                //$this->firephp->log($_POST['pickup_location']);

                $this->db->where('id', $_POST['id']);
                $this->db->update('excursions', $_POST);                    


                echo json_encode(array('success'=>'success'));
            }else {
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function delete() {
            /*$this->db->where('productdescriptionid',$this->input->post('id'))->delete('products');*/
            $this->db->where('id',$this->input->post('id'))->delete('excursions');
            echo json_encode(array('success'=>'success'));
        }

        function set_status($exc_id,$status){

            $data = array('status' => $status);

            $this->db->where('id', $exc_id);
            if($this->db->update('excursions', $data)){
                return true;
            }else{
                return false;
            }                            

        }

        /*
        *              VALIDATE EXCURSION
        */

        function validate($type='create') {
            $this->form_validation->set_rules('title','Title','trim|required');
            //$this->form_validation->set_rules('nodays','Broj dana','trim|required|numeric');
            //$this->form_validation->set_rules('nonights','Broj nocenja','trim|required|numeric');
            $this->form_validation->set_rules('adultprice','Adult price','trim|required|numeric');
            $this->form_validation->set_rules('childprice','Children price','trim|required|numeric');
            $this->form_validation->set_rules('capacity','Capacity','trim|required|numeric');
            if($this->form_validation->run()) {
                return TRUE;
            }else {
                $this->errors = validation_errors(' ', '<br />');
                return FALSE;
            }
        }

    }
?>