<?php
    require_once('model/clienteClass.php');
    
    if(!isset($_SESSION))session_start();
    $cliente = unserialize($_SESSION['cliente']);

?>
<link rel="stylesheet" type="text/css"href="view/painel_usuario/veiculos/css/meus_veiculos.css"/>
  
    <!-- div conteudo -->
    <div id="conteudo_meus_veiculos"> 
        <!-- titulo -->
        <h2 id="h2Border">Meus Veículos</h2>

        <!-- div principal que segura todo conteudo -->
        
        <div id="principal_veiculos">
            <!--parte de cima do meus veiculos-->
            <div class="segura_veiculo">
            <?php
                require_once("controller/controllerVeiculo.php");

                $controller_veiculo = new ControllerVeiculos();

                $veiculos_cliente = $controller_veiculo->getAllById($cliente->getId());

                foreach($veiculos_cliente as $veiculos){

            ?>
                <div class="caixa_veiculo">
                    
                    <div class="imagem_veiculo"> 

                        <img class="foto_veiculo" src="view/upload/<?=@  $veiculos->getFotos()[0] ?>" title="icone" alt="icone">
                    </div>
                    <div class="bolinha"></div>

                    <div class="titulo_veiculo">
                        <h4><?=@  $veiculos->getModelo()->getNome()?></h4>
                    </div>

                    <div class="dados_veiculo">
                        <p class="dados"> 
                            <strong>Marca: </strong><?=@  $veiculos->getMarca()->getNome()?><br><br>
                            <strong>Modelo:</strong> <?=@  $veiculos->getModelo()->getNome()?><br><br>
                            <strong>Ano: </strong><?=@  $veiculos->getAno()?><br><br>
                            <strong>Locado:</strong>
                        </p>
                    </div>

                </div>
            <?php
                }
            ?>

            </div>


        </div>

    </div>

