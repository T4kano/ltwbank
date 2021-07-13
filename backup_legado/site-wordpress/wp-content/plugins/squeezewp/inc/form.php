<?php

$form = get_field('formulario_html');
$placeholder = get_field('rotulo_do_e-mail');
$exibir_campos = get_field('exibir_campos_alem_do_e-mail');
$optin = $squeeze->extrair_campos($form, $placeholder);
$rotulos = array();
$rotulos[] = get_field('rotulo_1');
$rotulos[] = get_field('rotulo_2');
$rotulos[] = get_field('rotulo_3');

$icons[] = get_field('icone_1');
$icons[] = get_field('icone_2');
$icons[] = get_field('icone_3');


$text_form = strip_tags(get_field('texto_acima_do_formulario'), '<em><strong><span>');
$text_privacidade = get_field('texto_de_privacidade');
$botao = get_field('cta');
$cor_botao = get_field('cor_cta');
$class_botao = $squeeze->get_classbotao($cor_botao);
$form_modal = get_field('2_passos');
$texto_modal = get_field('texto_acima_do_formulario_2_passo');
$botao_cta_modal = get_field('cta_2_passo');
$text_abaixo_form = strip_tags(get_field('texto_abaixo_do_formulario'), '<em><strong><span><a>');
$codigo_embed = get_field('html_adicional');

?>

<style>
	.btn{
    	background-color: <?php echo $cor_botao; ?>;
    }
</style>