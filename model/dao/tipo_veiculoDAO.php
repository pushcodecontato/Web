<?php


class  TipoVeiculoDAO{
    
    private $conex;

    public constructor(){
        require_once('model/tipo_veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    }

    public insert($tipo_veiculo){
        
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
    public uptade($tipo_veiculo){
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

    public selectAll(){
        $sql = "SELECT * FROM tbl_tipo_veiculo order by id_tipo_veiculo desc";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $lista_tipo = array();
            //Carregar todos os dados que estão no banco e guardando dentro
            //de um array local
            while($rs_tipos = $select->fetch(PDO::FETCH_ASSOC)){

                $tipo = new TipoVeiculo();
                $tipo->setId($rs_tipos['id_tipo_veiculo'])
                     ->setNome($rs_tipos['nome_tipo_veiculo']);

                $lista_tipo[] = $tipo;
            }

           

            $this->conex->close_database();

            return $lista_tipo;

    }


}



?>