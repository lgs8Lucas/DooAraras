<?php
require "./../db/redirectSemLogin.php";
require "./../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
$id = $_COOKIE['id'] ?? null;
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
            <a class="navbar-brand" href="./../index.php">
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
                        <a class="nav-link" href="./../pages/doacoesPage.php">Doações</a>
                    </li>
                    <?php if ($acesso) {
                        echo '<a class="nav-link" href="./../pages/cadastroDoacaoPage.php">Cadastrar Doação</a>';
                        echo '<a class="nav-link active" href="./../pages/minhasDoacoesPage.php">Minhas Doações</a>';
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

    <main class="container justify-content-center mt-3 da-text-color">
        <h1>Minhas Doações <a href="./../pages/cadastroDoacaoPage.php" class="btn btn-primary">Nova Doação</a></h1>
        
        <?php
        $sql = "SELECT doacao.id, tipodoacao.categoria, doacao.titulo, doacao.descricao, doacao.status, doacao.CEP, doacao.numero, doacao.imagem, doacao.quantidade
        FROM doacao
        INNER JOIN tipodoacao 
        ON doacao.fk_TipoDoacao_id = tipodoacao.id 
        WHERE fk_Usuario_id = $id";

        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            echo '
                <ul>
            ';
            foreach ($sql->fetchAll() as $d) {
                echo '
                <div class="accordion mt-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#doacao' . $d['id'] . '" aria-expanded="false" aria-controls="doacao' . $d['id'] . '">
                            ' . $d['titulo'] . '
                        </button>
                        </h2>
                        <div id="doacao' . $d['id'] . '" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <p><b>Tipo de doação:</b> ' . $d['categoria'] . '</p>
                            <p><b>Descrição:</b> ' . $d['descricao'] . '</p>
                            <p><b>Quantidade: </b> ' . $d['quantidade'] . '</p>
                            <p><b>Status:</b> ' . ($d['status'] == 'A' ? "Ativa" : "Inativa") . '</p>
                            <p><b>CEP:</b> ' . $d['CEP'] . '
                            <b>Número:</b> ' . $d['numero'] . '</p>
                            <p><b>Imagem:</b></p>
                            <img src="' . $d['imagem'] . '" alt="' . $d['titulo'] . '" class="img-fluid" style="max-width: 250px;"><br>
                            <a href="./../pages/editarDoacaoPage.php?id=' . $d['id'] . '" class="btn btn-primary mt-3">Editar</a>
                            <a href="./../db/excluirDoacao.php?id=' . $d['id'] . '" class="btn btn-danger mt-3">Excluir</a>
                        </div>
                    </div>
                </div>
                ';
            }
            echo '
                </ul>
            ';
        } else {
            echo '<p class="alert alert-warning mt-3">Nenhuma doação encontrado.</p>';
        }
        ?>
    </main>
    <footer class="da-footer mt-3">
        <p>&copy; 2025 DooAraras.</p>
    </footer>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>