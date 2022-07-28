<?php

    Class Conectar{

        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g4_19","G4_19","FQCMW9JV");
                return $conectar;
                
            }catch(Expection $e){

            print "ERROR BD: " . $e->getMessage() . "<br/>";
            die();
            }
           
        }
        
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }


?>