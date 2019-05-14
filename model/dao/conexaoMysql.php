<?php

    class conexaoMysql{
        
        private $server;
        private $user;
        private $password;
        private $database;

        //método construtos para passar os dados do banco 
        public function __construct(){
            //$this->server = '0.tcp.ngrok.io;port=15477';
            $this->user = 'root';
<<<<<<< HEAD
	        $this->password = '';
            //$this->password = '12345ola';
//            HEAD
//            $this->password = 'bcd127';
//=======
//             HEAD
            $this->password = 'bcd127';
//=======
             $this->password = 'bcd127';
//            2f2ac44a550337385d16de8271a0ce21ac1d88fc
//            13114282d192cd46a2a452720bfb215c62a9b235
=======
            $this->password = 'bcd127';
>>>>>>> 7747f9b75c485ebc52884736a3fbd463df4bb323
   	        $this->server = 'localhost';
            $this->user = 'root';
            $this->database = 'mob_share';
        }

        //método para abrir conexao com o banco
        public function connect_database(){
           
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
                return $conexao;
            }catch(PDOException $erro){
                echo 'Erro ao tentar a conexao com o banco de dados! <br>
                Linhas: '.$erro->getLine().'<br>
                Mensagem: '. $erro->getMessage();
            }
        }
        //fechar conexao
        public function close_database(){
            $conexao = null;
            unset($conexao);
        }
    }

?>
