<?php

class Acessorio{
    
    private $id_acessorios;
    private $nome_acessorios;
    private $id_tipo_veiculo;
    private $estado;

    public function setId($id_acessorios){
        $this->id_acessorios = $id_acessorios;
        return $this;
    }

    public function getId(){
        return $this->id_acessorios;
    }

    public function setNome($nome_acessorios){
        $this->nome_acessorios = $nome_acessorios;
        return $this;
    }

    public function getNome(){
        return $this->nome_acessorios;
    }

    public function setIdTipoVeiculo($id_tipo_veiculo){
        $this->id_tipo_veiculo = $id_tipo_veiculo;
        return $this;
    }

    public function getIdTipoVeiculo(){
        return $this->id_tipo_veiculo;
    }

    public function setEstado($estado){
        $this->estado = $estado;
        return $this;
    }
    public function getEstado(){
        return $this->estado;
    }

}

?>