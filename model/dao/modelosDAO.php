<?php


class  ModeloDAO{
    private $conex;
    
    public function __construct(){
        require_once('model/modeloClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    }

    public function insert($modelo){

        $sql = "insert into tbl_modelo_veiculo(nome_modelo,id_marca_tipo)".
               "VALUES('" . $modelo->getNome() . "',". $modelo->getIdTipoMarca() .")";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Insert com sucesso";
        }else{
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    public function update($modelo){
        
        $sql = "UPDATE tbl_modelo_veiculo SET nome_modelo='" . $modelo->getNome() . "', id_marca_tipo='" . $modelo->getIdTipoMarca() . "'".
               " WHERE id_modelo =".$modelo->getId();
        echo $sql;
        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "update com sucesso";
        } else {
            echo "Erro no script de update";
        }
        
        $this->conex->close_database();

    }
    public function select($id){
        $sql = "SELECT * FROM tbl_modelo_veiculo WHERE id_modelo = $id";

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_modelos = $select->fetch(PDO::FETCH_ASSOC)){

            $modelo = new Modelo();
            $modelo->setId($rs_modelos['id_modelo'])
                   ->setNome($rs_modelos['nome_modelo'])
                   ->setIdTipoMarca($rs_modelos['id_marca_tipo']);

            return $modelo;

        } else {

                echo "Modelo não encontrado!!";
                return 0;
        }


    }

}



?>