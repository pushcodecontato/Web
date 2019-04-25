<?php

    $controller = null;
    $modo = null;

    //perguntar para o Marcel pq isso aqui HAHAHA!hum?
    if(isset($_REQUEST['controller'])){
        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch($controller){
            
            case 'NIVEIS':
                //importando a controller de niveis
                require_once('controller/controllerNiveis.php');
                //instanciando a class controllerNiveis
                $controller_niveis = new ControllerNiveis();
                
                switch($modo){
                    
                    case 'INSERIR':
                        $controller_niveis->inserir_niveis();                        
                        break;
                    case 'ATUALIZAR':
                        $controller_niveis->atualizar_niveis();
                    break;
                    case 'EXCLUIR':
                        $controller_niveis->excluir_nivel();
                    break;
                    case "SELECTALL":

                        $lista_niveis =  $controller_niveis->listar_niveis();

                        require_once('view/cms/niveis/tabela.php');

                    break;
                    case 'BUSCAR':
                        $Niveis = $controller_niveis->buscar_nivel();
                        require_once('view/cms/niveis/cadastro_niveis.php');
                        break; 
                    break;
                   
             }
             break;
            /* Usuario */
            case 'USUARIOS':
                
                require_once('controller/controllerUsuarios.php');

                $controller_usuario = new ControllerUsuarios();
                
                

                switch($modo){
                    case "INSERIR":
                        
                        $controller_usuario->inserir_usuarios();

                        
                        break;
                    case "ATUALIZAR":
                         
                         $controller_usuario->atualizar_usuarios();
                         
                         break;
                    case "EXCLUIR":
                         $controller_usuario->excluir_usuarios();
                         break;
                    case "SELECTALL":

                        $listUsuarios =  $controller_usuario->listar_usuarios();

                        require_once('view/cms/usuarios/tabela.php');

                        break;
                   case "SELECT":
                        
                        $usuario = $controller_usuario->getById();
                        require_once('view/cms/usuarios/cadastro.php');
                        break;
                   case "LOGAR":

                        $controller_usuario->logar();

                        break;
                }
 
                break;
              /* Tipo de veiculo */
              case "TIPO_VEICULO":
                    
                    require_once("controller/controllerTipo_veiculo.php");
                    $controller_tipo_veiculo = new ControllerTipoVeiculo();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_tipo_veiculo->inserir_tipo();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_tipo_veiculo->atualizar_tipo();

                            break;
                        case "SELECT":
                            
                            $tipo = $controller_tipo_veiculo->getById();

                            require_once('view/cms/veiculos/tipo_veiculo.php');

                            break;
                        case "FIP_EXPORTAR":

                            $controller_tipo_veiculo->exportar_fip();

                            break;
                    }
                
                break;
            /* Modelos de veiculos */
            case "MODELOS":
                    
                    require_once("controller/controllerModelos.php");
                    $controller_modelos = new ControllerModelos();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_modelos->inserir_modelo();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_modelos->atualizar_modelo();

                            break;
                        case "SELECT":
                            
                            $modelo = $controller_modelos->getById();

                            require_once('view/cms/veiculos/modelos/modal_criar_editar.php');

                            break;
                    }
                
                break;
                /* Marcas de Veiculos */
                case "MARCAS":
                    
                    require_once("controller/controllerMarcas.php");
                    $controller_marcas = new ControllerMarcas();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_marcas->inserir_marca();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_marcas->atualizar_marca();

                            break;
                        case "SELECT":
                            
                            $marca = $controller_marcas->getById();

                            require_once('view/cms/veiculos/marcas/modal_criar_editar.php');

                            break;
                    }
                
                break;
                /* Acessorios de Veiculos */
                case "ACESSORIOS":
                    
                    require_once("controller/controllerAcessorios.php");
                    $controller_acessorios = new ControllerAcessorios();

                    switch($modo){
                        case "INSERIR":

                            $controller_acessorios->inserir_acessorio();

                            break;
                        case "ATUALIZAR":

                            $controller_acessorios->atualizar_acessorio();

                            break;
                    }
                
                break;
                /* Veiculos */
                case "VEICULOS":
                    
                    require_once("controller/controllerVeiculo.php");
                    $controller_veiculos = new ControllerVeiculos();

                    switch($modo){
                        case "INSERIR":

                            $controller_veiculos->inserir_veiculo();

                            break;
                        case "ATUALIZAR":

                            $controller_veiculos->atualizar_veiculo();

                            break;
                       case "APROVAR":

                            $controller_veiculos->aprovar_veiculo();

                            break;
                       case "REPROVAR":

                            $controller_veiculos->reprovar_veiculo();

                            break;
                    }
                
                break;
                /* CRUD DE Clientes(painel Usuario) */
                case "CLIENTES":
                    
                    require_once("controller/controllerClientes.php");
                    $controller_clientes = new ControllerClientes();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_clientes->inserir_cliente();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_clientes->atualizar_cliente();

                            break;
                        case "SELECT":
                            
                            $cliente = $controller_clientes->getById();

                            require_once('view/cms/veiculos/marcas/modal_criar_editar.php');

                            break;
                        case "LOGAR":
                           
                           $controller_clientes->logar();
                    }
                
                break;
                /* CRUD DE Anuncios */
                case "ANUNCIOS":
                    
                    require_once('controller/controllerAnuncios.php');

                   $controller_anuncio =  new ControllerAnuncios();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_anuncio->inserir_anuncio();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_anuncio->atualizar_anuncio();

                            break;
                        case "APROVAR":

                            $controller_anuncio->aprovar_anuncio();

                            break;
                        case "REPROVAR":
                                
                            $controller_anuncio->reprovar_anuncio();
                                
                            break;
                    }
                
                break;
                case "FAQ":
                    
                require_once("controller/controllerFaq.php");
                $controller_faq = new ControllerFaq();

                switch($modo){
                    case "INSERIR":
                        
                        $controller_faq->inserir_faq();

                        break;
                    case "ATUALIZAR":
                        
                        $controller_faq->atualizar_faq();

                        break;
                    case "SELECTALL":
                        // variavel criada aqui
                        $listar_faq = $controller_faq->listar_faq();

                        require_once('view/cms/pagina_faq/tabela.php');

                        break;
                }
            
                break;

        }
      
        
    }
?>
