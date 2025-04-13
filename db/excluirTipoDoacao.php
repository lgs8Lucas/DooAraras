<?php
require "../db/redirectSemAdmin.php";
require "../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tipodoacao WHERE id = '$id'";
    $sql = $pdo->query($sql);
    echo "
        <meta http-equiv='refresh' content='0;url=./../pages/tiposDoacoesPage.php'>
        <script type='text/javascript'>
            alert('Tipo de doação excluída com sucesso!');
        </script>
    ";
} else {
    echo "
        <meta http-equiv='refresh' content='0;url=./../pages/tiposDoacoesPage.php'>
        <script type='text/javascript'>
            alert('Erro ao excluir tipo de doação!');
        </script>
    ";
}
