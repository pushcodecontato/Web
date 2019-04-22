<?php 
    
    
    class ControllerVeiculos{
       
        private $veiculosDAO;
              
        public function __construct(){
            

            require_once('model/veiculoClass.php');
            require_once('model/dao/veiculoDAO.php');


            $this->veiculosDAO = new VeiculoDAO();

        }

        public function inserir_veiculo(){
              
            
        }

        public function atualizar_veiculo(){

            
            
        }
        
        public function getById($id_veiculo = 0){
            
            
        }

        public function listar_veiculos(){
            
        }
        /* Retorna uma lsita com os veiculo que ainda não foram aprovados ou pendentes */
        public function listar_veiculos_pendentes(){
            return $this->veiculosDAO->selectAllPendentes();
        }

    }

?>