<?php
	$nome		=	$_POST['nome'];
	$telefone	=	$_POST['telefone'];
	$email		=	$_POST['email'];		
	$mensagem		=	$_POST['mensagem'];	
		
	$erro_mensagem2 = 'Estamos tendo problemas técnicos no momento, entre em contato por telefone.';		
	$erro_nome = 'Preencha o campo nome corretamente';
	$erro_email2 = 'Erro no email, verifique se o email está digitado corretamente';
	$erro_email = 'Preencha o campo email corretamente';
	$erro_telefone = 'Preencha o campo telefone corretamente';

	require 'recaptcha.php';

	$recaptcha = $_POST['g-recaptcha-response'];
	$object = new Recaptcha();
	$response = $object->verifyResponse($recaptcha);

	if(isset($response['success']) and $response['success'] != true) {
		echo "<script type='text/javascript' charset='utf-8'>alert('$erro_mensagem2');</script>";
		echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";
		exit();
	} elseif(empty($_POST['nome'])) {
		echo "<script type='text/javascript' charset='utf-8'>alert('$erro_nome');</script>";		  		 
		echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          			 
		exit();
	} elseif(empty($_POST['email'])) {
		echo "<script type='text/javascript' charset='utf-8'>alert('$erro_email');</script>";		  		 
		echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
		exit();		  
	} elseif(empty($_POST['telefone'])) {
		echo "<script type='text/javascript' charset='utf-8'>alert('$erro_telefone');</script>";		  		 
		echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
		exit();		
	}
		
	$apiKey = '9a6db0b1b3235c5f550a9b4ab995d6e2-us1';
	$listID = 'c3b4850007';
			
	// MailChimp API URL
	$memberID = md5(strtolower($email));
	$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
			
	// Member information
	$json = json_encode([
		'email_address' 	=> $email,
		'status'        	=> 'subscribed',
		'merge_fields'  	=> [
			'NOME'      	=> $nome,
			'TELEFONE'		=> $telefone,
			'MENSAGEM'		=> $mensagem
		]
	]); 
			
	// Send a HTTP POST request with curl
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	$result = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	//	$to = 'juliana.o.diani@gmail.com';	 
	$to = 'paulo@ltwbank.com.br';	 
							
	$subject = "Contato - LTW Bank";
	$headers = "From: contato@ltwbank.com.br \r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	
	$corpo =
		"<p>Um usuário se inscreveu pelo formulário do seu site.</p>
		<p><b>Nome:</b> $nome</p>
		<p><b>Email:</b> $email</p>
		<p><b>Telefone:</b> $telefone</p>
		<p><b>Mensagem:</b> $mensagem</p>"
	;
				
	mail($to, $subject, $corpo, $headers);	

	echo '<script type="text/javascript">window.location = "//ltwbank.com.br/obrigado";</script>';		
	Exit;	
?>
