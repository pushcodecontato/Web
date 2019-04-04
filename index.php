<?php

    //require_once("view/home.php");
	if(count($_GET)>=1){

		$nome_pagina = array_keys($_GET)[0];

			
		//echo "Caminho : ". 'view/'.$nome_pagina.'.php </br>';
		$pagina = 'view/'.$nome_pagina.'.php';
		$exists = file_exists( $pagina );
		
		if($exists){
			
			require_once($pagina);
			
		}else{
			
			echo "Pagina não Existe!!";
		
		}

	}else{
		require_once("view/home.php");
	}
?>