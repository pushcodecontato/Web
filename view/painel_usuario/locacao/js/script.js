function mapa_ver(anuncio){

    modal('<div class="caixa_mapa">\
            <div id="mapa"></div>\
           </div>');
    setTimeout(function(){
        var map = L.map('mapa').setView([-23.53755, -46.802616], 13);
        //passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
                {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ',
                maxZoom: 17, /* mandando o zom padrão como parametro*/
                id: 'mapbox.streets-satellite', /* Passado como parametro ao mapbox.com  o tipo de mapa que nos queremos
                 https://www.mapbox.com/api-documentation/#maps   */
                accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(map)
        console.log(anuncio);
        var anunciotmp = L.marker([-23.53755, -46.802616]).addTo(map);
        anunciotmp.bindPopup("<h3>"+anuncio.veiculo.modelo_veiculo.nome_modelo+","+anuncio.veiculo.placa+"</h3><p>cidade:"+anuncio.cliente.cidade+" , UF:"+anuncio.cliente.uf+" <p>");

    },1000);

}


/* 

    Funções da api da pagar me

*/

function locacao_modal_ver_imagem(imagem){

    var imagemSelecionada = $(imagem);
    var imagemPrincipal = $('.imagem img.principalImagem');
    
    imagemPrincipal.attr('src',imagemSelecionada.attr('src'));

    // Limpando as imagens selecionadas
    $('.imagem .lista_imagens .item_imagem img').css({'border':'none'});

    imagemSelecionada.css({'border':'solid 1px blue'});
}

function chamaModalConfirmacao(id_locacao){
    $.ajax({url:'?painel_usuario/locacao/modal_confirmar&id_locacao='+id_locacao})
    .then(function(resposta){
        modal(resposta);
    })
}
function criar_transacao(form){
        event.preventDefault();
        
        if($(form).attr('data-status') == 0)return locacao_confirmar("locatario",form);

        $(form).find('*').css({'opacity':'0.0'});
        $(form).css({'background-image':'url(view/imagem/loading.svg)',
                     'background-position':'center',
                     'background-size':'213px',
                     'background-repeat':'no-repeat'});


        var card_number = $(form).find('input[name="n_card"]').val()   || "8576646785257577";
        var cvv         = $(form).find('input[name="cvv_card"]').val() || "614";
        var exp_data    = $(form).find('input[name="exp_data"]').val().toString().replace('/','') || "0729";
        var nome_card   = $(form).find('input[name="nome_card"]').val() || " Gilberto Ramos ";
        
        $.ajax({

            url:"https://api.pagar.me/1/transactions?api_key=ak_test_SLqhxfZj7skKtqmixV3Gy9oA0Q1eC1",
            data:{
            "amount": 21000,
            "card_number": card_number,
            "card_cvv": cvv,
            "card_expiration_date": exp_data,
            "card_holder_name": nome_card,
            "customer": {
              "external_id": "#3311",
              "name": "Matheus V Costa",
              "type": "individual",
              "country": "br",
              "email": window.cliente8342342.locador.email,
              "documents": [
                {
                  "type": "cpf",
                  "number": "47986516801"
                }
              ],
              "phone_numbers": ["+5511999998888", "+5511888889999"]
            },
            "billing": {
              "name": "Mob share Painel User",
              "address": {
                "country": "br",
                "state": "sp",
                "city": "São Paulo",
                "neighborhood": "Rio Cotia",
                "street": "Rua Matrix",
                "street_number": "9999",
                "zipcode": "06714360"
              }
            },
            "items": [{
                                "id": "123",
                                "title": "locacao",
                                "unit_price": 10000,
                                "quantity": 1,
                                "tangible": true
                            }
                ]
        },method:"POST",type:"POST"})
        .then(function(res){
            console.log("RES: ",res);
            if(res.status && res.status == "paid"){
                console.log("Pago!!");
                $.notify(" Pagamento efetuado! ","success");
                fecharModal();
                locacao_confirmar("locador",form);
            }else{
                console.log("Erro no pagamento")
                $.notify(" Erro no pagamento verifique o cartão ","error");
                $(form).find('*').css({'opacity':'1'});
                $(form).css({'background-image':'none',
                             'background-position':'unset',
                             'background-size':'unset',
                             'background-repeat':'unset'});
            }

        }).catch(function(e){
            console.log("Erro : ",e);
            console.log("Erro : ",e.toString());
            console.log("Erro no pagamento")
            $.notify(" Erro no pagamento verifique o cartão ","error");
            $(form).find('*').css({'opacity':'1'});
            $(form).css({'background-image':'none',
                             'background-position':'unset',
                             'background-size':'unset',
                             'background-repeat':'unset'});

        })
}
function locacao_confirmar(tipo,form){
    $.ajax({url:$(form).attr('action'),
            type:"POST",
            method:"POST",
            data:{
                tipo,
            }}).then(function(resposta){
                console.log("Res: ",resposta);
                $.notify(" confirmação enviada! ","success");
            })
}