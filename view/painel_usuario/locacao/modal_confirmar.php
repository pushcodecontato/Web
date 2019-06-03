<?php 
    
    require_once("controller/controllerLocacao.php");

    $controller = new ControllerLocacao();

    $router = "router.php?controller=locacao&modo=SELECTALL";

    $locacao = $controller->select($_GET['id_locacao']);
?>
<div class="locacao-modal">
    <form class="locacao-modal-form">
            <div class="locacao-modal-form-titulo"> Confirmação e Pagamento! </div>
            <div class="imagem">
                <img width="232" src="view/upload/<?=@$locacao->getAnuncio()->getVeiculo()->getFotos()[0]?>" class="principalImagem">
                <div class="lista_imagens">
                    <?php foreach($locacao->getAnuncio()->getVeiculo()->getFotos() as $foto ){ ?>
                        <div class="item_imagem">
                            <img src="view/upload/<?=@$foto?>" onclick="locacao_modal_ver_imagem(this)">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="descricao">
                <div class="caixa_inputs_anuncios">
                    <div class="caixa_campos">
                        <div class="campo_anuncios">
                            <label>N° Cartão : * </label>
                            <input  >
                        </div>
                        <div class="campo_anuncios">
                            <label> CVV Cartão : * </label>
                            <input  >
                        </div>
                    </div>
                    <div class="caixa_campos">
                        <div class="campo_anuncios">
                            <label> Valor Total </label>
                            <input  >
                        </div>
                        <div class="campo_anuncios">
                            <label>D. Final</label>
                            <input value="<?=@$locacao->getSolicitacao()->getData_final()?>" >
                        </div>
                    </div>
                    <div class="caixa_campos">
                        <h5>Usuario:</h5>
                        <div class="caixa_dados_usuario">
                            <img src="view/upload/<?=@$locacao->getAnuncio()->getLocador()->getFoto()?>" style=" width: 82px; border-radius: 65px; height: 82px; float: left;">
                            <label style=" height: 80px; vertical-align: middle; text-align: center; display: table-cell; padding-left: 10px;">
                                <?=@$locacao->getAnuncio()->getLocador()->getNome()?>
                                <?=@$locacao->getAnuncio()->getLocador()->getCelular()?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="descricao_veiculo_anuncios">
                <div class="caixas_veiculo_anuncios">
                    <div class="item_caixa_veiculo">
                        <label> Ano </label>
                        <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getAno()?>" disabled>
                    </div>
                    <div class="item_caixa_veiculo">
                        <label> Placa </label>
                        <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getPlaca()?>" disabled>
                    </div>
                    <div class="item_caixa_veiculo">
                        <label> Quilometragem </label>
                        <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getQuilometragem()?>" disabled>
                    </div>
                    <div class="item_caixa_veiculo">
                        <label> Modelo </label>

                            <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getModelo()->getNome()?>" disabled>

                    </div>
                    <div class="item_caixa_veiculo">
                        <label> Tipo </label>
                            <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getTipo()->getNome()?>" disabled>
                    </div>
                    <div class="item_caixa_veiculo">
                        <label> Marca </label>
                            <input value="<?=@$locacao->getAnuncio()->getVeiculo()->getMarca()->getNome()?>" disabled>
                    </div>
                </div>
            </div>
            <div class="caixa_aprovacao">
                <button class="btn" onclick="solicitacao_aprovar()"> Iniciar</button>
                <button class="btn" onclick="solicitacao_reprovar()"> Cancelar</button>
                
            </div>
    </form>
</div>
