<?php
    
    if(isset($_POST[id_anuncio])) {
        echo "IDDDDDDDD".$_POST['id_anuncio'];
    }
   
    // Pegando o Cliente Logado
    if(!isset($_SESSION))session_start();

    if(isset($_POST['logout'])){
        echo "Sucesso";
        $boolean = false;
        session_destroy();
    }
   
    if(isset($_SESSION['cliente'])){
        $cliente = unserialize($_SESSION['cliente']);
        $boolean = true;
    }
?>
<html>
    <head>
    <title>Visualização</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/css/visualizar_anuncios.css">
        
        <!-- <script type="text/javascript" src="view/js/jquery-1.9.1.min.js"></script> -->
        <script type="text/javascript" src="view/js/jssor.slider.min.js"></script>
        <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
        <script src="view/js/notify.js"></script>
        <script src="view/js/libs/jqueryMask/jquery.mask.js"></script>
        <script src="view/js/main.js"></script>
       
    </head>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    
    <body>
        <div id="principal">
            <header>
                <div id="imgPretaRgb">
                    <nav class="cor_site_padrao">
                        <div id="segura_nav">
                            <div id="logo">
                                <img src="view/imagem/mob.png" alt="logo" title="logo">
                            </div>
                            <div class="segura_menu">
                                <ul>
                                    <li><a href="?home">INÍCIO</a></li>
                                    <li><a href="?melhores_anuncios">VEICULOS EM DESTAQUE</a></li>
                                    <li><a href="?principais_anuncios">VEÍCULOS A VENDA</a></li>
                                    <li><a href="?como_ganhar_dinheiro">GANHE DINHEIRO</a></li>
                                    <li><a href="?parceiros">SEJA UM PARCEIRO</a></li>
                                    <li><a href="?sobre">SOBRE NÓS</a></li>
                                </ul>
                            </div>
                            <div class="modoLogin" onload="verificarLogin(<?php $cliente ?>)">
                            <div class="segura_login">
                                <div class="login_cadastro" id="login" style="width: 110px;">
                                    <a href="javascript:efetuarLogin()"><img src="view/imagem/login_amarelo.png" alt="login"><p>LOGIN</p></a>
                                </div>
                                <div class="login_cadastro" style="width: 160px;">
                                    <a href="javascript:getCadastro()"><img src="view/imagem/downloads2/cadastrar.png" alt="login"><p>CADATRAR-SE</p></a>
                                </div>
                            </div>
                        </div>    
                    </nav>
                    <div class="caixa_texto_pages_all">
                        <h1 class="texto_primario_h1">F.A.Q</h1>
                        <p class="texto_secundario_p">Dúvidas frequetes</p>
                    </div>
                </div>
            </header>
            <div id="segura_titulos">
                <div class="anuncio"> Anúncios </div>
                <div class="anuncio_2"> CHAT </div>
                <div id="bolinha_chat"></div>
                <div class="linha"></div>
            </div>
            <div id="caixa_slide">
            
            
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:685px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <!-- <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" /> -->
                </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:580px;overflow:hidden;">
                <div>
                    <!-- <img data-u="image" src="imagem/carro.png" /> -->
                </div>
                <div>
                    <!-- <img data-u="image" src="imagem/carro2.jpg" /> -->
                </div>
                <div>
                    <!-- <img data-u="image" src="imagem/carro3.jpg" /> -->
                </div>
                <div>
                    <!-- <img data-u="image" src="imagem/carro4.jpg" /> -->
                </div>
                <div>
                    <!-- <img data-u="image" src="imagem/carro5.jpg" /> -->
                </div>
                <div>
                    <!-- <img data-u="image" src="imagem/carro6.jpg" /> -->
                </div>
   
            </div>
        <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                    <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                    <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                    <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                    <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                </svg>
            </div>
        </div>            
    </div>
    <div id="informacao_carro">
        Tipo veículo: Carro<br><br>
        Marca: Fiat<br><br>
        Modelo: Palio 4 portas<br><br>
        Ano: 2002<br><br>
        Placa: xxxx-xxxx<br><br>
        Quilometragem: 2000km<br><br>
        Valor hora: R$30,00<br><br>
        Avaliação: 7.8
    </div>
    <div id="segura_botao">
        <input class="botao"type="button" value="Alugar">
            <input class="botao"type="button" value="Agendar">
    
    </div>
    
    <div class="conteudo2">
        <div id="conteudo_dentro">
            <div id="acessorios"> Acessórios</div>
            <div id="linha2">
            </div>
            <br>Radio
            MP3<br><br>
            DVD<br><br>
            TV<br><br>
            Ar condicionado<br><br>
            teto solar<br><br>
            trava elétrica<br><br>
            vidro eletrico
        
        </div>
        <div id="conteudo_dentro">
            <div id="acessorios">Sobre o Anúncio</div>
            <div id="linha2"> </div>
            <h3>Dias Disponiveis</h3>
            Segunda<br>
            terça<br>
            Quarta<br>
            Quinta<br>
            
            <div id="segura_horario">
                <div id="entrada">
                    <strong>Horário de Entrada</strong><br>
                    10:00
                </div>

                <div id="saida">
                    <strong>Horário de Saída</strong>
                    10:00
                </div>
            </div>
            

            
            <h3>Descrição</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>
            
            
        
        </div>
                
                
                
        </div>
        <div id="dados"> Dados do Locador</div>
        <div class="linha_dados"></div>
        
            <div id="conteudo_dados">
                Nome: Larissa Bruna<br><br>
                Email: teste@teste.com<br><br>
                Telefone: (00)0000-0000<br><br>
                Celular: (00)0000-0000<br><br>
            </div>
            <div id="conteudo_dados2">
                Cidade: Osasco<br><br>
                Rua: Floresta negra<br><br>
                Bairro: Azure<br><br>
                CEP: 00000-000<br><br>
            </div>
            <div id="conteudo_dados3">
                Complemento: mercadinho <br><br>
                Numero:200 
                
            </div>
        
        <div id="dados"> Mapa</div>
        <div class="linha_dados"></div>
        <div id="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29261.888158233985!2d-46.91092459609136!3d-23.5419951703072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf0137fe73bf4d%3A0x5ed73649c1d6f14d!2sJandira%2C+SP!5e0!3m2!1spt-BR!2sbr!4v1554123357902!5m2!1spt-BR!2sbr" width="930" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

        <footer class="cor_site_padrao">
        <!--  Caixas que contem o contato e o navegar pelo site -->
            <div class="newsletter">
                <div class="logo_mob">
                    <img src="view/imagem/mob.png" alt="logo">
                </div>
                <div class="segura_newsletter">
                    <form id="frmEmail" onsubmit="email_marketing_enviar(this)" action="router.php?controller=EMAIL_MARKETING&modo=INSERIR" method="POST" >
                        <h3>Quer receber noticias?</h3>
                        <input type="email" name="txtEmail" placeholder="Insira seu email" class="input_newsletter">
    <!--                     <button type="submit" name="btnEnviar" class="botao_newsletter">Enviar</button> -->
                        <input class="botao_newsletter" type="submit" name="btnEnviar" value="Enviar">
                    </form>
                </div>
            </div>

            <div class="contatos">
                <div class="segura_mapa_contato">
                    <div class="segura_contatos">
                        <h3> Quer entrar em contato? </h3>
                        <div id="telefone_email">
                            <p>Telefone:  0800 755 855</p>
                            <p>Telefone:  0800 755 855</p>
                            <p>E-mail: atendimento@mobshare.com.br</p>
                            <img src="view/imagem/cracha_branco.png" alt="cracha">
                            <a href="?cms/login">Área administrativa</a> 
                        </div>
                    </div>
                    <div class="mapa_site">
                        <h3> Navegue pelo site </h3>
                        <div class="coluna_mapa">
                            <a href="?melhores_anuncios">Melhores avaliações</a><br>
                            <a href="?termos_uso.php">Termos de uso</a><br>
                            <a href="?principais_anuncios.php">Principais anúncio</a><br>
                            <a href="?como_ganhar_dinheiro.php">Ganhe dinheiro</a><br>
                        </div>
                        <div class="coluna_mapa">
                            <a href="?sobre.php">Sobre a empresa</a><br>
                            <a href="?faq.php">F.A.Q</a><br>
                            <a href="?parceiros.php">Seja um parceio</a>                 
                        </div>
                    </div>
                </div>
                <!--  Caixas das redes sociais  -->
                <div class="redes_sociais">
                    <p>Siga nós nas redes</p>
                    <div class="segura_rs" style="text-align: center;">
                        <a href="https://www.instagram.com/?hl=pt-br"><img src="view/imagem/instagram.png" alt="Instagran" title="Instagran"></a>
                        <a href="https://pt-br.facebook.com/"><img src="view/imagem/facebook.png" alt="facebook" title="Facebook"></a>
                        <a href="https://twitter.com/login?lang=pt" ><img src="view/imagem/twitter.png" alt="Twitter" title="Twitter" ></a>
                    </div>
                    <p>Baixe nosso aplicativo na playstore</p>
                    <div class="playstore">
                        <img class="center" style="display:block;" src="view/imagem/googleplay.png">
                    </div>
                </div>
            </div>
        </footer>      
    </body>
    <script>
    $(document).ready(function(){
        if(<?php echo $boolean?>)
            headerLogado();
        else
            headerNaoLogado();
    });
</script>
</html>