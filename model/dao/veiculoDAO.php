<?php


class  VeiculoDAO{

    private $conex;

    /* Ligações <--->  da tabela de veiculo */
    private $marcasDAO;
    private $modelosDAO;
    private $tiposDAO;
    
    public function __construct(){

        require_once('model/veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');
        /* LIGAÇÃO marcas <---> veiculo */
        require_once('model/dao/marcasDAO.php');
        $this->marcasDAO = new MarcaDAO();
        
        /* LIGAÇÃO modelos <---> veiculo */
        require_once('model/dao/modelosDAO.php');
        $this->modelosDAO = new ModeloDAO();

        /* LIGAÇÃO tipos <---> veiculo */
        require_once('model/dao/tipo_veiculoDAO.php');
        $this->tiposDAO = new TipoVeiculoDAO();

        $this->conex = new  conexaoMysql();

    }

    public function insert($veiculo){


    }

    public function update($veiculo){
       
    }

    public function select($id){
       
    }
    public function selectAll(){
        $sql = " SELECT * FROM tbl_veiculo ";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        
        $select = $PDO_conex->query($sql);

        $listar_veiculo = array();

        while($rs_veiculo = $select->fetch(PDO::FETCH_ASSOC)){


            $veiculo = new Veiculo();

            $veiculo->setId($rs_veiculo['id_veiculo'])
                    ->setAno($rs_veiculo['ano'])
                    ->setPlaca($rs_veiculo['placa'])
                    ->setQuilometragem($rs_veiculo['quilometragem'])
                    ->setRenavam($rs_veiculo['renavam'])
                    ->setIdTipoVeiculo($rs_veiculo['id_tipo_veiculo'])
                    ->setIdMarcaVeiculo($rs_veiculo['id_marca_veiculo'])
                    ->setIdCliente($rs_veiculo['id_cliente']);

            /* Pegando fotos */
            $sql = "SELECT * FROM tbl_fotos_veiculo WHERE id_veiculo=".$rs_veiculo['id_veiculo'];

            $select = $PDO_conex->query($sql);
            
            $fotos = array();

            while($rs_fotos = $select->fetch(PDO::FETCH_ASSOC)){
                $fotos[]=  $rs_fotos['nome_foto'];
            }
            $veiculo->setFotos($fotos);

            $listar_veiculo[] = $veiculo;

        }
        

        $this->conex->close_database();        

        return $listar_veiculo;

    }
    public function selectAllPendentes(){
        /* Pegando todos os Veiculos que não tenha um status */
        $sql = "SELECT * FROM tbl_veiculo where id_veiculo not in (select id_veiculo from tbl_aprovacao_veiculo)";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        
        $select = $PDO_conex->query($sql);

        $listar_veiculo = array();

        while($rs_veiculo = $select->fetch(PDO::FETCH_ASSOC)){

            $veiculo = new Veiculo();

            $veiculo->setId($rs_veiculo['id_veiculo'])
                    ->setAno($rs_veiculo['ano'])
                    ->setPlaca($rs_veiculo['placa'])
                    ->setQuilometragem($rs_veiculo['quilometragem'])
                    ->setRenavam($rs_veiculo['renavam'])
                    ->setIdTipoVeiculo($rs_veiculo['id_tipo_veiculo'])
                    ->setIdMarcaVeiculo($rs_veiculo['id_marca_veiculo'])
                    ->setIdCliente($rs_veiculo['id_cliente']);

            /* Pegando fotos */
            $sqlFoto = "SELECT * FROM tbl_fotos_veiculo WHERE id_veiculo=".$rs_veiculo['id_veiculo'];

            $selectFoto = $PDO_conex->query($sqlFoto);
            
            $fotos = array();
            // Verifica se o select possui alguma coisa e evita o erro call to member
            if($selectFoto){

                while($rs_fotos = $selectFoto->fetch(PDO::FETCH_ASSOC)){
                    $fotos[]=  $rs_fotos['nome_foto'];
                }

            }

            $veiculo->setFotos($fotos);

            $listar_veiculo[] = $veiculo;

        }
        

        $this->conex->close_database();        

        return $listar_veiculo;
        
    }

}



?>