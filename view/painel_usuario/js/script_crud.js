function abrir_menu(nome_pagina){
   $.ajax({
    type:"POST",
    url:"view/painel_usuario/"+nome_pagina,
    success:function(dados){
        $("#conteudo").html(dados)
        
    }

   });
}


function clientes_cadastrar(form){
    
    event.preventDefault();
    
    // Escondendo os dados
    $(form).find('fieldset,button').hide(200);
    //$(form).append("<div style='height:200px; width:200px; display:block; margin-left:auto; margin-right:auto; background-image:url();'></div>")
//Parei Aqui
    $(form).ajaxForm({
        success:function(resposta){
          console.log("RESPOSTA",resposta);
        },
    }).submit();

}