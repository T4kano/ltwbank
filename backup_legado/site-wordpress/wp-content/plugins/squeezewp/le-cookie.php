<?php
	ob_start();
    $id_protecao = get_field('protecao_de_recompensa');
    $id_redir = get_field('pagina_de_direcionamento');
    $url_redirecionamento = get_permalink($id_redir);
	if(!isset($_COOKIE[$id_protecao]) && $id_protecao <> 0)
        echo '<meta http-equiv="refresh" content="0;URL=' . $url_redirecionamento .'">';
?>