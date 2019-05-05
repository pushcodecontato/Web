<?php 
       
class ControllerEmail_marketing{
    
    private $email_marketingDao;
    
    public function __construct(){
        //importando classes
        require_once('model/email_marketingClass.php');
        require_once('model/dao/email_marketingDAO.php');

        $this->email_marketingDao = new Email_marketingDao();
    }

    public function excluir_registro_email_marketing(){
        $id_email = $_GET['id'];

        $this->email_marketingDao->delete($id);
    }

    public function inserir(){
        
        $email_marketing = new Email_marketing();

        $email_marketing->setEmail($_POST['txtEmail']);
        
        $this->email_marketingDao->insert($email_marketing);

    }

    public function listar_registro_email_marketing(){
        $consulta = $this->email_marketingDao->selectAll();

        return $consulta;
    }
    public function getById(){

        $id = $_POST['id'];

        return $this->email_marketingDao->selectById($id);

    }
    public function enviar(){

        $assunto = $_POST['assunto'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $remetente = 'From: lucassoeiro03@gmail.com';
        $destinatario = 'lucassoeiro03@gmail.com';
        $alerta = "Email enviado com sucesso !!";

        $corpo = "
            Email:  ".$email."
            Mensagem:  ".$mensagem."
            ";

        mail($destinatario,$assunto,$corpo,$remetente);
            echo $alerta;
    }
}
?>