<?php

    $botao = "salvar";
    $id_faq = 0;
    $titulo_faq = "";
    $perguntas_faq = "";
    $respostas_faq = "";
    $router = "router.php?controller=faq&modo=inserir";
    $funcaoJs = "inserir_faq();";

    // if(isset($))
    
    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($faq)){
        
        $id_faq = $faq->getId_faq();
        $titulo_faq = $faq->getTitulo_faq();
        $perguntas_faq = $faq->getPerguntas_faq();
        $resposta_faq = $faq->getRespostas_faq();
        $router = "router.php?controller=faq&modo=atualizar&id=".$id_faq;
        $funcaoJS = "atualizar_faq()";
        $botao = 'Editar';
    }
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formFaq" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar Perguntas e Respostas</h3>
        <div class="segura_form_cadastro">
            <label for="pergunta_faq">Adicionar Título</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_faq)?>" name="txtTitulo_faq" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            <label for="pergunta_faq">Adicionar Pergunta</label><br>
            <input id="pergunta_faq" value="<?php echo($perguntas_faq)?>" name="txtPerguntas_faq" placeholder="Insira uma pergunta" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Resposta</label><br>
            <textarea id="resposta_faq" value="<?php echo($resposta_faq)?>" name="txtRespostas_faq" placeholder="Insira uma resposta" required></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_faq.css">