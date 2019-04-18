<?php
    class ControllerFaq{


        private $conex;
        public function __construct(){
            // padrão - todas as controllers precisão disso
            // abrindo conexao com o mysql
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }
        public function inserir_faq(){

        }

        public function excluir_faq(){


        }
        public function atualizar_faq(){


        }
        public function buscar_faq(){


        }
        public function listar_faq(){


        }
    }
?>