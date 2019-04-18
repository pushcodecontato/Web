<div class="segura_text_button">
    <h2>Clientes</h2>
</div>
<div id="segura_campos">
    <div class="nomeCampos">Nome</div>
    <div class="nomeCampos">Cpf</div>
    <div class="nomeCampos">Email</div>
    <div class="nomeCampos">Celular</div>
    <div class="nomeCampos">Estado</div>
    <div class="nomeCampos">Status</div>
</div>
<div id="segura_campos">
    <?php            require_once('controller/controllerFale_conosco.php');

                    $controller_fale_conosco = new ControllerFale_conosco();

                    $listRegistro =  $controller_fale_conosco->listar_registro_fale_conosco();


                    if(count($listRegistro) < 1){
                    echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                    echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                    }

                    foreach($listRegistro as $registro){
                ?>
        <div class="campos"><?=@$registro->getNome()?></div>
        <div class="campos"><?=@$registro->getCpf()?></div>
        <div class="campos"><?=@$registro->getEmail()?></div>
        <div class="campos"><?=@$registro->getCelular()?></div>
        <div class="campos"><?=@$registro->getEstado()?></div>
        <img src="view/cms/imagem/icones/on.png" alt="on-off">
        <?php
                    }
        ?>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/cliente.css">