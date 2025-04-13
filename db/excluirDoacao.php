<?php
require "../db/redirectSemLogin.php";
require "../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
$id = $_COOKIE['id'] ?? null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idDoacao = $_GET['id'];
    // Verifica se o id do usuário da doacao é o mesmo do usuário logado
    $sql = "SELECT fk_Usuario_id FROM doacao WHERE id = '$idDoacao'";
    $sql = $pdo->query($sql);
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    $idUsuarioDoacao = $sql['fk_Usuario_id'];
    if ($idUsuarioDoacao != $id) {
        echo "
            <meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
            <script type='text/javascript'>
                alert('Você não tem permissão para excluir esta doação!');
            </script>
        ";
        exit;
    } else {
        $sql = "DELETE FROM doacao WHERE id = '$idDoacao'";
        $sql = $pdo->query($sql);
        echo "
            <meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
            <script type='text/javascript'>
                alert('Doação excluída com sucesso!');
            </script>
        ";
    }
} else {
    echo "
        <meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
        <script type='text/javascript'>
            alert('Erro ao excluir doação!');
        </script>
    ";
}
