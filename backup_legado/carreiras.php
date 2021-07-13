<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Carreiras | LTW Bank - O Banco 100% Digital - Abra sua conta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Faça parte do LTW Bank. Comece preenchendo seus dados no formulário ao lado e faça parte dessa família!">
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
		
		<div class="wrapper mt-45">
			<div class="container inner">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-5">
								<h1 class="heading">Faça parte dessa equipe</h1>
								<p class="lead larger">Comece preenchendo seus dados no formulário ao lado e faça parte dessa família! </p>	 
                                <img src="images/pessoa-carreira2.png" class="w-100" alt="Página Carreiras" />
							</div>
							
							<div class="col-md-2"></div>
							
							<div class="col-md-5">
								<div class="form-container form-box">
									<h3>Inscreva-se agora</h3>
									<br>
									<form action="mail/enviar-trabalhe.php" method="post" class="vanilla vanilla-form" enctype="multipart/form-data" id="demo-form">
								<!--	<form action="mail/enviar-trabalhe.php" method="post" class="vanilla vanilla-form" enctype="multipart/form-data">-->
										<label>Nome *</label><br>
										<input type="text" class="form-control" name="nome">
										<label>E-mail *</label><br>
										<input type="email" class="form-control" name="replyto">
										<label>Telefone *</label><br>
										<input type="tel" class="form-control" name="telefone">
										<label>Digite uma breve mensagem </label><br>
										<textarea name="mensagem" class="form-control" rows="2"></textarea>
										<label>Anexe seu currículo (Opcional)</label><br>
										<label for="anexo" class="custom-file-upload display-inline"><i class="et-download"></i> Seu Arquivo Aqui</label>
										<input id="anexo" type="file" class="form-control" name="arquivo" >
										<button type="submit" class="btn btn-full-rounded g-recaptcha" data-sitekey="6LeMYYsaAAAAAPySIWtbnPOHggfwkKumTd7ZKGwb" data-callback="envia">INSCREVER-SE</button>
										<!--<button type="submit" class="btn btn-full-rounded">INSCREVER-SE</button>-->
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