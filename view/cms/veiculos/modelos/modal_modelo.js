
/*
* Chama uma modal para criação de um modelo 
* @params id int = id do tipo de veiculo
*/
function modelo_adicionar(id){
    $.ajax({url:'?cms/veiculos/modelos/modal_criar_editar.php'})
    .then(function(resposta){
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/
function modelo_editar(id){
    
}

function modelo_remover(id){
    
}

/* Funções que fazem o crud de modelos */
function modelo_insert(form){
    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        success:function(resposta){
            if(resposta.search("sucesso")>=0){
                $.notify(" Modelo gravado com sucesso! ","success");
            }
        }
    })

}