<?php
    class SolicitacaoAnuncio{

        private $id_solicitacao_anuncio;
        private $id_anuncio;
        private $id_cliente;
        private $data_inicio;
        private $data_final;
        private $hora_inicial;
        private $hora_final;
        private $status_solicitacao;

        private $cliente;
        private $anuncio;

        public function __construct(){
            
        }

        public function getId_solicitacao_anuncio(){
            return $this->id_solicitacao_anuncio;
        }
        
        public function setId_solicitacao_anuncio($id_solicitacao_anuncio){
            $this->id_solicitacao_anuncio = $id_solicitacao_anuncio;
            return $this;
        }
        public function getId_anuncio(){
            return $this->id_anuncio;
        }
        
        public function setId_anuncio($id_anuncio){
            $this->id_anuncio = $id_anuncio;
            return $this;
        }
        public function getId_cliente(){
            return $this->id_cliente;
        }
        
        public function setId_cliente($id_cliente){
            $this->id_cliente = $id_cliente;
            return $this;
        } 

        public function getData_inicio()
        {
            return $this->data_inicio;
        }

        public function setData_inicio($data_inicio)
        {
            $this->data_inicio = $data_inicio;
            return $this;
        }
        public function getData_final()
        {
            return $this->data_final;
        }

        public function setData_final($data_final)
        {
            $this->data_final = $data_final;
            return $this;
        }

        public function getHora_inicial()
        {
            return $this->hora_inicial;
        }

        public function setHora_inicial($hora_inicial)
        {
            $this->hora_inicial = $hora_inicial;

            return $this;
        }


        public function getHora_final()
        {
            return $this->hora_final;
        }

        public function setHora_final($hora_final)
        {
            $this->hora_final = $hora_final;

            return $this;
        }

        public function getStatus_solicitacao()
        {
            return $this->status_solicitacao;
        }

        public function setStatus_solicitacao($status_solicitacao)
        {
            $this->status_solicitacao = $status_solicitacao;

            return $this;
        }

        public function getCliente(){
            return $this->cliente;
        }
        
        public function setCliente($cliente){
            $this->cliente = $cliente;
            return $this;
        }
        public function getAnuncio(){
            return $this->anuncio;
        }
        
        public function setAnuncio($anuncio){
            $this->anuncio = $anuncio;
            return $this;
        }

        public function getHorasTotais(){
            
            $datetime_inicial =  new DateTime($this->data_inicio." ".$this->hora_inicial);
            $datetime_final   =  new DateTime($this->data_final ." ".$this->hora_final);

            $intervalo = $datetime_inicial->diff($datetime_final);


            
            return $intervalo->format('%H');
        }
        public function getValorTotal($valor_hora = 0){
                
                if($valor_hora == 0)$valor_hora = $this->anuncio->getValor();

                $horas_totais = $this->getHorasTotais();
                
                return $valor_hora * $horas_totais;
        }
        public function to_json(){

                $anuncio     = $this->anuncio->to_json();
                $cliente     = $this->cliente->to_json();
                $valor_total = $this->getValorTotal($anuncio['valor_hora']);

                /// KKK isso foi estralho 
                return array('id_solicitacao_anuncio'=>$this->id_solicitacao_anuncio,
                             'id_anuncio'=>$this->id_anuncio,
                             'id_cliente'=>$this->id_cliente,
                             'data_inicio'=>$this->data_inicio,
                             'data_final'=>$this->data_final,
                             'hora_inicial'=>$this->hora_inicial,
                             'hora_final'=>$this->hora_final,
                             'status_solicitacao'=>$this->status_solicitacao,
                             'valor_total'=>$this->valor_total,
                             'cliente'=>$cliente,
                             'anuncio'=>$anuncio);
        }

}

?>