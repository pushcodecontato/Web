/* Modals */
function anuncio_ver(id){
	$.ajax({
		url:'?painel_usuario/anuncios/anuncio.php&id='+id,
		success:function(resposta){
			modal(resposta);
		}
		})
}

/* CRUD */
function anuncio_insert(form){
    window.ddd = form;
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta",resposta);
            if(resposta.toString().search('sucesso')>=0){
              $.notify("Anuncio registrado!",'success');
                conteudo_subMenu('veiculos/veiculos_pendentes');
			      }
          } 
        })
}
function anuncios_pendentes_modal_ver_imagem(imagem){

    var imagemSelecionada = $(imagem);
    var imagemPrincipal = $('.modal_anuncios .imagem img.principalImagem');
    
    imagemPrincipal.attr('src',imagemSelecionada.attr('src'));

    // Limpando as imagens selecionadas
    $('.modal_anuncios .imagem .lista_imagens .item_imagem img').css({'border':'none'});

    imagemSelecionada.css({'border':'solid 1px blue'});
}
function anuncio_delete(id){
	$.ajax({
		url:'router.php?controller=ANUNCIOS&modo=deletar&id='+id,
		method:'POST',
		type:'POST',
		success:function(resposta){
			console.log("Res:",resposta);
			if(resposta.toString().search('sucesso')>=0){
				$.notify(' Anuncio Deletado com sucesso ','success')
				fecharModal();
			}
		}
	})
}
function anuncio_update(form){
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta",resposta);
            if(resposta.toString().search('sucesso')>=0){
				$.notify("veiculo aprovado",'success');
				conteudo_subMenu('veiculos/veiculos_pendentes',true);
				fecharModal();
			}
          } 
        })
}


/* Solicitação  (APROVAÇÃO E REPROVAÇÃO) */
function solicitacao_ver(id_solicitacao){
	$.ajax({
		url:'?painel_usuario/anuncios/modal_solicitacao&id='+id_solicitacao,
	}).then(function(resposta){
		modal(resposta);
	})
	
}
function solicitacao_aprovar(id_solicitacao){
	$.ajax({
		url:'router.php?controller=SOLICITAR_ANUNCIO&modo=APROVAR&id='+id_solicitacao,
		type:'POST',
		method:'POST',
		success:function(resposta){
			console.log("Res:",resposta);
			$.notify(" Solicitação Aprovada com sucesso ","success");
			fecharModal();
		}
	})
}
function solicitacao_reprovar(id_solicitacao){
	$.ajax({
		url:'router.php?controller=SOLICITAR_ANUNCIO&modo=REPROVAR&id='+id_solicitacao,
		type:'POST',
		method:'POST',
		success:function(resposta){
			console.log("Res:",resposta);
			$.notify(" Solicitação negada com sucesso ","success")
			fecharModal();
		}
	})
}