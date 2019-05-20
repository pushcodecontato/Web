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
/*Modal*/
function modal(conteudo){

    $("#container").fadeIn(400,function(){
        $('#modal').html(conteudo);
    });
    $("#container").click(function(e){
        if($(e.target).attr('id') == 'container'){
            fecharModal();  
        }
    });

}
function fecharModal(){
    $("#container").fadeOut(400);
    $('#modal').html('');
}