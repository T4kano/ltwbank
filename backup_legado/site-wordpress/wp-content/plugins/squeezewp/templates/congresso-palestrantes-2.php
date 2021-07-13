<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);

if (have_posts())
            the_post();

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>       
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>

    
    </head>
    <body class="sp-padrao congresso-palestrantes-2">
        <?php
        $back = get_field('background_da_pagina');

        $logo = get_field('logo_captura');

        $headline = strip_tags(get_field('headline_captura'), '<em><strong><span>');
        $subheadline = strip_tags(get_field('subheadline_'), '<em><strong><span>');

        // Configurações de cor e transparência
        $cor_box = get_field('cor_do_formulario');
        if ($cor_box == '')
            $cor_box = '#000000';
        $trans_box = get_field('transparencia');
        if($trans_box == '')
            $trans_box = 80;
        $trans_box = $trans_box / 100;
        $rgb = $squeeze->hex2rgb($cor_box);
        $rgba = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $trans_box . ')';

        $posicao = get_field('posicao_do_formulario');
        $mostrar_captura = get_field('mostrar_captura');
        $conteudo_footer = get_field('conteudo_do_rodape');

        $video_iframe = get_field('codigo_embed_');

        // Configurações de cor e transparência
        $cor_box = get_post_meta($id, 'cor_box', true);
        if ($cor_box == '')
            $cor_box = '#000000';
        $trans_box = get_post_meta($id, 'trans_box', true);
        if($trans_box == '')
            $trans_box = 80;
        $trans_box = $trans_box / 100;
        $rgb = $squeeze->hex2rgb($cor_box);
        $rgba = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $trans_box . ')';

        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        ?>
        <style>
            .sp-padrao{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
            <?php if ($cor_box <> '') { ?>
                .area-form-sp-padrao{
                    background: linear-gradient(to bottom, <?php echo $rgba; ?> 0%, <?php echo $rgba; ?> 100%);
                    background: -moz-linear-gradient(top, <?php echo $rgba; ?> 0%, <?php echo $rgba; ?> 100%);
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $rgba; ?>), color-stop(100%,<?php echo $rgba; ?>));
                    background: -webkit-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                    background: -o-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                    background: -ms-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                }
            <?php } ?>
        </style>
        <div id="barra-topo-congresso">
            <div class="container">
                <div class="col-md-4">
                    <img src="<?php echo $logo; ?>" />
                </div>
                <div class="col-md-8">
                    <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                </div>
            </div>
        </div>
        <div id="conteudo-congresso">
            <div class="container">
                <div class="row">
                    <h1>
                        <span class="sombra-titulo"><?php echo $headline; ?></span>
                    </h1>
                    <h2>
                        <span class="subtitulo"><?php echo $subheadline; ?></span>
                    </h2>
                    <?php
                        if ($posicao == 'esquerda'){ ?>

                        <div id="form-out" class="<?php squeezewp_get_animacao('animated flipInX'); ?> col-md-6 area-form-sp-padrao">
                        <div class="form">
                            <div class="head-form">
                                <?php
                                if ($form_modal)
                                    echo $texto_modal;
                                
                                else{
                                ?>
                                    <div class="col-md-12 codigo_embed">
                                        <?php echo $codigo_embed; ?>
                                    </div>
                                <?php
                                    echo $text_form;
                                }
                                ?>
                            </div>
                            <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $form_modal, $text_form, $icons); ?>
                            <?php echo $text_abaixo_form; ?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador-inner.php'); ?>
                        </div>
                    </div>
                    <div class="col-md-6" id="video-iframe">
                        <?php echo $video_iframe; ?>
                    </div>
                    <?php
                        }
                        else{ ?>
                        <div class="col-md-6" id="video-iframe">
                            <?php echo $video_iframe; ?>
                        </div>
                        <div id="form-out" class="<?php squeezewp_get_animacao('animated flipInX'); ?> col-md-6 area-form-sp-padrao">
                        <div class="form">
                            <div class="head-form">
                                <?php
                                if ($form_modal)
                                    echo $texto_modal;
                                
                                else{
                                ?>
                                    <div class="col-md-12 codigo_embed">
                                        <?php echo $codigo_embed; ?>
                                    </div>
                                <?php
                                    echo $text_form;
                                }
                                ?>
                            </div>
                            <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $form_modal, $text_form, $icons); ?>
                            <?php echo $text_abaixo_form; ?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador-inner.php'); ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <div id="informacoes-palestras">
            <div class="container omega">
                <div class="row">
                    <div class="col-md-12">
                        <h2>PALESTRANTES</h2>
                        <?php 
                        // check if the flexible content field has rows of data
                        if( have_rows('palestrantes') ){
                             // loop through the rows of data
                            $cont = 0;
                            while ( have_rows('palestrantes') ){
                                the_row(); 
                                $cont++;
                            ?>
                                <div class="col-md-3">
                                    <div class="palestra palestra-2">
                                    <div class="foto-palestrante">
                                    <?php
                                        if (get_sub_field('foto_palestrante') == '')
                                            $palestrante[2] = $theme_path . '/images/avatar.jpg';
                                    ?>
                                        <img src="<?php the_sub_field('foto_palestrante'); ?>" />
                                        
                                    </div>
                                    <div class="nome"><?php the_sub_field('nome_do_palestrante'); ?></div>
                                    <div class="biografia"><?php the_sub_field('biografia_do_palestrante'); ?></div>
                                    </div>
                                </div>
                                <?php if ($cont % 4 == 0 && $mostrar_captura){ ?>
                                <div class="row form-entre-datas">
                                    <div class="col-md-4 head-form head-form-entre-datas"><?php echo $text_form; ?></div>
                                    <div class="col-md-8 form-entre-datas">
                                    <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, 
                                        $text_privacidade, $form_modal, $text_form, $icons, $codigo_embed); ?>
                                    </div>
                                </div>
                                <?php } ?>
                        <?php                    
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer-congresso">
            <div class="container omega">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <div class="col-md-12">
                        <?php echo $conteudo_footer; ?>
                    </div>
                </div>
            </div>
        </footer>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $theme_path; ?>/js/fluidvids.js"></script>
        <script>
            fluidvids.init({
              selector: ['iframe', 'object'], // runs querySelectorAll()
              players: ['www.youtube.com', 'player.vimeo.com'] // players to support
            });
        </script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
</html>