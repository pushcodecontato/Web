<?php


class Marca{
    
    private $id_marca_veiculo;
    private $nome_marca;

    public function __construct(){

    }

    public function setId($id){
        $this->id_marca_veiculo = $id;
        return $this;
    }

    public function getId(){
        return $this->id_marca_veiculo;
    }

    public function setNome($nome){
        $this->nome_marca = $nome;
        return $this;
    }

    public function getNome(){
        return $this->nome_marca;
    }

}

?>