<?php
    class ControllerSobre{


        private $conex;
        
        public function __construct(){
            // padrão - todas as controllers precisão disso
            // abrindo conexao com o mysql
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }
        public function inserir_sobre(){
            
        }
        public function excluir_sobre(){

        }
        public function atualizar_sobre(){

        }
        public function buscar_sobre(){
            $id_sobre = $_POST['id_sobre'];
            
            return $this 

        }
        public function listar_sobre(){

        }
    }
?>