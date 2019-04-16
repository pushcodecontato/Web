/* Arquivo js Principal */

function logar(form){
    event.preventDefault();
    $.post({
        url:'router.php?controller=cliente&modo=logar',
        data:$(form).serialize(),
    })
    .then(resposta=>{
        console.log("Resposta",resposta);
    })
       
}

function getLogin(){
    $.get('?painel_usuario/login.php')
    .then(function(resposta){
        $("#login").append(resposta.toString());
    })
}

function getCadastro(){
    window.location.href = '?painel_usuario/cadastro.php';
}


