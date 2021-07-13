<?php
$descricao = get_field('descricao_da_pagina');
?>
<!-- tags do facebook -->
<meta property="og:locale" content="pt_BR" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:description" content="<?php echo strip_tags($descricao); ?>" />
<meta property="og:image" content="<?php echo get_field('thumbnail'); ?>" />
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="<?php echo get_field('icone'); ?>" />