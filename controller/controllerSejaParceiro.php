<?php


class ControllerSejaParceiro{
       
       private $topicosDAO;
        
       public function __construct(){

        require_once('model/topicoParceiroClass.php');
        require_once('model/dao/sejaParceiroTopicoDAO.php');

        $this->topicosDAO = new SejaParceiroTopicoDAO();

       }

       public function inserir_topico(){

            echo "Chegou na controoler de modo insert";
            
            $topico = new TopicoParceiro();

            $topico->setTitulo($_POST['titulo'])
                   ->setTexto($_POST['texto'])
                   ->setFoto($this->uploadImagem($_FILES['imagem']));


            $this->topicosDAO->insert($topico);
       }

       public function excluir_topico(){}
       public function atualizar_topico(){}
       public function listar_topicos(){

           return $this->topicosDAO->selectAll();
           
       }

       public function getById($id = 0){


      }

       /* UPLOAD DE IMAGEM 
        * $arquivo = $_FILE['imagem'] = objeto file do PHP
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
}

?>