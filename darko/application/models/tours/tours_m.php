<?php

    /**
    * @author Djordje Zeljic
    * Date: Jun 2, 2010 11:34:40 PM
    */
    class tours_m extends CI_Model {

        public $errors;
        private $fields = array('title','description','tour_text','addition','pickup_location');

        function tours_m () {
            parent::__construct();
        }// construct of tours_m

        function create(){
            if($this->validate('create')){
                
                //Translate class                 
                foreach($this->fields as $f){
                    $_POST[$f] = $this->translate->updatePost("", $_POST[$f]);
                }
                
                $tdata = array(
                'title'=>$this->input->post('title'),
                'nodays'=>$this->input->post('nodays'),
                'nonights'=>$this->input->post('nonights'),
                'guides'=>$this->input->post('guides'),
                'tour_text'=>$this->input->post('tour_text'),
                'description'=>$this->input->post('description'),
                'capacity'=>$this->input->post('capacity'),
                'addition'=>$this->input->post('addition'),
                'pickup_location'=>$this->input->post('pickup_location'),
                );
                $this->db->insert('tours',$tdata);
                $tour_id = $this->db->insert_id();
                // select sifra_room, add data to room type table

                //SELECT SIFRA FOR JEDNOKREVETNA SOBA
                $sifra = $this->db->select('id')->where('naziv','Jednokrevetna soba')->get('room_type')->result_array();
                $sifrarnik ='';
                foreach($sifra as $sif){
                    $sifrarnik = $sif['id']  ;
                }

                $trtdata = array(
                'id_ture'=>$tour_id,
                'sifra_room'=>$sifrarnik,
                'description'=>'Jednokrevetna',
                'price'=>$this->input->post('onebed')

                );
                $this->db->insert('tours_room_type',$trtdata);

                //SELECT SIFRA FOR DVOKREVETNA SOBA
                $sifra = $this->db->select('id')->where('naziv','Dvokrevetna soba')->get('room_type')->result_array();
                $sifrarnik ='';
                foreach($sifra as $sif){
                    $sifrarnik = $sif['id']  ;
                }

                $trtdata = array(
                'id_ture'=>$tour_id,
                'sifra_room'=>$sifrarnik,
                'description'=>'Dvokrevetna',
                'price'=>$this->input->post('twobed')
                );
                $this->db->insert('tours_room_type',$trtdata);

                //INSERT DAPERTURE DATES
                $startdate =  $_POST['startdate'];
                foreach ($startdate as $value){                
                    $tdata = array(
                    'tours_id'=>$tour_id,
                    'startdate'=>strtotime($value)
                    ); 
                    $this->db->insert('departure',$tdata); 
                }

                echo json_encode(array('success'=>'success'));
            }else{
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function read($id){
            $upit = "SELECT tours.*, JS.description AS 'JS1', JS.price AS 'Cena Jednokrevetne',
            DS.description AS 'DS1', DS.price AS 'Cena Dvokrevetne' 
            FROM tours LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Jednokrevetna') JS ON tours.id = JS.id_ture
            LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Dvokrevetna') DS ON tours.id = DS.id_ture WHERE tours.id=".$id;
            $res = $this->db->query($upit)->row_array();
            
            //Translate class
            foreach($this->fields as $f){
                //echo $res[$f]."<br>";
                $res[$f] = $this->translate->getArray($res[$f], TRUE);
            } 
             
            return  $res; 
        }

        function readAll(){
            $upit = "SELECT tours.*, JS.description AS 'JS1', JS.price AS 'Cena Jednokrevetne',
            DS.description AS 'DS1', DS.price AS 'Cena Dvokrevetne' 
            FROM tours LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Jednokrevetna') JS ON tours.id = JS.id_ture
            LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Dvokrevetna') DS ON tours.id = DS.id_ture";
            $res = $this->db->query($upit)->result_array();
            
            foreach($res as $key=>$value){
                //echo $value['title']; 

                //Translate class
                foreach($this->fields as $f){
                    $res[$key][$f] = $this->translate->getArray($value[$f], TRUE);
                    if($res[$key][$f]=='')$res[$key][$f]='-Please translate-';
                }


            }
            
            return  $res;  

        }
        function readstartdate($id){
            $query = $this->db->get_where('departure', array('tours_id' => $id))->result_array(); 
            $dates = "";
            foreach ($query as $key => $list) {
                $dates.= date('n-j-Y', $list['startdate']).",";

            }
            return  substr($dates,0,strlen($dates)-1); 
        }

        function update() {
            if($this->validate()) {
                //$this->firephp->fb('q: '.print_r($_POST));

                //$_POST['startdate'] = strtotime($this->input->get_post('startdate')); 

                $onebed_price = $_POST['onebed'];
                $twobed_price = $_POST['twobed'];
                $startdate =  $_POST['startdate']; 

                unset($_POST['onebed']);
                unset($_POST['twobed']);
                unset($_POST['startdate']);

                         
                
                $post = $this->db->get_where('tours', array('id'=> $_POST['id']))->result_array();
                
                //Translate class
                foreach($this->fields as $f){
                    $_POST[$f] = $this->translate->updatePost($post[0][$f], $_POST[$f]);
                }  
                
                $this->db->where('id', $_POST['id']);
                $this->db->update('tours', $_POST); 
                
                
                 //SELECT SIFRA FOR JEDNOKREVETNA AND DVOKREVETNA SOBA
                $sifra_onebad = $this->db->query('SELECT id FROM room_type WHERE naziv = "Jednokrevetna soba"')->row('id');
                $sifra_twobed = $this->db->query('SELECT id FROM room_type WHERE naziv = "Dvokrevetna soba"')->row('id');

                //UPDATE JEDNOKREVETNA SOBA PRICE
                $data = array('price' => $onebed_price);
                $where = 'id_ture='.$_POST['id'].' AND sifra_room ='.$sifra_onebad;
                $this->db->query($this->db->update_string('tours_room_type', $data, $where));

                //UPDATE DVOKREVETNA SOBA PRICE
                $data = array('price' => $twobed_price);
                $where = 'id_ture='.$_POST['id'].' AND sifra_room ='.$sifra_twobed;
                $this->db->query($this->db->update_string('tours_room_type', $data, $where));

                //UPDATE DAPERTURE DATES
                $this->db->where('tours_id',$_POST['id'])->delete('departure');
                $this->firephp->fb('q: '.$this->db->last_query());
                foreach ($startdate as $value){
                    $this->firephp->fb('startdate: '.$startdate);
                    $this->firephp->fb('value: '.$value);

                    $tdata = array(
                    'tours_id'=>$_POST['id'],
                    'startdate'=>strtotime($value)
                    ); 
                    $this->db->insert('departure',$tdata);
                    //$this->firephp->fb('q: '.$this->db->last_query());   
                }


                echo json_encode(array('success'=>'success'));
            }else {
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function delete() {
            $this->db->where('id_ture',$this->input->post('id'))->delete('tours_room_type');
            $this->db->where('id',$this->input->post('id'))->delete('tours');
            echo json_encode(array('success'=>'success'));
        }

        function set_status($t_id,$status){

            $data = array('status' => $status);

            $this->db->where('id', $t_id);
            if($this->db->update('tours', $data)){
                return true;
            }else{
                return false;
            }                            

        }

        /*
        *      VALIDATE FORM
        */
        function validate($type = 'create') {
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('nodays','No. days','trim|required|numeric');
            $this->form_validation->set_rules('nonights','No. nights','trim|required|numeric');
            $this->form_validation->set_rules('onebed','Single room price','trim|required|numeric');
            $this->form_validation->set_rules('twobed','Double room','trim|required|numeric');
            $this->form_validation->set_rules('capacity','Vapacity','trim|required|numeric');
            //$this->form_validation->set_rules('startdate','Pocetak','trim|required|valid_date');

            if($this->form_validation->run()){
                return TRUE;
            }else{
                $this->errors = validation_errors(' ','<br />');
            }
        }

    }
?>
