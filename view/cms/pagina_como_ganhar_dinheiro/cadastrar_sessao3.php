<?php

    $botao = "salvar";
    $id = 0;
    $titulo_sessao3 = "";
    $texto_sessao3 = "";
    $router = "router.php?controller=como_ganhar_dinheiro&modo=inserir";
    $funcaoJs = "inserir_como_ganhar_dinheiro();";

    // if(isset($))
    
    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($faq)){
        
        $id = $como_ganhar_dinheiro->getId();
        $titulo_sessao3 = $como_ganhar_dinheiro->getTitulo_sessao3();
        $texto_sessao3 = $como_ganhar_dinheiro->getTexto_sessao3();
        $router = "router.php?controller=como_ganhar_dinheiro&modo=atualizar&id=".$id;
        $funcaoJS = "atualizar_como_ganhar_dinheiro()";
        $botao = 'Editar';
    }
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formComo_ganhar_dinheiro" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar Sessão 3</h3>
        <div class="segura_form_cadastro">
            <label for="pergunta_faq">Adicionar Título</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_sessao3)?>" name="txtTitulo_sessao3" placeholder="Insira uma pergunta" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Texto</label><br>
            <textarea id="resposta_faq" value="<?php echo($texto_sessao3)?>" name="txtTexto_sessao3" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($texto_sessao3)?></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/como_ganhar_dinheiro.css">
