<?php
                
        require_once("controller/controllerLocacao.php");

        $controller = new ControllerLocacao();

        $router = "router.php?controller=locacao&modo=SELECTALL";

        $lista = $controller->listar("andamento");
?>

<head>
  <link rel="stylesheet" type="text/css" href="view/painel_usuario/locacao/css/andamento.css"/>
</head>
<div id="conteudo_andamento"> 
                
    <h2 id="h2Border">Em andamento</h2>

    <div id="principal_andamento">
        <table class="desktop">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Veículo</th>
                    <th>Retirada</th>
                    <th>Devolução</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $item){?>
                      <tr>
                        <td><?=@$item->getLocador()->getNome()?></td>
                        <td><?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></td>
                        <td><?=@$item->getSolicitacao()->getData_inicio()?></td>
                        <td><?=@$item->getSolicitacao()->getData_final()?></td>
                        <td>
                            <a><i class="far fa-comments" style="font-size: 2em;"></i></a>
                        </td>
                      </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--<div class="segura_coluna">
            <div class="coluna">
                <div id="nome"> Nome </div>
            </div>

            <div class="coluna">
                <div id="veiculo"> Veiculo </div>
            </div>

            <div class="coluna">
                <div id="retirada">Data de retirada </div>
            </div>

            <div class="coluna">
                <div id="devolucao"> Data de devolução </div>
            </div>
        </div>
        <?php foreach($lista as $item){?>
            <div class="segura_coluna">

                <div class="coluna">
                    <div id="nome"><?=@$item->getLocador()->getNome()?></div>
                </div>

                <div class="coluna">
                    <div id="veiculo"><?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></div>
                </div>

                <div class="coluna">
                    <div id="retirada_data"><?=@$item->getSolicitacao()->getData_inicio()?></div>
                </div>

                <div class="coluna">
                    <div id="devolucao_data"><?=@$item->getSolicitacao()->getData_final()?></div>
                </div>
            </div>
        <?php } ?>
    </div>-->
</div>
