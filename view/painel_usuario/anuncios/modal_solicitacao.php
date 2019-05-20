<?php

    require_once('controller/controllerSolicitarAnuncio.php');

    $controller  =  new ControllerSolicitacaoAnuncio();

    $solicitacao = $controller->selectById($_GET['id']);

?>
    <div class="modal_anuncios">
        <div class="imagem">
            <img width="232" src="view/upload/<?=@$solicitacao->getAnuncio()->getVeiculo()->getFotos()[0]?>" class="principalImagem">
            <div class="lista_imagens">
                <?php foreach($solicitacao->getAnuncio()->getVeiculo()->getFotos() as $foto ){ ?>
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
                        <input value="<?=@$solicitacao->getHora_inicial()?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>H. Final</label>
                        <input value="<?=@$solicitacao->getHora_final()?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <div class="campo_anuncios">
                        <label>D. Inicio</label>
                        <input value="<?=@$solicitacao->getData_inicio()?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>D. Final</label>
                        <input value="<?=@$solicitacao->getData_final()?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <h5>Usuario:</h5>
                    <div class="caixa_dados_usuario">
                        <img src="view/upload/<?=@$solicitacao->getCliente()->getFoto()?>" style=" width: 82px; border-radius: 65px; height: 82px; float: left;">
                        <label style=" height: 80px; vertical-align: middle; text-align: center; display: table-cell; padding-left: 10px;">
                            <?=@$solicitacao->getCliente()->getNome()?>
                            <?=@$solicitacao->getCliente()->getCelular()?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="descricao_veiculo_anuncios">
            <div class="caixas_veiculo_anuncios">
                <div class="item_caixa_veiculo">
                    <label> Ano </label>
                    <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getAno()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Placa </label>
                    <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getPlaca()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Quilometragem </label>
                    <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getQuilometragem()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Modelo </label>

                        <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getModelo()->getNome()?>" disabled>

                </div>
                <div class="item_caixa_veiculo">
                    <label> Tipo </label>
                        <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getTipo()->getNome()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Marca </label>
                        <input value="<?=@$solicitacao->getAnuncio()->getVeiculo()->getMarca()->getNome()?>" disabled>
                </div>
            </div>
        </div>
        <div class="caixa_aprovacao">
            <?php if($solicitacao->getStatus_solicitacao() < 1 ){?>
                <button onclick="solicitacao_aprovar(<?=@$_GET['id']?>)"> Aprovar</button>
                <button onclick="solicitacao_reprovar(<?=@$_GET['id']?>)"> Reprovar</button>
            <?php } ?>
        </div>
    </div>