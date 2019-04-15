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
               "VALUES('" . $modelo->getNome() . "',". $modelo->getIdMarca() .")";

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

    }
    public function select(){

    }

}



?>