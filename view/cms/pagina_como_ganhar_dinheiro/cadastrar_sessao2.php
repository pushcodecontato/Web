<?php

    $botao = "salvar";
    $id = 0;
    $titulo_sessao2 = "";
    $img1_sessao2 = "";
    $lista1_sessao2 = "";
    $img2_sessao2 = "";
    $lista2_sessao2 = "";
    $router = "router.php?controller=como_ganhar_dinheiro&modo=inserir";
    $funcaoJs = "inserir_como_ganhar_dinheiro();";

    // if(isset($))
    
    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($como_ganhar_dinheiro)){
        
        $id = $como_ganhar_dinheiro->getId();
        $titulo_sessao2 = $como_ganhar_dinheiro->getTitulo_sessao2();
        $img1_sessao2 = $como_ganhar_dinheiro->getImg1_sessao2();
        $lista1_sessao2 = $como_ganhar_dinheiro->getLista1_sessao2();
        $img2_sessao2 = $como_ganhar_dinheiro->getImg2_sessao2();
        $lista2_sessao2 = $como_ganhar_dinheiro->getLista2_sessao2();
        $router = "router.php?controller=como_ganhar_dinheiro&modo=atualizar&id=".$id;
        $funcaoJS = "atualizar_como_ganhar_dinheiro()";
        $botao = 'Editar';
    }
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formComo_ganhar_dinheiro" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar Sessão 2</h3>
        <div class="segura_form_cadastro">
            <label for="pergunta_faq">Adicionar Título para Página</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_sessao2)?>" name="txtTitulo_sessao2" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Imagem 1</label><br>
            <input type="file" name="Img1_sessao2" >
            <label for="resposta_faq">Adicionar Lista 1</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista1_sessao2)?>" name="txtLista1_sessao2" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista1_sessao2)?></textarea><br>
            <label for="resposta_faq">Adicionar Imagem 2</label><br>
            <input type="file" name="Img2_sessao2">
            <label for="resposta_faq">Adicionar Lista 2</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista2_sessao2)?>" name="txtLista2_sessao2" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista2_sessao2)?></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/como_ganhar_dinheiro.css">
