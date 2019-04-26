

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
var formularioBanner = 0;
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
function sejaParceiroSalvarImagem(lado,img){
    
    var file;

    if(formularioBanner == 0){

      formularioBanner = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=clientes&modo=inserir"></form>');
    
      formularioBanner.append('<input type="file" name="fotolado'+ lado +'">');
      
      file = formularioBanner.find('input[type="file"][name="fotolado'+ lado +'"]');

    }else if(formularioBanner.find('input[type="file"][name="fotolado'+ lado +'"]')[0]){

      file = formularioBanner.find('input[type="file"][name="fotolado'+ lado +'"]');

    }else{

      formularioBanner.append('<input type="file" name="fotolado'+ lado +'">');
      
      file = formularioBanner.find('input[type="file"][name="fotolado'+ lado +'"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         $(img).parent().find('img').attr('src',reader.result);
         $('#seja-parceiro-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);
    }).click();

}
/* Salva uma imagem do lados > IMG  <  */
function sejaParceiroSalvarPainelImagem(){
    
}

/* Salva todo o conteudo IMG > CONTEUDO < IMG*/
function sejaParceiroSalvarPainel(){

  if(formularioBanner == 0)formularioBanner = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=clientes&modo=inserir"></form>');

    // Verifica se e para editar o conteudo do centro
  if($('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]')[0]){
    var texto1 = $('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]')[0].innerHTML;
    var texto2 = $('.seja-parceiro-painel-parceiros-conteudo-conteudo p[contenteditable]')[1].innerHTML;
    
    formularioBanner.append('<textarea name="texto1"></textarea>');
    formularioBanner.find('[name="texto1"]').text(texto1);

    formularioBanner.append('<textarea name="texto2"></textarea>')
    formularioBanner.find('[name="texto2"]').text(texto2);
    
    var textoBotao = $('.seja-parceiro-painel-parceiros-conteudo-conteudo button[contenteditable]')[0].innerHTML;

    formularioBanner.append('<input type="text" name="btnTexto">')
    formularioBanner.find('[name="btnTexto"]').val(textoBotao);
  }

  //console.log("FORM : ",formularioBanner.serialize());
  $(formularioBanner)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');


           },800)

         }
       },
   }).submit();

}