<?php

    $botao = "salvar";
    $id = 0;
    $titulo = "";
    $perguntas = "";
    $respostas = "";
    $router = "router.php?controller=faq&modo=inserir";
    $funcaoJs = "inserir_faq();";

    // if(isset($))
    
    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($faq)){
        
        $id = $faq->getId();
        $perguntas = $faq->getPerguntas();
        $respostas = $faq->getRespostas();
        $router = "router.php?controller=faq&modo=atualizar&id=".$id;
        $funcaoJS = "atualizar_faq()";
        $botao = 'Editar';
    }
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formFaq" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar Perguntas e Respostas</h3>
        <div class="segura_form_cadastro">
<!--             <label for="pergunta_faq">Adicionar Título para Página</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo)?>" name="txtTitulo" placeholder="Insira um Título" required style="margin-bottom:10px;"><br> -->
            <label for="pergunta_faq">Adicionar Pergunta</label><br>
            <input id="pergunta_faq" value="<?php echo($perguntas)?>" name="txtPerguntas" placeholder="Insira uma pergunta" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Resposta</label><br>
            <textarea id="resposta_faq" value="<?php echo($respostas)?>" name="txtRespostas" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($respostas)?></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_faq.css">