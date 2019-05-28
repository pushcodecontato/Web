function getMarcas(id_tipo_veiculo){

    if(id_tipo_veiculo < 1)return;
    anuncios_filtrar();
    $.get('router.php?controller=tipo_veiculo&modo=json_marcas&id='+id_tipo_veiculo)
    .then(function(res){
        var marcas = JSON.parse(res);
        console.log("Marcas" ,marcas)
        var slcMarcas = $('select[name="marcas"]');
        slcMarcas.html('');
        slcMarcas.append("<option value='0'>Selecione a Marca</option>");
        /*for(var marca of marcas){
            slcMarcas.append("<option value='" + marca.id_marca_tipo + "'>"+ marca.nome_marca +"</option>");
        }*/
        for(var i = 0 ; i < marcas.length;i++){
          var marca = marcas[i];
          slcMarcas.append("<option value='" + marca.id_marca_tipo + "'>"+ marca.nome_marca +"</option>");
        }
    })
}
function getModelos(id_marca_tipo){

    if(id_marca_tipo < 1)return;

    anuncios_filtrar()

    $.get('router.php?controller=MODELOS&modo=JSON_MODELOS&idTipoMarca='+id_marca_tipo)
    .then(function(res){
        var modelos = JSON.parse(res);
        console.log("Marcas" ,modelos)
        var slcModelos = $('select[name="modelos"]');
        slcModelos.html('');
        slcModelos.append("<option value='0'>Selecione o modelo </option>");
        for(var i = 0 ; i < modelos.length;i++){
            var modelo  = modelos[i];
            slcModelos.append("<option value='" + modelo.id_modelo + "'>"+ modelo.nome_modelo +"</option>");
        }
    })
}
function anuncios_filtrar(){
    var slcTipos        = $('select[name="tipo"]');
    var slcMarcas       = $('select[name="marcas"]');
    var slcModelos      = $('select[name="modelos"]');
    var caixaAnuncios   = $('#segura_anuncios');

    var id_tipo_veiculo = slcTipos.val()  || 0;
    var id_marca_tipo   = slcMarcas.val() || 0;
    var id_modelo       = slcModelos.val()|| 0;

    $.get('router.php?controller=ANUNCIOS&modo=BUSCAR&id_tipo_veiculo='+id_tipo_veiculo+'&id_marca_tipo='+id_marca_tipo+'&id_modelo='+id_modelo+'&json')
    .then(function(resposta){
      var anuncios = JSON.parse(resposta);

      caixaAnuncios.html('');//Limpando!!
      if(anuncios.length < 1){
          caixaAnuncios.append('<p> Nenhum Anuncio Encontrado! <p>')
      }
      for(var i = 0 ; i < anuncios.length;i++){
         var anuncio = anuncios[i];
         var view = '<a href="#">\
                            <div class="anuncios">\
                                    <img class="img_anuncio" src="view/upload/' + anuncio.veiculo.foto[0] + '" alt="<?=@ $anuncio->getVeiculo()->getModelo()->getNome()?>" title="<?=@ $anuncio->getVeiculo()->getModelo()->getNome()?>">\
                                <div class="info_anuncio">\
                                    <p class="nome_veiculo">R$ '+anuncio.valor_hora+'/hora</p>\
                                    <p class="info_veiculo" style="margin-top:10px;">'+( anuncio.veiculo.marca_veiculo.nome_marca +" "+ anuncio.veiculo.modelo_veiculo.nome_modelo )+'</p>\
                                    <p class="info_veiculo">'+( anuncio.veiculo.ano +" | "+ anuncio.veiculo.quilometragem )+' KM </p>\
                                    <p class="info_veiculo" >\
                                        Matheus Vieira | '+( anuncio.cliente.cidade +" "+ anuncio.cliente.uf )+'\
                                    </p>\
                                    <div class="stars_avaliacao">\
                                        <img src="view/imagem/star1.png" alt="star">\
                                        <img src="view/imagem/star1.png" alt="star"><img src="view/imagem/star1.png" alt="star"><img src="view/imagem/star1.png" alt="star"><img src="view/imagem/star1.png" alt="star">\
                                        <p class="percentual_avaliacao">4.5%</p>\
                                    </div>\
                                </div>\
                            </div>\
                        </a>';
         caixaAnuncios.append(view);//Adicionando;
      }

    });

}
