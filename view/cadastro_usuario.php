<?php
    
    $cliente = null;
    $boolean = "false";
    require_once('controller/controllerHome.php');
    require_once('model/clienteClass.php');

    $controllerHome = new controllerHome();
    $pagina = $controllerHome->getPage();
    
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/cadastrar_usuario.css"/>
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/libs/jqueryMask/jquery.mask.js"></script>
    <script src="view/js/main.js"></script>
</head>
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
                                <li><a href="?melhores_anuncios">VEÍCULOS EM DESTAQUE</a></li>
                                <li><a href="?principais_anuncios">VEÍCULOS A VENDA</a></li>
                                <li><a href="?como_ganhar_dinheiro">GANHE DINHEIRO</a></li>
                                <li><a href="?parceiros">SEJA UM PARCEIRO</a></li>
                                <li><a href="?sobre">SOBRE NÓS</a></li>
                            </ul>
                        </div>
                        <div class="segura_login">
                            <div class="login_cadastro" id="login" style="width: 110px;">
                                <a href="javascript:getLogin()"><img src="view/imagem/login_amarelo.png" alt="login"><p>LOGIN</p></a>
                            </div>
                            <div class="login_cadastro" style="width: 160px;">
                                <a href="javascript:getCadastro()"><img src="view/imagem/downloads2/cadastrar.png" alt="login"><p>CADATRAR-SE</p></a>
                            </div>
                        </div>
                    </div>    
                </nav>
                <div class="caixa_texto_pages_all">
                    <h1 class="texto_primario_h1">Cadastrar Usuário</h1>
                    <p class="texto_secundario_p">Crie uma conta e alugue um veículo</p>
                </div>
            </div>
        </header>
        <div class="containerCadastro">
            <form>
            <h1>Cadastro de usuário</h1>
                <div class="seguraCadastro">
                    <h2>Dados pessoais</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 600px;">
                        <div id="dadosPessoais" class="formDadosPessoais">
                            <label for="txtNome">Nome*</label><br>
                            <input type="text" name="txtNome" id="txtNome" placeholder="Nome"><br>
                            <label for="txtNome">Data de nascimento*</label><br>
                            <input type="date" name="txtNome" id="txtNome" ><br>
                            <label for="txtCpf">CPF*</label><br>
                            <input type="text" name="txtCpf" id="txtCpf" placeholder="CPF"><br>
                            <label for="txtRg">RG*</label><br>
                            <input type="text" name="txtRg" id="txtRg" placeholder="RG"><br>
                            <label for="txtCnh">CNH*</label><br>
                            <input type="text" name="txtCnh" id="txtCnh" placeholder="CNH"><br>
                        </div>
                        <div class="formCarregarFotos">
                            <h2>Foto</h2>
                            <div class="addFotoCliente">
                                
                            </div>
                            <div class="btnFoto">
                                <p>Adicionar foto</p>
                            </div>
                            <div class="addCnhCliente">

                            </div>
                            <div class="btnFoto">
                                <p>Adicionar foto CNH</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seguraCadastro">
                    <h2>Comunicação</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 220px;">
                        <div class="formDadosComunicacao">
                            <label for="txtNome">Email*</label><br>
                            <input type="text" name="txtNome" id="txtEmail" placeholder="example@example.com"><br>
                            <div class="linhaInput">
                                <div class="col_2">
                                    <label for="txtNome">Telefone</label><br>
                                    <input type="text" name="txtNome" id="txtNome" placeholder="11 0000-0000">
                                </div>
                                <div class="col_2">
                                    <label for="txtCpf">Celular*</label><br>
                                    <input type="text" name="txtCpf" id="txtCpf" placeholder="11 90000-0000">
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seguraCadastro">
                    <h2>Comunicação</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 220px;">
                        <div class="formDadosComunicacao">
                            <label for="txtNome">Email*</label><br>
                            <input type="text" name="txtNome" id="txtEmail" placeholder="example@example.com"><br>
                            <div class="linhaInput">
                                <div class="col_2">
                                    <label for="txtNome">Telefone</label><br>
                                    <input type="text" name="txtNome" id="txtNome" placeholder="11 0000-0000">
                                </div>
                                <div class="col_2">
                                    <label for="txtCpf">Celular*</label><br>
                                    <input type="text" name="txtCpf" id="txtCpf" placeholder="11 90000-0000">
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>   