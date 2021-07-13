<?php
/*
# usa esse codigo para exibir todos erros na hora de debugar
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
*/

/*
#usa esse aqui para exibir todos parametros enviados do html pro php
	echo "<PRE>";
	print_r($_REQUEST);
	echo "</PRE>";
	exit;
*/

		$nome		=	$_POST['nome'];
		$telefone	=	$_POST['telefone'];
		$email		=	$_POST['replyto'];	 // em vez de email o html tava mandando => replyto	
		$mensagem	=	$_POST['mensagem'];	
		$arquivo 	= 	$_FILES['arquivo'];
		
		$email_from = 'paulo@ltwbank.com.br';
		$to = 'paulo@ltwbank.com.br';	 							
		#$to = ' ';	 			
		
		$subject = "Trabalhe Conosco - LTW Bank";
		$quebra_linha = "\r\n";
		$boundary = "XYZ-" . date("dmYis") . "-ZYX";
		
		
		
		/*if( PATH_SEPARATOR ==';'){ 
			$quebra_linha="\r\n";
		} elseif (PATH_SEPARATOR==':'){ 
			$quebra_linha="\n";
		} elseif ( PATH_SEPARATOR!=';' and PATH_SEPARATOR!=':' ) {
			echo ('Esse script não funcionará corretamente neste servidor, a função PATH_SEPARATOR não retornou o parâmetro esperado.');
		}*/
		
		
		
		
		
		
		
		
		$erro_mensagem2 = 'Estamos tendo problemas técnicos no momento, entre em contato por telefone.';		
		$erro_nome = 'Preencha o campo nome corretamente';
		$erro_email = 'Preencha o campo email corretamente';
		$erro_telefone = 'Preencha o campo telefone corretamente';
		
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
		}elseif(empty($_POST['replyto'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_email');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
			  exit();		  
		}elseif(empty($_POST['telefone'])){
			  echo "<script type='text/javascript' charset='utf-8'>alert('$erro_telefone');</script>";		  		 
			  echo "<script type='text/javascript'>function goBack() {javascript: history.go(-1);}function timer() {setTimeout('goBack()', 0);}window.onload=timer;</script>";		          
			  exit();		
		}


					
							
		
		/* Cabeçalho da mensagem 
		
		$headers = "MIME-Version: 1.0\n";
		$headers.= "From:  paulo@ltwbank.com.br\n";
		$headers.= "Reply-To: ". $email . "\n";
		$headers.= "Content-Type: text/html; charset=utf-8\r\n";  
		$headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
		$headers.= "$boundary\n"; 
		 
 */


		$corpo   = "<p>Um usuário se inscreveu pelo formulário do seu site.</p> 						
					<p><b>Nome:</b> $nome</p>																									
					<p><b>Email:</b> $email</p>																																	
					<p><b>Telefone:</b> $telefone</p>
					<p><b>Mensagem:</b> $mensagem</p>																																																																																																																																																	
					";
				
		$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
		
		
	
		if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
			
			
			/*$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
			$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));
			$anexo = base64_encode($anexo);
			fclose($fp);
			$anexo = chunk_split($anexo);
			$mens .= "--$boundary" . $quebra_linha . "";
			$mens .= "Content-Transfer-Encoding: 8bits" . $quebra_linha . "";
			$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $quebra_linha . "" . $quebra_linha . ""; //plain
			$mens .= "$mensagem" . $quebra_linha . "";
			$mens .= "--$boundary" . $quebra_linha . "";
			$mens .= "Content-Type: ".$arquivo["type"]."" . $quebra_linha . "";
			$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"" . $quebra_linha . "";
			$mens .= "Content-Transfer-Encoding: base64" . $quebra_linha . "" . $quebra_linha . "";
			$mens .= "$anexo" . $quebra_linha . "";
			$mens .= "--$boundary--" . $quebra_linha . "";
			*/
			
			/*
			//envio o email com o anexo
			mail($to, $subject, $mens, $headers);
			echo"Email enviado com Sucesso!";*/
			$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); // Abri o arquivo enviado.
			$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); // Le o arquivo aberto na linha anterior
			$anexo = base64_encode($anexo); // Codifica os dados com MIME para o e-mail 
			fclose($fp); // Fecha o arquivo aberto anteriormente
			$anexo = chunk_split($anexo); // Divide a variável do arquivo em pequenos pedaços para poder enviar
			
			$headers = "MIME-Version: 1.0" . $quebra_linha . "";
			$headers .= "From: $email_from " . $quebra_linha . "";
			$headers .= "Return-Path: $email_from " . $quebra_linha . "";
			$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"" . $quebra_linha . "";
			$headers .= "$boundary" . $quebra_linha . "";
			$headers .= "BCC: juliana.o.diani@gmail.com \r\n";
			
				$mensagem= "--$boundary\n"; // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
				$mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
				$mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
				$mensagem.= "$corpo\n"; 
				$mensagem.= "--$boundary\n"; 
				$mensagem.= "Content-Type: ".$arquivo["type"]."\n";  
				$mensagem.= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";  
				$mensagem.= "Content-Transfer-Encoding: base64\n\n";  
				$mensagem.= "$anexo\n";  
				$mensagem.= "--$boundary--\r\n"; 
		
			mail($to, $subject, $mensagem, $headers);
			echo '<script type="text/javascript">window.location = "//ltwbank.com.br/obrigado";</script>';	
		}else{
			$headers = "MIME-Version: 1.0" . $quebra_linha . "";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha . "";
			$headers .= "From: $email_from " . $quebra_linha . "";
			$headers .= "Return-Path: $email_from " . $quebra_linha . "";
			//envia o email sem anexo
			mail($to, $subject, $corpo, $headers);
			echo '<script type="text/javascript">window.location = "//ltwbank.com.br/obrigado";</script>';	
		}

									  		
?>