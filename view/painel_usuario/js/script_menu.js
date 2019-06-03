 //variavel global para controlar se é para abrir ou fechar
let controle = false;
let backup_menu = "";
//Funççao para abrir o menu com mais opções
// height - passar a altura que a div do submenu vai ter
// sub_menu - referenciar qual sub_menu será aberto
function abrir_menu(d, sub_menu, item_menu){
    // alert(sub_menu);
    //se o controle for igual a false significa que está fechado
    //então recebe a "ação" de abrir
    if(backup_menu == sub_menu){
        $(sub_menu).css("height","auto").slideUp(300);
        $(sub_menu).css({'border':' solid 1px #ccc'});
        controle = false;
        backup_menu = "";
    }
    else if(backup_menu != ""){
        $(backup_menu).css("height","auto").slideUp(300);
        if(controle == false){
            $(sub_menu).css("height","auto").slideDown(350);
            $(sub_menu).css({'border':' solid 1px #ccc'});
            controle = true;
            backup_menu = sub_menu;
        }
        else{
            $(sub_menu).css("height","auto").slideDown(350);
            $(sub_menu).css({'border':' solid 1px #ccc'});
            controle = false;
            backup_menu = sub_menu;
        }
    }
    else{
        backup_menu = sub_menu;
        if(controle == false){
            $(sub_menu).css("height","auto").slideDown(350);
            $(sub_menu).css({'border':' solid 1px #ccc'});
            controle = true;
        }  
    }
}

function conteudo_subMenu(nome_pagina){

    
        $.ajax({
            type:'GET',
            url:'?painel_usuario/'+nome_pagina,
            success:function(html){
                $('#conteudo').html(html);
            }
        })

    
}

$(document).ready(function(){

	$('#menu_icone_reposnsivo').on('click',function(){
		console.log("Hellow");
		$('.menu_lateral').off('click');
		$('.menu_lateral').slideDown(360,function(){
			$('.menu_lateral').click(function(e){
				if($(e.target).hasClass('menu_lateral')){
					$('.menu_lateral').fadeOut();
				}else if($(e.target).hasClass('item_sub_menu')){
				   $('.menu_lateral').fadeOut();
				}else{
                    
                    if($(e.target).parent().hasClass('item_sub_menu')){
                        $('.menu_lateral').fadeOut();
                    }

				}
			})


		});

	})

})