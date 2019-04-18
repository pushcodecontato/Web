<?php

class Email_marketingDAO{

        private $conex;
        public function __construct(){
            require_once('model/email_marketingClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function delete($id){
            $sql = " DELETE FROM tbl_email_mkt where id_tbl_email_mkt = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }
        }

        public function selectAll(){

            $sql = " SELECT * FROM tbl_email_mkt";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

            while($rs_email_marketing = $select->fetch(PDO::FETCH_ASSOC)){
                

                $email_marketing = new Email_marketing();
                $email_marketing->setId($rs_email_marketing['id_email_mkt'])
                        ->setEmail($rs_email_marketing['email']);

                $listar_registros[] = $email_marketing;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;

        }
        public function selectById($id){

            $sql = " SELECT * FROM tbl_email_mkt where id_email_marketing = $id ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_usuario = $select->fetch(PDO::FETCH_ASSOC)){

                $email_marketing = new Email_marketing();
                $email_marketing->setId($rs_email_marketing['id_email_marketing'])
                        ->setEmail($rs_email_marketing['email_email_marketing']);

                return $usuario;

            } else {
                    echo "Registro não encontrado!!";
                    return 0;
            }

        }
}

?>