function exportarFIP(id_tipo_veiculo){

   $.get('https://fipeapi.appspot.com/api/1/carros/marcas.json').then(function(res){

	res.forEach(function(marca,acc){

	    var marcaExportar = marca;
	    
	    $('.fip_descricao p').text('Pegando marca ' + marca.name);

		setTimeout(function(){
			
			$('.fip_descricao p').text('Pegando Modelos da marca ' + marca.name);

			$.get(`https://fipeapi.appspot.com/api/1/carros/veiculos/${marca.id}.json`)
            .then(function(modelosToMarca){

                marcaExportar.modelos = [];
                marcaExportar.modelos = modelosToMarca;
                
                $('.fip_descricao p').text('Atualizando marca ' + marcaExportar.name);
                
                /*modelosToMarca.forEach(function(modelo){
                   modelo.sql = `INSERT INTO tbl_modelo_veiculo(nome_modelo)VALUES('${ modelo.name }')`;
                   marcas[marca.id].modelos.push(modelo);
                });*/

            });

		},(marca.id * 176)+1000 * acc);
		
	})

})
}
function exportarMarca(id_tipo_veiculo,marca){
    $.ajax({url:''})
}