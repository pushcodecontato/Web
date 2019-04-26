<?php


class TopicoParceiro{

    private $id_seja_parceiro;
    private $titulo_seja_parceiro;
    private $texto_seja_parceiro;
    private $foto_seja_parceiro;

    public function setId($id_seja_parceiro){
        $this->id_seja_parceiro = $id_seja_parceiro;
        return $this;
    }
    public function getId(){
        return $this->id_seja_parceiro;
    }
    public function setTitulo($titulo_seja_parceiro){
        $this->titulo_seja_parceiro = $titulo_seja_parceiro;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_seja_parceiro;
    }
    public function setTexto($texto_seja_parceiro){
        $this->texto_seja_parceiro = $texto_seja_parceiro;
        return $this;
    }
    public function getTexto(){
        return $this->texto_seja_parceiro;
    }
    public function setFoto($foto_seja_parceiro){
        $this->foto_seja_parceiro = $foto_seja_parceiro;
        return $this;
    }
    public function getFoto(){
        return $this->foto_seja_parceiro;
    }

}




?>