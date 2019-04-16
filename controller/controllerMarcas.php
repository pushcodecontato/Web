<?php 
    
    
    class ControllerMarcas{
       
        private $marcasDAO;
        private $tipoVeiculoDAO;
              
        public function __construct(){
            
            require_once('model/marcaClass.php');
            require_once('model/dao/marcasDAO.php');

            // relacionamento TIPO DE VEICULO --- MARCA
            require_once('model/tipo_veiculoClass.php');
            require_once('model/dao/tipo_veiculoDAO.php');


            $this->marcasDAO = new MarcaDAO();

            $this->tipoVeiculoDAO = new TipoVeiculoDAO();

        }

        public function inserir_marca(){
              
            $modelo = new Marca();

            $modelo->setNome($_POST['nome']);
            
            $tipo = $this->tipoVeiculoDAO->select($_GET['id_tipo_veiculo']);

                        
            $this->marcasDAO->insert($modelo,$tipo);
        
        }

        public function atualizar_marca(){
            
            $modelo = new Modelo();
            $modelo->setId($_GET['id'])
                   ->setNome($_POST['nome'])
                   ->setIdTipoMarca($_POST['id_tipo_marca']);
            
            $this->marcasDAO->update($modelo);
        }
        
        public function getById($id_modelo = 0){
            
            if($id_modelo == 0)$id_modelo = $_GET['id'];
            

            return $this->marcasDAO->select($id_modelo);

        }

        public function listar_marcas(){

        }
        
        public function listar_marcas_veiculo($id_tipo_veiculo = 0){

            if($id_tipo_veiculo == 0)$id_tipo_veiculo = $_GET['id_tipo_veiculo'];
            
//Parei aqui checkbox da tela de cadastro de marcas
            return $this->marcasDAO->select($id_modelo);
        }

    }

?>