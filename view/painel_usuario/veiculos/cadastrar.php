<!-- form que tem o Conteudo  -->
<?php

?>
<form class="veiculos-cadastrar">
    <div class="veiculos-titulo">Cadastrar Veiculo</div>
    <table class="veiculos-cadastrar-table">
        <tr>
            <td>
                <table style="width: 226px;">
                    <tr>
                        <td>
                            <label>Tipo de veiculos</label>
                            <select id="cb_veiculos" onchange="getTipoVeiculo(this.value)">
                                <option value="1">Carro</option>
                                <option value="2" selected="selected">Bicicleta</option>
                                <option value="3">Moto</option>
                                <option value="4">Caminhão</option>
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
                            <select>
                                <option>Carros</option>
                                <option>Bicicleta</option>
                                <option>Skate</option>
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
