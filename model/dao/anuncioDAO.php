<?php

    class AnuncioDAO{

        private $conex;
        private $veiculosDAO;
        private $clienteDAO;
        private $solicitacaoDAO;

        public function __construct(){

            require_once('model/anuncioClass.php');
            require_once('model/dao/conexaoMysql.php');

            /* LIGAÇÃO veiculos <---> anuncios */
            require_once('model/dao/veiculoDAO.php');
            $this->veiculosDAO = new VeiculoDAO();

            /* LIGAÇÃO anuncio <---> cliente */
            require_once('model/dao/clienteDAO.php');
            $this->clienteDAO = new ClienteDAO();

            /* LIGAÇÃO solicitação <---> anuncio */
            require_once('model/dao/solicitacaoAnuncioDAO.php');
            $this->solicitacaoDAO = new SolicitacaoAnuncioDAO($this);

            $this->conex = new  conexaoMysql();
        }

        public function insert($anuncio){

            var_dump($anuncio);

            $sql = "INSERT INTO tbl_anuncio (descricao,id_cliente_locador, id_veiculo, horario_inicio, horario_termino, data_inicial, data_final,valor_hora)".
                   "VALUES ('". $anuncio->getDescricao() ."', ". $anuncio->getIdClienteLocador() ." , ". $anuncio->getIdVeiculo() .", '". $anuncio->getHorarioInicio() ."', '". $anuncio->getHorarioTermino() ."', '". $anuncio->getDataInicial() ."', '". $anuncio->getDataFinal() ."',". $anuncio->getValor() .")";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "inserido com sucesso";

                return true;

            } else {
                echo $sql;
                echo "Erro no script de insert";
                // Retornando false para que a controller saiba que o ussuario não foi inserido
                return false;
            }
        }

        public function delete($id){
            $sql = " UPDATE tbl_anuncio SET excluido = 1 ".
                   " WHERE tbl_anuncio.id_anuncio = $id ";
            echo $sql;
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo " Deletado com sucesso ";
            } else {
                echo " Erro no script de Deletar ";
            }
            $this->conex->close_database();
        }

        public function update(){}
        /* Retorna os anuncios processados */
        public function selectAllProcessados(){

            $sql = "SELECT tbl_anuncio.*,tbl_aprovacao_anuncio.status_aprovacao FROM tbl_anuncio inner join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio WHERE tbl_anuncio.excluido = 0";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setStatus($rs_anuncio['status_aprovacao']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }



            $this->conex->close_database();

            return $lista_anuncios;
        }
        /* Retorna uma lista do sanuncios que ainda não foram aprovados ou reprovados */
        public function selectAllPendentes(){

            $sql = "SELECT * FROM tbl_anuncio WHERE id_anuncio not in (select id_anuncio from tbl_aprovacao_anuncio) AND tbl_anuncio.excluido = 0";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }


            $this->conex->close_database();

            return $lista_anuncios;


        }
        public function selectById($id){

            $sql = "SELECT tbl_anuncio.*,if(tbl_aprovacao_anuncio.status_aprovacao is null,2,tbl_aprovacao_anuncio.status_aprovacao) as status_aprovacao,if(tbl_aprovacao_anuncio.status_aprovacao is null,'pendente',tbl_aprovacao_anuncio.mensagem) as mensagem  FROM tbl_anuncio left join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio WHERE tbl_anuncio.excluido = 0 AND tbl_anuncio.id_anuncio=". $id;

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            if($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setMenssagem($rs_anuncio['mensagem'])
                            ->setStatus($rs_anuncio['status_aprovacao']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                   return $anuncio;

            } else {

                return false;

            }


            $this->conex->close_database();
        }
        /**
          Função que aprova os anuncios
          @param int    $id_anuncio  id do anuncio que será abrovado
          @param string $mensagem  mensagem de aprovação
          @param int    $id_usuario_cms  id do usuario cms que aprovou
          @return boolean se o vinculo ocorreu ou não
        */
        public function aprovar($id_anuncio, $mensagem, $id_usuario_cms){

            $sql = "INSERT INTO tbl_aprovacao_anuncio (status_aprovacao,mensagem,id_usuario_cms,id_anuncio)".
                   " VALUES(1,'". $mensagem ."',". $id_usuario_cms .",". $id_anuncio .")";

            echo "SQL : $sql ";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo " Insert com sucesso ";
            } else {
                echo " Erro no script de insert ";
            }
            $this->conex->close_database();
        }
        /**
          Função que reprova os anuncios
          @param int    $id_anuncio  id do anuncio que será abrovado
          @param string $mensagem  mensagem de aprovação
          @param int    $id_usuario_cms  id do usuario cms que aprovou
          @return boolean se o vinculo ocorreu ou não
        */
        public function reprovar($id_veiculo, $mensagem, $id_usuario_cms){

            $sql = "INSERT INTO tbl_aprovacao_anuncio (status_aprovacao,mensagem,id_usuario_cms,id_anuncio)".
                   " VALUES(0,'". $mensagem ."',". $id_usuario_cms .",". $id_veiculo .")";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo " Insert com sucesso ";
            } else {
                echo " Erro no script de insert ";
            }

            $this->conex->close_database();
        }
        /* PAINEL DE USUARIO */
        public function selectAllByUser($id_cliente){

            $sql = "SELECT tbl_anuncio.*,if(tbl_aprovacao_anuncio.status_aprovacao is null,2,tbl_aprovacao_anuncio.status_aprovacao) as status_aprovacao FROM tbl_anuncio left join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio WHERE
tbl_anuncio.excluido = 0 AND tbl_anuncio.id_cliente_locador = $id_cliente";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setStatus($rs_anuncio['status_aprovacao']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }



            $this->conex->close_database();

            return $lista_anuncios;
        }
        /**
          Função que filtra os anucnios
          @param int    $id_tipo_veiculo  id do tipo de veiculo carro, moto
          @param int    $id_marca_tipo    id da marca
          @param int    $id_modelo        id do modelo
          @return anucios[] um vetor com os anuncios encontrados
        */
        public function selectAllAprovadosBuscar($id_tipo_veiculo = false,$id_marca_tipo = false ,$id_modelo = false){

            $sql = "SELECT tbl_anuncio.*,tbl_aprovacao_anuncio.status_aprovacao FROM ".
                   "tbl_anuncio inner join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio ".
                   "inner join tbl_veiculo on tbl_anuncio.id_veiculo = tbl_veiculo.id_veiculo ".
                   "inner join tbl_marca_veiculo_tipo_veiculo on tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo = tbl_veiculo.id_marca_veiculo ".
                   "WHERE ";

            $wheres = array();
            /* APROVADOS */
            $wheres[] = "tbl_aprovacao_anuncio.status_aprovacao = 1";
            $wheres[] = " tbl_anuncio.excluido = 0 ";
            /* FILTRO:   */
            if($id_tipo_veiculo)$wheres[] = " tbl_veiculo.id_tipo_veiculo = $id_tipo_veiculo ";
            if($id_marca_tipo)$wheres[]   = " tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo = $id_marca_tipo ";
            if($id_modelo)$wheres[]       = " tbl_veiculo.id_modelo_veiculo = $id_modelo ";

            $sql .= implode(' AND ',$wheres);
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setStatus($rs_anuncio['status_aprovacao']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }



            $this->conex->close_database();

            return $lista_anuncios;
        }
        /* Painel de usuario Interssados nos veiculo */

        public function selectAllInteresadosByUser($id_cliente){
                $sql = "SELECT tbl_solicitacao_anuncio.id_solicitacao_anuncio , tbl_solicitacao_anuncio.id_cliente as id_locatario,tbl_anuncio.*,tbl_aprovacao_anuncio.status_aprovacao,if(tbl_solicitacao_anuncio.status_solicitacao = 0 ,'pendente',if(tbl_solicitacao_anuncio.status_solicitacao = 1,'Aprovado','Reprovado')) as 'status' ".
                       "FROM tbl_anuncio inner join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio ".
                       "inner join tbl_veiculo 					  on tbl_anuncio.id_veiculo = tbl_veiculo.id_veiculo ".
                       "inner join tbl_marca_veiculo_tipo_veiculo on tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo = tbl_veiculo.id_marca_veiculo ".
                       "inner join tbl_solicitacao_anuncio 		  on tbl_solicitacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio ".
                       "WHERE tbl_anuncio.excluido = 0 AND tbl_anuncio.id_cliente_locador = $id_cliente";

                $PDO_conex = $this->conex->connect_database();

                $select = $PDO_conex->query($sql);

                $lista_anuncios = array();

                while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();

                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setStatus($rs_anuncio['status_aprovacao']);



                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $cliente_locatario = $this->clienteDAO->selectById($rs_anuncio['id_locatario']);
                    // Pegando solicitaço
                    $solicitacao = $this->solicitacaoDAO->selectById($rs_anuncio['id_solicitacao_anuncio']);

                    $anuncio->setVeiculo($veiculo)
                            ->setSolicitacao($solicitacao)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

               }



               $this->conex->close_database();

               return $lista_anuncios;
        }
    }

?>
