<?php
/**
  @author matheus.vieira@asdas.asdasd
  @data  19/05/2019
  @comment  Processo de solicitação de anuncio feito

  @author matheus.vieira@asdas.asdasd
  @data  21/05/2019
  @comment  Adicionado a pagina de solicitação

  @author gilberto.tec@vivaldi.net
  @data  20/04/2019
  @comment  Fazendo aprovação e recusa de solicitação

*/

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
        public function selectById($id_solicitacao = false){

            if($id_solicitacao)return $this->solicitacaoDAO->selectById($id_solicitacao);

            return $this->solicitacaoDAO->selectById($_GET['id']);

        }
        public function aprovar(){

            $this->solicitacaoDAO->aprovar($_GET['id']);

        }
        public function reprovar(){
            $this->solicitacaoDAO->reprovar($_GET['id']);
        }
    }

?>
