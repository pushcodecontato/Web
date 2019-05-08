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
                            <select onchange="getTipoVeiculo(this.value)">
                                <option>Carro</option>
                                <option value="2">Bicicleta</option>
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
