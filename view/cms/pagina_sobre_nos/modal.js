function chamaModalCadastroHistoria(){
    $.ajax({
        type:'POST',
        url:'?cms/pagina_sobre_nos/cadastro_historia.php',
        success:function(resposta){
            modal(resposta);
        }
    });   
}

function chamaModalCadastroVisao(){
    $.ajax({
        type:'POST',
        url:'?cms/pagina_sobre_nos/cadastro_visao_missao_valor.php',
        success:function(resposta){
            modal(resposta);
        }
    });   
}