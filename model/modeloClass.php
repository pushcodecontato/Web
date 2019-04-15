<?php


class Modelo{
    
    private $id_modelo;
    private $nome_modelo;
    private $id_marca_tipo;

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

    public function getIdMarca(){
        return $this->id_marca_tipo;
    }

    public function setIdMarca($id_marca){
        $this->id_marca_tipo = $id_marca;
        return $this;
    }

}


















?>