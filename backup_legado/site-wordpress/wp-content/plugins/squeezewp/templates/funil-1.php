<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
		if (have_posts())
            the_post();
        require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php');
    	//proteção de recompensa
        $url_confirmacao = get_field('protecao_de_recompensa');
        $url_redirecionamento = get_field('pagina_de_direcionamento');
		if (isset($_GET['hash'])){
            if ($url_confirmacao <> '' && md5($id) <> $_GET['hash'])
    		    require_once(plugin_dir_path(__FILE__) . '../le-cookie.php');
    		else{
    			$id_protecao = explode('|', $url_confirmacao);
            	$id_protecao = $id_protecao[0];
    			setcookie($id_protecao, 'true', time() + 17280000000, "/");
    			echo '<META http-equiv="refresh" content="0;URL=' . get_permalink($id) . '?video=' . $_GET['video'] .'">';
    		}
        }
		if(isset($_COOKIE[@$id_protecao]) || @$id_protecao == 0 || md5($id) == $_GET['hash']){
		?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <body class="funil-1">
        <?php
        
        $back = get_field('background_da_pagina');
        $logo = get_field('logo_captura');
        $url_comentarios = get_field('url_de_comentarios');

        // check if the flexible content field has rows of data
            if( have_rows('videos') ){
                // loop through the rows of data
                $cont = 0;
                $format = 'd/m/Y H:i';
                $now   = new DateTime;
                $continua = true;
                while ( have_rows('videos') ){
                    the_row(); 
                    $cont++;
                    $dataFormat = DateTime::createFromFormat($format, get_sub_field('data_do_video'));
                    $interval = date_diff($dataFormat, $now);
                    if ($interval->invert == 0 && $continua){
                        $video = get_sub_field('embed_do_video');
                        $tempo = get_sub_field('tempo_botao');
                        $cta = '<div class="row">
                                <div class="' . squeezewp_get_animacao("animated zoomIn", false) . ' col-md-6 col-md-offset-3" id="botao-compra">
                                    <a href="' . get_sub_field('link_botao') .'" class="btn">' . get_sub_field('cta') . '</a>
                                </div>
                            </div>
                            <style>
                                .btn{
                                    background-color: ' . get_sub_field('cor_cta') . ';
                                    color: white;
                                }
                                .btn:hover{
                                    color: white;
                                }
                            </style>';
                    }
                    if (isset($_GET['video'])){
                        if ($_GET['video'] == $cont)
                            $continua = false;
                    }
                }
            }


        ?>
        <style>
            .funil-1{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
        </style>
        <style>
            #botao-compra{
                animation-duration: 2s;
                animation-delay: <?php echo $tempo; ?>s;
                animation-iteration-count: 1;
                -webkit-animation-duration: 2s;
                -webkit-animation-delay: <?php echo $tempo; ?>s;
                -webkit-animation-iteration-count: 1;
                -moz-animation-duration: 2s;
                -moz-animation-delay: <?php echo $tempo; ?>s;
                -moz-animation-iteration-count: 1;
            }
        </style>
        <div class="navigation">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-4">
        				<img src="<?php echo $logo; ?>" />
        			</div>
            		<div class="col-md-8">
                        <?php
                        // check if the flexible content field has rows of data
                        if( have_rows('videos') ){
                            // loop through the rows of data
                            $cont = 0;
                            $format = 'd/m/Y H:i';
                            $now   = new DateTime;
                            while ( have_rows('videos') ){
                                the_row(); 
                                $cont++;
                                $dataFormat = DateTime::createFromFormat($format, get_sub_field('data_do_video'));
                                $interval = date_diff($dataFormat, $now); ?>
                                <div class="col-md-3 nav <?php if ($interval->invert == 1) echo 'em-breve'; ?>">
                                    <?php if ($interval->invert == 0){ ?><a href="?video=<?php echo $cont; ?>"><?php } ?>
                                    <img src="<?php the_sub_field('miniatura_do_video') ?>" />
                                    <h2><?php the_sub_field('titulo_do_video'); ?></h2>
                                    <?php 
                                        if ($interval->invert == 0){ ?></a><?php } ?>
                                </div>

                        <?php
                            }
                        }
                        ?>
            		</div>
            	</div>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="row">
                	<div class="col-md-10 col-md-offset-1 video">
                		<?php echo $video; ?>
                	</div>
                    <?php echo $cta; ?>
                	<div class="clearfix"></div>
				<?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
				<div class="div-comentarios">
					<h2 class="titulo-comentarios">Deixe seu comentário...</h2>
                	<div class="col-md-3 col-md-offset-8" id="div-atualizar-comentarios"><button class="btn btn-primary" id="atualizar-comentarios"> Atualizar Comentários <i class="fa fa-refresh"></i></button></div>
                	<div class="fb-comments" data-href="<?php echo $url_comentarios; ?>" data-width="750" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>
            <script>
            jQuery('#atualizar-comentarios').click(function() {
                FB.XFBML.parse();
            });
        
        </script>

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
    <?php } ?>
</html>
