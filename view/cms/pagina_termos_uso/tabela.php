<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_termos_uso.css">
<script src="view/cms/pagina_termos_uso/modal.js"></script>

<div class="segura_text_button">
    <h2>TABELA TERMOS DE USO</h2>
    <button class="adicionar_nivel" id="abrir_cadastro">ADICIONAR TERMO DE USO</button>
</div>
<div class="segura_tabela">
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Título</div>
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Texto do Termo</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
        require_once('controller/controllerTermos_uso.php');

            $controller_termos_uso = new ControllerTermos_uso();

            $listTermos_uso =  $controller_termos_uso->listar_termos_uso();


            if(count($listTermos_uso) < 1){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }

            foreach($listTermos_uso as $registro){
        ?>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$registro->getPerguntas()?></div>
            <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$registro->getRespostas()?></div>
            <div class="col_resposta" style="width:130px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar" onclick="termos_uso_getById(<?=@$registro->getId()?>)">
                <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="termos_uso_delete(<?=@$registro->getId()?>)">
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>