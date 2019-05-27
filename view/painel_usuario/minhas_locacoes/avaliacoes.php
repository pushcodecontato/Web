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
        </tbody>
    </table>
</div>
