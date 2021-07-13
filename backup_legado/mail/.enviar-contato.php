<?php
	
		$nome		=	$_POST['nome'];
		$telefone	=	$_POST['telefone'];
		$email		=	$_POST['email'];		
		$cpf		=	$_POST['cpf'];	

		
		$erro_mensagem2 = 'Estamos tendo problemas técnicos no momento, entre em contato por telefone.';		
		$erro_nome = 'Preencha o campo nome corretamente';
		$erro_email2 = 'Erro no email, verifique se o email está digitado corretamente';
		$erro_email = 'Preencha o campo email corretamente';
		$erro_telefone = 'Preencha o campo telefone corretamente';
		$erro_cpf = 'Preencha o campo CPF corretamente';
		
		require 'Recaptcha.php';

		$recaptcha = $_POST['g-recaptcha-response'];

		$object = new Recaptcha();
		$response = $object->verifyResponse($recaptcha);

		if(isset($response['success']) and $response['success'] != true) {
			echo "<script type='text/javascript' charset='utf-8'>alert('$erro_mensagem2');</script>";
			echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";
			exit();
		}elseif(empty($_POST['nome'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_nome');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          			 
			  exit();
		}elseif(empty($_POST['email'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_email');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
			  exit();		  
		}elseif(empty($_POST['telefone'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_telefone');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
			  exit();
		}elseif(empty($_POST['cpf'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_cpf');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
			  exit();		
		}

		$to = 'juliana.o.diani@gmail.com';	 							
							
		$subject = "Contato - LTW Bank";
		$headers = "From: contato@ltwbank.com.br \r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= "BCC: juliana.o.diani@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";
		
		$corpo   = "<p>Um usuário se inscreveu pelo formulário do seu site.</p> 						
					<p><b>Nome:</b> $nome</p>
					<p><b>CPF:</b> $cpf</p>																																	
					<p><b>Email:</b> $email</p>																																	
					<p><b>Telefone:</b> $telefone</p>																																																																																																																																																
					";
				
		mail($to, $subject, $corpo, $headers);	

		echo '<script type="text/javascript">window.location = "//ltwbank.com.br/obrigado";</script>';		
		Exit;	
									  		
?>