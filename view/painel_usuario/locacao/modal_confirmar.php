<?php 

    require_once('model/clienteClass.php');
    // Pegando o Cliente Logado
    if(!isset($_SESSION))session_start();
    $cliente = unserialize($_SESSION['cliente']);


    require_once("controller/controllerLocacao.php");

    $controller = new ControllerLocacao();

    $router = "router.php?controller=locacao&modo=SELECTALL";

    $locacao = $controller->select($_GET['id_locacao']);
?>
<div class="locacao-modal">
    <form class="locacao-modal-form" action="router.php?controller=LOCACAO&modo=CONFIRMAR&id_locacao=<?=@$locacao->getId()?>" 
            onsubmit="criar_transacao(this)" data-status="<?=@($cliente->getId()==$locacao->getId_cliente_locador()?1:0)?>">
            <div class="locacao-modal-form-titulo"> Confirmação e Pagamento!R$ <?=@$locacao->getSolicitacao()->getValorTotal($locacao->getAnuncio()->getValor())?> </div>
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
                    <?php if( $cliente->getId()  ==  $locacao->getId_cliente_locador() ){?>

                        <div class="caixa_campos">
                            <div class="campo_anuncios">
                                <label>N° Cartão : * </label>
                                <input name="n_card" required>
                            </div>
                            <div class="campo_anuncios">
                                <label> CVV Cartão : * </label>
                                <input name="cvv_card" required>
                            </div>
                        </div>
                        <div class="caixa_campos">
                            <div class="campo_anuncios">
                                <label> Data de Expiração:* </label>
                                <input  name="exp_data" required>
                            </div>
                            <div class="campo_anuncios">
                                <label>Nome no cartão:*</label>
                                <input name="nome_card" required>
                            </div>
                        </div>
                        <div class="caixa_campos">
                        <h5>Usuario Dono:</h5>
                        <div class="caixa_dados_usuario">
                            <img src="view/upload/<?=@$locacao->getAnuncio()->getLocador()->getFoto()?>" style=" width: 82px; border-radius: 65px; height: 82px; float: left;">
                            <label style=" height: 80px; vertical-align: middle; text-align: center; display: table-cell; padding-left: 10px;">
                                <?=@$locacao->getAnuncio()->getLocador()->getNome()?>
                                <?=@$locacao->getAnuncio()->getLocador()->getCelular()?>
                            </label>
                        </div>
                    

                    <?php } else { ?>

                            <div class="caixa_campos">
                                <div class="campo_anuncios">
                                    <label>H. Inicio: </label>
                                    <input value="<?=@$locacao->getSolicitacao()->getHora_inicial()?>" disabled>
                                </div>
                                <div class="campo_anuncios">
                                    <label> H. Final </label>
                                    <input value="<?=@$locacao->getSolicitacao()->getHora_final()?>" disabled>
                                </div>
                            </div>
                            <div class="caixa_campos">
                                <div class="campo_anuncios">
                                    <label> D. Inicio </label>
                                    <input value="<?=@$locacao->getSolicitacao()->getData_inicio()?>" disabled>
                                </div>
                                <div class="campo_anuncios">
                                    <label> D. Final </label>
                                    <input value="<?=@$locacao->getSolicitacao()->getData_final()?>" disabled>
                                </div>
                            </div>
                            <div class="caixa_campos">
                            <h5>Usuario locatario:</h5>
                            <div class="caixa_dados_usuario">
                                <img src="view/upload/<?=@$locacao->getSolicitacao()->getCliente()->getFoto()?>" style=" width: 82px; border-radius: 65px; height: 82px; float: left;">
                                <label style=" height: 80px; vertical-align: middle; text-align: center; display: table-cell; padding-left: 10px;">
                                    <?=@$locacao->getSolicitacao()->getCliente()->getNome()?>
                                    <?=@$locacao->getSolicitacao()->getCliente()->getCelular()?>
                                </label>
                            </div>
                            
                    <?php } ?>
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
                <button class="btn" type="submit"> Iniciar</button>
                <button class="btn" onclick="solicitacao_reprovar()"> Cancelar</button>
                
            </div>
    </form>
</div>
<script>
    window.cliente8342342 = <?=@json_encode($locacao->to_json())?>;
    $('input[name="exp_data"]').mask('99/99');

</script>
