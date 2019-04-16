<?php


class Modelo{
    
    private $id_modelo;
    private $nome_modelo;
    private $id_tipo_marca;

    public function __construct(){

    }
    
    public function getId(){
        return $this->id_modelo;
    }

    public function setId($id){
        $this->id_modelo = $id;
        return $this;
    }

    public function getNome(){
        return $this->nome_modelo;
    }

    public function setNome($nome){
        $this->nome_modelo = $nome;
        return $this;
    }

    public function getIdTipoMarca(){
        return $this->id_tipo_marca;
    }

    public function setIdTipoMarca($id_tipo_marca){
        $this->id_tipo_marca = $id_tipo_marca;
        return $this;
    }

}


















?>