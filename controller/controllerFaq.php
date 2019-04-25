<?php
class ControllerFaq{

    private $conex;
    private $faqDAO;

    public function __construct(){

        require_once('model/dao/conexaoMysql.php');
        require_once('model/dao/faqDAO.php');
        require_once('model/faqClass.php');

        $this->faqDAO = new FaqDAO();

        $this->conex = new conexaoMysql();
    }
    public function inserir_faq(){

        $faq = new Faq();
        //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $faq = new Faq();

                $faq->setTitulo_faq($_POST['txtTitulo_faq'])
                    ->setPerguntas_faq($_POST['txtPerguntas_faq'])
                    ->setRespostas_faq($_POST['txtRespostas_faq']);

                $this->faqDao->insert($faq);
            }
            
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


        return $this->faqDao->select($id_faq);

    }

    public function listar_registro_faq(){

        $consulta = $this->faqDAO->selectAll();

        return $consulta;
    }
}
?>