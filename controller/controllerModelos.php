<?php 
    
    
    class ControllerModelos{
       
        private $modelosDAO;
        
        public function __construct(){
            
            require_once('model/modeloClass.php');
            require_once('model/dao/modelosDAO.php');

            $this->modelosDAO = new ModeloDAO();

        }

        public function inserir_modelo(){
              
            $modelo = new Modelo();

            $modelo->setNome($_POST['nome'])
                   ->setIdMarca($_POST['id_marca_veiculo']);
            
            $this->modelosDAO->insert($modelo);
        
        }
        
      



    }

?>