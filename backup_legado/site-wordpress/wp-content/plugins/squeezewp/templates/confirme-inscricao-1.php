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
    <body class="confirme-inscricao-1">
        <?php
        if (have_posts())
            the_post();
        $headline = get_field('headline_');
        $cor = get_field('cor_do_cabecalho');

        ?>
        <style>
            .confirme-inscricao-1 #header{
                background-color: <?php echo $cor; ?>;
            }
        </style>
        <div id="header">
            <div class="container">
                <h1><?php echo $headline; ?></h1>
            </div>
        </div>
        <div class="">
            <div class="container inside">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                    <?php 
                    // check if the flexible content field has rows of data
                    if( have_rows('passos') ){
                         // loop through the rows of data
                        $cont = 0;
                        while ( have_rows('passos') ){
                            the_row(); 
                            $cont++;
                        ?>
                                <div class="step margin-20 <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="step<?php echo $cont ?>">
                                    <div class="step-1"><?php echo $cont; ?></div>
                                    <div class="title-step"><?php the_sub_field('titulo_passo'); ?></div>
                                    <div class="subtitle-step"><?php the_sub_field('texto_passo'); ?></div>
                                </div>
                    <?php                    
                        }
                    }
                    ?>
                    </div>

                </div>

            </div>

        </div>

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>

    </body>

</html>
