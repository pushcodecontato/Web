<?php
    class FaqDAO{
        private $conex;
        // metodo construtor da classe - 
        public function __construct(){
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        // recebendo objeto da faqClass
        //criando insert 
        public function insert($faq){
            
            $sql = "insert into tbl_faq(titulo_faq,perguntas_faq,respostas_faq)".
               "VALUES('" . $faq->getTitulo_faq() ."',". $faq->getPerguntas_faq() ."',". $faq->getRespostas_faq() .")";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();

        }
        public function delete($id_faq){
                
            $sql = " DELETE FROM tbl_faq where id_faq = $id_faq ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }

        }
        public function update($faq){
        
                $sql = "UPDATE tbl_faq SET titulo_faq='" . $faq->getTitulo_faq() . "' , respostas_faq='" . $faq->getRespostas_faq() . "' , perguntas_faq='" . $faq->getPerguntas_faq() . "' " . 
                " WHERE id_faq =".$faq->getId_faq();
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
                $faq->setId_faq($rs_faq['id_faq'])
                    ->setTitulo_faq($rs_faq['titulo_faq'])
                    ->setPergunta_faq($rs_faq['perguntas_faq'])
                    ->setResposta_faq($rs_faq['respostas_faq']);

                $listar_registros[] = $faq;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;

        }
        public function selectById($id_faq){
            
            $sql = " SELECT * FROM tbl_faq where id_faq = $id_faq ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_faq = $select->fetch(PDO::FETCH_ASSOC)){

                $faq = new Faq();
                $faq->setId_faq($rs_faq['id_faq'])
                    ->setTitulo_faq($rs_faq['titulo_faq'])
                    ->setPergunta_faq($rs_faq['perguntas_faq'])
                    ->setResposta_faq($rs_faq['respostas_faq']);

                return $faq;

            } else {
                    echo "Registro não encontrado!!";
                    return 0;
            }


        }

    }
?>