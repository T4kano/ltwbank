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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <title><?php the_title(); ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>    
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
    </head>
    <body class="page-entrega-video-1">
        <div class="overlay"></div>
        <?php
        $back = get_field('background_da_pagina');

        $headline = get_field('headline_');
        $subheadline = get_field('subheadline_');
        $video = get_field('codigo_embed_video');
        
        $botao = get_field('cta');
        $cor_botao = get_field('cor_do_botao');
        $link = get_field('link_botao');
        
        ?>
        <style>
            .page-entrega-video-1{
        <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
        <?php } ?>
            }
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
                    <h1><?php echo $headline; ?></h1>
                    <h2><?php echo $subheadline; ?></h2>
                    <div class="video col-md-8 col-md-offset-2"><?php echo $video; ?></div>
                    <div class="col-md-6 col-md-offset-3">
                        <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        <?php if($botao <> ''){ ?>
                            <a href="<?php echo $link; ?>" class="btn"><?php echo $botao; ?></a>
                        <?php }?>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $theme_path; ?>/js/jquery.backstretch.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
        <script src="<?php echo $theme_path; ?>/js/fluidvids.js"></script>
        <script>
            fluidvids.init({
              selector: ['iframe', 'object'], // runs querySelectorAll()
              players: ['www.youtube.com', 'player.vimeo.com'] // players to support
            });
        </script>
    </body>
    <div id="fb-root"></div>
    <!-- Posicione esta tag depois da última tag do widget. -->

</html>
