<?php

class ControllerTipoVeiculo{

    private $tipoVeiculoDAO;

    public function __construct(){

        require_once('model/dao/tipo_veiculoDAO.php');
        require_once('model/tipo_veiculoClass.php');

        $this->tipoVeiculoDAO = new TipoVeiculoDAO();
    
    }

    public function inserir_tipo(){

        $tipo = new TipoVeiculo();

//Parei Aqui!!!

        $tipo->setNome($_POST['txtNome'])
             ->setPercentual()

        $this->tipoVeiculoDAO->insert($tipo);

    }

    public function atualizar_tipo(){

        $tipo = new TipoVeiculo();

        $tipo->setId($_POST['id'])
             ->setNome($_POST['txtNome']);

        $this->tipoVeiculoDAO->update($tipo);
    }

    public function listar_tipo(){
        return $this->tipoVeiculoDAO->selectAll();
    }

}


?>