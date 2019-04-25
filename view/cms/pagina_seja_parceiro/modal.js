

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
    event.preventDefault();
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