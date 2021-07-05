<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Abrir Conta | LTW Bank - O Banco 100% Digital - Abra sua conta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Abra a sua conta no LTW Bank, comece preenchendo seus dados no formulário ou baixe nosso aplicativo!">
	<meta name="author" content="Juliana Diani">
	
	<?php  include_once('includes/head.php')?>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
		<script>
			   function envia() {
				 document.getElementById("demo-form").submit();
			   }
		</script>

</head>
<body>
	<div class="content-wrapper">
		
		<?php  include_once('includes/menu.php')?>
		
		<div class="parallax mt-45" data-parallax-img="images/contato-bg.jpg" data-parallax-img-width="1920" data-parallax-img-height="1364">
			<div class="container inner">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-5">
								<h1 class="heading color-white">Abrir sua conta é muito simples!</h1>
								<p class="lead larger color-white">Comece preenchendo seus dados no formulário ao lado ou baixe nosso aplicativo! </p>	 
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="color-white">App na Google Play:</h5>
                                        <a href="em-breve"><img src="images/qr-code.png" class="qr-code-size3 suave-up" alt="Google Play" /></a>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5 class="color-white">App na Apple Store:</h5>
                                        <a href="em-breve"><img src="images/qr-code.png" class="qr-code-size3 suave-up" alt="Apple Store" /></a>
                                    </div>
                                </div>
							<!--	<img src="images/qr-code.png" class="qr-code-size suave-up" alt="" />
								<img src="images/qr-code.png" class="qr-code-size suave-up" alt="" />-->
								<p class="color-white">Ligue a câmera do seu celular e aponte para o QR Code acima para baixar o app. </p>	
							</div>
							
							<div class="col-md-2"></div>
							
							<div class="col-md-5">
								<div class="form-container form-box">
									<h3>Faça parte da nossa história!</h3>
									<br>
									<form action="mail/enviar-contato.php" method="post" class="vanilla vanilla-form" id="demo-form">
										<label>Nome *</label><br>
										<input type="text" class="form-control" name="nome" required>
										<label>E-mail *</label><br>
										<input type="email" class="form-control" name="email" required>
										<label>Telefone *</label><br>
										<input type="tel" class="form-control" name="telefone" required>
										<label>CPF *</label><br>
										<input type="number" class="form-control" name="cpf" required>
										<!--<label>Digite a sua mensagem</label><br>
										<textarea name="message" class="form-control" rows="2"></textarea>-->
										<button type="submit" class="btn btn-full-rounded g-recaptcha" data-sitekey="6LeMYYsaAAAAAPySIWtbnPOHggfwkKumTd7ZKGwb" data-callback="envia">ABRIR CONTA</button>
									</form>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
		
		<?php  include_once('includes/footer.php')?>

		<script type="text/javascript" src="js/jquery.min.js"></script> 
		<script type="text/javascript" src="js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="js/plugins.js"></script> 
		<script type="text/javascript" src="js/scripts.js"></script>
		<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script> 
		<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script> 
	</body>
</html>