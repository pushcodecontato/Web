//click no botão pelo id abrir cadastro
$('#abrir_cadastro1').click(function(){
    // fadeIn para abrir a modal - 400 tempo de abertura
    $("#container2").fadeIn(400);

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_como_ganhar_dinheiro/cadastrar_sessao1.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            $('#modal').html(callback);
        }
    });
});

//click no botão pelo id abrir cadastro
$('#abrir_cadastro2').click(function(){
    // fadeIn para abrir a modal - 400 tempo de abertura
    $("#container2").fadeIn(400);

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_como_ganhar_dinheiro/cadastrar_sessao2.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            $('#modal').html(callback);
        }
    });
});

//click no botão pelo id abrir cadastro
$('#abrir_cadastro3').click(function(){
    // fadeIn para abrir a modal - 400 tempo de abertura
    $("#container2").fadeIn(400);

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_como_ganhar_dinheiro/cadastrar_sessao3.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            $('#modal').html(callback);
        }
    });
});