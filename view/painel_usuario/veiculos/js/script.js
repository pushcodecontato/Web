function getValueOption(){
    //recupera value do option
    var e = document.getElementById("cb_veiculos");
    var itemSelecionado = e.options[e.selectedIndex].value;

    //Recupera texto do option
    var e = document.getElementById("cb_veiculos");
    var itemSelecionado = e.options[e.selectedIndex].text;   
}

function getTipoVeiculo(idTipoVeiculo){
    
    console.log("Aqui: " + idTipoVeiculo);
    $.ajax({
        type:'POST',
        url:'router.php?controller = tipo_veiculo&modo = buscar', 
    });

}