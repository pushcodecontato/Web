<?php

    class Faq{

        private $id_faq;
        private $titulo_faq;
        private $perguntas_faq;
        private $respostas_faq;
        
        public function __construct(){

        }

        public function getId(){
            return $this->id_faq;
        }
        public function setId(){
            $this->id_faq = $id_faq;
            return $this;
        }


        public function getTitulo(){
            return $this->titulo_faq;
        }
        public function setTitulo(){
            $this->titulo_faq = $titulo_faq;
            return $this;
        }

            
        public function getPerguntas(){
            return $this->$perguntas_faq;
        }
        public function setPerguntas(){
            $this->perguntas_faq = $perguntas_faq;
            return $this;
        }

        public function getRespostas(){
            return $this->resposta_faq;
        }
        public function setRespostas(){
            $this->respostas_faq = $respostas_faq;
            return $this;
        }

    }

?>