<form  class="veiculos-cadastrar"  method="POST" id="formCadastroVeiculo" name="formCadastroVeiculo" enctype="multipart/form-data">
    <div class="veiculos-titulo">Cadastrar Veiculo</div>
    <table class="veiculos-cadastrar-table">
        <tr>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td>
                            <label>Tipo de veiculos</label>
                            <select id="cb_veiculos" onchange="getMarcaVeiculo(this.value); getAcessorios(this.value)">
                                           
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
                                <option>Selecione a marca</option>
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
                                    
                            <select id="cb_modelos">
                                <option>Selecione um modelo</option>
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
                        <select id="cb_data" name="sltAno">
                           
                        </select>
                    </td>
                    <td>
                        <label> Valor do veículo </label>
                        <input type="text" placeholder="Valor" name="txtValor">
                    </td>
                    <td>
                        <label>Placa</label>
                        <input type="text" placeholder="Placa" name="txtPlaca">
                    </td>
                    <td style="width:185px;">
                        <label>Renavam</label>
                        <input type="text" name="txtRenavam" placeholder="Ranavam">
                    </td>
                </table>
            </td>
        </tr>
    </table>
    <div class="veiculos-titulo">Acessórios</div>
    <div class="veiculos-cadastrar-acessorios">
        <select style="display:none;" id="selectAcessorios" multiple name="sltAcessorios">
           
        </select>
    </div>
    <div class="veiculos-titulo">Upload de imagem</div>
    
    <div class="segura_upload">
        <div class="conteudo_upload">

        </div>
        <input type="file" name="ftVeiculo[]" multiple="multiple" onchange="mostraVeiculo64(this)">
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
<script src="view/cms/js/selectize.min.js"></script>
<script>

    $(document).ready(function(){
        selectTipoVeiculo();
        preencheData();
    })
   
</script>