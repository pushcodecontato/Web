<?php
/**
  @author lucas@asdasdad.asdasd
  @data  14/05/2019
  @comment  Montando a estrutura da locação e criando a listagem

  @author gilberto.tec@vivaldi.net
  @data  22/05/2019
  @comment  Arrumando crud

*/
class ControllerLocacao{

    private $locacaoDAO;

    public function __construct(){
        require_once('model/clienteClass.php');
        require_once('model/locacaoClass.php');
        require_once('model/dao/locacaoDAO.php');
        $this->locacaoDAO = new locacaoDAO();
    }

    public function inserir(){}
    public function atualizar(){}
    public function excluir(){}

    public function listar($status = "normal"){

        if(!isset($_SESSION))session_start();

        $cliente = unserialize($_SESSION['cliente']);

        if(isset($_GET['andamento'])){
            $status = "andamento";
        }

        $lista  = $this->locacaoDAO->selectAll($status,$cliente->getId());

        return $lista;


    }

    public function listarMinhasLocações(){

        if(!isset($_SESSION))session_start();

        $cliente = unserialize($_SESSION['cliente']);


        $lista  = $this->locacaoDAO->selectAllLocatario($cliente->getId());

        return $lista;
    }
}

?>
