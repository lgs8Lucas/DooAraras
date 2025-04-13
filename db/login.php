<?php
require 'connection.php';
require 'redirectComLogin.php';


$emailDigitado = $_POST["email"] ?? " ";
$senhaDigitada = $_POST["password"] ?? " ";

$sql = "SELECT senha, cargo, id FROM usuario WHERE email = '$emailDigitado'";
$sql = $pdo->query($sql);
$sql = $sql->fetch(PDO::FETCH_ASSOC);
$hashArmazenado = $sql['senha'];
$acesso = $sql['cargo'];
$id = $sql['id'];

if ($hashArmazenado) {

    if (password_verify($senhaDigitada, $hashArmazenado)) {
        setcookie('acesso', $acesso, time() + 86400, '/');
        setcookie('id', $id, time() + 86400, '/');
        echo "
            <meta http-equiv='refresh' content='0;url=./../index.php'>
            <script type='text/javascript'>
                alert('Bem vindo!');
            </script>
        ";
    } else {
        echo "
            <meta http-equiv='refresh' content='0;url=./../pages/loginPage.php'>
            <script type='text/javascript'>
                alert('Senha incorreta!');
            </script>
        ";
    }
} else {
    echo "
        <meta http-equiv='refresh' content='0;url=./../pages/loginPage.php'>
        <script type='text/javascript'>
            alert('Email não encontrado!');
        </script>
    ";
}
