function abrir_menu(nome_pagina){
    
   event.preventDefault();
    
   $.ajax({
    type:"POST",
    url:"?painel_usuario/"+nome_pagina,
    success:function(dados){
        $("#conteudo").html(dados)
        
    }

   });
}

function mostraImagem64(input){
  
  var file = input.files[0];

  var reader = new FileReader();

  reader.onloadend = function() {
     $(input).parent().find('.imagem_foto').css({'background-image':'url("'+ reader.result +'")'});
  }

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
    
   $(form).find('fieldset,button').hide(200);
   $(form).css({'background-image':'url(view/imagem/loading.svg)'});
   $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
   
   // Envia os dados do formulario
   $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("usuario cadstrado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             //Redirecionando
             window.location = "?painel_usuario/home.php";


           },800)

         }
       },
   }).submit();

}