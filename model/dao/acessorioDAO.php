<?php

    class AcessorioDAO{

        private $conex;

        public function __construct(){
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function insert($acessorio){
            
            $sql = " INSERT INTO tbl_acessorios(nome_acessorios,id_tipo_veiculo)".
                   " VALUES('". $acessorio->getNome() ."',". $acessorio->getIdTipoVeiculo() .")";
            
             //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "inserido com sucesso";

            } else {

                echo "Erro no script de insert";

            }

            

        }

        public function delete($id){
            
        }

        public function update($acessorio){

            $sql = "UPDATE tbl_acessorios SET nome_acessorios='". $acessorio->getNome() ."' WHERE id_acessorios=".$acessorio->getId();

             //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "atualizado com sucesso";

            } else {

                echo "Erro no script de atualização";

            }
            
        }
        public function selectAll(){
            

        }
        public function selectById($id){
            
            $sql = "SELECT * FROM tbl_acessorios where id_acessorios =".$id;


            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);


            if($rs_acessorio = $select->fetch(PDO::FETCH_ASSOC)){

                $acessorio = new Acessorio();

                $acessorio->setId($rs_acessorio['id_acessorios'])
                          ->setNome($rs_acessorio['nome_acessorios'])
                          ->setIdTipoVeiculo($rs_acessorio['id_tipo_veiculo']);

                
                $this->conex->close_database();


                return $acessorio;

            } else {
                
                $this->conex->close_database();

                return false;
            }



        }


    }

?>