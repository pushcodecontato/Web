<div class="seja-parceiro-rodape">
    
    <h2>Pagina Seja um Parceiro</h2>

    <button onclick="pagina_topico_criar()">Adicionar Topico</button>

</div>

<div class="seja-parceiro-container">
    <!-- Area do gerenciamento do img > sds < img -->
    <div class="seja-parceiro-painel-parceiros">
        <div class="seja-parceiro-painel-parceiros-imagem">
            <img src="view/imagem/bg-parceiros.jpg">
            <div onclick="sejaParceiroSalvarImagem('esquerdo',this)" class="seja-parceiro-painel-parceiros-imagem-alterar"></div>
        </div>
        <div class="seja-parceiro-painel-parceiros-conteudo">
            <div class="seja-parceiro-painel-parceiros-conteudo-bordaEsquerda"></div>
            <div class="seja-parceiro-painel-parceiros-conteudo-conteudo">

                <p  >Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus</p>

                <button >Quero ser um Parceiro</button>

                <p  >Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus</p>

            </div>
            <div class="seja-parceiro-painel-parceiros-conteudo-bordaDireita"></div>
        </div>
        <div class="seja-parceiro-painel-parceiros-imagem">
            <img src="view/imagem/bg-usuario.jpg">
            <div onclick="sejaParceiroSalvarImagem('direito',this)" class="seja-parceiro-painel-parceiros-imagem-alterar"></div>
        </div>
        <button onclick="tornarEditavel()" class="seja-parceiro-painel-parceiros-btn btnEditar"> Editar </button>
        <button class="seja-parceiro-painel-parceiros-btn btnEsconder"> Esconder </button>
        <button onclick="sejaParceiroSalvarPainel()" style="display:none;" id="seja-parceiro-btnSalvar" class="seja-parceiro-painel-parceiros-btn btnEsconder"> Salvar </button>
    </div>

    <!-- Area do gerenciamento dos topicos -->
    <div class="seja-parceiro-painel-parceiros-topicos">
        <!-- Importa a tabela conteudo os topicos  -->
        <?php require_once('view/cms/pagina_seja_parceiro/tabela_topicos.php') ?>
    </div>

</div>

<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_parceiros.css">
<script src="view/cms/pagina_seja_parceiro/modal.js"></script>