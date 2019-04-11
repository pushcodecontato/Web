<?php

class ControllerTipoVeiculo{

    private $tipoVeiculoDAO;

    public construct(){
        require_once('model/dao/tipo_veiculoDAO.php');
        require_once('model/tipo_veiculoClass.php');
        $this->tipoVeiculoDAO = new TipoVeiculoDAO();
    }

    public inserir_tipo_veiculo(){

        $tipo = new TipoVeiculo();

        $tipo->setNome($_POST['txtNome']);

        $this->tipoVeiculoDAO->insert($tipo);

    }

    public atualizar_tipo_veiculo(){

        $tipo = new TipoVeiculo();

        $tipo->setId($_POST['id'])
             ->setNome($_POST['txtNome']);

        $this->tipoVeiculoDAO->update($tipo);
    }

    public listar_tipo(){
        return $this->tipoVeiculoDAO->selectAll();
    }

}


?>