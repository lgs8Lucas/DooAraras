<?php
require "./../db/redirectSemLogin.php";
require "./../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
$uid = $_COOKIE['id'] ?? null;
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
                        <a class="nav-link" href="./../pages/doacoesPage.php">Doações</a>
                    </li>
                    <?php if ($acesso) {
                        echo '<a class="nav-link active" href="./../pages/cadastroDoacaoPage.php">Cadastrar Doação</a>';
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

    <main class="container justify-content-center mt-3 da-text-color">
        <div>
            <h1>Editar Doação</h1>
            <?php
            $id = $_GET['id'] ?? null;
            if (!$id) {
                "<meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao editar doação! Tente novamente mais tarde.\");
                </script>";
                exit;
            }
            $sql = "SELECT * FROM doacao WHERE id = $id";
            $query = $pdo->query($sql);
            if (!($query->rowCount() > 0)) {
                "<meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao editar doação! Tente novamente mais tarde.\");
                </script>";
                exit;
            }
            $doacao = $query->fetch(PDO::FETCH_ASSOC);
            if ($doacao['fk_Usuario_id'] != $uid) {
                "<meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
                <script type=\"text/javascript\">
                    alert(\"Você não tem permissão para editar esta doação!\");
                </script>";
                exit;
            }
            ?>

            <form action="./../db/editarDoacao.php?id=<?= $doacao['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required value="<?php echo $doacao['titulo']; ?>">
                </div>
                <div class="mb-3">
                    <label for="$quantidade " class="form-label">Quantidade</label>
                    <input type="number" class="form-control" placeholder="" id="quantidade" name="quantidade" value="<?php echo $doacao['quantidade']; ?>">
                </div>
                <div class="mb-3">
                    <label for="descricao " class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required maxlength="200"><?php echo $doacao['descricao']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="url" class="form-control" id="imagem" name="imagem" value="<?php echo $doacao['imagem']; ?>">
                </div>

                <label for="tipoDoacao" class="form-label">Tipo de Doação</label>
                <select class="form-control" id="tipoDoacao" name="tipoDoacao" required>
                    <?php

                    $sql = "SELECT id, categoria FROM tipoDoacao";
                    $query = $pdo->query($sql);

                    if ($query->rowCount() > 0) {
                        foreach ($query->fetchAll() as $tipo) {
                            echo "<option value='" . $tipo['id'] . "' " . ($doacao['fk_TipoDoacao_id'] == $tipo['id'] ? " selected" : "") . ">" . $tipo['categoria'] . "</option>";
                        }
                    }
                    ?>
                </select></br>

                <div class="mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="CEP" name="CEP" required value="<?php echo $doacao['CEP']; ?>">
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Numero do Endereço</label>
                    <input type="number" class="form-control" id="numero" name="numero" required value="<?php echo $doacao['numero']; ?>">
                </div>
                <hr>
                <button type="submit" class="btn btn-success mb-3">Editar</button>
            </form>
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