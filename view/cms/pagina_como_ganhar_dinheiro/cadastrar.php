<?php

    $botao = "salvar";
    $id = 0;
    $titulo_sessao1 = "";
    $lista1_sessao1 = "";
    $lista2_sessao1 = "";
    $img1_sessao1 = "";

    $titulo_sessao2 = "";
    $img1_sessao2 = "";
    $lista1_sessao2 = "";
    $img2_sessao2 = "";
    $lista2_sessao2 = "";

    $titulo_sessao3 = "";
    $texto_sessao3 = "";
    $router = "router.php?controller=como_ganhar_dinheiro&modo=inserir";
    $funcaoJs = "inserir_como_ganhar_dinheiro();";

    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($como_ganhar_dinheiro)){
        
        $id = $como_ganhar_dinheiro->getId();
        $titulo_sessao1 = $como_ganhar_dinheiro->getTitulo_sessao1();
        $lista1_sessao1 = $como_ganhar_dinheiro->getLista1_sessao1();
        $lista2_sessao1 = $como_ganhar_dinheiro->getLista2_sessao1();
        $img1_sessao1 = $como_ganhar_dinheiro->getImg1_sessao1();

        $titulo_sessao2 = $como_ganhar_dinheiro->getTitulo_sessao2();
        $img1_sessao2 = $como_ganhar_dinheiro->getImg1_sessao2();
        $lista1_sessao2 = $como_ganhar_dinheiro->getLista1_sessao2();
        $img2_sessao2 = $como_ganhar_dinheiro->getImg2_sessao2();
        $lista2_sessao2 = $como_ganhar_dinheiro->getLista2_sessao2();

        $titulo_sessao3 = $como_ganhar_dinheiro->getTitulo_sessao3();
        $texto_sessao3 = $como_ganhar_dinheiro->getTexto_sessao3();

        $router = "router.php?controller=como_ganhar_dinheiro&modo=atualizar&id=".$id;
        $funcaoJS = "atualizar_como_ganhar_dinheiro()";
        $botao = 'Editar';
    }
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formComo_ganhar_dinheiro" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
        <div class="segura_form_cadastro">
            <h3 class="titulo_pagina">Cadastrar Sessão 1</h3>
            <label for="pergunta_faq">Adicionar Título para Página</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_sessao1)?>" name="txtTitulo_sessao1" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Lista 1</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista1_sessao1)?>" name="txtLista1_sessao1" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista1_sessao1)?></textarea><br>
            <label for="resposta_faq">Adicionar Imagem</label><br>
            <input type="file" name="foto">
            <label for="resposta_faq">Adicionar Lista 2</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista2_sessao1)?>" name="txtLista2_sessao1" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista2_sessao1)?></textarea><br>
        </div>
        <div class="segura_form_cadastro">
            <h3 class="titulo_pagina">Cadastrar Sessão 2</h3>
            <label for="pergunta_faq">Adicionar Título para Página</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_sessao2)?>" name="txtTitulo_sessao2" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Imagem 1</label><br>
            <input type="file" name="foto" >
            <label for="resposta_faq">Adicionar Lista 1</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista1_sessao2)?>" name="txtLista1_sessao2" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista1_sessao2)?></textarea><br>
            <label for="resposta_faq">Adicionar Imagem 2</label><br>
            <input type="file" name="foto">
            <label for="resposta_faq">Adicionar Lista 2</label><br>
            <textarea id="resposta_faq" value="<?php echo($lista2_sessao2)?>" name="txtLista2_sessao2" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($lista2_sessao2)?></textarea><br>
        </div>
        <div class="segura_form_cadastro">
            <h3 class="titulo_pagina">Cadastrar Sessão 3</h3>
            <label for="pergunta_faq">Adicionar Título</label><br>
            <input id="pergunta_faq" value="<?php echo($titulo_sessao3)?>" name="txtTitulo_sessao3" placeholder="Insira uma pergunta" required style="margin-bottom:10px;"><br>
            <label for="resposta_faq">Adicionar Texto</label><br>
            <textarea id="resposta_faq" value="<?php echo($texto_sessao3)?>" name="txtTexto_sessao3" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($texto_sessao3)?></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/como_ganhar_dinheiro.css">