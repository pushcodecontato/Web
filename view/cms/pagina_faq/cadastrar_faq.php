<?php

    $botao = "salvar";
    $id_nivel = 0;
    $pergunta_faq = "";
    $resposta_faq = "";
    $router = "router.php?controller=faq&modo=inserir";
    $funcaoJs = "inserir_faq();";

    // if(isset($))
?>
<div class="segura_form">  
    
    <form class="form_cadastro" method="POST" id="formFaq" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar nivel</h3>
        <div class="segura_form_cadastro">
            <label for="pergunta_faq">Adicionar Pergunta</label><br>
            <input id="pergunta_faq" value="pergunta" name="txtPergunta_faq" placeholder="Insina uma pergunta" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Resposta</label><br>
            <textarea id="resposta_faq" value="resposta" name="txtResposta_faq" placeholder="Insira uma resposta" required></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="SALVAR">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_faq.css">