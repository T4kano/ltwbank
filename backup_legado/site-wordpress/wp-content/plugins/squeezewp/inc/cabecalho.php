<?php 
    $usar_cabecalho = get_field('exibir_cabecalho');
    if($usar_cabecalho) {
        $cor_cabecalho = get_field('cor_cabecalho');
        $logo = get_field('logo_captura');
        $usar_menu = get_field('exibir_menu');
        $usar_depoimentos = get_field('usar_depoimentos');
        $titulo_depoimentos = get_field('titulo_da_secao_menu');
        $usar_rodape = get_field('exibir_rodape');
        $titulo_rodape = get_field('titulo_da_secao_rodape');
?>
        <style>
            #cabecalho{
                background-color: <?php echo $cor_cabecalho; ?>;
            }
        </style>
        <div id="cabecalho">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" id="logo">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <?php
                        if ($usar_menu){
                    ?>
                    <div class="col-md-8" id="menu-superior">
                    <ul>
                        <li><a href="#">Início</a></li>
                        <?php 
                    // check if the flexible content field has rows of data
                    if( have_rows('caixa_de_texto') ){
                         // loop through the rows of data
                        $cont = 0;
                        while ( have_rows('caixa_de_texto') ){
                            the_row();
                            $cont++; 
                            if (get_sub_field('exibir_no_menu_caixa')){
                    ?>
                        <li><a href="#caixa<?php echo $cont; ?>"><?php echo strip_tags(get_sub_field('titulo_da_caixa_de_texto')); ?></a></li>            
                <?php
                            }                    
                        }
                    }
                ?>
                        <?php if ($usar_depoimentos == '1' && $titulo_depoimentos <> ''){ ?>
                            <li><a href="#depoimentos"><?php echo $titulo_depoimentos; ?></a></li>
                        <?php } ?>
                        <?php if ($usar_rodape == '1' && $titulo_rodape <> ''){ ?>
                        <li><a href="#footer"><?php echo $titulo_rodape; ?></a></li>
                        <?php } ?>
                    </ul>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php } ?>