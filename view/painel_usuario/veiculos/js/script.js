function selectTipoVeiculo(){
    $.ajax("router.php?controller=tipo_veiculo&modo=BUSCAR").then(res=>{
        tipoVeiculo = JSON.parse(res)
        if(tipoVeiculo.length > 0){
            var option = '<option>Selecione um tipo de veiculo</option>';
            for(var objeto of tipoVeiculo){
                option += `<option value='${objeto.id_tipo_veiculo}'>${objeto.nome_tipo_veiculo}</option>`;
            }
           
            $('#cb_veiculos').prop( "disabled",false);
           
        }else{
            option = '<option>Tipo de veiculos não encontrado</option>';
            $('#cb_veiculos').attr("disabled", true);
        }
        $('#cb_veiculos').html(option);
    });
}

function getMarcaVeiculo(idTipoVeiculo){
    $.ajax(`router.php?controller=tipo_veiculo&modo=json_marcas&id=${idTipoVeiculo}`).then(res=>{
        dados = JSON.parse(res)
        if(dados.length > 0){
            var option = '<option>Selecione a marca</option>';
            for(var objeto of dados){
                option += `<option value='${objeto.id_marca_tipo}'>${objeto.nome_marca}</option>`;
            }
          
            $('#cb_marcas').prop( "disabled",false);
           
        }else{
            option = '<option>Marca não encontrada</option>';
            $('#cb_marcas').attr("disabled", true);
        }
        $('#cb_marcas').html(option);
       
        
    })

}

function getModeloVeiculo(idTipoMarca){
    console.log(idTipoMarca);
    $.ajax(`router.php?controller=modelos&modo=json_modelos&idTipoMarca=${idTipoMarca}`).then(res=>{
        console.log(res);
        dados = JSON.parse(res)
        if(dados.length > 0){
            var option = '<option>Selecione um modelo</option>';
            for(var objeto of dados){
                option += `<option value='${objeto.id_modelo}'>${objeto.nome_modelo}</option>`;
            }
            console.log(option);
            $('#cb_modelos').prop( "disabled",false);
           
        }else{
            option = '<option>Modelo não encontrada</option>';
            $('#cb_modelos').attr("disabled", true);
        }
        $('#cb_modelos').html(option);
       
        
    })
}