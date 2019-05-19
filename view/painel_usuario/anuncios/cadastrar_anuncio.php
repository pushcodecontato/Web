<?php
    
    require_once('model/clienteClass.php');

    // Pegando o Cliente Logado
    if(!isset($_SESSION))session_start();

    $cliente = unserialize($_SESSION['cliente']);
                
    require_once('controller/controllerAnuncios.php');
    require_once('controller/controllerVeiculo.php');

                
    $controllerAnuncio = new ControllerAnuncios();
    $controllerVeiculo  = new ControllerVeiculos();

    $lista = $controllerAnuncio->listar_anunciosByUser($cliente->getId());

    $listaVeiculo = $controllerVeiculo->listar_veiculos_aprovados();
    $listaV = array();
    
    foreach($listaVeiculo as $veiculo){
        if($veiculo->getIdCliente() == $cliente->getId()){
          $listaV[] = $veiculo;
        }
    }




?>
<head>
  <link rel="stylesheet" 
          type="text/css"
          href="view/painel_usuario/anuncios/css/cadastrar_anuncio.css"/>
</head>
    <div id="conteudo_anuncio"> 
        <h2 id="h2Border">Cadastrar</h2>
            <form onsubmit="anuncio_insert(this)" action="router.php?controller=ANUNCIOS&modo=INSERIR">
            <div class="conteudo_esquerda">
                <label id="titulo"> Veiculos</label><br>
                 <select id="cb_veiculos" name="cb_veiculos">
                        <?php foreach($listaV as $veiculo){?>
                                <option value="<?=@$veiculo->getId()?>"><?=@$veiculo->getModelo()->getNome()?></option>
                        <?php }?>
                 </select>

                 <br>

                <div class="segura_hora">

                    <label id="titulo_veiculo"> Data Inicial</label><br>
                    <input class="caixa_texto_veiculo" name="data_inicial" type="text">
                </div>
                <div class="segura_hora">

                    <label id="titulo_veiculo_entrega"> Data de Final</label><br>
                    <input class="caixa_texto_veiculo" name="data_final" type="text">

                </div>

                <div class="segura_hora">

                    <label id="titulo_veiculo"> Hora Retirada</label><br>
                    <input class="caixa_texto_veiculo" name="hora_inicial" type="text">
                </div>
                <div class="segura_hora">

                    <label id="titulo_veiculo_entrega"> Hora de entrega</label><br>
                    <input class="caixa_texto_veiculo" name="hora_final" type="text">

                </div>
                <br>
                <div class="segura_hora">

                    <label id="titulo_veiculo"> Valor Hora</label><br>
                    <input class="caixa_texto_veiculo" name="valor_hora" type="text">

                </div>

                <p></p>
                <div class="segura_descricao">
                     <label class="descricao">Descricao</label><br>
                     <textarea class="descricao_text" name="descricao" style=" float:left; width: 355px; height: 86px; resize: none; border: solid 1px #ccc;"></textarea>
                     <input class="botao_salvar" type="submit" value="Salvar Anúncio">
                </div>

                
            </div>
            </form>

            <div class="conteudo_direita">
               <?php if(count($lista)<1){?>
               
                     <img class='img_not_find' style=" max-width: 128px;" width='128' alt='Nada encontrado' src='view/imagem/magnify.gif'>
                     <p class='aviso_tabela'> Nenhum anuncio encontrado!</p>
               
               <?php }else{ ?>
                     <?php  
                          if(count($lista) <= 1){
                         
                            $lista_caixas =  array_chunk($lista,1);

                         }else{

                            $lista_caixas =  array_chunk($lista,2);

                         }

                               
                     ?>
                     <?php foreach($lista_caixas as $lista_item){ ?>
                             <div class="segura_caixas">
                                <?php foreach($lista_item as $item){ ?>
                                    
                                     <div class="caixa_veiculo" <?=@$item->getId()?>
                                     style="<?php if($item->getStatus() == 0)echo("opacity: 0.6;")?>">
                                        <div class="segura_img">
                                            <img src="view/upload/<?=@$item->getVeiculo()->getFotos()[0][0]?>" style="   width: 100%; " alt="foto">
                                        </div>
                                        <div class="nome_veiculo">
                                        <?=@$item->getVeiculo()->getModelo()->getNome()?>
                                        <?php if($item->getStatus() == 0){?>
                                            <span style="color: red;">Reprovados</span>
                                        <?php }else if($item->getStatus() == 1){?>
                                            <span style="color: #2d2;">Aprovado</span>
                                        <?php }else{?>
                                            <span style="color: #414cd4;">Pendente</span>
                                        <?php } ?>
                                        </div>
                                        <label class="informacao">Horario: <?=@$item->getHorarioInicio()?></label><br>
                                        <label class="informacao">tipo de veículo: <?=@$item->getVeiculo()->getTipo()->getNome()?></label><br>
                                        <label class="informacao">Descrição:</label><br>
                                        <input type="text" class="informacao_text" value="<?=@$item->getDescricao()?>">
                                     </div>
                                <?php }?>
                             </div>
                     <?php } ?>
               <?php } ?>
               
                
                <!--<div class="segura_botoes">
                    <input class="btn" type="button" value="Previous">
                    <input class="btn" type="button" value="Next">
                </div>-->
                
            </div>
    </div>

<script>
        $(document).ready(function(){
              $('[name="hora_inicial"]').mask('99:99');
              $('[name="hora_final"]').mask('99:99');
              $('[name="data_inicial"]').mask('99/99/9999');
              $('[name="data_final"]').mask('99/99/9999');
        })
</script>
<script src="view/painel_usuario/anuncios/js/script.js"></script>

    

 