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
		<h1 class="text-center mb-5">Bem-vindo ao DooAraras</h1>
		<section class="mb-5">
			<p class="fs-5">
				Em um mundo onde tantas pessoas enfrentam dificuldades para ter o básico, um gesto de empatia pode fazer toda a diferença.
				O <strong>DooAraras</strong> nasceu com a missão de unir quem quer ajudar com quem mais precisa.
			</p>
			<p class="fs-5">
				Aqui, você pode <strong>doar alimentos, roupas e também contribuir financeiramente</strong> para causas sociais e emergenciais.
				Cada doação representa esperança, dignidade e um futuro melhor para famílias em situação de vulnerabilidade.
			</p>
		</section>

		<section class="mb-5">
			<h2>Conectando Solidariedade aos Objetivos Globais 🌍</h2>
			<p class="fs-5">Nosso site de registro e publicidade de doações é uma ponte entre doadores e aqueles que precisam, contribuindo para um mundo mais justo e sustentável. Alinhamos nossa missão aos Objetivos de Desenvolvimento Sustentável (ODS) da ONU, impactando as seguintes áreas:</p>
			<ul class="list-group list-group-flush ms-4 fs-5 mb-3">
				<li><strong>ODS 1 - Erradicação da Pobreza - </strong> Ajudamos a suprir necessidades básicas, como alimentos, roupas e moradia, para pessoas em situação de vulnerabilidade.</li>
				<li><strong>ODS 2 - Fome Zero e Agricultura Sustentável - </strong> Promovemos doações de alimentos, combatendo a insegurança alimentar e apoiando produtores locais.</li>
				<li><strong>ODS 3 - Saúde e Bem-Estar - </strong> Facilitamos o acesso a medicamentos e equipamentos médicos, melhorando a qualidade de vida em comunidades carentes.</li>
				<li><strong>ODS 4 - Educação de Qualidade - </strong> Incentivamos a doação de materiais escolares e livros, proporcionando oportunidades de aprendizado para crianças e jovens.</li>
				<li><strong>ODS 10 - Redução das Desigualdades - </strong> Conectamos comunidades desfavorecidas a recursos essenciais, diminuindo disparidades sociais.</li>
				<li><strong>ODS 12 - Consumo e Produção Responsáveis - </strong> Fomentamos o reaproveitamento de bens, reduzindo desperdícios e promovendo práticas sustentáveis.</li>
			</ul>
		</section>

		<section class="mb-5">
			<h2>Como você pode ajudar:</h2>
			<ul class="list-group list-group-flush fs-5">
				<li class="list-group-item">🥫 <strong>Alimentos:</strong> contribua com itens não perecíveis e ajude a alimentar quem tem fome.</li>
				<li class="list-group-item">👕 <strong>Roupas:</strong> doe roupas em bom estado e leve conforto e autoestima a quem mais precisa.</li>
				<li class="list-group-item">📚 <strong>Materias Educacionais:</strong> doe liveros em bom estado e transforme a vida de quem mais precisa.</li>
				<li class="list-group-item">💰 <strong>Doações em dinheiro:</strong> cada centavo é transformado em ajuda real. Transparência total no uso dos recursos.</li>
				<li class="list-group-item">😊 <strong>Muito mais:</strong> caso queira doar algo que não esteja com o ripo acastrado, contate nossos administradores!</li>
			</ul>
		</section>

		<section class="text-center">
			<h3 class="mb-3">Juntos, fazemos mais.</h3>
			<p class="fs-5">Transforme empatia em ação. Faça parte dessa corrente do bem.</p>
			<a href="./pages/doacoesPage.php" class="btn btn-success btn-lg">Doe hoje. Mude o amanhã.</a>
		</section>
	</main>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
		crossorigin="anonymous"></script>
	<footer class="da-footer mt-3">
		<p>&copy; 2025 DooAraras.</p>
	</footer>

</body>

</html>