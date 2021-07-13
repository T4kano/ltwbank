<?php
//require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>	
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
    </head>
    <body class="sp-padrao-3">
        <?php
        if (have_posts())
            the_post();
        $headline = strip_tags(get_field('headline_'), '<em><strong><span>');;
        $back = get_field('background_da_pagina');
        $logo = get_field('logo_');
        $rodape = get_field('texto_do_rodape');

        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');

        ?>
        <style>
            .sp-padrao-3{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
                padding-top: 50px;
            }
            .sp-padrao-3 h1{
                color: white;
                text-align: center;
                font-size: 30px;
            }
            .sp-padrao-3 .logo{
                text-align: center;
                margin-bottom: 10px;
            }
            .sp-padrao-3 img{
                max-width: 300px;
            }
            .sp-padrao-3 .privacy, .sp-padrao-3 .head-form{
                text-align: center;
            }
        </style>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 logo">
                        <img class="logo" src="<?php echo $logo; ?>" />
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <h1><?php echo $headline; ?></h1>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
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
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text_abaixo_form black"><?php echo $text_abaixo_form; ?></div>  
                    </div>

                </div>

            </div>

        </div>

        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <div class="col-md-10 col-md-offset-1">
            <?php echo $rodape; ?><
        </div>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>

    </body>

</html>
