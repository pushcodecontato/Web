<?php
/**
  @author gilberto.tec@vivaldi.net
  @data  16/04/2019
  @comment  Implementando a estrutura basica do cadastro de cliente

  @author larisa@sdssd.sds
  @data  29/04/2019
  @comment  Colocando o desaticar e ativar de cliente

  @author matheus@sadss.ssd
  @data  15/05/2019
  @comment  Arruando o cadastro e o login de clientes
*/

    class ControllerClientes{

       private $clientesDAO;

       public function __construct(){
        //importando classes
        require_once('model/clienteClass.php');
        require_once('model/dao/clienteDAO.php');

        $this->clientesDAO = new ClienteDAO();

       }

       public function inserir_cliente(){
           $cliente = new Cliente();

           /* Inserido o cliente e pegando o mesmo depois da inserção para colocar na session
            * Para que o usuario possa entrar no painel de usuario depois de se cadastrar
            */
           $callback = $this->getByEmail($_POST['txtEmail']);

            if($callback == null){
                $cliente->setNome($_POST['txtNome'])
                   ->setCPF($_POST['txtCpf'])
                   ->setTelefone($_POST['txtTelefone'])
                   ->setCelular($_POST['txtCelular'])
                   ->setEmail($_POST['txtEmail'])
                   ->setSenha($_POST['txtSenha'])
                   ->setCEP($_POST['txtCep'])
                   ->setComplemento($_POST['txtComplemento'])
                   ->setRua($_POST['txtRua'])
                   ->setBairro($_POST['txtBairro'])
                   ->setCidade($_POST['txtCidade'])
                   ->setDt_nascimento($_POST['txtDtNasc'])
                   ->setUF($_POST['txtUf']);

                if( $_FILES['fotoCliente']['size'] > 0 ){
                    $cliente->setFoto($this->uploadImagem($_FILES['fotoCliente']));
                }

                if( $_FILES['fotoCNH']['size'] > 0 ){
                    $cliente->setCNHFoto($this->uploadImagem($_FILES['fotoCNH']));
                }

                if($cliente = $this->clientesDAO->insert($cliente)){
                // Verificndo se a session esta ativa
                    if(!isset($_SESSION))session_start();

                    $_SESSION['cliente'] = serialize($cliente);
                }
            }else{
                echo "Já existe um usuário cadastro com esse endereço de email";
            }

       }

       public function excluir_cliente(){}
       public function atualizar_cliente(){

       }
       public function logar(){
            // Pegando o usuario pelo email
           if($cliente = $this->clientesDAO->getByEmail($_POST['email'])){

               // Verificando se a senha esta correta
              if($cliente->verificar($_POST['senha'])){

                 // Verificando se a session esta ativa
                 if(!isset($_SESSION))session_start();
                 //guarda na session o cliente
                 $_SESSION['cliente'] = serialize($cliente);

                 echo "Cliente logado com sucesso";

              }else{
                 echo "Erro ao logar! senha incorreta";
              }

          }else{
              echo "Usuário não cadastrado, verifique email e senha!";
          }
       }
        /* UPLOAD DE IMAGEM
         * $arquivo = $_FILE['foto'] = objeto file do PHP
         */
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
                        $novoNome = (md5($entropia.$nomeArquivo))."".$extencao_arquivo;

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

        public function listar_registro_clientes(){
            $consulta = $this->clientesDAO->selectAll();

            return $consulta;
        }
        public function getById(){

            $id_cliente = $_POST['id'];

            return $this->clientesDAO->selectById($id_cliente);

        }
        public function getByEmail($email){

            return $this->clientesDAO->selectByEmail($email);

        }

        public function status(){
            $id = $_GET['id'];
            $status = $_POST['status'];
                return $this->clientesDAO->statusDAO($id,$status);

        }

    }
?>
