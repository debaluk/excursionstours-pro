<?php

    class Car_model extends CI_Model{

        function __construct(){
            parent::__construct();
        }

        function all_cars(){
            return $this->db->where('user_id',7)->order_by('id','desc')->get('car')->result_array();
        }

        function read($id) {
            return $this->db->where('id',$id)->get('car')->row_array();
        }

        function readAccessoriesForCar($id){

            return $this->db->select('accessoriesitem.*, accessorydescription.*')
            ->from('accessoriesitem')
            ->join('accessorydescription','accessorydescription.id = accessoriesitem.accessoryId','left')
            ->where('accessoriesitem.carId',$id)
            ->get()
            ->result_array();

        }

        function update() {
            if($this->validate('update')){
                $carid = $this->input->post('carid');
                // update
                $data = array();
                $data['name'] = $this->input->post('name');
                $data['description'] = $this->input->post('description');
                $data['day13price'] = $this->input->post('day13price');
                $data['day47price'] = $this->input->post('day47price');
                $data['day815price'] = $this->input->post('day815price');

                $data['abs'] = (!$this->input->post('abs')) ? 0 : $this->input->post('abs');
                $data['ac'] = (!$this->input->post('ac')) ? 0 : $this->input->post('ac');
                $data['cd'] = (!$this->input->post('cd')) ? 0 : $this->input->post('cd');
                $data['airbag'] = (!$this->input->post('airbag')) ? 0 : $this->input->post('airbag');
                $data['diesel'] = (!$this->input->post('diesel')) ? 0 : $this->input->post('diesel');
                $data['auto_transmission'] = (!$this->input->post('auto_transmission')) ? 0 : $this->input->post('auto_transmission');

                $data['seat_count'] = $this->input->post('seat_count');
                $data['num_of_doors'] = $this->input->post('num_of_doors');
                $data['luggage_capacity'] = $this->input->post('luggage_capacity');
                $data['co2'] = $this->input->post('co2');
                $data['score'] = $this->input->post('score');
                $data['fuel_consumption'] = $this->input->post('fuel_consumption');
                $data['engine'] = $this->input->post('engine');
                $data['maxpower'] = $this->input->post('maxpower');
                $data['maxspeed'] = $this->input->post('maxspeed');
                $data['equipment'] = $this->input->post('equipment');

                $this->db->where('id',$carid)->update('car',$data);

                /*Accesories*/
                $accesories[1] = (!$this->input->post('bs')) ? 0 : $this->input->post('bs');
                $accesories[2] = (!$this->input->post('gp')) ? 0 : $this->input->post('gp');
                $accesories[3] = (!$this->input->post('wd')) ? 0 : $this->input->post('wd');


                if(($accesories[1] != 0) || ($accesories[2] || 0) || ($accesories[3] || 0)){

                    $adata = array();
                    $adata['carId'] = $carid;

                    for($i=1; $i<=3; $i++){
                        $adata['accessoryId'] = $i;
                        $adata['accessoryVal'] = $accesories[$i];
                        $c_ac = array('carId' => $carid, 'accessoryId' => $adata['accessoryId']);
                        if($adata['accessoryVal'] != 0){


                            $this->db->where($c_ac);                        
                            $this->db->from('accessoriesitem');
                            $cnt = $this->db->count_all_results();

                            if ($cnt==0) {
                                $this->db->insert('accessoriesitem', $c_ac); 
                            }                         
  
                        }else{
                            $this->db->delete('accessoriesitem', $c_ac);     
                        }

                    }

                }else{
                    $this->db->where('carId',$carid)->delete('accessoriesitem');
                }
                echo json_encode(array('success'=>'success'));
            }else{
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function create() {
            if($this->validate('create') == TRUE) {
                $data = array();
                $data['name'] = $this->input->post('name');
                $data['description'] = $this->input->post('description');
                $data['day13price'] = $this->input->post('day13price');
                $data['day47price'] = $this->input->post('day47price');
                $data['day815price'] = $this->input->post('day815price');

                $data['abs'] = (!$this->input->post('abs')) ? 0 : $this->input->post('abs');
                $data['ac'] = (!$this->input->post('ac')) ? 0 : $this->input->post('ac');
                $data['cd'] = (!$this->input->post('cd')) ? 0 : $this->input->post('cd');
                $data['airbag'] = (!$this->input->post('airbag')) ? 0 : $this->input->post('airbag');
                $data['diesel'] = (!$this->input->post('diesel')) ? 0 : $this->input->post('diesel');
                $data['auto_transmission'] = (!$this->input->post('auto_transmission')) ? 0 : $this->input->post('auto_transmission');

                $data['seat_count'] = $this->input->post('seat_count');
                $data['num_of_doors'] = $this->input->post('num_of_doors');
                $data['luggage_capacity'] = $this->input->post('luggage_capacity');
                $data['co2'] = $this->input->post('co2');
                $data['score'] = $this->input->post('score');
                $data['fuel_consumption'] = $this->input->post('fuel_consumption');
                $data['engine'] = $this->input->post('engine');
                $data['maxpower'] = $this->input->post('maxpower');
                $data['maxspeed'] = $this->input->post('maxspeed');
                $data['equipment'] = $this->input->post('equipment');

                $data['user_id'] = 7;

                $this->db->insert('car',$data);
                $carid = $this->db->insert_id();


                /*Accesories*/
                $accesories[1] = (!$this->input->post('bs')) ? 0 : $this->input->post('bs');
                $accesories[2] = (!$this->input->post('gp')) ? 0 : $this->input->post('gp');
                $accesories[3] = (!$this->input->post('wd')) ? 0 : $this->input->post('wd');


                if(($accesories[1] != 0) || ($accesories[2] || 0) || ($accesories[3] || 0)){

                    $adata = array();
                    $adata['carId'] = $carid;

                    for($i=1; $i<=3; $i++){
                        $adata['accessoryId'] = $i;
                        $adata['accessoryVal'] = $accesories[$i];
                        $c_ac = array('carId' => $carid, 'accessoryId' => $adata['accessoryId']);
                        if($adata['accessoryVal'] != 0){
                            $this->db->insert('accessoriesitem', $c_ac);    
                        }
                    }
                }

                echo json_encode(array('success'=>'success'));
            }else {
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }

        function delete($id) {
            $this->db->where('carId',$id)->delete('accessoriesitem');
            $this->db->where('id',$id)->delete('car');
            echo json_encode(array('success'=>'success'));
        }

        /*
        *          ADDITIONAL FUNC :: VALIDATE
        */

        function validate($type = 'create') {
            $this->form_validation->set_rules('name','Car Name','trim|required');
            $this->form_validation->set_rules('day13price','Price 1 - 3 days','trim|required|numeric');
            $this->form_validation->set_rules('day47price','Price 4 - 6 days','trim|required|numeric');
            $this->form_validation->set_rules('day815price','Price 8 - 14 days','trim|required|numeric');                

            $this->form_validation->set_message('required', 'Please enter'.' %s');

            if($this->form_validation->run() == TRUE) {
                return TRUE;
            }else {
                $this->errors = validation_errors(' ','<br />');
                return FALSE;
            }
        }

    }

?>
