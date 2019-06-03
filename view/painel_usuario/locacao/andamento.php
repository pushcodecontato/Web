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
                <?php if(count($lista)<1){?>
                        <tr>
                            <td colspan="5">
                                <img class="img_not_find" style="width: 241px;display: block;margin-left: auto;margin-top: 84px;margin-right: auto;" width="128" alt="Nada encontrado" src="view/imagem/magnify.gif">
                                <p class="aviso_tabela" style="font-size: 1.3em; text-align: center; font-weight: bold;"> Nenhuma locação  encontrada!</p>
                            </td>
                        </tr>
                <?php }else{ ?>
                    <?php foreach($lista as $item){?>
                          <tr>
                            <td><?=@$item->getLocador()->getNome()?></td>
                            <td><?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></td>
                            <td><?=@$item->getSolicitacao()->getData_inicio()?></td>
                            <td><?=@$item->getSolicitacao()->getData_final()?></td>
                            <td>
                                <a onclick=""><i class="far fa-comments"></i></a>
                                <?php if(!$item->confirmado){ ?>
                                    <a href="javascript:chamaModalConfirmacao(<?=@$item->getId()?>)"><i class="fas fa-user-check"></i></a>
                                <?php }else{ ?>
                                    <a style="color:#2d2;"><i class="fas fa-user-check"></i></a>
                                <?php } ?>
                            </td>
                          </tr>
                    <?php } ?>
               <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="view/js/pagarme.min.js"></script>
<script src="view/painel_usuario/locacao/js/script.js"></script>
