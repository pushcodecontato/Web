<?php

    $controller = 'tipo_veiculo';
    $modo = 'inserir';
?>
<div class="segura_form">  
    <h3 class="titulo_pagina">Tipo de veiculos</h3>
    <form method="POST" id="frmTipo_veiculo" action="router.php?controller=<?=@$controller?>&modo=<?=@$modo?>">
    
        <select name="slcTipo" class="tipo_slc" id="slcNivel" requied>
             <option> Carro </option>
             <option> bicicleta </option>
        </select>
        <button type="button" class="tipo_veiculo_btn_adicionar"> Adicinar </button>
        <input  name="txtPorcentual" class="nome_nivel" placeholder="10%" required>
        <p class="tipo_veiculo_comentario"> Adicinar acessorio ao tipo de veiculo </p>
        <p class="tipo_veiculo_comentario"> Adicinar modelo ao tipo de veiculo </p>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
    </form>

    <div class="tbl_tipo_veiculo">

        <?php require_once('view/cms/veiculos/tabela_tipo_veiculo.php')?>
    
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/tipo_veiculo.css">