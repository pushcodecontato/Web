<?php

    require_once('controller/controllerVeiculo.php');

    $controllerVeiculo = new ControllerVeiculos();
    


    $lista = $controllerVeiculo->listar_veiculos_pendentes()


?>
<table>
    <thead><!-- Legenda,cabeçario da tabela-->
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody><!-- Conteudo da tabela -->
    <?php

        if(count($lista)< 1 ){
           echo "<img class='img_not_find' alt='Nada encontrado' src='view/imagem/magnify.gif'>";
           echo " <p class='aviso_tabela'> Nenhum veiculo encontrado!</p> ";
        }else{

        foreach($lista as $veiculo){
            var_dump($veiculo->getMarca());
            var_dump($veiculo->getModelo());
            var_dump($veiculo->getTipo());
       ?>

        <tr>
            <td><?=@$veiculo->getId()?></td>
            <td><?=@$veiculo->getTipo()?></td>
            <td><?=@34?></td>
            <td><?=@324?></td>
            <td>
                <!-- Atenção quando clicar deve abrir uma modal para aprovação! -->
                <button onclick="chamaModalVeiculosAprova(1)"><img alt="edit" title="Editar" src="view/cms/imagem/icones/edit.png"> VER </button>
            </td>
        </tr>
        <?php }
        } ?>
    <tbody>
</table>