<?php 

    require_once('controller/controllerAnuncios.php');

                
    $controllerAnuncio = new ControllerAnuncios();
    
    $lista             = $controllerAnuncio->listar_anuncios_interessadosByUser();
    
?>
<link rel="stylesheet" type="text/css" href="view/painel_usuario/anuncios/css/interessado_veiculo.css"/>
<!--<div id="conteudo">-->
<div id="conteudo_interessados"> 
                
    <h2 id="h2Border">Interessados nos veículos</h2>

    <div id="principal_anuncios">
        <!--parte de cima do anuncio-->
        <?php if(count($lista)<1){?>
                <p> Nenhuma Solicitação ocorreu para os seus anuncios </p>
        <?php }else{ ?>
                <?php foreach($lista as $item) {?>

                        <div class="caixa_anuncio">

                            <div class="imagem_anuncio"> 
                                
                                <img class="foto_anuncio" src="view/upload/<?=@$item->getVeiculo()->getFotos()[0]?>" title="icone" alt="icone">

                            </div>
                            <div class="bolinha"></div>
                            <div class="bolinha"></div>

                            <div class="titulo_anuncio">
                                <h4> <?=@$item->getVeiculo()->getModelo()->getNome()?> </h4>
                            </div>

                            <div class="dados_anuncio">
                                <p class="dados"> 
                                    <strong>Nome:</strong> Larissa Bruna<br><br>
                                    <strong>Horário:</strong> 12h - 13h<br><br>
                                    <strong>Valor previsto: </strong>R$120<br><br>
                                    <strong>Avaliação:</strong> 8.9
                                </p>
                            </div>
                        </div>

                <?php }?>
        <?php } ?>
        
        <!--<div class="segura_anuncio">
            
        <div class="segura_anuncio">
            <?php
            

            ?>
            <div class="caixa_anuncio">

                <div class="imagem_anuncio"> 

                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro6.png" title="icone" alt="icone">
                </div>
                <div class="bolinha"></div>
                <div class="bolinha"></div>

                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>

                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>

            </div>

            <div class="caixa_anuncio">


                <div class="imagem_anuncio">
                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro1.png" title="icone" alt="icone">

                </div>
                <div class="bolinha"></div>
                <div class="bolinha"></div>


                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>


                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>


            </div>

            <div class="caixa_anuncio">
                <div class="imagem_anuncio">
                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro2.png" title="icone" alt="icone">
                </div>

                <div class="bolinha"></div>
                <div class="bolinha"></div>


                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>


                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>


            </div>


        </div>-->


        <!--parte de baixo do anuncio-->
         <!--<div class="segura_anuncio">
            <div class="caixa_anuncio">
               <div class="imagem_anuncio">
                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro2.png" title="icone" alt="icone">
                </div>

                <div class="bolinha"></div>
                <div class="bolinha"></div>


                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>


                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>



            </div>
            <div class="caixa_anuncio">

               <div class="imagem_anuncio">
                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro4.png" title="icone" alt="icone">
                </div>

                <div class="bolinha"></div>
                <div class="bolinha"></div>


                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>


                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>


            </div>
            <div class="caixa_anuncio">
               <div class="imagem_anuncio">
                    <img class="foto_anuncio" src="view/painel_usuario/imagem/carro5.png" title="icone" alt="icone">
                </div>

                <div class="bolinha"></div>
                <div class="bolinha"></div>


                <div class="titulo_anuncio">
                    <h4> Titulo </h4>
                </div>


                <div class="dados_anuncio">
                    <p class="dados"> 
                        <strong>Nome:</strong> Larissa Bruna<br><br>
                        <strong>Horário:</strong> 12h - 13h<br><br>
                        <strong>Valor previsto: </strong>R$120<br><br>
                        <strong>Avaliação:</strong> 8.9
                    </p>
                </div>



            </div>


        </div>-->


    </div>

</div>
