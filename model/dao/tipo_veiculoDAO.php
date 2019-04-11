<?php


class  TipoVeiculoDAO{
    
    private $conex;

    public function __construct(){
        
        require_once('model/tipo_veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');

        $this->conex = new  conexaoMysql();
    }

    public function insert($tipo_veiculo){
        
        $sql ="INSERT INTO tbl_tipo_veiculo(nome_tipo_veiculo) VALUES
            ('" . $tipo_veiculo->getNome() . "')";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Insert com sucesso";
        }else{
            echo "Erro no script de insert";
        }

        $this->conex->close_database();

    }
    public function uptade($tipo_veiculo){
        $sql = "UPTADE tbl_tipo_veiculo SET nome_tipo_veiculo = '" . $tipo_veiculo->getNome() . "'".
               "WHERE id_tipo_veiculo = ".$tipo_veiculo->getId();

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Update com sucesso";
        }else{
            echo "Erro no script de uptade";
        }

        $this->conex->close_database();

    }

    public function selectAll(){

            $sql = "SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' FROM tbl_tipo_veiculo ".
                   "left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo group by tbl_tipo_veiculo.id_tipo_veiculo";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $lista_tipo = array();
            
           
            while($rs_tipos = $select->fetch(PDO::FETCH_ASSOC)){

                $tipo = new TipoVeiculo();
                $tipo->setId($rs_tipos['id_tipo_veiculo'])
                     ->setNome($rs_tipos['nome_tipo_veiculo'])
                     ->setPercentual($rs_tipos['percentual']);


                $lista_tipo[] = $tipo;
            }

           

            $this->conex->close_database();

            return $lista_tipo;

    }


}



?>