<?php
                
        require_once("controller/controllerLocacao.php");

        $controller = new ControllerLocacao();

        $lista = $controller->listar();
?>
<head>
  <link rel="stylesheet" 
          type="text/css"
          href="view/painel_usuario/minhas_locacoes/css/carros_alugados.css"/>
</head>
<!-- conteudo agendamento -->
<div id="conteudo_agendamento"> 
                
                <h2 id="h2Border">Veiculos alugados</h2>

                     <table class="desktop">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Veículo</th>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Valor/hora</th>
                                <th>Valor Total</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(count($lista)<1){?>
                                    <tr>
                                        <td colspan="8">
                                            <img class="img_not_find" style="width: 241px;display: block;margin-left: auto;margin-top: 84px;margin-right: auto;" width="128" alt="Nada encontrado" src="view/imagem/magnify.gif">
                                            <p class="aviso_tabela" style="font-size: 1.3em; text-align: center; font-weight: bold;"> Nenhuma locação  encontrada!</p>
                                        </td>
                                    </tr>
                        <?php }else{?>
                            <?php foreach($lista as $item){ ?>
                                  <tr>
                                      <td><?=@ $item->getLocador()->getNome()?></td>
                                      <td><?=@ $item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></td>
                                      <td><?=@ $item->getSolicitacao()->getData_inicio()."-".$item->getSolicitacao()->getData_final()?></td>
                                      <td><?=@ $item->getSolicitacao()->getHora_inicial()."-".$item->getSolicitacao()->getHora_final()?></td>
                                      <td>R$<?=@ $item->getAnuncio()->getValor() ?></td>
                                      <td>R$<?=@ $item->getSolicitacao()->getValorTotal($item->getAnuncio()->getValor())?></td>
                                      <td>
                                          <a href='javascript:mapa_ver(<?=json_encode($item->getAnuncio()->to_json())?>)'><i class='fas fa-map-marked-alt'></i> Mapa</a>
                                      </td>
                                  </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                     </table>
                    <!--<div class="segura_coluna">
                        <div class="coluna">
                            <div id="nome"> Nome </div>
                        </div>

                        <div class="coluna">
                            <div id="veiculo"> Veículo </div>
                        </div>

                        <div class="coluna">
                            <div id="retirada">Data</div>
                        </div>

                        <div class="coluna">
                            <div id="devolucao">  Horário </div>
                        </div>

                        <div class="coluna">
                            <div id="valor"> Valor/Hora </div>
                        </div>

                        <div class="coluna">
                            <div id="cancelar"> Valor total </div>
                        </div>
                         <div class="coluna">
                            <div id="cancelar"> Opções: </div>
                        </div>


                    </div>


                    <?php foreach($lista as $item){ ?>
                     <div class="segura_coluna">
                        <div class="coluna">
                            <div id="nome"> <?=@$item->getLocador()->getNome()?> </div>
                        </div>

                        <div class="coluna">
                            <div id="veiculo"><?=@$item->getAnuncio()->getVeiculo()->getModelo()->getNome()?></div>
                        </div>

                        <div class="coluna">
                            <div id="retirada_data"><?=@$item->getSolicitacao()->getData_inicio()."-".$item->getSolicitacao()->getData_final()?></div>
                        </div>

                        <div class="coluna">
                            <div id="devolucao_data"><?=@$item->getSolicitacao()->getHora_inicial()."-".$item->getSolicitacao()->getHora_final()?></div>
                        </div>

                        <div class="coluna">
                            <div id="rs"><?=@ $item->getAnuncio()->getValor() ?> </div>
                        </div>

                        <div class="coluna">
                            <div id="cancelar"> 
                                 <?=@$item->getSolicitacao()->getValorTotal($item->getAnuncio()->getValor())?>
                            </div>
                        </div>

                        <div class="coluna">
                            <div id="cancelar">
                                <a href='javascript:mapa_ver(<?=json_encode($item->getAnuncio()->to_json())?>)'><i class='fas fa-map-marked-alt'></i> Mapa</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>                                 
            </div>-->

<link rel="stylesheet" href="view/js/libs/leaflet/leaflet.css">
<script src="view/js/libs/leaflet/leaflet.js"></script>
<script src="view/painel_usuario/minhas_locacoes/js/script.js"></script>
