<?php
    $scripts = get_option('scripts_squeeze_wp');
    echo stripslashes($scripts);
    $scripts_page = get_field('scripts');
    echo htmlspecialchars_decode(stripslashes($scripts_page));
?>
