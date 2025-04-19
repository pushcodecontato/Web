<?php

    class conexaoMysql{
        
        private $server;
        private $user;
        private $password;
        private $database;

        // método construtos para passar os dados do banco 
        public function __construct(){
            $this->server = getenv('DB_HOST');
            $this->user = getenv('DB_USER');
            $this->password = getenv('DB_PASSWORD');
            $this->database = getenv('DB_NAME');
        }

        // método para abrir conexao com o banco
        public function connect_database(){
           
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database. ';charset=utf8',
                 $this->user,
                 $this->password);
                return $conexao;
            }catch(PDOException $erro){
                echo 'Erro ao tentar a conexao com o banco de dados! <br>
                Linhas: '.$erro->getLine().'<br>
                Mensagem: '. $erro->getMessage(). '<br>
                String: '. ('mysql:host='.$this->server.';dbname='.$this->database). '<br>
                User and Pass: '. $this->user .' & '. $this->password;
            }
        }
        //fechar conexao
        public function close_database(){
            $conexao = null;
            unset($conexao);
        }
    }

?>
