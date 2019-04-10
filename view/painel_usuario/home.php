<html>
   
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>painel_usuario-Home</title>

    <!-- import dos arquivos scripts -->
    <script src="view/painel_usuario/js/jquery.js"></script>
    <script src="view/painel_usuario/js/script_crud.js"></script>


    <link rel="stylesheet" 
          type="text/css"
          href="view/painel_usuario/css/home.css"/>

    
</head>
    <body>
        <!--DIV PRINCIPAL QUE SEGURA TUDO -->
        <div id="principal">
            <!--CABEÇALHO-->
            <header>
                <!--TODO CONTEUDO DO CABEÇALHO-->
                <div id="conteudo_header">
                     
                           
                    <div class="img_logo">
                        <img class="img_logo" src="view/painel_usuario/imagem/Mob.png" title="logo da empresa" alt="logo da empresa">
                    </div>
                    
                    <div id="bemvindo">
                        <h1> Bem vindo! </h1>
                        <h4>Usuário</h4>
                    
                    </div>
                    
                   
                    
                    <div class="img_logo">
                        <img class="img_usuario" src="view/painel_usuario/imagem/usuario.png" title="oto do usuario" alt="foto do usuario">
                        
                        
                    </div>
                    
                    <!--Segura todos icones-->
                    <div id="segura_icones"> 
                        
                        <div class="icone">
                            
                            <img class="img_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                        
                        </div>
                        
                        <div class="icone">
                              <img class="img_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                        
                        </div>
                        
                        <div class="icone">
                          <img class="img_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                        </div>
                        
                        <div class="icone">
                            <img class="img_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                        
                        </div>
                    </div>
                
                </div>
            </header>
            <!--MENU-->
            <nav>
                <h5>Menu</h5>
                
                <div class="caixa_menu" onclick="abrir_menu('veiculo/interessado_veiculo.php')">
                    <div class="menu_icone">
                       <img class="menu_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">   
                    </div>
                    
                    <!--titulos do menu-->
                    <div class="menu_titulo" >
                        <p> 
                            Gerenciar veiculos
                        </p>
                    </div>
                    
                   
                </div>
                
                <div class="caixa_menu">
                    <div class="menu_icone">
                        
                        <img class="menu_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                    </div>
                    <!--titulos do menu-->
                    <div class="menu_titulo">
                        <p>
                            Gerenciar anúncios 
                        </p>
                    </div>
                    
                </div>
                
                <div class="caixa_menu">
                    <div class="menu_icone">
                        <img class="menu_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">  
                    </div>
                    <!--titulos do menu-->
                    <div class="menu_titulo">
                        <p>
                         Gerenciar locações
                        
                        </p>
                    </div>
                    
                </div>
                
                <div class="caixa_menu">
                    <div class="menu_icone">
                        <img class="menu_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">   
                    </div>
                    <!--titulos do menu-->
                    <div class="menu_titulo">
                        <p>
                            Conversas
                        </p>
                    </div>
                    
                </div>
            
            </nav>
            <!-- TODO O CONTEUDO-->
            <div id="conteudo">


                <!-- conteudo conversas -->
            
          
                <div id="conteudo_conversa"> 
                    
                    <h2 id="h2Border">Chat Online</h2>
    
                    <div id="principal_conversa">
                        <div id="ultima_conversa">
                            <p id="titulo_conversa">Últimas Coversas</p>
                        </div>

                        <div class="segura_bolinhas">
                            <div class="bolinha">
                                <img class="icone_bolinha" src="view/painel_usuario/imagem/usuario.png" title="icone" alt="icone" >
                            </div>

                            <div class="bolinha">
                                <img class="icone_bolinha" src="view/painel_usuario/imagem/usuario.png" title="icone" alt="icone" >
                            </div>

                            <div class="bolinha">
                                <img class="icone_bolinha" src="view/painel_usuario/imagem/usuario.png" title="icone" alt="icone" >

                            </div>

                            <div class="bolinha">
                                <img class="icone_bolinha" src="view/painel_usuario/imagem/usuario.png" title="icone" alt="icone" >

                            </div>


                        </div>
                
                    </div>

            

                    
                </div>
                
                
                
                <div class="segura_conversa">
                        <div class="caixa_conversa">
                        
                        </div>

                        <div class="caixa_conversa">

                        </div>

                        <div class="caixa_conversa">

                        </div>

                        <div class="caixa_conversa">

                        </div>

                    </div>

                    <div id="linha_vertical"></div>

                    </div>

                    <div class="principal_dialogo"></div>
                    
                    <div class="caixa_texto">
                        <div id="icone_caixa">
                            <!-- <img src="view/painel_usuario/imagem/editar.png" title="icone" alt="icone"> -->
                        </div>

                    </div>

                    
                
                
                
                
                
                
            





















                


                </div>

        </div>
    </div>
  </body>
</html>