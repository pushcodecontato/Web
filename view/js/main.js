/* Arquivo js Principal */

$.notify.addStyle('classNotify', {
    html: "<div><span data-notify-text/></div>",
    classes: {
        base: {
        "height":"40px",
       
        "padding": "10px 10px 0px 10px",
        "border-radius": "2px", 
        "color": "white",
        "font-family":"OpenSans-Regular",
        },
        classSuccess: {
            "background-color": "#03b85b",
        },
        classError:{
            "background-color": "#ff2020"
        }
    }
    
});

function logar(form){
    event.preventDefault();
    $.post({
        url:$(form).attr('action'),
        data:$(form).serialize(),
    })
    .then(resposta=>{
        console.log("Resposta",resposta);
        if(resposta.toString().search('sucesso')>=0){
            //Se tudo der certo o login será efertuado com sucesso
            //E o menu do cliente ira mudar, assim tendo acesso ao painel de usuario
            headerLogado();
            closeLogin();

           $.notify("Login efetuado com sucesso. Seja bem vindo", {
               style: 'classNotify',
               className: 'classSuccess'
           });
           
        }else{
            $.notify(resposta.toString(), {
                style: 'classNotify',
                className: 'classError'
            });
        }
    })
       
}

function headerLogado(){
    $.ajax({
        type:"GET",
        url:"view/menu/menuLogado.php",
        success:function(dados){
            $(".modoLogin").html(dados);
            console.log(dados)
        }
    })
}
function headerNaoLogado(){
    $.ajax({
        type:"GET",
        url:"view/menu/menuNaoLogado.php",
        success:function(dados){
            console.log(dados)
            $(".modoLogin").html(dados);
        }
    })
}

function efetuarLogin(){
    $('.container').fadeIn(250)
    $.ajax({
        type: "POST",
        url:'?login_usuario.php',
        success:function(callback){
            $(".modal").html(callback);
        }
    });
}


function closeLogin(){
    $('.container').fadeOut(250);
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