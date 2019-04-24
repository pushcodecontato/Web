<?php 
       
class ControllerFale_conosco{
    
    private $fale_conoscoDao;
    
    public function __construct(){
        //importando classes
        require_once('model/fale_conoscoClass.php');
        require_once('model/dao/fale_conoscoDAO.php');

        $this->fale_conoscoDao = new Fale_conoscoDao();
    }

    public function excluir_registro_fale_conosco(){
        $id_usuario = $_GET['id'];

        $this->usuariosDao->delete($id_fale_conosco);
    }

    public function listar_registro_fale_conosco(){
        $consulta = $this->fale_conoscoDao->selectAll();

        return $consulta;
    }
    
    public function getById( $id_fale_conosco = 0 ){
        
        
        if($id_fale_conosco == 0 )$id_fale_conosco = $_GET['id_fale_conosco'];


        return $this->fale_conoscoDao->selectById($id_fale_conosco);

    }
}
?>