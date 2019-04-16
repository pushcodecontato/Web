<?php


class  MarcaDAO{
    private $conex;
    
    public function __construct(){
        require_once('model/marcaClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    }

    public function insert($marca,$tipo){

        $sql = "insert into tbl_marca_veiculo(nome_marca)".
               "VALUES('" . $marca->getNome() . "')";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();


        if($PDO_conex->query($sql)){//Inserindo Marca

            $id_marca = $PDO_conex->lastInsertId();//ID da marca inserida

            $sql = "insert into tbl_marca_veiculo_tipo_veiculo(id_tipo_veiculo,id_marca_veiculo)".
                   "VALUES('" . $tipo->getId() . "',$id_marca)";
                
            if($PDO_conex->query($sql)){// Vinculando Marca com o tipo de veiculo

                echo "Insert com sucesso";
            
            }else{
            
                echo "Erro no script de insert";
            
            }
        }else{
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    public function update($marca){

        
        $sql = "UPDATE tbl_marca_veiculo SET nome_marca ='".$marca->getNome()."' ". 
               "WHERE id_marca_veiculo =".$marca->getId();

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();


        if($PDO_conex->query($sql)){

            echo "update com sucesso";
            
        } else {
            echo "Erro no script de update";
        }
        
    }

    public function select($id){
        $sql = "SELECT * FROM tbl_marca_veiculo where id_marca_veiculo =".$id;

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);


        if($rs_marca = $select->fetch(PDO::FETCH_ASSOC)){
            
            $marca = new Marca();

            $marca->setId($rs_marca['id_marca_veiculo'])
                  ->setNome($rs_marca['nome_marca']);
            
            return $marca;

        } else {

            echo "Erro no marca não encontrada";

        }
    }

}



?>