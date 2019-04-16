<?php
    
    require_once("controller/controllerTipo_veiculo.php");

    // Controla o controller e o modo par aa submição do formulario
    $action = "router.php?controller=marcas&modo=inserir&id_tipo_veiculo=" . $_GET['id'];
    
    // Dados do formulario
    $titulo = "Cadastrar Marca";
    $submit = "marca_insert(this)";
    $nome   = "";

?>
<form id="frmMarca" action="<?=$action?>" data-idTipo="<?=@$_GET['id']?>" onsubmit="<?=@$submit?>"> 

    <div class="modal_marcas_crud">
        <h3> <?=@$titulo?> </h3>
        <div class="campo">
            <label> Nome da marca </label>
            <input type="text" name="nome" value="<?=@$nome?>" required>
        </div>
        <div class="campo">
            <button type="submit"> Salvar </button>
        </div>
    </div>
</form>
