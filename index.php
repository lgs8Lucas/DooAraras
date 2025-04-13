<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>DooAraras</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
		crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/css/global.css">
</head>

<body>
	<?php
	$acesso = $_COOKIE['acesso'] ?? null;
	?>
	<nav class="navbar navbar-expand-lg  da-header" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="./index.php">
				<img src="./assets/img/logoAraras.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
				DooAraras
			</a>
			<button
				class="navbar-toggler"
				type="button"
				data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./index.php">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./pages/doacoesPage.php">Doações</a>
					</li>
					<?php if ($acesso) {
						echo '<a class="nav-link" href="./pages/cadastroDoacaoPage.php">Cadastrar Doação</a>';
						echo '<a class="nav-link" href="./pages/minhasDoacoesPage.php">Minhas Doações</a>';
						if ($acesso == 'A') {
							echo '<a class="nav-link" href="./pages/tiposDoacoesPage.php">Tipos de doações</a>';
							echo '<a class="nav-link" href="./pages/usuariosPage.php">Usuários</a>';
						}
						echo '<a class="nav-link" href="./pages/contaPage.php">Minha conta</a>';
					}
					?>
				</ul>
				<?php
				if ($acesso) {
					echo '<a class="btn btn-outline-danger" href="./db/logout.php">Sair</a>';
				} else {
					echo '<a class="btn btn-outline-warning" href="./pages/loginPage.php">Entrar</a>';
				}
				?>

			</div>
		</div>
	</nav>
	<main class="container mt-3 da-text-color">
		<h1>Início</h1>


		<div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"></button>
		</div>
		<div class="carousel-inner rounded">
			<div class="carousel-item active">
			<img src="./assets/img/logoAraras.png" class="d-block w-40" alt="Imagem1">
			</div>
			<div class="carousel-item">
			<img src="./assets/img/logoAraras.png" class="d-block w-40" alt="Imagem2">
			</div>
			<div class="carousel-item">
			<img src="./assets/img/doe.png" class="d-block w-40" alt="Imagem3">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon"></span>
		</button>
		</div>


	</main>

	<footer class="da-footer">
		<p>&copy; 2025 DooAraras.</p>
	</footer>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
		crossorigin="anonymous"></script>


</body>

</html>