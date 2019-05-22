<?php
                
        require_once("controller/controllerLocacao.php");

        $controller = new ControllerLocacao();

        $lista = $controller->listar();
?>
<head>
  <link rel="stylesheet" type="text/css" href="view/painel_usuario/locacao/css/agendamento.css"/>
</head>
<!-- conteudo agendamento -->
<div id="conteudo_agendamento"> 
                
<h2 id="h2Border">Agendamento</h2>

<div id="principal_agendamento">
    <table class="desktop">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Veiculo</th>
                <th>Retirada</th>
                <th>Devolução</th>
                <th>Valor</th>
                <th> Opções </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $item) {?>
                    <tr>
                        <td><?=@$item->getLocador()->getNome()?></td>
                        <td><?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></td>
                        <td><?=@$item->getSolicitacao()->getData_inicio()?></td>
                        <td><?=@$item->getSolicitacao()->getData_final()?></td>
                        <td>R$<?=@$item->getSolicitacao()->getValorTotal($item->getAnuncio()->getValor())?></td>
                        <td>
                            <img class="icones"src="view/painel_usuario/imagem/editar.png" title="icone de editar" alt="icone de editar">
                            <a><i class="far fa-comments" style="font-size: 2em;"></i></a>
                            <a style="font-size: 2em;" href='javascript:mapa_ver(<?=json_encode($item->getAnuncio()->to_json())?>)'><i class='fas fa-map-marked-alt'></i></a>
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
            <div id="retirada">retirada </div>
        </div>

        <div class="coluna">
            <div id="devolucao">  devolução </div>
        </div>

        <div class="coluna">
            <div id="valor"> valor </div>
        </div>

        <div class="coluna">
            <div id="cancelar"> cancelar </div>
        </div>

    </div>
    <?php foreach($lista as $item) {?>
        <div class="segura_coluna">
            <div class="coluna">
                <div id="nome"> <?=@$item->getLocador()->getNome()?> </div>
            </div>

            <div class="coluna">
                <div id="veiculo"> <?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?> </div>
            </div>

            <div class="coluna">
                <div id="retirada_data"><?=@$item->getSolicitacao()->getData_inicio()?></div>
            </div>

            <div class="coluna">
                <div id="devolucao_data"><?=@$item->getSolicitacao()->getData_final()?></div>
            </div>

            <div class="coluna">
                <div id="rs"> R$<?=@$item->getSolicitacao()->getValorTotal($item->getAnuncio()->getValor())?></div>
            </div>

            <div class="coluna">
                <div id="cancelar"> 

                    <img class="icones"src="view/painel_usuario/imagem/editar.png" title="icone de editar" alt="icone de editar">

                     <img class="icones"src="view/painel_usuario/imagem/editar.png" title="icone de editar" alt="icone de editar">
                </div>
            </div>
        </div>
    <?php } ?> -->         
</div>
</div>
<link rel="stylesheet" href="view/js/libs/leaflet/leaflet.css">
<script src="view/js/libs/leaflet/leaflet.js"></script>
<script src="view/painel_usuario/locacao/js/script.js"></script>