<?php
require "./../db/redirectSemAdmin.php";
require "./../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
?>

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
    <link rel="stylesheet" href="./../assets/css/global.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg  da-header" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="./../assets/img/logoAraras.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
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
                        <a class="nav-link" aria-current="page" href="./../index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./../pages/doacoesPage.php">Doações</a>
                    </li>
                    <?php if ($acesso) {
                        echo '<a class="nav-link" href="./../pages/cadastroDoacaoPage.php">Cadastrar Doação</a>';
                        echo '<a class="nav-link" href="./../pages/minhasDoacoesPage.php">Minhas Doações</a>';
                        if ($acesso == 'A') {
                            echo '<a class="nav-link" href="./../pages/tiposDoacoesPage.php">Tipos de doações</a>';
                            echo '<a class="nav-link" href="./../pages/usuariosPage.php">Usuários</a>';
                        }
                        echo '<a class="nav-link" href="./../pages/contaPage.php">Minha conta</a>';
                    }
                    ?>
                </ul>
                <?php
                if ($acesso) {
                    echo '<a class="btn btn-outline-danger" href="./../db/logout.php">Sair</a>';
                } else {
                    echo '<a class="btn btn-outline-warning" href="./../pages/loginPage.php">Entrar</a>';
                }
                ?>
            </div>
        </div>
    </nav>
      
    <?php
        $sql =("
        SELECT 
            d.titulo, 
            d.descricao, 
            d.imagem, 
            d.quantidade, 
            d.CEP, 
            d.numero, 
            t.categoria AS tipo
        FROM Doacao d
        JOIN TipoDoacao t ON d.TipoDoacao_id = t.id
    ");
        $query = $pdo->query($sql);
        $doacoes = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <main class="container mt-5">        
        <h2 class="mb-4">Doações</h2>

        <?php    
        $doacoesPorTipo = [];
        foreach ($doacoes as $doacao) {
            $doacoesPorTipo[$doacao['tipo']][] = $doacao;
        }

        foreach ($doacoesPorTipo as $tipo => $doacoesDoTipo): ?>
        <h3 class="mt-4"><?= ($tipo) ?></h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($doacoesDoTipo  as $doacao): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= $doacao['imagem'] ?>" class="card-img-top" alt="<?= $doacao['titulo']?>" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                        <p class="card-text"><strong>Descrição:</strong> <?= $doacao['descricao'] ?></p>
                        <p class="card-text"><strong>Quantidade:</strong> <?= $doacao['quantidade'] ?></p>
                        <p class="card-text"><strong>CEP:</strong> <?= $doacao['CEP'] ?></p>
                        <p class="card-text"><strong>Número:</strong> <?= $doacao['numero'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </main>

</body>