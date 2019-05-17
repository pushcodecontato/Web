<?php

class ControllerAnuncios{
       
       private $anunciosDAO;
        
       public function __construct(){

        //importando classes
        require_once('model/anuncioClass.php');
        require_once('model/usuarioClass.php');
        require_once('model/dao/anuncioDAO.php');

        $this->anunciosDAO = new AnuncioDAO();

       }

       public function inserir_anuncio(){

              require_once('model/clienteClass.php');

              // Pegando o Cliente Logado
              if(!isset($_SESSION))session_start();

              $cliente = unserialize($_SESSION['cliente']);

              $id_veiculo   = $_POST['cb_veiculos'];
              $data_inicial = $_POST['data_inicial'];
              $data_final   = $_POST['data_final'];
              $hora_inicial = $_POST['hora_inicial'];
              $hora_final   = $_POST['hora_final'];
              $descricao    = $_POST['descricao'];
              $valor_hora   = $_POST['valor_hora'];
              $id_cliente   = $cliente->getId();
              
              $anuncio = new Anuncio();
              $anuncio->setDescricao($descricao)
                      ->setIdClienteLocador($id_cliente)
                      ->setIdVeiculo($id_veiculo)
                      ->setHorarioInicio($hora_inicial)
                      ->setHorarioTermino($hora_final)
                      ->setDataInicial($data_inicial)
                      ->setDataFinal($data_final)
                      ->setValor($valor_hora);
               
              $this->anunciosDAO->insert($anuncio);

       }
       public function excluir_anuncio(){}
       public function atualizar_anuncio(){}
       public function listar_anuncios(){}
        
       public function listar_anunciosProcesssados(){
           return $this->anunciosDAO->selectAllProcessados();
       }
       
       public function listar_anunciosPendentes(){
           return $this->anunciosDAO->selectAllPendentes();
       }
       public function aprovar_anuncio(){

            if(!isset($_SESSION))session_start();
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->anunciosDAO->aprovar($_GET['id_anuncio'],$_POST['motivo'],$id_usuarioCMS);
        
        }
        public function reprovar_anuncio(){
            
            if(!isset($_SESSION))session_start();
            
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->anunciosDAO->reprovar($_GET['id_anuncio'],$_POST['motivo'],$id_usuarioCMS);
        }

       public function getById($id = 0){

           if($id != 0)return $this->anunciosDAO->selectById($id);


           return $this->anunciosDAO->selectById($_GET['id_anuncio']);

       }
       /* Painel de Usuario */
       public function listar_anunciosByUser($id_cliente){               
        return $this->anunciosDAO->selectAllByUser($id_cliente);
       }

}

?>