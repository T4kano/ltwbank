<?php 
    $exibir = get_field('usar_depoimentos');
    if (get_option('optionverification') == 200 && $exibir){
        $qtde_colunas = get_field('quantidade_de_colunas');
        if ($qtde_colunas == 2)
            $class = 'col-md-6';    
        elseif($qtde_colunas == 3)
            $class = 'col-md-4';
        
        elseif($qtde_colunas == 4)
            $class = 'col-md-3';
        $cor_depoimentos = get_field('cor_depoimento');
        $back_depoimentos = get_field('imagem_fundo_depoimento');
?>
        <style>
            #depoimentos{
                <?php if ('tipo_de_background_depoimento' == 'cor'){ ?>
                background-color: <?php echo $cor_depoimentos; ?>;
                <?php }else{ ?>
                background-image: url(<?php echo $back_depoimentos; ?>);
                <?php } ?>
            }
        </style>
        <div id="depoimentos">
            <div class="container">
                <div class="row">
                    <div class='titulo-secao'><?php the_field('titulo_area_depoimentos'); ?></div>
                    <?php 
                    // check if the flexible content field has rows of data
                    if( have_rows('depoimentos') ){

                         // loop through the rows of data
                        while ( have_rows('depoimentos') ){
                            the_row();
                            if( get_row_layout() == 'depoimento_em_texto' ){ ?>
                                <div class="<?php echo $class; ?>">
                                    <div class="depoimento row">
                                        <div class="col-md-4"><img class="foto" src="<?php the_sub_field('foto'); ?>" /></div>
                                        <div class="col-md-8">
                                            <div class="nome"><?php the_sub_field('nome_depoimento'); ?></div>
                                            <div class="empresa"><?php the_sub_field('empresa'); ?></div>
                                            <div class="texto"><?php the_sub_field('texto_depoimento'); ?></div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                        }

                            elseif( get_row_layout() == 'depoimento_em_video' ){ ?>
                                <div class="<?php echo $class; ?>">
                                    <div class="depoimento row">
                                        <div class="video embed-container"><?php the_sub_field('video_depoimento'); ?></div>
                                        <div class="nome-empresa"><?php the_sub_field('nome_depoimento'); ?> | <?php the_sub_field('empresa'); ?></div>
                                    </div>
                                </div>
                    <?php
                            }
                        }

                    }
                    ?>
                </div>
            </div>
        </div>
<?php } ?>