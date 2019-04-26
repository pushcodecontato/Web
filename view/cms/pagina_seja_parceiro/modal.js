

/* Funções que chamam a modal para criar ou editar um topico */
function pagina_topico_criar(){
    $.get('?cms/pagina_seja_parceiro/modal_topicos.php')
    .then(function(resposta){
        modal(resposta);
    })
}
function pagina_topico_editar(id_topico){
    
}

/* CRUD de topico*/
function pagina_topico_insert(form){

   var submetido = ($(form).attr('data-submit') || 0) * 1;
   

  //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
   if(submetido == 1){
      
      $(form).attr('data-submit','0');
      
      return true;

   }else{
     
     $(form).attr('data-submit','1');

   }

   event.preventDefault();
    
   var form = $(form);
    
   $(form).find('*').hide(200);
   $(form).css({'background-image':'url(view/imagem/loading.svg)',
                'background-repeat': 'no-repeat',
                'background-position':'center'});

   $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
   
   // Envia os dados do formulario
   $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Topico cadastrado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             fecharModal();

             conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');


           },800)

         }
       },
   }).submit();
}
function pagina_topico_update(){

}
function pagina_topico_delete(){

}
/* mostra como ficara a imagem uplada */
function mostraImagemTopico(input){
    var file = input.files[0];

  var reader = new FileReader();

  reader.onloadend = function() {
     $(input).parent().find('.imagem_foto').css({'background-image':'url("'+ reader.result +'")'});
  }

  reader.readAsDataURL(file);
}
/*funções que cuidam da edição do painel IMG > conteudo < IMG*/
function tornarEditavel(){
    /* Coloca a propriedade  contenteditable em todos os elementos par aque sejam editaveis */
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo * ').attr('contenteditable','true');

    $('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]').focus();
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]').click();
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]').attr('autofocus','true');

    $('#seja-parceiro-btnSalvar').show(350);
}
/* Salva uma imagem do lados IMG > < IMG */
function sejaParceiroSalvarImagem($lado){

    var form = $('<form  method="post" enctype="multipart/form-data" onsubmit="clientes_cadastrar(this)" action="router.php?controller=clientes&modo=inserir"></form>');
    
    form.append('<input type="file">');
    form.find('input[type="file"]').change(function(){
      
      var formData = new FormData(form[0]);

      /*console.log("FIle : ",form.find('input[type="file"]')[0]);
      console.log("FIle.files : ",form.find('input[type="file"]')[0].files[0]);
            
      formData.append('imagem',form.find('input[type="file"]')[0].files[0],'sdsdsd.jpg');*/

      console.log("Form     : ",form[0]);
      console.log("FormData : ",formData);

      $.ajax({
        type: 'POST',
        url: 'router.php?',
        data: formData ,
        processData: false,
        contentType: false

      }).then(function (resposta) {
          
          console.log("Resposta : ",resposta);

      });

    }).click();

}
/* Salva uma imagem do lados > IMG  <  */
function sejaParceiroSalvarPainelImagem(){
    
}

/* Salva o que esta em > CONTEUDO < */
function sejaParceiroSalvarPainel(){
    
}