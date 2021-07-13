<?php
    if (get_option('optionverification') == 200){
    	$css = get_option('scripts_squeeze_wp');
    	$css .= get_field('css');
?>
<style>
    <?php echo $css; ?>
</style>
    <?php } ?>