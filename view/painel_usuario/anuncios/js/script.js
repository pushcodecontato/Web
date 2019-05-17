/* Modals */
function anuncio_editar(id){

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
				$.notify("veiculo aprovado",'success');
				conteudo_subMenu('veiculos/veiculos_pendentes',true);
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
function anuncio_delete(form){
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