<?php


    /**
    * @author Logic
    * @version 1.0
    * @created 06-Mar-2012 10:44:54 PM
    */
    abstract class ErrorHandler
    {

        private $error;
        private $info;
        private $numrows;
        private $flag;

        function __construct()
        {
        }

        function __destruct()
        {
        }



        public function getError()
        {
            return $this->error;
        }

        public function setError($value)
        {
            $this->error = $value;
        }

        public function getInfo()
        {
            return $this->info;
        }

        public function setInfo($value)
        {
            $this->info = $value;
        }

        public function getNumrows()
        {
            return $this->numrows;
        }

        public function setNumrows($value)
        {
            $this->numrows = $value;
        }

        public function getFlag()
        {
            return $this->flag;
        }

        public function setFlag($value)
        {
            $this->flag = $value;
        }

        function test_response($dbRet){
            //print_r($dbRet);
            if(!isset($dbRet)){
                $this->setFlag('error');
                $this->setError('Rest service error!');
                return FALSE;
            };

            if(isset($dbRet->error)){
                $this->setFlag('error');
                $this->setError($dbRet->error);
                return FALSE;
            }

            if(isset($dbRet->num_rows)){
                $this->setFlag('numrows');
                $this->setNumrows($dbRet->num_rows);
                return FALSE;
            }

            if(isset($dbRet->info)){
                $this->setFlag('info');
                $this->setInfo($dbRet->info);
                return FALSE;
            }

            return $dbRet;    

        }

    }
?>