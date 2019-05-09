<!-- form que tem o Conteudo  -->
<?php
    
    require_once('controller/controllerTipo_veiculo.php');

    require_once('controller/controllerMarcas.php');

    require_once('controller/controllerModelos.php');

    $controller_tipo_veiculo = new ControllerTipoVeiculo();

    $controller_marcas = new ControllerMarcas();

    $controller_modelos = new ControllerModelos();

    $tipo_veiculo = $controller_tipo_veiculo->listar_tipo();

    $marcas = $controller_tipo_veiculo->listar_marcas();

    $modelos = $controller_tipo_veiculo->listar_modelos();

    $router = "";
    
    $funcaoJS = "tipo_veiculo_getById(id)";
?>
<form class="veiculos-cadastrar"  method="POST" id="formCadastroVeiculo" name="formCadastroVeiculo" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>" >
    <div class="veiculos-titulo">Cadastrar Veiculo</div>
    <table class="veiculos-cadastrar-table">
        <tr>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td>
                            <label>Tipo de veiculos</label>
                            
                            <select id="cb_veiculos" onchange="getTipoVeiculo(this.value)">
                                <?php
                                    $router = "router.php?controller=tipo_veiculo&modo=select";
                                    $list_tipo =  $controller_tipo_veiculo->listar_tipo();

                                    foreach($list_tipo as $registro){
                                ?>
                                <option value="<?=@$registro->getId()?>"><?=@$registro->getNome()?></option>   
                                <?php }?>                             
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td> 
                            <label>Marcas</label>
                            <select id="cb_marcas" onchange="getMarcas(this.value)">
                                <?php
                                    $router = "router.php?controller=marcas&modo=select";
                                    $list_marcas =  $controller_marcas->listar_marcas();

                                    foreach($list_marcas as $registro){
                                ?>
                                <option value="<?=@$registro->getId()?>"><?=@$registro->getNome()?></option>   
                                <?php }?>  
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td>
                            <label>Modelo</label>
                            <select>
                                <option>Carros</option>
                                <option>Bicicleta</option>
                                <option>Skate</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table>
                    <td>
                        <label> Ano </label>
                        <select>
                            <option> 2015 </option>
                            <option> 2016 </option>
                            <option> 2017 </option>
                        </select>
                    </td>
                    <td>
                        <label> Valor do veículo </label>
                        <input>
                    </td>
                    <td>
                        <label>Placa</label>
                        <input>
                    </td>
                    <td style="width:185px;">
                        <label>Renavam</label>
                        <input>
                    </td>
                </table>
            </td>
        </tr>
    </table>
    <div class="veiculos-titulo">Acessórios</div>
    <div class="veiculos-cadastrar-acessorios">
        <label class="veiculos-cadastrar-checkbox"><input type="checkbox" >Sufilme</label>
        <label class="veiculos-cadastrar-checkbox"><input type="checkbox" >Sufilme</label>
        <label class="veiculos-cadastrar-checkbox"><input type="checkbox" >Sufilme</label>
        <label class="veiculos-cadastrar-checkbox"><input type="checkbox" >Sufilme</label>
    </div>
    <div class="veiculos-titulo">Upload de imagem</div>
    
    
<!--
        <div class="conteudo_upload">
            


        </div>
-->

  
  
    <table class="veiculos-cadastrar-table">
        <tr>
            <td>
                <div class="div_foto"></div>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        <tr>
    </table>
</form>
<link rel="stylesheet" type="text/css" href="view/painel_usuario/veiculos/css/cadastrarVeiculo.css">
<script src="view/painel_usuario/veiculos/js/script.js"></script>
