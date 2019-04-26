<?php
    class FaqDao{

        private $conex;
        // metodo construtor da classe - 
        public function __construct(){
            require_once('model/faqClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function insert($faq){
            
            $sql = "insert into tbl_faq(titulo,perguntas,respostas)".
               "VALUES('" . $faq->getTitulo() ."','". $faq->getPerguntas() ."','". $faq->getRespostas() ."')";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();

        }
        public function delete($id){
                
            $sql = " DELETE FROM tbl_faq where id = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }

        }
        public function update($faq){
        
                $sql = "UPDATE tbl_faq SET titulo='" . $faq->getTitulo() . "' , respostas='" . $faq->getRespostas() . "' , perguntas='" . $faq->getPerguntas() . "' " . 
                " WHERE id =".$faq->getId(). "";
                echo $sql;
                //Abrido conexao com o BD
                $PDO_conex = $this->conex->connect_database();

                if($PDO_conex->query($sql)){
                    echo "update com sucesso";
                } else {
                    echo "Erro no script de update";
                }

                $this->conex->close_database();
        }
        public function selectAll(){
            
            $sql = " SELECT * FROM tbl_faq";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

            while($rs_faq = $select->fetch(PDO::FETCH_ASSOC)){
                

                $faq = new Faq();
                $faq->setId($rs_faq['id'])
                    ->setTitulo($rs_faq['titulo'])
                    ->setPerguntas($rs_faq['perguntas'])
                    ->setRespostas($rs_faq['respostas']);

                $listar_registros[] = $faq;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;


                
        }
        public function selectById($id){
            
            $sql = " SELECT * FROM tbl_faq where id = $id ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_faq = $select->fetch(PDO::FETCH_ASSOC)){

                $faq = new Faq();
                $faq->setId($rs_faq['id'])
                    ->setTitulo($rs_faq['titulo'])
                    ->setPerguntas($rs_faq['perguntas'])
                    ->setRespostas($rs_faq['respostas']);

                return $faq;

            } else {
                    echo "Registro não encontrado!!";
                    return 0;
            }


        }

    }
?>