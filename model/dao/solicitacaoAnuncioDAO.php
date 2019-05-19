<?php

    class SolicitacaoAnuncioDAO{
        private $conex;
        // metodo construtor da classe - 
        public function __construct(){
            require_once('model/solicitacaoAnuncioClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function insert($solicitacao){

            $sql = "INSERT INTO tbl_solicitacao_anuncio
            (id_anuncio, id_cliente,data_inicio,data_final,hora_inicial,hora_final,status_solicitacao)VALUES
            (". $solicitacao->getId_anuncio() .", ". $solicitacao->getId_cliente() .",'".$solicitacao->getData_inicio()."', 
            '".$solicitacao->getData_final()."',
            '".$solicitacao->getHora_inicial()."',
            '".$solicitacao->getHora_final()."', 0)";

            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Dados inseridos com sucesso";
            }
            else{
                echo "Erro no script de insert".$sql;
            }

        }


    }

?>