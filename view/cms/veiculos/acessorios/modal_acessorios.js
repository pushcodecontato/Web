function acessorios_adicionar(id){
    $.ajax({url:'?cms/veiculos/acessorios/modal_criar_editar.php&id_tipo_veiculo='+id})
    .then(function(resposta){
        console.log("CONTEUDO : ",resposta);
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/

function acessorios_editar(id){
    $.ajax({url:'?cms/veiculos/acessorios/modal_criar_editar.php&id_acessorios='+ id})
    .then(function(resposta){
        modal(resposta.toString());
    })
}


/* Funções que fazem o crud de acessorios */
function acessorios_insert(form){

    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                $.notify(" Acessorio gravado com sucesso! ","success");
                chamaModalAcessorios($(form).attr('data-idTipo'));
            }
        }
    })

}
function acessorios_uptade(form){

    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                
                $.notify(" Acessorio atualizado com sucesso! ","success");

                chamaModalAcessorios($(form).attr('data-idTipo'));
            
            }
        }
    })

}