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