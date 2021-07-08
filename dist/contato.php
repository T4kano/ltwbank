<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="author" content="Eduardo Takano" />

		<!-- GOOGLE RECAPTCHA -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
			
		<!-- GOOGLE POPPINS -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" />

		<!-- FAVICON -->
		<link rel="shortcut icon" href="./img/favicon.ico" />

		<!-- jQUERY -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<!-- BOOTSTRAP-->
		<script src="./js/bootstrap.bundle.min.js"></script>
		
		<!-- INDEX JS -->
		<script src="./js/index.js"></script>
		
		<!-- STYLES -->
		<link rel="stylesheet" href="./css/custom.css" />
		<link rel="stylesheet" href="./css/contact.css" />

		<!-- TITLE -->
		<title>LTW Bank | Contato</title>
	</head>
	<body>

		<div class="loading">
			<img src="./img/loading.gif" class="img-fluid" width="100px" loading="lazy" />
		</div>

		<!--////////////////////////////////////////// NAVBAR START //////////////////////////////////////////-->

		<nav id="header" class="navbar fixed-top navbar-expand-lg navbar-light">
			<div class="container-fluid px-5">
				<a class="navbar-brand" href="index.html">
					<img src="./img/brand_dark.webp" class="img-fluid" width="100px" loading="lazy" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="container">
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item mx-md-3">
								<a class="nav-link" href="transferencias.html">Transferências</a>
							</li>
							<li class="nav-item mx-md-3">
								<a class="nav-link" href="cartoes.html">Cartões</a>
							</li>
							<li class="nav-item mx-md-3">
								<a class="nav-link" href="pix.html">PIX</a>
							</li>
							<li class="nav-item mx-md-3">
								<a class="nav-link" href="sobre.html">Sobre o LTW Bank</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<!--////////////////////////////////////////// NAVBAR END //////////////////////////////////////////-->
		
		<div class="mt-5">
			<div class="container-fluid py-5 bg-light">
				<div class="container col-xxl-8 px-4 mt-5 shadow contact">
					<div class="row g-5">
						<div class="col-lg-6 position-relative">
							<h1 class="display-5 fw-bold lh-1 mb-3">
								Inscreva-se no <b class="text-primary">LTW Bank</b> é muito simples!
							</h1>
							<p class="lead">
								Abra sua conta e comece a aproveitar agora os benefícios dos nossos cartões de crédito e débito.
							</p>
							<div class="position-absolute bottom-0 start-0 d-none d-lg-block">
								<div class="row px-4 pb-5">
									<div class="col">
										<img src="./img/brand_footer.webp" width="200px" loading="lazy" />
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 shadow-sm py-5 m-0 bg-white">
							<h2>Faça parte da nossa história!</h2>
							<p class="lead">Deixe seus dados para receber mais informações sobre o banco</p>

							<form action="enviar-contato-oficial.php" method="post" id="demo-form">
								<div class="form-group mb-3">
									<label>Nome</label>
									<input class="form-control" name="nome">
								</div>

								<div class="form-group mb-3">
									<label>E-mail</label>
									<input type="email" class="form-control" naem="email" placeholder="email@ltwbank.com">
								</div>

								<div class="form-group mb-3">
									<label>Telefone</label>
									<input class="form-control" name="telefone" placeholder="(00) 00000-0000">
								</div>

								<div class="form-group mb-3">
									<label>Mensagem</label>
									<textarea class="form-control" placeholder="Deixe sua mensagem aqui..." nome="mensagem" style="height: 100px"></textarea>
								</div>

								<div class="col d-flex justify-content-end">
									<button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6LeMYYsaAAAAAPySIWtbnPOHggfwkKumTd7ZKGwb" data-callback="enviar">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--//////////////////////////////////////// FOOTER BEGIN ////////////////////////////////////////-->

		<section id="footer">
			<div class="container-fluid py-5 bg-dark">
				<div class="container py-5">
					<div class="row">
						<div class="col-lg-6">
							<b>DISPONÍVEL PARA IOS E ANDROID</b>
							<h1 class="display-5 fw-bold lh-1 mb-3">Conta 100% digital feita para pessoas reais como você.</h1>
							<p>Tudo o que você sempre esperou do seu banco, sem filas e sem burocracia.</p>
						</div>
						<div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
							<a href="https://play.google.com/store/apps/details?id=com.ltw.ltwbank" target="_blank" class="me-3 me-md-5">
								<img src="./img/google-play.svg" width="250px" class="img-fluid" loading="lazy" />
							</a>
							<a href="https://apps.apple.com/br/app/ltw-bank/id1566195361" target="_blank">
								<img src="./img/app-store.svg" width="250px" class="img-fluid" loading="lazy" />
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid py-5 bg-darker">
				<div class="container py5">
					<div class="row g-3 py-2">
						<div class="col-md-3">
							<h2>LTW Bank</h2>
							<a href="sobre.html">Sobre o LTW Bank</a>
							<a href="#">Contato</a>
						</div>
						<div class="col-md-3">
							<h2>Produtos</h2>
							<a href="transferencias.html">Transferências</a>
							<a href="cartoes.html">Cartões</a>
							<a href="pix.html">PIX</a>
						</div>
						<div class="col">
							<h2>Contato</h2>
							<p>R. Alameda Terracota, 185 - 12º Andar, sala 1227<br>Complexo Espaço Cerâmica<br>São Caetano do Sul<br>0800 555 2035</p>
						</div>
					</div>
					<div class="row border-top pt-4">
						<div class="col-6 col-md-2">
							<a href="index.html">
								<img src="./img/brand_light.webp" class="img-fluid" loading="lazy">
							</a>
						</div>
						
						<div class="col-6 col-md-1 d-flex align-items-end justify-content-end order-md-last">
							<a href="https://www.instagram.com/ltwbank/" target="_blank">
								<svg viewBox="0 0 24 24" class="me-2"><path d="M12,2.16c3.2,0,3.58,0,4.85.07,3.25.15,4.77,1.69,4.92,4.92.06,1.27.07,1.65.07,4.85s0,3.59-.07,4.85c-.15,3.23-1.66,4.77-4.92,4.92-1.27.06-1.64.07-4.85.07s-3.58,0-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.64-.07-4.85s0-3.58.07-4.85C2.38,3.92,3.9,2.38,7.15,2.23,8.42,2.18,8.8,2.16,12,2.16ZM12,0C8.74,0,8.33,0,7.05.07c-4.35.2-6.78,2.62-7,7C0,8.33,0,8.74,0,12S0,15.67.07,17c.2,4.36,2.62,6.78,7,7C8.33,24,8.74,24,12,24s3.67,0,4.95-.07c4.35-.2,6.78-2.62,7-7C24,15.67,24,15.26,24,12s0-3.67-.07-4.95c-.2-4.35-2.62-6.78-7-7C15.67,0,15.26,0,12,0Zm0,5.84A6.16,6.16,0,1,0,18.16,12,6.16,6.16,0,0,0,12,5.84ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16ZM18.41,4.15a1.44,1.44,0,1,0,1.43,1.44A1.44,1.44,0,0,0,18.41,4.15Z" /></svg>
							</a>
							<a href="https://www.linkedin.com/company/ltwbank/" target="_blank">
								<svg viewBox="0 0 24 24"><path d="M19,0H5A5,5,0,0,0,0,5V19a5,5,0,0,0,5,5H19a5,5,0,0,0,5-5V5A5,5,0,0,0,19,0ZM8,19H5V8H8ZM6.5,6.73A1.77,1.77,0,1,1,8.25,5,1.75,1.75,0,0,1,6.5,6.73ZM20,19H17V13.4c0-3.37-4-3.12-4,0V19H10V8h3V9.77c1.4-2.59,7-2.78,7,2.47Z"/></svg>
							</a>
						</div>

						<div class="col d-flex align-items-end">
							<span class="mt-3">© 2021 LTW Bank Todos os Direitos Reservados<br>Políticas de Privacidade | Termos de Uso </span>
						</div>
					</div>
				</div>
			</div>
    	</section>

    	<!--//////////////////////////////////////// FOOTER END ////////////////////////////////////////-->

		<script>
			function enviar() {
				document.getElementById("demo-form").submit();
			}
		</script>
	</body>
</html>
