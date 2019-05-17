
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
       
        
    });
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

function preencheData(){
    atual = new Date();
    
    var option = '<option>Selecione o ano do veiculo</option>';
    anoAtual = atual.getFullYear();
    
    for(var anoAnterio = 1500;anoAnterio < anoAtual ; anoAtual--){

        option += `<option value='${anoAtual}'>${anoAtual}</option>`; 
    }
   
    $('#cb_data').html(option);
}

function getAcessorios(idTipoVeiculo){
    $.ajax(`router.php?controller=tipo_veiculo&modo=listar_acessorios&id_tipo_veiculo=${idTipoVeiculo}`).then(res=>{
        dados = JSON.parse(res);
        console.log(res)
        if(dados.length > 0){
            var option;
            for(var objeto of dados){
                option += `<option value="${objeto.id_acessorio}">${objeto.nome_acessorio}</option>`;
            }
        }
        $('#selectAcessorios').html(option);
        $("#selectAcessorios").show();
        $("#selectAcessorios").selectize();
    });
}
function mostraVeiculo64(input){
    $('.conteudo_upload img').remove();
    var file = input.files;
    var cont = 0;
    while(cont < file.length){
        let reader = new FileReader();
        reader.onloadend = function() {
           $('.conteudo_upload')
           .append('<img width="129" src="'+ reader.result +'">');
        }
        reader.readAsDataURL(file[cont]);
        cont++;
    }
    
  }
  
  function cadastrar_veiculo(form){
    var submetido = ($(form).attr('data-submit') || 0) * 1;
    //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
     if(submetido == 1){
        $(form).attr('data-submit',0)
        return true;
     }else{ 
       $(form).attr('data-submit','1');
     }
     event.preventDefault();
  
     var form = $(form);
     // Envia os dados do formulario
     $(form)
     .ajaxForm({
         success:function(resposta){
           console.log("RESPOSTA",resposta);
           if(resposta.toString().search('sucesso')>=0){
  
                console.log('oi');
           }
          
         },
     }).submit();
  }