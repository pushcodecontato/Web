<div class="segura_text_button">
    <h2>Clientes</h2>
</div>
<div id="segura_campos">
    <div class="nomeCampos">Nome</div>
    <div class="nomeCampos">Cpf</div>
    <div class="nomeCampos">Email</div>
    <div class="nomeCampos">Celular</div>
    <div class="nomeCampos">Cidade</div>
    <div class="nomeCampos">Estado</div>
    <div class="nomeCampos">Status</div>
</div>
<div id="segura_campos">
    <?php           require_once('controller/controllerClientes.php');

                    $controller_clientes = new ControllerClientes();

                    $listRegistro =  $controller_clientes->listar_registro_clientes();


                    if(count($listRegistro) < 1){
                        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                        echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                    }

                    foreach($listRegistro as $registro){
                ?>
                    <div class="campos"><?=$registro->getNome()?></div>
                    <div class="campos"><?=$registro->getCPF()?></div>
                    <div class="campos"><?=$registro->getEmail()?></div>
                    <div class="campos"><?=$registro->getCelular()?></div>
                    <div class="campos"><?=$registro->getCidade()?></div>
                    <div class="campos"><?=$registro->getUf()?></div>
                    <img onclick="clientes_ativar_desativar(<?=@$registro->getId()?>,<?=@$registro->getStatus()?>)" 
                         <?php if( $registro->getStatus() == 1){ ?>
                            src="view/cms/imagem/icones/on.png" alt="on-off"
                         <?php }else{ ?>
                            src="view/cms/imagem/icones/off.png" alt="on-off"
             >           <?php } ?>
        <?php
            }
        ?>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/cliente.css">