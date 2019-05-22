<?php
                
        require_once("controller/controllerLocacao.php");

        $controller = new ControllerLocacao();

        $lista = $controller->listar();
?>
<head>
  <link rel="stylesheet" type="text/css"  href="view/painel_usuario/minhas_locacoes/css/avaliacoes.css"/>
</head>
<!-- conteudo agendamento -->
<div id="conteudo_agendamento"> 
                
                <h2 id="h2Border">Avaliação</h2>
                <table class="desktop">
                   <thead>
                      <tr>
                         <th>Nome</th>
                         <th>Veículo</th>
                         <th>Data</th>
                         <th>Horário</th>
                         <th>Valor/Hora</th>
                         <th>Valor Total</th>
                         <th> Avaliação </th>
                      <tr>
                   </thead>
                   <tbody>
                      <tr>
                         <td>Lariasa</td>
                         <td>BMW X1</td>
                         <td>22/05/19 - 23/05/19</td>
                         <td>15:00 - 12:00 </td>
                         <td>R$22,00 </td>
                         <td>R$ 120,00</td>
                         <td>
                             <img class="star_left" src="view/imagem/star1.png" alt="star">
                             <img class="star_left" src="view/imagem/star1.png" alt="star">
                             <img class="star_left" src="view/imagem/star1.png" alt="star">
                         </td>
                      </tr>
                   </tbody
                </table>
                <!--<div id="principal">
                    <div class="segura_coluna">
                        <div class="coluna">
                            <div id="nome"> Nome </div>
                        </div>

                        <div class="coluna">
                            <div id="veiculo"> Veículo </div>
                        </div>

                        <div class="coluna">
                            <div id="retirada">Data</div>
                        </div>

                        <div class="coluna">
                            <div id="devolucao">  Horário </div>
                        </div>

                        <div class="coluna">
                            <div id="valor"> Valor/Hora </div>
                        </div>

                        <div class="coluna">
                            <div id="cancelar"> Valor total </div>
                        </div>
                         <div class="coluna">
                            <div id="cancelar"> Avaliação </div>
                        </div>


                    </div>
                    <div class="segura_coluna">
                        <div class="coluna">
                            <div id="nome">Larissa </div>
                        </div>

                        <div class="coluna">
                            <div id="veiculo">Eco Sport</div>
                        </div>

                        <div class="coluna">
                            <div id="retirada_data">15/05/2019</div>
                        </div>

                        <div class="coluna">
                            <div id="devolucao_data">15:00</div>
                        </div>

                        <div class="coluna">
                            <div id="rs">15,00 </div>
                        </div>

                        <div class="coluna">
                            <div id="cancelar"> 
                                50,00
                            </div>
                        </div>
                        
                        <div class="coluna">
                            <div id="cancelar"> 
                                ****
                            </div>
                        </div>
                    </div>                   
                </div>-->
</div>
