<?php

    class Faq{

        private $id_faq;
        private $titulo_faq;
        private $perguntas_faq;
        private $respostas_faq;
        
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

            
        public function getPerguntas_faq(){
            return $this->$perguntas_faq;
        }
        public function setPerguntas_faq(){
            $this->perguntas_faq = $perguntas_faq;
            return $this;
        }

        public function getRespostas_faq(){
            return $this->resposta_faq;
        }
        public function setRespostas_faq(){
            $this->respostas_faq = $respostas_faq;
            return $this;
        }

    }

?>