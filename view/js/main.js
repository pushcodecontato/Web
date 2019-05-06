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

function fale_conosco_enviar(form){

    event.preventDefault();

    $(form).find('*').hide();
    $('.fale_conosco')
    .css({'background-image':'url(view/imagem/loading.svg)',
          'background-position':'center',
          'background-size':'213px',
          'background-repeat':'no-repeat'});


	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(resposta){

			if(resposta.toString().search('sucesso')>=0){
			   
			   setTimeout(function(){
			       $('.fale_conosco')
                   .css({'background-image':'none',
                         'background-position':'center;',
                         'background-size':'213px',
                         'background-repeat':'no-repeat'});

                   $(form).find('*').show();
			   },600);

               $.notify('Formulario enviado!','success');
			}

		}
	})
}
function email_marketing_enviar(form){
	event.preventDefault();
	$.ajax({
		url:$(form).attr('action'),
		type:'POST',
		method:'POST',
		data:$(form).serialize(),
		success:function(resposta){
			console.log(resposta);
			$(form).find('input[name="txtEmail"]').val('');
			$.notify(" Email cadastrado "," success ");
		}
	})
}