<?php

    class ClienteDAO{
        
        private $conex;

        public function __construct(){
            require_once('model/clienteClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }
        public function insert($cliente){

        }
        public function delete($id){

        }
        public function update($cliente){

        }
        public function selectAll(){

        }
        public function select($id){

        }

        public function logar($cliente){
            
        }

    }

?>