<?php


    class ControllerSolicitacaoAnuncio{

        private $solicitacaoDAO;
        public function __construct(){
            //importando classes
            require_once('model/solicitacaoAnuncioClass.php');
            require_once('model/dao/solicitacaoAnuncioDAO.php');
        
            $this->solicitacaoDAO = new SolicitacaoAnuncioDAO();
            
        }

        public function inserir(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $solicitacaoAnuncio = new SolicitacaoAnuncio();
                $solicitacaoAnuncio->setId_cliente($_POST['id_cliente'])
                                   ->setId_anuncio($_POST['id_anuncio'])
                                   ->setData_inicio($_POST['dtInicial'])
                                   ->setData_final($_POST['dtFinal'])
                                   ->setHora_inicial($_POST['hrInicial'])
                                   ->setHora_final($_POST['hrFinal']);
                
                $this->solicitacaoDAO->insert($solicitacaoAnuncio);
            }
        }
        public function selectByIdCliente($idCliente){
            return $this->solicitacaoDAO->getByIdCliente($idCliente);
        }
    }
    
?>