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
          
        }
    })
}
function headerNaoLogado(){
    $.ajax({
        type:"GET",
        url:"view/menu/menuNaoLogado.php",
        success:function(dados){
            
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
    window.location.href = '?cadastro_usuario.php';
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
                $.notify("Formulario enviado com sucesso.", {
                    style: 'classNotify',
                    className: 'classSuccess'
                });
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
			$.notify("EMail cadastrado", {
                style: 'classNotify',
                className: 'classSuccess'
            });
		}
	})
}
// FUNÇÃO PARA CADASTRA CLIENTE
function mostraImagem64(input){
    var file = input.files[0];
  
    var reader = new FileReader();
  
    reader.onloadend = function() {
       $(input).parent().find('.addFotoCliente').css({'background-image':'url("'+ reader.result +'")'});
    }
    console.log(file);
    reader.readAsDataURL(file);
  }
  
  function clientes_cadastrar(form){ 
     var submetido = ($(form).attr('data-submit') || 0) * 1;
    //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
     if(submetido == 1){
        return true;
     }else{ 
       $(form).attr('data-submit','1');
     }
     event.preventDefault();
  
     var form = $(form);
  
     $(form).find('.containerCadastro').hide(200);
     $(form).css({'background-image':'url(view/imagem/loading.svg)'});
     $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
     
     // Envia os dados do formulario
     $(form)
     .ajaxForm({
         success:function(resposta){
           console.log("RESPOSTA",resposta);
           if(resposta.toString().search('sucesso')>=0){
  
            $.notify("Usuário cadastrado com sucesso", {
                style: 'classNotify',
                className: 'classSuccess'
            });
             // Redirecionando o usuario depois da menssagem de sucesso aparecer
             setTimeout(function(){  
               //Redirecionando
               window.location = "?painel_usuario/home.php";
             },800)
           }
           else{
            $.notify(resposta.toString(), {
                style: 'classNotify',
                className: 'classError'
            });
           }
         },
     }).submit();
  
  }

//   FUNÇÂO PARA CHAMAR A MODAL SOLICITACAO ANUNCIO

function chamarSolicitacao(idAnuncio,idCliente){
    $('.container').fadeIn(300);
    $.ajax({
        type:"GET",
        url:`view/modal/solicitacaoAnuncio.php?idAnuncio=${idAnuncio}&idCliente=${idCliente}`,
        success:function(callback){
            console.log(callback);
            $('.modal').html(callback);
        }
    }); 
}
  
function inserirSolicitacao(idCliente,idAnuncio,form){
    event.preventDefault();
    
    var form = $(form);
    var dtInicial = form.find('#dtInicial').val();
    var dtFinal = form.find('#dtFinal').val();
    var hrInicial = form.find('#hrInicial').val();
    var hrFinal = form.find('#hrFinal').val();
    $.ajax({
        type:"POST",
        url: form.attr('action'),
        data: {"id_anuncio":idAnuncio,
               "id_cliente":idCliente,"dtInicial":dtInicial,"dtFinal":dtFinal,"hrInicial":hrInicial,"hrFinal":hrFinal},
        success:function(callback){
            console.log(callback);
        }

    });
}
/* Modal */
