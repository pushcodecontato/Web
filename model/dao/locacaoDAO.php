<?php


class LocacaoDAO{

    private $conex;
    private $anuncioDAO;

    public function __construct(){
        
        require_once('model/dao/conexaoMysql.php');
        require_once('model/locacaoClass.php');
        require_once('model/clienteClass.php');

        require_once('model/dao/anuncioDAO.php');
        require_once('model/dao/clienteDAO.php');
        require_once('model/dao/solicitacaoAnuncioDAO.php');

        $this->anuncioDAO = new AnuncioDao();
        $this->clienteDAO = new ClienteDAO();
        $this->solicitacaoDAO = new SolicitacaoAnuncioDAO($this->anuncioDAO);


        $this->conex = new  conexaoMysql();
    }

    public function insert($locacao){
        
        $sql = " INSERT INTO tbl_locacao(id_cliente_locador, id_anuncio,valor_locacao,data_hora_final,id_percentual)".
               " VALUES('". $locacao->getId_cliente_locador() ."','". $locacao->getAnuncio() ."','". $locacao->getValor_locacao() ."','". $locacao->getData_hora_final() ."',". $locacao->getId_percentual() .")";
            
         //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){

            echo "inserido com sucesso";

        } else {

            echo "Erro no script de insert";

        }
    }
    public function update(){}

    public function delete(){}

    public function selectAll($status,$id_cliente){
        
       
       if($status == "andamento"){
        
        $sql = "SELECT tbl_locacao.*,tbl_solicitacao_anuncio.id_solicitacao_anuncio FROM tbl_anuncio inner join tbl_locacao on (tbl_locacao.id_anuncio = tbl_anuncio.id_anuncio AND tbl_locacao.data_hora_final is null) inner join tbl_solicitacao_anuncio on  tbl_locacao.id_locacao = tbl_solicitacao_anuncio.id_locacao where tbl_anuncio.id_cliente_locador=$id_cliente"; 
       
       }else{
      
        $sql = "SELECT tbl_locacao.*,tbl_solicitacao_anuncio.id_solicitacao_anuncio FROM tbl_anuncio inner join tbl_locacao on (tbl_locacao.id_anuncio = tbl_anuncio.id_anuncio) inner join tbl_solicitacao_anuncio on  tbl_locacao.id_locacao = tbl_solicitacao_anuncio.id_locacao where tbl_anuncio.id_cliente_locador=$id_cliente"; 
       
       }



        //echo $sql;
 
        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $listar = array();

        while($rs_locacao = $select->fetch(PDO::FETCH_ASSOC)){

            $locacao = new Locacao();
            $locacao->setId($rs_locacao['id_locacao'])
                    ->setId_cliente_locador($rs_locacao['id_cliente_locador'])
                    ->setData_hora_final($rs_locacao['data_hora_final'])
                    ->setId_percentual($rs_locacao['id_percentual'])
                    ->setValor_locacao($rs_locacao['valor_locacao']);

            $anuncio     = $this->anuncioDAO->selectById($rs_locacao['id_anuncio']);
            $solicitacao = $this->solicitacaoDAO->selectById($rs_locacao['id_solicitacao_anuncio']);
            
            $locacao->setAnuncio( $anuncio );
            $locacao->setSolicitacao( $solicitacao );
            $locacao->setLocador( $solicitacao->getCliente() );

            $listar[] = $locacao;
        }

        $this->conex->close_database();

        return $listar;
    }

    public function selectAllLocatario($id_cliente){

        $sql = "SELECT tbl_locacao.*,tbl_solicitacao_anuncio.id_solicitacao_anuncio FROM tbl_anuncio inner join tbl_locacao on (tbl_locacao.id_anuncio = tbl_anuncio.id_anuncio) inner join tbl_solicitacao_anuncio on  tbl_locacao.id_locacao = tbl_solicitacao_anuncio.id_locacao where tbl_locacao.id_cliente_locador=$id_cliente"; 
        
        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $listar = array();

        while($rs_locacao = $select->fetch(PDO::FETCH_ASSOC)){

            $locacao = new Locacao();
            $locacao->setId($rs_locacao['id_locacao'])
                    ->setId_cliente_locador($rs_locacao['id_cliente_locador'])
                    ->setData_hora_final($rs_locacao['data_hora_final'])
                    ->setId_percentual($rs_locacao['id_percentual'])
                    ->setValor_locacao($rs_locacao['valor_locacao']);

            $anuncio     = $this->anuncioDAO->selectById($rs_locacao['id_anuncio']);
            $solicitacao = $this->solicitacaoDAO->selectById($rs_locacao['id_solicitacao_anuncio']);
            
            $locacao->setAnuncio( $anuncio );
            $locacao->setSolicitacao( $solicitacao );
            $locacao->setLocador( $solicitacao->getCliente() );

            $listar[] = $locacao;
        }

        $this->conex->close_database();

        return $listar;
    }

    public function selectById($id){}
    
    public function selectAndamento(){
         
    }
}
?>