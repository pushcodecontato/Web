<?php

class TipoVeiculo{


    private $id_tipo_veiculo;
    private $nome_tipo_veiculo;
    
    public __construct(){

    }

    public getId(){
        return $this->id_tipo_veiculo;
    }

    public setId($id){
        $this->id = $id;
        return $this;
    }

    public getNome(){
        return $this->nome_tipo_veiculo;
    }

    public setNome($nome){

        $this->nome_tipo_veiculo = $nome;
        
        return $this;
    }

}





?>