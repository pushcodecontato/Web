<?php
                
        require_once("controller/controllerLocacao.php");

        $router = "router.php?controller=locacao&modo=SELECTALL";
?>

<head>
  <link rel="stylesheet" 
          type="text/css"
          href="view/painel_usuario/locacao/css/andamento.css"/>
</head>
<div id="conteudo_andamento"> 
                
    <h2 id="h2Border">Em andamento</h2>

    <div id="principal_andamento">
        <div class="segura_coluna">
            <div class="coluna">
                <div id="nome"> Nome </div>
            </div>

            <div class="coluna">
                <div id="veiculo"> Veiculo </div>
            </div>

            <div class="coluna">
                <div id="retirada"> Data de retirada </div>
            </div>

            <div class="coluna">
                <div id="devolucao"> Data de devolução </div>
            </div>
        </div>

        <div class="segura_coluna">
        <form method="POST" id="formAnunciosProcessados" name="formmAnunciosProcessados">
          
            <div class="coluna">
                <div id="nome"><?=@$locacao->getNome_cliente?></div>
            </div>

            <div class="coluna">
                <div id="veiculo"></div>
            </div>

            <div class="coluna">
                <div id="retirada_data"></div>
            </div>

            <div class="coluna">
                <div id="devolucao_data"></div>
            </div>
           
        </form>
        </div>
    </div>
</div>
