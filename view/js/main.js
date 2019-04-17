/* Arquivo js Principal */

function logar(form){
    event.preventDefault();
    $.post({
        url:$(form).attr('action'),
        data:$(form).serialize(),
    })
    .then(resposta=>{
        console.log("Resposta",resposta);
        if(resposta.toString().search('sucesso')>=0){
            
           $.notify("usuario logado com sucesso", "success");
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             //Redirecionando
             window.location = "?painel_usuario/home.php";


           },800)
        }else{
            $.notify(resposta.toString(),"error");
        }
    })
       
}

function getLogin(){
    $.get('?painel_usuario/login.php')
    .then(function(resposta){
        $("#login").append(resposta.toString());
    })
}

function getCadastro(){

    // Redirecionando o usuario para o formualrio de cadastro
    window.location.href = '?painel_usuario/cadastro.php';

}


