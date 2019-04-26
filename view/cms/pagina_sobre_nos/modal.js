function chamaModalCadastroHistoria(){
    $.ajax({
        type:'POST',
        url:'?cms/pagina_sobre_nos/cadastro_historia.php',
        success:function(resposta){
            modal(resposta);
        }
    });   
}

//$('#abrir_cadastro_valores').click(function(){
//    $("#container2").fadeIn(400);
//    
//     $.ajax({
//        type:'POST',
//        url:'?cms/pagina_sobre_nos/cadastro_visao_missao_valor.php',
//        success:function(callback){
//            // $('#modal').css({"width": "1000px", "height": "600px"});
//            $('#modal').html(callback);
//        }
//    });   
//});