<?php
//require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
if (have_posts())
    the_post();
?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
        $tipoBack = get_field('tipo_de_background');
        if ($tipoBack == 'imagens'){
            $images = get_field('background_da_pagina');
            if (count($images) == 1){
                $classBody = 'sp-padrao';
                foreach($images as $image){
                    $back = $image['url'];
                }
        ?>
        <style>
            .sp-padrao{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
        </style>
        <?php
            }
            else{
                $classBody = 'sp-back-animado';
                foreach($images as $image){
                    $backs[] = $image['url'];
                }
                $cont = count($backs);
        ?>
        <link href="<?php echo $theme_path; ?>/css/back-animado.css" rel="stylesheet">
        <style>
            .cb-slideshow li span {
                -webkit-animation: imageAnimation <?php echo $cont * 6; ?>s linear infinite 0s;
                -moz-animation: imageAnimation <?php echo $cont * 6; ?>s linear infinite 0s;
                -o-animation: imageAnimation <?php echo $cont * 6; ?>s linear infinite 0s;
                -ms-animation: imageAnimation <?php echo $cont * 6; ?>s linear infinite 0s;
                animation: imageAnimation <?php echo $cont * 6; ?>s linear infinite 0s;
            }

            <?php
            for ($i = 0; $i < $cont; $i++) {
                ?>
                .cb-slideshow li:nth-child(<?php echo $i + 1; ?>) span {
                    background-image: url(<?php echo $backs[$i]; ?>);
                    -webkit-animation-delay: <?php echo $i * 6; ?>s;
                    -moz-animation-delay: <?php echo $i * 6; ?>s;
                    -o-animation-delay: <?php echo $i * 6; ?>s;
                    -ms-animation-delay: <?php echo $i * 6; ?>s;
                    animation-delay: <?php echo $i * 6; ?>s;
                }
            <?php } ?>

        </style>
        <ul class="cb-slideshow">
            <?php
            for ($i = 0; $i < $cont; $i++) {
                ?>
                <li><span></span></li>
            <?php } ?>
        </ul>
        <?php
            }
        }
        elseif($tipoBack == 'video'){
            $urlvideo = get_field('video_background');
            $urlvideo = explode('watch?v=', $urlvideo);
            $urlvideo = explode('&', $urlvideo[1]);
            $urlvideo = '//www.youtube.com/embed/' . $urlvideo[0];
            $classBody = 'sp-video-background';
        ?>
        <div style="position: fixed; z-index: -99; width: 100%; height: 117%">
            <iframe width="100%"  height="100%" src="<?php echo $urlvideo; ?>?wmode=opaque&amp;showinfo=0&amp;autoplay=1&amp;controls=0&amp;modestbranding=1&amp;rel=0&amp;hd=1" frameborder="0" allowfullscreen=""></iframe>
        </div>
        <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
           
        </div>
        <?php
        }
        ?>
    </head>
    <body class="<?php echo $classBody; ?>">
        <?php       
        $headline = get_field('headline_captura');
        $posicao = get_field('posicao_do_formulario');

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

        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        
        $botao = get_field('cta');
        $link = get_field('link');
        $cor_botao = get_field('cor_cta_2');
        ?>
        <style>
            .sp-padrao{
                background-image: url(<?php echo $back; ?>);
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
            .btn{
                background-color: <?php echo $cor_botao; ?>;
                color: #fff;
            }
            .btn:hover{
                color: #fff;
            }   
        </style>
        
        <div class="">
            <div class="container">
                <div class="row">
                    <div id="form-out" class="<?php squeezewp_get_animacao('animated flipInX'); ?> col-md-6 <?php echo $squeeze->get_posicao($posicao); ?> area-form-sp-padrao">
                        <h1><?php echo $headline; ?></h1>
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
                            <?php if($botao <> ''){ ?>
                            <a href="<?php echo $link; ?>" class="btn"><?php echo $botao; ?> <i class="fa fa-mail-forward"></i></a>
                        <?php }?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <div class="text_abaixo_form col-md-6 <?php echo $squeeze->get_posicao($posicao); ?>"><?php echo $text_abaixo_form; ?></div>
            </div>
        </div>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
</html>
