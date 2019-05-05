function exportarChamado(){
    
    var tabela = $('.tabela');
    var csvEmail = " ";
    
    /*  Procurando por um input de type igual a checket e de name igual a emails no estado de checked(checkada) dentro da tabela */
    tabela.find('input[type="checkbox"][name="emails"]:checked')
    /* For() dentro das checkets pegas */
    .each(function(){

          csvEmail += $(this).val() + "\n";
    })

    toCSV('emails',csvEmail);

    /*$.ajax({url:'?cms/email_marketing/exportacao.php&id_email_mkt='+id_email_mkt})
    .then(function(resposta){
        var csv = "Nome;Email;Celular;Mensagem \n";
        csv += resposta;
        toCSV('fale_conosco',csv);
    })*/
}
function selecioneEmails(checkTodos){
    
    if($(checkTodos).is(':checked')){
        // Checka
        $('input[type="checkbox"][name="emails"]').prop('checked',true);
    }else{
        // DesChecka
        $('input[type="checkbox"][name="emails"]').prop('checked',false);
    }
}
function enviarEmail(email){
	console.log(email);
	$.get('?cms/email_marketing/enviar_email.php&email='+ email)
     .then(function(res){
		modal(res.toString());
	});
}