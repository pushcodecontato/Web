<?php
    class FaqDAO{
        private $conex;
        // metodo construtor da classe - 
        public function __construct(){
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        // recebendo objeto da faqClass
        //criando insert 
        public function insert($faq){



        }
        public function delete($id){


        }
        public function update($faq){


        }
        public function selectAll(){


        }
        public function selectById($id){



        }

    }
?>