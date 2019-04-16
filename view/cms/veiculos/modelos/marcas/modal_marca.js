/*
* Chama uma modal para criação de uma marca 
* @params id int = id do tipo de veiculo
*/
function marca_adicionar(id){
    event.preventDefault();
    $.ajax({url:'?cms/veiculos/modelos/marcas/modal_criar_editar.php&id_tipo_veiculo='+id})
    .then(function(resposta){
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/

function marca_editar(id,id_marca){
    $.ajax({url:'?cms/veiculos/modelos/marcas/modal_criar_editar.php&id_tipo_veiculo='+ id + '&id_marca='+id_marca})
    .then(function(resposta){
        modal(resposta.toString());
    })
}


/* Funções que fazem o crud de modelos */
function marca_insert(form){
    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                $.notify(" Modelo gravado com sucesso! ","success");
                chamaModalModelos($(form).attr('data-idTipo'));
            }
        }
    })

}
function marca_update(form){

    event.preventDefault();

    console.log("hellow");


    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                
                $.notify(" Modelo atualizado com sucesso! ","success");

                chamaModalModelos($(form).attr('data-idTipo'));
            
            }
        }
    })

}
