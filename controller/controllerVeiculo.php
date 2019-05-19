<?php 
    
    
    class ControllerVeiculos{
       
        private $veiculosDAO;
              
        public function __construct(){
            

            require_once('model/veiculoClass.php');
            require_once('model/usuarioClass.php');
            require_once('model/dao/veiculoDAO.php');
            require_once('model/clienteClass.php');

            $this->veiculosDAO = new VeiculoDAO();

        }

        public function aprovar_veiculo(){

            if(!isset($_SESSION))session_start();
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->veiculosDAO->aprovar($_GET['id_veiculo'],$_POST['motivo'],$id_usuarioCMS);
        
        }
        public function reprovar_veiculo(){
            
            if(!isset($_SESSION))session_start();
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->veiculosDAO->reprovar($_GET['id_veiculo'],$_POST['motivo'],$id_usuarioCMS);
        }

        public function inserir_veiculo(){
            $veiculo = new Veiculo();
            if(!isset($_SESSION))session_start();

            if(isset($_SESSION['cliente'])){
                $cliente = unserialize($_SESSION['cliente']);
                $idCliente = $cliente->getId();
            }

           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo $_POST['sltTipoVeiculo'];
                $veiculo->setAno($_POST['sltAno'])
                        ->setPlaca($_POST['txtPlaca'])
                        ->setQuilometragem($_POST['txtQuilometragem'])
                        ->setRenavam($_POST['txtRenavam'])
                        ->setIdTipoVeiculo($_POST['sltTipoVeiculo'])
                        ->setIdMarcaVeiculo($_POST['sltMarcasVeiculo'])
                        ->setIdModeloVeiculo($_POST['sltModeloVeiculo'])
                        ->setIdCliente($cliente->getId())
                        ->setAcessorios($_POST['sltAcessorios']);

                         /* Veficiando estado do input */ 
                if(isset($_FILES['ftVeiculo']) && $_FILES['ftVeiculo']['size'][0] > 0){

                    //foreach($_FILES['ftVeiculo']['name'] as )
                    $acc = 0; // => contador
                    $arquivos = array();
                    do{
                        
                        $nomeArquivo = $_FILES['ftVeiculo']['name'][$acc];
                        $caminho_do_arquivo = $_FILES['ftVeiculo']['tmp_name'][$acc];
                        $tamanho_do_arquivo = $_FILES['ftVeiculo']['size'][$acc];
                        $arquivos [] = array('name'=>$nomeArquivo,
                                            'tmp_name'=>$caminho_do_arquivo,
                                            'size'=>$tamanho_do_arquivo);
                        $acc++;
                    
                    }while(count($_FILES['ftVeiculo']['name'])>$acc);

                    $veiculo->setFotos(array());
                    for($cont = 0; $cont < count($arquivos); $cont++){
                         $veiculo->getFotos()[] = $this->uploadImagem($arquivos[$cont]);
                    }
                  

                }
                
                $this->veiculosDAO->insert($veiculo);
                
            }   
            
        }

        public function atualizar_veiculo(){

            
        }
        
        public function getById($id_veiculo){

            return $this->veiculosDAO->selectById($id_veiculo);
        }
        public function getAllById($id_veiculo){

            return $this->veiculosDAO->selectAllById($id_veiculo);
        }

        public function listar_veiculos(){
            
        }
        /* Retorna uma lsita com os veiculo que ainda não foram aprovados ou pendentes */
        public function listar_veiculos_pendentes(){
            return $this->veiculosDAO->selectAllPendentes();
        }

        public function uploadImagem($arquivo){
            // Verifica Se o arquivo tem um tamanho $_File tem conteudo
            if($arquivo['size']>0){

                // Vetor com uma lista de arquivos que são permitidos
                $arquivosPermitidos=array(".jpg",".png",".jpeg",".svg");
                // Pega o nome do arquivo
                $nomeArquivo = pathinfo($arquivo['name'], PATHINFO_FILENAME);
                // Pega a extenção do arquivo
                $extencao_arquivo = strrchr($arquivo['name'],".");
                
                // Define o tipo de arquivo que pode ler armazenado
                if( in_array($extencao_arquivo,$arquivosPermitidos) ){

                    $tamanho = round(($arquivo['size'])/1024);
                    // Define o tamanho maximo de para a foto enviada
                    if($tamanho<=4096){// 4 MB 
                        // Operações sobre o arquivo de imagem
                        /* AREA SEGURA!!! */
                        
                        /*  Aleatoriedade nessesaria para gerar um nome diferente:
                         *  gera 3 valores aleatorios entre 1 e 9  e os soma com a data atual do upload
                         */
                        $entropia = rand(1, 9) . "" . rand(1, 9) . "" .rand(1, 9) . "" . date('Y-m-d H:i:s');

                        // Criando novo nome para a imagem baseado na entropia 
                        $novoNome = "vei_".(md5($entropia.$nomeArquivo))."".$extencao_arquivo;
                        
                        // Novo Caminho para a imagem 
                        $caminho_novo_da_imagem = "view/upload/".$novoNome;
                        // Caminho atual da imagem
                        $caminho_atual_da_imagem = $arquivo['tmp_name'];
                        
                        // MOVENDO ARQUIVO DO CAMINHO ATUAL PARA O NOVO CAMINHO 
                        if(move_uploaded_file($caminho_atual_da_imagem,$caminho_novo_da_imagem)){
                            
                            // Caso tudo tenha dado certo retorna o novo nome do arquivo
                            return $novoNome;
                        
                        }
                    }
                }
            }

            // Caso não funcione retorna um false para quem o chamou
            return false;
	}
        /* Retorna uma lsita com os veiculo que ainda não foram aprovados ou pendentes */
        public function listar_veiculos_aprovados(){
            return $this->veiculosDAO->selectAllAprovados();
        }

    }

?>
