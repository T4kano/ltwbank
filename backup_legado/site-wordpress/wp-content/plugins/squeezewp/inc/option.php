<?php
function verificaLicenca($key){
    $domain = $_SERVER['SERVER_NAME'];
    $request_url = "http://mb3.squeezewp.com/wp-content/themes/membros/verificador.php?domain=" . $domain . "&var=" . $key;
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $request_url);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($curl_handle, CURLOPT_TIMEOUT, 0);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);  
    curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
    curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
    $JsonResponse = curl_exec($curl_handle);
    $http_code = curl_getinfo($curl_handle);
    update_option('optionverification', $JsonResponse);
}

function exibirMensagens(){
$key = get_option('key_squeeze_wp');
if ($key == ""){
    $msg = "A versão GRÁTIS está ativada, caso queira ativar as funcionalidades PREMIUM, <a target='blank' href='http://squeezewp.com/premium/'>CLIQUE AQUI</a>";
    $class = 'alert-danger';
}
else{
    if (get_option('optionverification') == '200'){
        $msg = "Sua licença está ATIVA. Aproveite o mais simples e prático criador de páginas de captura.";
        $class = 'alert-success';
    }
    elseif(get_option('optionverification') == '500'){
        $msg = "Esse usuário não existe na nossa base de dados. A versão GRÁTIS está ativada, caso queira ativar as funcionalidades PREMIUM, <a target='blank' href='http://squeezewp.com/premium/'>CLIQUE AQUI</a>";
        $class = 'alert-danger';
    }
    elseif(get_option('optionverification') == '501'){
        $msg = "Esse usuário está inativo (isso significa que ou cancelou a assinatura ou está com pagamento em atraso). A versão GRÁTIS foi ativada, caso queira ativar as funcionalidades PREMIUM, <a target='blank' href='http://squeezewp.com/premium/'>CLIQUE AQUI</a>";
        $class = 'alert-danger';
    }
    elseif(get_option('optionverification') == '601'){
        $msg = "O domínio da licença é diferente do domínio do site. A versão GRÁTIS foi ativada, caso queira ativar as funcionalidades PREMIUM, <a target='blank' href='http://squeezewp.com/premium/'>CLIQUE AQUI</a>";
        $class = 'alert-danger';
    }
    elseif(get_option('optionverification') == '601'){
        $msg = "Este site não está cadastrado em nossa base. A versão GRÁTIS foi ativada, caso queira ativar as funcionalidades PREMIUM, <a target='blank' href='http://squeezewp.com/premium/'>CLIQUE AQUI</a>";
        $class = 'alert-danger';
    }
    elseif(get_option('optionverification') == '602'){
        $msg = "Nosso servidor não conseguiu identificar o seu domínio. A versão GRÁTIS foi ativada, caso tenha uma licença válida, entre em contato enviando um e-mail para meajuda@jairrebello.com";
        $class = 'alert-danger';
    }
    else{
        $msg = "Algo deu errado na ativação da sua licença, tente realizar a ativação novamente!";
        $class = 'alert-danger';
    }
}
$retorno[] = $msg;
$retorno[] = $class;
return $retorno;
}
$dominio = get_bloginfo('url');
?>