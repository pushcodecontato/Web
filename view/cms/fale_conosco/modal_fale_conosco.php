<div class="caixa_modal">
    <h1>Fale Conosco</h1>
    <div id="caixaConteudo">
        <div id="textos">
            <p>Nome</p>
            <p>E-mail</p>
            <p>Celular</p>
            <p>Mensagem</p>
       </div>
        <div id="conteudo">
        <?php
                require_once('controller/controllerFale_conosco.php');

                $controller_fale_conosco = new ControllerFale_conosco();

                $listRegistro =  $controller_fale_conosco->listar_registro_fale_conosco();


                if(count($listRegistro) < 1){
                  echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                  echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                }

                foreach($listRegistro as $registro){
            ?>
                <div class="descarregarConteudo">
                    <p><?=@$registro->getNome()?></p>
                </div>
                <div class="descarregarConteudo">
                    <p><?=@$registro->getEmail()?></p>
                </div>
                <div class="descarregarConteudo">
                    <p><?=@$registro->getCelular()?></p>
                </div>
                <div class="descarregarConteudo">
                    <textarea rows="8" cols="40" maxlength="500">
                        <?=@$registro->getMensagem()?>
                    </textarea>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<style>
    *{
        font-family: cursive;
    }
    .caixa_modal{
        background-color: #fdfdfd;
        border-top: solid 0.1px black;
        height: auto;
        overflow-y: auto;
        background-color:#e8e8e8;
        border-radius: 20px;
    }
    h1{
        width: 600px;
        text-align: center;
        background-color: #00984A;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        color: white;
        font-family: cursive;
    }
    #caixaConteudo{
        height: auto;
        width: 600px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    #textos{
        float: left;
        min-height: 400px;
        height: auto;
        width: 200px;
        font-size: 25px;
    }
    #textos p{
        margin-bottom: 45px;
    }
    #conteudo{
        float: left;
        height: auto;
        width: 400px;
        font-size: 20px;

    }
    .descarregarConteudo{
        width: 300px;
        height: 30px;
        margin-bottom: 45px;
    }
</style>