<?php
require "../db/redirectSemLogin.php";
require "../db/connection.php";
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
                        echo '<a class="nav-link" href="./../pages/minhasDoacoesPage.php">Minhas Doações</a>';
                        if ($acesso == 'A') {
                            echo '<a class="nav-link" href="./../pages/tiposDoacoesPage.php">Tipos de doações</a>';
                            echo '<a class="nav-link" href="./../pages/usuariosPage.php">Usuários</a>';
                        }
                        echo '<a class="nav-link active" href="./../pages/contaPage.php">Minha conta</a>';
                    }
                    ?>
                </ul>
                <?php
                if ($acesso) {
                    echo '<a class="btn btn-outline-danger" href="./../db/logout.php">Sair</a>';
                } else {
                    echo '<a class="btn btn-outline-warning" href="./../loginPage.php">Entrar</a>';
                }
                ?>

            </div>
        </div>
    </nav>
    <main class="container mt-3 da-text-color">
        <?php
        $sql = "SELECT nome, email, CPF, telefone, cargo FROM usuario WHERE id = '$id'";
        $sql = $pdo->query($sql);
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        ?>
        <h1>Olá, <?php echo $user['nome']; ?></h1>
        <h2 class="mt-3">Dados da conta: </h2>
        <p>Nome: <?php echo $user['nome']; ?></p>
        <p>Email: <?php echo $user['email']; ?> </p>
        <p>CPF: <?php echo $user['CPF']; ?> </p>
        <p>Telefone: <?php echo $user['telefone']; ?> </p>
        <p>Cargo: <?php echo $user['cargo'] == 'A' ? 'Administrador' : 'Usuário Padrão'; ?> </p>
        <a href="./../pages/editarContaPage.php" class="btn btn-primary">Editar conta</a>
        <a href="./../db/excluirUsuario.php?id=<?php echo $id; ?>" class="btn btn-danger">Excluir conta</a>

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