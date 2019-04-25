<?php


class Marca{
    
    private $id_marca_veiculo;
    private $nome_marca;
    private $id_tipo_veiculo;
    private $id_marca_tipo;

    /* FIP */
    private $cod_fip;

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

    /* ID da Tabela tbl_marca_veiculo_tipo_veiculo  */
    public function getIdTipoMarca(){
        return $this->id_marca_tipo;
    }

    public function setIdTipoMarca($id_marca_tipo){
        $this->id_marca_tipo = $id_marca_tipo;
        return $this;
    }
    /* FIP */
    public function setCodFIP($cod_fip){
        $this->cod_fip = $cod_fip;
        return $this;
    }
    public function getCodFIP(){
        return $this->cod_fip;
    }
}

?>