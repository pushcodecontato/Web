<?php
   
    require_once('../../model/clienteClass.php');
    if(!isset($_SESSION))session_start();
    
    $cliente = unserialize($_SESSION['cliente']);
?>
<div class="usuarioLogado">
    <img src="view/upload/<?=@$cliente->getFoto();?>" alt="foto do cliente">
    <div class="infoUser">
        <p style="font-size:18px;">Seja bem vindo</p>
        <p><?=@$cliente->getNome();?></p>
        <a href="?painel_usuario/home.php" class="painelUsuario">Painel do usuário </a>|
        <label class="logout"> Fazer logout</label>
    </div>
</div>


<script>
 $(".logout").click(function(){
    $.ajax({
        type:'post',
		method:'post',
        url:"?home.php",
        data: {logout: false},
        success:function(dados){
            if(dados.toString().search('Sucesso')>=0){
                console.log(dados);
                headerNaoLogado();
            }
        }
    });
});
</script>