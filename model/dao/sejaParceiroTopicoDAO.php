<?php

    class SejaParceiroTopicoDAO{
        
        private $conex;

        public function __construct(){

            require_once('model/topicoParceiroClass.php');

            require_once('model/dao/conexaoMysql.php');
            
            $this->conex = new  conexaoMysql();

        }

        public function insert($topico){
           
            $sql = "INSERT INTO tbl_seja_parceiro(titulo_seja_parceiro,texto_seja_parceiro,foto_seja_parceiro)VALUES('". $topico->getTitulo() ."','". $topico->getTexto() ."','" . $topico->getFoto() ."')";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();
        }

        public function delete($id){
           
            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Usuario deletado com sucesso";
            } else {
                    echo "Usuario não encontrado!! $sql";
                    return 0;
            }
        }

        public function update($topico){
             
            
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Update com sucesso";
            }else{
                echo "Erro no script de update $sql";
            }

            $this->conex->close_database();
        }
        
        public function selectAll(){

            
            $sql = "SELECT * FROM tbl_seja_parceiro";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_topicos = array();

            while($rs_topico = $select->fetch(PDO::FETCH_ASSOC)){
                

                $topico = new TopicoParceiro();

                $topico->setId($rs_topico['id_seja_parceiro'])
                       ->setTitulo($rs_topico['titulo_seja_parceiro'])
                       ->setTexto($rs_topico['texto_seja_parceiro'])
                       ->setFoto($rs_topico['foto_seja_parceiro']);

                $listar_topicos[] = $topico;
                
            }
        
            $this->conex->close_database();

            return $listar_topicos;

        }
        public function selectById($id){

            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_usuario = $select->fetch(PDO::FETCH_ASSOC)){

                $usuario= new Usuario();
                $usuario->setId($rs_usuario['id_usuario_cms'])
                        ->setNome($rs_usuario['nome_usuario_cms'])
                        ->setEmail($rs_usuario['email_usuario_cms'])
                        ->setSenha($rs_usuario['senha'])
                        ->setNivel($rs_usuario['id_niveis']);

                return $usuario;

            } else {
                    echo "Usuario não encontrado!!";
                    return 0;
            }

        }

    }

?>