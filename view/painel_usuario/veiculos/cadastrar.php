
<link rel="stylesheet" type="text/css" href="view/painel_usuario/veiculos/css/cadastrar.css">

<div id="segura_table">
    <form class="veiculos-cadastrar" action="router.php?controller=veiculos&modo=inserir" method="POST" id="formCadastroVeiculo" name="formCadastroVeiculo" enctype="multipart/form-data" onsubmit="cadastrar_veiculo(this)">

        <h2>Cadastrar veículo</h2>
        <div class="tabela">

            <div class="row_veiculo">
                <div class="colunaSelect">
                    <label>Tipo de veiculos</label><br>
                    <select id="cb_veiculos" name="sltTipoVeiculo" onchange="getMarcaVeiculo(this.value); getAcessorios(this.value)">
                                    
                    </select>
                </div>
                <div class="colunaSelect">
                    <label>Marcas</label><br>
                    <select id="cb_marcas" name="sltMarcasVeiculo" onchange="getModeloVeiculo(this.value)">
                        <option>Selecione a marca</option>
                    </select>
                </div>
                <div class="colunaSelect">
                    <label>Modelo</label><br>            
                    <select id="cb_modelos" name="sltModeloVeiculo">
                        <option>Selecione um modelo</option>
                    </select>
                </div>
            </div>
            <div class="row_veiculo">
                <div class="coluna-2" style="width:140px;">
                    <label> Ano </label>
                    <select id="cb_data" name="sltAno">
                        
                    </select>
                </div>
                <div class="coluna-2" style="width:140px;">
                    <label> Valor hora </label>
                    <input type="text" placeholder="Valor" name="txtValor">
                </div>
                <div class="coluna-2" style="width:140px;">
                    <label> Placa </label>
                    <input type="text" placeholder="Placa" name="txtPlaca">
                </div>
                <div class="coluna-2" style="width:140px;">
                    <label> Renavam </label>
                    <input type="text" name="txtRenavam" placeholder="Ranavam">
                    
                </div>
                <div class="coluna-2" style="width:280px;">
                    <label> Quilometragem </label><br>
                    <input type="text" name="txtQuilometragem" placeholder="Quilometragem">
                </div>
            </div>
            <h3 class="tituloAcessorio">Acessórios</h3>
            <div class="row_veiculo select_acessorio" style="padding-left:60px; margin-top:10px; height:136px;">
                <select style="display:none; width:100%;" id="selectAcessorios" multiple name="sltAcessorios[]">
            
                </select>
            </div>

             <div id="row_fotos">
                <h3 class="tituloAcessorio">Fotos</h3>
                <div class="conteudo_upload">

                </div>
                <input type="file" name="ftVeiculo[]" multiple onchange="mostraVeiculo64(this)">
            </div>
            <!-- btnPadrao é pra usar em tudo! -->
            <input type="submit" name="btnSalvar" value="Salvar" class="btnPadrao">
        </div>

    </form>
</div>
<script src="view/painel_usuario/js/script_crud.js"></script>
<script src="view/painel_usuario/veiculos/js/script.js"></script>
<script src="view/cms/js/selectize.min.js"></script>
<script src="view/js/notify.js"></script>
<script>

    $(document).ready(function(){
        selectTipoVeiculo();
        preencheData();
    })
   
</script>