<?php 

    require_once('controller/controllerAnuncios.php');

                
    $controllerAnuncio = new ControllerAnuncios();
    
    $lista             = $controllerAnuncio->listar_anuncios_interessadosByUser();
    
?>
<link rel="stylesheet" type="text/css" href="view/painel_usuario/anuncios/css/interessado_veiculo.css"/>

<!--<div id="conteudo">-->
<div id="conteudo_interessados"> 
                
    <h2 id="h2Border">Interessados</h2>

    <div id="principal_anuncios">
        <!--parte de cima do anuncio-->
        <?php if(count($lista)<1){?>
                <img class="img_not_find" style="width: 241px;display: block;margin-left: auto;margin-top: 84px;margin-right: auto;" width="128" alt="Nada encontrado" src="view/imagem/magnify.gif">
                <p class="aviso_tabela" style="font-size: 1.3em; text-align: center; font-weight: bold;"> Nenhum anuncio Aprovado encontrado!</p>
        <?php }else{ ?>
                <?php foreach($lista as $item) {?>

                        <div class="caixa_anuncio" onclick="solicitacao_ver(<?=@$item->getSolicitacao()->getId_solicitacao_anuncio()?>)">

                            <div class="imagem_anuncio"> 
                                
                                <img class="foto_anuncio" src="view/upload/<?=@$item->getVeiculo()->getFotos()[0]?>" title="icone" alt="icone">

                            </div>
                            <div class="bolinha"></div>
                            <div class="bolinha"></div>

                            <div class="titulo_anuncio">
                                <h4> <?=@$item->getVeiculo()->getModelo()->getNome()?> </h4>
                                <?php if($item->getSolicitacao()->getStatus_solicitacao() == 0){?>
                                        <span style="color: #414cd4; float: right; margin-top: 5px;"> Pendente </span>
                                <?php }else if($item->getSolicitacao()->getStatus_solicitacao() == 1){?>
                                        <span style="color: #2d2; float: right; margin-top: 5px;"> Aprovado </span>
                                <?php }else if($item->getSolicitacao()->getStatus_solicitacao() == 2){?>
                                        <span style="color: red; float: right; margin-top: 5px;"> Reprovado</span>
                                <?php } ?>
                            </div>

                            <div class="dados_anuncio">
                                <p class="dados"> 
                                    <strong>Nome:</strong> <?=@$item->getSolicitacao()->getCliente()->getNome()?><br><br>
                                    <strong>Horário:</strong> <?=@$item->getSolicitacao()->getHora_inicial()?> - <?=@$item->getSolicitacao()->getHora_final()?><br><br>
                                    <strong>Valor previsto: </strong>R$ <?=@$item->getSolicitacao()->getValorTotal($item->getValor())?><br><br>
                                    <strong>Avaliação:</strong> 8.9<br>
                                    <img class="star_left" src="view/imagem/star1.png" alt="star">
                                    <img class="star_left" src="view/imagem/star1.png" alt="star">
                                </p>
                            </div>
                        </div>

                <?php }?>
        <?php } ?>
    </div>

</div>

<script src="view/painel_usuario/anuncios/js/script.js"></script>
