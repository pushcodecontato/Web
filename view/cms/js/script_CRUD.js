


//Mensagem: variavel para passar a mensagem que será mostrada para o usuário depois de uma ação
let mensagem = "";
let msg = "";
let type = "" ;

let caminho = "";
var href = window.location.href;
var caminho_absoluto = 'view/cms/';

function conteudo_subMenu(nome_pagina, teste){
    if(teste){
        $.ajax({
            type:'GET',
            url:'?cms/'+nome_pagina,
            success:function(html){
                $('.conteudo').html(html);
            }
        })

    }
}

function inserir_nivel(){
    form = $('#formNiveis');
    event.preventDefault();
    $.ajax({
        type:"POST",
        url: form.attr('action'),
        data: form.serialize(),
        async: true,
        success:function(dados){
            $.notify("Nível inserido com sucesso", "success");
            conteudo_subMenu('niveis/cadastro_niveis',true);
        }
    });
}
function atualizar_nivel(){
    form = $('#formNiveis');
    event.preventDefault();
    $.ajax({
        type:"POST",
        url: form.attr('action'),
        data: form.serialize(),
        async: true,
        success:function(dados){
            $.notify("Nível editado com sucesso", "success");                //usuario.getDados();
            conteudo_subMenu('niveis/cadastro_niveis',true);
        }
    });
   
}

function excluir_niveis(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            
            $.notify("Nível excluído com sucesso", "success");
            conteudo_subMenu('niveis/cadastro_niveis',true);
        }            
    });
}
function buscar_dados(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            $('.conteudo').html(dados);
           
        }               
    });
}

/* Usuario  js */
var usuario = {
    getById:function(id){//Pega o usuario
        $.ajax({
            type:'post',
            method:'post',
            url:'router.php?controller=usuarios&modo=select',
			data:{id}
        }).then(function(resposta){
           	$('.conteudo').html(resposta);
        })
    },
    getDados:function(){
        $.ajax({
            type:'post',
            method:'post',
            url:'?cms/usuarios/tabela',
        }).then(function(resposta){
            $('.tbl_usuarios').html(resposta);
        })
    },
    dao:{
        insert:function(form){
			
			event.preventDefault();

            form = $(form);

            console.log("Formulario: ",form);
            $.ajax({
                type:'post',
                method:'post',
                url:form.attr('action'),
                data: form.serialize()
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Cadastrado com sucesso", "success");
                    
                    //usuario.getDados();
                    conteudo_subMenu('usuarios/cadastro_usuarios',true);
                }
            })
        },
        update:function(form){
          	
          	event.preventDefault();
          	  
            form = $('form#formUsuario');

            console.log("Formulario: ",form);
            $.ajax({
                type:'post',
                method:'post',
                url:form.attr('action'),
                data: form.serialize()
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Atualizado com sucesso", "success");
                    
                    conteudo_subMenu('usuarios/cadastro_usuarios',true);

                }
            })
        },
        delete:function(id){
            $.ajax({
                type:'post',
                method:'post',
                url:'router.php?controller=usuarios&modo=excluir&id='+id,
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Deletado com sucesso", "success");
                    
                    conteudo_subMenu('usuarios/cadastro_usuarios',true);

                }
            })
        }
    }
}


/* logar função  temporario */
function logar(formulario){
	
	// Desativa o submit do formualrio par a tela não piscar
	event.preventDefault();

	$.ajax({
		type:'post',
		method: 'post',
		url:'router.php?controller=usuarios&modo=logar',
		data:$(formulario).serialize()
	}).then(function(resposta){
		
		console.log("Resposta: ",resposta);

		if(resposta.toString().search('sucesso')>=0){

			$.notify("usuario logado com sucesso", "success");

			//var redirecionamento = window.location.origin + window.location.pathname + '?cms/home';
			
			window.location.href = '?cms/home_cms';

		}else{

			$.notify("Erro ao logar com usuario !", "error");
		
		}
	})
}

/* Ignore isso!!! */

function chamaModalAcessorios(){
	$.get('?cms/veiculos/modal_acessorio.php')
	.then(function(res){
		modal(res.toString());
	});
}
function chamaModalModelos(){
	$.get('?cms/veiculos/modal_modelo.php')
	.then(function(res){
		modal(res.toString());
	});
}
function chamaModalFaleConosco(){
	$.get('?cms/fale_conosco/modal_fale_conosco.php')
	.then(function(res){
		modal(res.toString());
	});
}










