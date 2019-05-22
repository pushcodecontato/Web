<?php

    class SolicitacaoAnuncioDAO{
        private $conex;
        // metodo construtor da classe - 
        public function __construct($anuncioDAO = false){
            if(!$anuncioDAO){
                require_once('model/dao/anuncioDAO.php');
                $this->AnuncioDAO = new AnuncioDAO();
            }else{
                $this->AnuncioDAO = $anuncioDAO;
            }
            require_once('model/solicitacaoAnuncioClass.php');
            require_once('model/dao/conexaoMysql.php');
            require_once('model/dao/clienteDAO.php');

            $this->conex      = new conexaoMysql();
            $this->ClienteDAO = new ClienteDAO();

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
        public function selectById($id_solicitacao_anuncio){
            
            $sql = "SELECT * FROM tbl_solicitacao_anuncio WHERE id_solicitacao_anuncio = $id_solicitacao_anuncio";
            $PDO_conex = $this->conex->connect_database();
            
            $select = $PDO_conex->query($sql);
            if($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){
                

                $solicitacao = new SolicitacaoAnuncio();

                $solicitacao->setId_solicitacao_anuncio($rs_anuncio['id_solicitacao_anuncio'])
                            ->setId_anuncio($rs_anuncio['id_anuncio'])
                            ->setId_cliente($rs_anuncio['id_cliente'])
                            ->setData_inicio($rs_anuncio['data_inicio'])
                            ->setData_final($rs_anuncio['data_final'])
                            ->setHora_inicial($rs_anuncio['hora_inicial'])
                            ->setHora_final($rs_anuncio['hora_final'])
                            ->setStatus_solicitacao($rs_anuncio['status_solicitacao']);
                //var_dump($solicitacao);
                $anuncio = $this->AnuncioDAO->selectById($rs_anuncio['id_anuncio']);

                $cliente = $this->ClienteDAO->selectById($rs_anuncio['id_cliente']);
                /* Parece que vai funcionar */
                return $solicitacao->setAnuncio($anuncio)
                                   ->setCliente($cliente);
                
            }
        }
        public function getByIdCliente($idCliente){
            $sql = "SELECT * FROM tbl_solicitacao_anuncio where status_solicitacao = 0";

            $PDO_conex = $this->conex->connect_database();
            $select = $PDO_conex->query($sql);

            $lista_array = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){
                $solicitacao = new SolicitacaoAnuncio();

                $solicitacao->setId_solicitacao_anuncio($rs_anuncio['id_solicitacao_anuncio'])
                            ->setId_anuncio($rs_anuncio['id_anuncio'])
                            ->setId_cliente($rs_anuncio['id_cliente'])
                            ->setData_inicio($rs_anuncio['data_inicio'])
                            ->setData_final($rs_anuncio['data_final'])
                            ->setHora_inicial($rs_anuncio['hora_inicial'])
                            ->setHora_final($rs_anuncio['hora_final']);

                $anuncio = $this->AnuncioDAO->selectAllByUser($idCliente);
                $cliente = $this->ClienteDAO->selectById(8);
                $solicitacao->setAnuncio($anuncio)
                            ->setCliente($cliente);

                var_dump($solicitacao);
            }
        }

        public function aprovar($id_solicitacao_anuncio){

            $solicitacao = $this->selectById($id_solicitacao_anuncio);

            $sql = "INSERT INTO tbl_locacao".
                   "(`id_cliente_locador`,`id_anuncio`,`valor_locacao`,`id_percentual`,`status_finalizado`)".
                   "VALUES(". $solicitacao->getId_cliente() .",". $solicitacao->getId_anuncio() .",". $solicitacao->getAnuncio()->getValor() .",".
                   "". $solicitacao->getAnuncio()->getVeiculo()->getTipo()->getIdPercentual() .",0)";
            echo $sql;
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                
                $id_locacao = $PDO_conex->lastInsertId();

                
                $sql = "UPDATE tbl_solicitacao_anuncio SET status_solicitacao = 1 , id_locacao = $id_locacao WHERE id_solicitacao_anuncio = $id_solicitacao_anuncio";
                
                if($PDO_conex->query($sql)){
                        echo "Aprovado com sucesso";
                }
            } else {
                echo "Erro no script de insert".$sql;
            }
        }

        public function reprovar($id_solicitacao_anuncio){

            $sql = "UPDATE tbl_solicitacao_anuncio SET status_solicitacao = 2 WHERE id_solicitacao_anuncio = $id_solicitacao_anuncio";
            
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                
                echo "Aprovado com sucesso";

            } else {
                echo "Erro no script de insert".$sql;
            }
        }
    }

?>