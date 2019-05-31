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