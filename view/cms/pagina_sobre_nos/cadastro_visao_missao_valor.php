<link rel="stylesheet" type="text/css" href="view/cms/css/sobre_empresa.css">
<div>
    <form class="form_cadastro" method="POST" id="formSobre">
         <h3 class="titulo_pagina">Cadastrar Visão Missão Valores</h3>
        <div class="segura_form_cadastro">
            <select id="cb_visoes">
                <option value="">Seleciona um titulo</option>
                <option value="missao">Missão</option>
                 <option value="visao">Visão</option>
                 <option value="valor">Valor</option>
            
            </select><br>
            <label for="titulo">Titulo</label><br>
            <input id="titulo_sobre" value="" name="txt_titulo_sobre" placeholder="titulo" required style="margin-bottom:10px;"><br>
             <label for="imagem_sobre">Imagem</label><br>
            <input  type="file"><br>
            
            <label for="texto_sobre">Texto</label><br>
            <input id="texto_sobre" value="" name="txtTexto_sobre" placeholder="Texto" required><br>

            
            
            <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
            
        </div>

    </form>


</div>