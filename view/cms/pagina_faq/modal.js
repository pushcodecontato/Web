//click no botão pelo id abrir cadastro
$('#abrir_cadastro').click(function(){
    // fadeIn para abrir a modal - 400 tempo de abertura
    $("#container2").fadeIn(400);

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_faq/cadastrar_faq.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            $('#modal').html(callback);
        }
    });
});