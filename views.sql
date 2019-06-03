CREATE VIEW `view_num_locacao` AS
    SELECT 
        COUNT(`locacao`.`id_anuncio`) AS `numero_locacao`,
        `locacao`.`id_anuncio` AS `id_anuncio`
    FROM
        `tbl_locacao` `locacao`
    GROUP BY `locacao`.`id_anuncio`;

CREATE VIEW `view_anuncios` AS
    SELECT 
        IF(ISNULL(`avaliacao_servico`.`id_avaliacao_servico`),
            0,
            AVG(`avaliacao_servico`.`nota`)) AS `avaliacao`,
        `num_locacao`.`numero_locacao` AS `numero_locacao`,
        `anuncio`.`id_anuncio` AS `id_anuncio`,
        `tipo_veiculo`.`id_tipo_veiculo` AS `id_tipo_veiculo`,
        `marca_tipo`.`id_tipo_marca` AS `id_tipo_marca`,
        `modelo_veiculo`.`id_modelo` AS `id_modelo`,
        `cliente`.`nome_cliente` AS `locador`,
        `cliente`.`cpf` AS `cpf`,
        `cliente`.`telefone` AS `telefone`,
        `cliente`.`celular` AS `celular`,
        `cliente`.`cnh_foto` AS `cnh_foto`,
        `cliente`.`foto_cliente` AS `foto_cliente`,
        `cliente`.`rua` AS `rua`,
        `cliente`.`bairro` AS `bairro`,
        `cliente`.`cep` AS `cep`,
        `cliente`.`cidade` AS `cidade`,
        `cliente`.`complemento` AS `complemento`,
        `cliente`.`uf` AS `uf`,
        `cliente`.`email` AS `email`,
        `cliente`.`dt_nascimento` AS `dt_nascimento`,
        `veiculo`.`ano` AS `ano`,
        `veiculo`.`placa` AS `placa`,
        `veiculo`.`quilometragem` AS `quilometragem`,
        `veiculo`.`renavam` AS `renavam`,
        `tipo_veiculo`.`nome_tipo_veiculo` AS `nome_tipo_veiculo`,
        `foto_veiculo`.`nome_foto` AS `nome_foto`,
        `marca_veiculo`.`nome_marca` AS `nome_marca`,
        `modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `anuncio`.`data_inicial` AS `data_inicial`,
        `anuncio`.`data_final` AS `data_final`,
        `anuncio`.`descricao` AS `descricao`,
        `anuncio`.`horario_inicio` AS `horario_inicio`,
        `anuncio`.`horario_termino` AS `horario_termino`,
        `anuncio`.`valor_hora` AS `valor_hora`
    FROM
        (((((((((((`tbl_anuncio` `anuncio`
        JOIN `tbl_cliente` `cliente` ON ((`cliente`.`id_cliente` = `anuncio`.`id_cliente_locador`)))
        JOIN `tbl_veiculo` `veiculo` ON (((`veiculo`.`id_cliente` = `cliente`.`id_cliente`)
            AND (`veiculo`.`id_veiculo` = `anuncio`.`id_veiculo`))))
        JOIN `tbl_tipo_veiculo` `tipo_veiculo` ON ((`tipo_veiculo`.`id_tipo_veiculo` = `veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` `marca_veiculo` ON ((`marca_veiculo`.`id_marca_veiculo` = `veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` `modelo_veiculo` ON ((`veiculo`.`id_modelo_veiculo` = `modelo_veiculo`.`id_modelo`)))
        JOIN `tbl_marca_veiculo_tipo_veiculo` `marca_tipo` ON ((`marca_tipo`.`id_tipo_marca` = `modelo_veiculo`.`id_marca_tipo`)))
        JOIN `tbl_foto_veiculo` `foto_veiculo` ON ((`foto_veiculo`.`id_veiculo` = `veiculo`.`id_veiculo`)))
        JOIN `tbl_aprovacao_anuncio` `aprovacao_anuncio` ON ((`aprovacao_anuncio`.`id_anuncio` = `anuncio`.`id_anuncio`)))
        LEFT JOIN `tbl_locacao` `locacao` ON ((`locacao`.`id_anuncio` = `anuncio`.`id_anuncio`)))
        LEFT JOIN `tbl_avaliacao_servico` `avaliacao_servico` ON ((`locacao`.`id_locacao` = `avaliacao_servico`.`id_locacao`)))
        LEFT JOIN `view_num_locacao` `num_locacao` ON ((`num_locacao`.`id_anuncio` = `anuncio`.`id_anuncio`)))
    WHERE
        ((`cliente`.`status` = 1)
            AND (`aprovacao_anuncio`.`status_aprovacao` = 1))
    GROUP BY `anuncio`.`id_anuncio` , `num_locacao`.`id_anuncio`
    ORDER BY (AVG(`avaliacao_servico`.`nota`) > 4) DESC;
    
    
    CREATE VIEW `view_meus_veiculo` AS
    SELECT 
        `veiculo`.`ano` AS `ano`,
        `veiculo`.`placa` AS `placa`,
        `veiculo`.`quilometragem` AS `quilometragem`,
        `veiculo`.`renavam` AS `renavam`,
        `tipo_veiculo`.`nome_tipo_veiculo` AS `nome_tipo_veiculo`,
        `marca_veiculo`.`nome_marca` AS `nome_marca`,
        `modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `foto_veiculo`.`nome_foto` AS `nome_foto`,
        `veiculo`.`id_cliente` AS `id_cliente`
    FROM
        ((((`tbl_veiculo` `veiculo`
        JOIN `tbl_tipo_veiculo` `tipo_veiculo` ON ((`tipo_veiculo`.`id_tipo_veiculo` = `veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` `marca_veiculo` ON ((`marca_veiculo`.`id_marca_veiculo` = `veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` `modelo_veiculo` ON ((`modelo_veiculo`.`id_modelo` = `veiculo`.`id_modelo_veiculo`)))
        JOIN `tbl_foto_veiculo` `foto_veiculo` ON ((`foto_veiculo`.`id_veiculo` = `veiculo`.`id_veiculo`)))
    WHERE
        (`veiculo`.`id_cliente` = 1)
    GROUP BY `foto_veiculo`.`id_veiculo`;
    
    
    
    CREATE VIEW `view_tipo_marca` AS
    SELECT 
        `tbl_tipo_veiculo`.`id_tipo_veiculo` AS `id_tipo_veiculo`,
        `tbl_marca_veiculo_tipo_veiculo`.`id_marca_veiculo` AS `id_marca_veiculo`,
        `tbl_marca_veiculo_tipo_veiculo`.`id_tipo_marca` AS `id_tipo_marca`,
        `tbl_marca_veiculo`.`nome_marca` AS `nome_marca`
    FROM
        ((`tbl_tipo_veiculo`
        JOIN `tbl_marca_veiculo_tipo_veiculo` ON ((`tbl_marca_veiculo_tipo_veiculo`.`id_tipo_veiculo` = `tbl_tipo_veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` ON ((`tbl_marca_veiculo`.`id_marca_veiculo` = `tbl_marca_veiculo_tipo_veiculo`.`id_marca_veiculo`)))
    WHERE
        ((`tbl_marca_veiculo_tipo_veiculo`.`excluido` = 0)
            AND (`tbl_marca_veiculo`.`status` = 1));
            
CREATE VIEW `view_notificacoes` AS
    SELECT 
        `tbl_anuncio`.`id_cliente_locador` AS `id_locador`,
        `tbl_anuncio`.`valor_hora` AS `valor_hora`,
        `tbl_percentual`.`id_percentual` AS `id_percentual`,
        `tbl_solicitacao_anuncio`.`id_solicitacao_anuncio` AS `id_solicitacao_anuncio`,
        `tbl_solicitacao_anuncio`.`hora_final` AS `hora_final`,
        `tbl_solicitacao_anuncio`.`hora_inicial` AS `hora_inicial`,
        `tbl_solicitacao_anuncio`.`data_final` AS `data_final`,
        `tbl_solicitacao_anuncio`.`data_inicio` AS `data_inicio`,
        `tbl_solicitacao_anuncio`.`id_anuncio` AS `id_anuncio`,
        `tbl_solicitacao_anuncio`.`id_cliente` AS `id_locatario`,
        `tbl_solicitacao_anuncio`.`status_solicitacao` AS `status_solicitacao`,
        `tbl_solicitacao_anuncio`.`id_locacao` AS `id_locacao`,
        `tbl_cliente`.`nome_cliente` AS `nome_cliente`,
        `tbl_marca_veiculo`.`nome_marca` AS `nome_marca`,
        `tbl_modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `tbl_cliente`.`foto_cliente` AS `foto_cliente`
    FROM
        ((((((((`tbl_anuncio`
        JOIN `tbl_aprovacao_anuncio` ON ((`tbl_aprovacao_anuncio`.`id_anuncio` = `tbl_anuncio`.`id_anuncio`)))
        JOIN `tbl_veiculo` ON ((`tbl_anuncio`.`id_veiculo` = `tbl_veiculo`.`id_veiculo`)))
        JOIN `tbl_marca_veiculo` ON ((`tbl_marca_veiculo`.`id_marca_veiculo` = `tbl_veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` ON ((`tbl_modelo_veiculo`.`id_modelo` = `tbl_veiculo`.`id_modelo_veiculo`)))
        JOIN `tbl_marca_veiculo_tipo_veiculo` ON ((`tbl_marca_veiculo_tipo_veiculo`.`id_marca_veiculo` = `tbl_veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_solicitacao_anuncio` ON ((`tbl_solicitacao_anuncio`.`id_anuncio` = `tbl_anuncio`.`id_anuncio`)))
        JOIN `tbl_cliente` ON ((`tbl_cliente`.`id_cliente` = `tbl_solicitacao_anuncio`.`id_cliente`)))
        JOIN `tbl_percentual` ON ((`tbl_percentual`.`id_tipo_veiculo` = `tbl_veiculo`.`id_tipo_veiculo`)))
    WHERE
        ((`tbl_anuncio`.`excluido` = 0)
            AND (`tbl_solicitacao_anuncio`.`status_solicitacao` = 0))
    GROUP BY `tbl_solicitacao_anuncio`.`id_solicitacao_anuncio`;
    
    CREATE VIEW `view_andamento` AS
    SELECT 
        `tbl_locacao`.`id_locacao` AS `id_locacao`,
        `tbl_locacao`.`id_cliente_locador` AS `id_cliente_locador`,
        `tbl_locacao`.`id_anuncio` AS `id_anuncio`,
        `tbl_locacao`.`valor_locacao` AS `valor_locacao`,
        `tbl_locacao`.`id_percentual` AS `id_percentual`,
        `tbl_anuncio`.`id_cliente_locador` AS `locador`,
        `tbl_anuncio`.`valor_hora` AS `valor_hora`,
        `tbl_veiculo`.`ano` AS `ano`,
        `tbl_veiculo`.`placa` AS `placa`,
        `tbl_veiculo`.`quilometragem` AS `quilometragem`,
        `tbl_veiculo`.`renavam` AS `renavam`,
        `tbl_marca_veiculo`.`nome_marca` AS `nome_marca`,
        `tbl_modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `tbl_cliente`.`nome_cliente` AS `nome_cliente`,
        `tbl_cliente`.`telefone` AS `telefone`,
        `tbl_cliente`.`celular` AS `celular`,
        `tbl_cliente`.`foto_cliente` AS `foto_cliente`,
        `tbl_cliente`.`rua` AS `rua`,
        `tbl_cliente`.`bairro` AS `bairro`,
        `tbl_cliente`.`cidade` AS `cidade`,
        `tbl_cliente`.`uf` AS `uf`,
        `tbl_cliente`.`email` AS `email`,
        `tbl_solicitacao_anuncio`.`data_inicio` AS `data_inicio`,
        `tbl_solicitacao_anuncio`.`data_final` AS `data_final`,
        `tbl_solicitacao_anuncio`.`hora_inicial` AS `hora_inicial`,
        `tbl_solicitacao_anuncio`.`hora_final` AS `hora_final`
    FROM
        ((((((`tbl_locacao`
        JOIN `tbl_anuncio` ON ((`tbl_locacao`.`id_anuncio` = `tbl_anuncio`.`id_anuncio`)))
        JOIN `tbl_veiculo` ON ((`tbl_anuncio`.`id_veiculo` = `tbl_veiculo`.`id_veiculo`)))
        JOIN `tbl_marca_veiculo` ON ((`tbl_veiculo`.`id_marca_veiculo` = `tbl_marca_veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` ON ((`tbl_veiculo`.`id_modelo_veiculo` = `tbl_modelo_veiculo`.`id_modelo`)))
        JOIN `tbl_cliente` ON ((`tbl_locacao`.`id_cliente_locador` = `tbl_cliente`.`id_cliente`)))
        JOIN `tbl_solicitacao_anuncio` ON ((`tbl_solicitacao_anuncio`.`id_locacao` = `tbl_locacao`.`id_locacao`)))
    WHERE
        ((ISNULL(`tbl_locacao`.`data_hora_inicial`)
            AND ISNULL(`tbl_locacao`.`data_hora_final`)
            AND (`tbl_locacao`.`status_finalizado` = 0)
            AND (`tbl_solicitacao_anuncio`.`status_solicitacao` = 1)
            AND ISNULL(`tbl_locacao`.`aprovacao_locador`))
            OR ISNULL(`tbl_locacao`.`aprovacao_locatario`))
    
    
    