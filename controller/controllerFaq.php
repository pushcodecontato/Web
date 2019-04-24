<?php
    class ControllerFaq{


        private $conex;
        public function __construct(){
            // padrão - todas as controllers precisão disso
            // abrindo conexao com o mysql
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }
        public function inserir_faq(){
            
            $faq = new Faq();

            $faq->setTitulo($_POST['titulo_faq'])
                   ->setPerguntas_faq($_POST['perguntas_faq'])
                   ->setRespostas_faq($_POST['respostas_faq']);
            
            $this->faqDAO->insert($faq);
        }

        public function excluir_faq(){

            $id_faq = $_GET['id_faq'];
            $this->faqDao->delete($id_faq);

        }
        public function atualizar_faq(){
            $faq = new Faq();
            $faq->setId_faq($_GET['id_faq'])
                   ->setTitulo($_POST['titulo_faq'])
                   ->setPerguntas_faq($_POST['perguntas_faq'])
                   ->setRespostas_faq($_POST['respostas_faq']);
            
            $this->faqDAO->update($faq);

        }
        public function buscar_faq($id_faq = 0){
            
             if($id_faq == 0)$id_faq = $_GET['id_faq'];
            

            return $this->faqDAO->select($id_faq);

        }
        public function listar_faq(){
            
            $consulta = $this->faqDao->selectAll();

            return $consulta;

        }
    }
?>