<<<<<<< HEAD
<!-- form que tem o Conteudo  -->
<?php
    
    require_once('controller/controllerTipo_veiculo.php');

    $controller_tipo_veiculo = new ControllerTipoVeiculo();

    $tipo_veiculo = $controller_tipo_veiculo->listar_tipo();

    $router = "";
    
    $funcaoJS = "tipo_veiculo_getById(id)";
?>
<form class="veiculos-cadastrar"  method="POST" id="formCadastroVeiculo" name="formCadastroVeiculo" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>" >
=======

<form  class="veiculos-cadastrar"  method="POST" id="formCadastroVeiculo" name="formCadastroVeiculo" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>" >
>>>>>>> feea42e205aa8906b90d193a61998f5827bdb7f5
    <div class="veiculos-titulo">Cadastrar Veiculo</div>
    <table class="veiculos-cadastrar-table">
        <tr>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td>
                            <label>Tipo de veiculos</label>
                            <select id="cb_veiculos" onchange="getMarcaVeiculo(this.value)">
                                           
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
                            <select id="cb_marcas" onchange="getModeloVeiculo(this.value)">
                                
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
<<<<<<< HEAD
                            <select id="cb_modelos" onchange="getModelos(this.value)">
                                    
=======
                            <select id="cb_modelos">
                                
>>>>>>> feea42e205aa8906b90d193a61998f5827bdb7f5
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
                        <select id="cb_data">
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
       
        <label class="veiculos-cadastrar-checkbox"><input type="checkbox" ></label>
        
    </div>
    <div class="veiculos-titulo">Upload de imagem</div>
    
    <div class="segura_upload">
        <div class="conteudo_upload">
        </div>

         <div class="conteudo_upload">
        </div>
    </div>

    <div class="segura_aviso">
        <div class="aviso">
            Aviso!
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
            Maecenas porttitor congue massa. Fusce posuere, magna sed 
            pulvinar ultricies, purus lectus malesuada libero, sit amet 
            commodo magna eros quis urnaNunc viverra imperdiet enim. Fusce
            est. Vivamus a tellusPellentesque habitant morbi tristique senectus
            et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy 
            pede. Mauris et orci.
        </p>
    </div>
    <div class="segura_botao">
        <input class="botaoSalvar" type="button" value="Salvar Veículo">
    </div>
 

</form>
<link rel="stylesheet" type="text/css" href="view/painel_usuario/veiculos/css/cadastrar.css">
<script src="view/painel_usuario/veiculos/js/script.js"></script>
<script>

    $(document).ready(function(){
        selectTipoVeiculo();
        preencheData();
    })
</script>