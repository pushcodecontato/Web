<div class="segura_tabela_email">  
    <h1 class="titulo_pagina_email">E-mail Marketing</h1>
   
    <div class="tabela">
        <div class="linha_titulo">
            <p style="width:100px;" class="col_text border_right">
                SELECIONE
            </p>
            <p style="width:850px;" class="col_text ">
               EMAIL
            </p>
        </div>
        <div class="tabela_dados">
            <?php 
            
                for($i = 0; $i <=50; $i++){

                
            ?>
            <div class="linha_dados">
                <p style="width:100px;" class="col_text border_right">
                    <!-- <form action=""> -->

                        <input type="checkbox" value="teste">
                    <!-- </form> -->
                </p>
                <p style="width:800px;" class="col_text">
                    Teste@gmail.comsssssssssssssss
                </p>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <button class="btn_exportar">Exportar</button>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/email_marketing.css">
