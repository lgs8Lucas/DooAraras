<?php
require "../db/redirectSemLogin.php";
require "../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
$uid = $_COOKIE['id'] ?? null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuario WHERE id = '$id'";
    if ($id == $uid || $acesso == 'A') {
        $sql = $pdo->query($sql);
        if ($id == $uid) {
            setcookie('acesso', '', time() - 3600, '/'); // Expira o cookie
            setcookie('id', '', time() - 3600, '/'); // Expira o cookie
            echo "
                <meta http-equiv='refresh' content='0;url=./../pages/loginPage.php'>
                <script type='text/javascript'>
                    alert('Usuário excluído com sucesso! Você foi deslogado!');
                </script>
            ";
        } else {
            echo "
                <meta http-equiv='refresh' content='0;url=./../pages/usuariosPage.php'>
                <script type='text/javascript'>
                    alert('Usuário excluído com sucesso!');
                </script>
            ";
        }
    }
} else {
    echo "
        <meta http-equiv='refresh' content='0;url=./../index.php'>
        <script type='text/javascript'>
            alert('Erro ao excluir usuário!');
        </script>
    ";
}
