<?php

class ControllerLocacao{
    
    private $locacaoDao;

    public function __contruct(){

        require_once('model/clienteClass.php');        
        require_once('model/locacaoClass.php');
        require_once('model/tipo_veiculoClass.php');
        require_once('model/dao/locacaoDao.php');
        require_once('model/dao/tipo_veiculoDao.php');
        
        $this->locacaoDAO = new LocacaoDAO();
        
    }
    public function inserir(){

    }
    public function atualizar(){

    }

    public function excluir(){

    }

    public function listar(){
      
    if(!isset($_SESSION))session_start();
      $cliente = unserialize($_SESSION['cliente']);
      $status = "normal";
      
       if(isset($_GET['andamento'])){
           
        $status = "andamento";  
        $this->locacaoDAO->selectAll($status,$cliente->getId());
        
       }else{
           
       }

    }
}

?>