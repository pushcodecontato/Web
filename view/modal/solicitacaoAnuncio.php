<?php
    $idCliente = "";
    $idAnuncio = "";
        $idCliente = $_GET['idCliente'];
        $idAnuncio = $_GET['idAnuncio'];

?>
<form action="router.php?controller=SOLICITAR_ANUNCIO&modo=inserir" id="formSolicitacao" method="post" onsubmit="inserirSolicitacao(<?=@ $idCliente?>, <?=@ $idAnuncio?>, this)">
    <label>Data inicial</label><br>
    <input type="text" name="dtInicial" id="dtInicial"><br>
    <label>Data final</label><br>
    <input type="text" name="dtFinal" id="dtFinal"><br>
    <label>Horario inicial</label><br>
    <input type="text" name="hrInicial" id="hrInicial"><br>
    <label>Horario final</label><br>
    <input type="text" name="hrFianl" id="hrFinal">

    <input type="submit" name="btnSalvar" value="Salvar" >
</form>