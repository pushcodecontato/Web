<?php

    class Faq{

        private $id_faq;
        private $titulo_faq;
        private $pergunta_1_faq;
        private $resposta_1_faq;
        
        public function __construct(){

        }

        public function getId_faq(){
            return $this->id_niveis;
        }
        public function setId_faq(){
            $this->id_niveis = $id_niveis;
            return $this;
        }


        public function getTitulo_faq(){
            return $this->titulo_faq;
        }
        public function setTitulo_faq(){
            $this->titulo_faq = $titulo_faq;
            return $this;
        }

            
        public function getPergunta_1_faq1(){
            return $this->pergunta_1_faq;
        }
        public function setPergunta_1_faq1(){
            $this->pergunta_1_faq = $pergunta_1_faq;
            return $this;
        }

        public function getResposta_1_faq(){
            return $this->resposta_1_faq;
        }
        public function setResposta_1_faq(){
            $this->resposta_1_faq = $resposta_1_faq;
            return $this;
        }

    }

?>