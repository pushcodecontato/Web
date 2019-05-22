<?php

    require_once('controller/controllerAnuncios.php');

    $controller  =  new ControllerAnuncios();

    $anuncio = $controller->getById($_GET['id']);

?>
    <div class="modal_anuncios">
        <div class="imagem">
            <img width="232" src="view/upload/<?=@$anuncio->getVeiculo()->getFotos()[0]?>" class="principalImagem">
            <div class="lista_imagens">
                <?php foreach($anuncio->getVeiculo()->getFotos() as $foto ){ ?>
                    <div class="item_imagem">
                        <img src="view/upload/<?=@$foto?>" onclick="anuncios_pendentes_modal_ver_imagem(this)">
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="descricao">
            <div class="caixa_inputs_anuncios">
                <div class="caixa_campos">
                    <div class="campo_anuncios">
                        <label>H. Inicio</label>
                        <input value="<?=@$anuncio->getHorarioInicio()?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>H. Final</label>
                        <input value="<?=@$anuncio->getHorarioTermino()?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <div class="campo_anuncios">
                        <label>D. Inicio</label>
                        <input value="<?=@$anuncio->getDataInicial()?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>D. Final</label>
                        <input value="<?=@$anuncio->getDataFinal()?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <div class="caixa_dados_avaliacao">
                        <h5> Status : 
                            <?php if($anuncio->getStatus() == 0){?>
                                <span style="color: red;">Reprovados</span>
                            <?php }else if($anuncio->getStatus() == 1){?>
                                <span style="color: #2d2;">Aprovado</span>
                            <?php }else{ ?>
                                <span style="color: #414cd4;">Pendente</span>
                            <?php } ?>
                         </h5>
                        <textarea placeholder="Descrição" disabled><?=@$anuncio->getMenssagem()?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="descricao_veiculo_anuncios">
            <div class="caixas_veiculo_anuncios">
                <div class="item_caixa_veiculo">
                    <label> Ano </label>
                    <input value="<?=@$anuncio->getVeiculo()->getAno()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Placa </label>
                    <input value="<?=@$anuncio->getVeiculo()->getPlaca()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Quilometragem </label>
                    <input value="<?=@$anuncio->getVeiculo()->getQuilometragem()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Modelo </label>

                        <input value="<?=@$anuncio->getVeiculo()->getModelo()->getNome()?>" disabled>

                </div>
                <div class="item_caixa_veiculo">
                    <label> Tipo </label>
                        <input value="<?=@$anuncio->getVeiculo()->getTipo()->getNome()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Marca </label>
                        <input value="<?=@$anuncio->getVeiculo()->getMarca()->getNome()?>" disabled>
                </div>
            </div>
        </div>
        <div class="caixa_aprovacao">
             <button onclick="anuncio_delete(<?=@$_GET['id']?>)"> Cancelar Anuncio</button>
        </div>
    </div>