<?php 
    if (get_option('optionverification') == 200){
?>
                    <?php 
                    // check if the flexible content field has rows of data
                    if( have_rows('caixa_de_texto') ){
                         // loop through the rows of data
                        $cont = 0;
                        while ( have_rows('caixa_de_texto') ){
                            the_row(); 
                            $cont++;
                        ?>
                                <div class="caixas_texto" id="caixa<?php echo $cont ?>">
                                    <div class="container">
                                        <div class="row">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <h2 class="titulo_caixa_texto"><?php the_sub_field('titulo_da_caixa_de_texto'); ?></h2>
                                                    <div class="texto_caixa_texto"><?php the_sub_field('texto_da_caixa_de_texto'); ?></div>
                                                </div>
                                                <style>
                                                    #caixa<?php echo $cont ?>{
                                                        <?php if (get_sub_field('tipo_de_background_caixa') == 'cor'){ ?>
                                                        background-color: <?php the_sub_field('cor_caixa'); ?>;
                                                        <?php }else{ ?>
                                                        background-image: url(<?php the_sub_field('imagem_de_fundo_caixa'); ?>);
                                                        <?php } ?>
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <?php                    
                        }
                    }
                ?>
<?php } ?>