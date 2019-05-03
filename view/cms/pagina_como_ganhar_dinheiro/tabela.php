<link rel="stylesheet" type="text/css" href="view/cms/css/como_ganhar_dinheiro.css">
<script src="view/cms/pagina_como_ganhar_dinheiro/modal.js"></script>

<div class="segura_text_button">
    <h2>TABELA COMO GANHAR DINHEIRO</h2>
    <button class="adicionar_nivel" id="abrir_cadastro">ADICIONAR SESSÕES</button>
</div>
<div class="segura_tabela">
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
        require_once('controller/controllerComo_ganhar_dinheiro.php');

            $controller_como_ganhar_dinheiro = new ControllerComo_ganhar_dinheiro();

            $listComo_ganhar_dinheiro =  $controller_como_ganhar_dinheiro->listar_como_ganhar_dinheiro();


            if(count($listComo_ganhar_dinheiro) < 1){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }

            foreach($listComo_ganhar_dinheiro as $registro){
        ?>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$registro->getTitulo_sessao1()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="como_ganhar_dinheiro_getById(<?=@$registro->getId()?>)">
                <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(<?=@$registro->getId()?>)">
            </div>
        </div>
        <?php
            }
        ?>
    </div>


    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
        require_once('controller/controllerComo_ganhar_dinheiro.php');

            $controller_como_ganhar_dinheiro = new ControllerComo_ganhar_dinheiro();

            $listComo_ganhar_dinheiro =  $controller_como_ganhar_dinheiro->listar_como_ganhar_dinheiro();


            if(count($listComo_ganhar_dinheiro) < 1){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }

            foreach($listComo_ganhar_dinheiro as $registro){
        ?>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$registro->getTitulo_sessao2()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="como_ganhar_dinheiro_getById(<?=@$registro->getId()?>)">
                <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(<?=@$registro->getId()?>)">
            </div>
        </div>
        <?php
            }
        ?>
    </div>


    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
        require_once('controller/controllerComo_ganhar_dinheiro.php');

            $controller_como_ganhar_dinheiro = new ControllerComo_ganhar_dinheiro();

            $listComo_ganhar_dinheiro =  $controller_como_ganhar_dinheiro->listar_como_ganhar_dinheiro();


            if(count($listComo_ganhar_dinheiro) < 1){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }

            foreach($listComo_ganhar_dinheiro as $registro){
        ?>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$registro->getTitulo_sessao3()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="como_ganhar_dinheiro_getById(<?=@$registro->getId()?>)">
                <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(<?=@$registro->getId()?>)">
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>