<?php
require 'connection.php';
require 'redirectComLogin.php';



$emailDigitado = $_POST["email"] ?? " ";
$senhaDigitada = $_POST["password"] ?? " ";

$stmt = $pdo->prepare("SELECT senha, cargo FROM usuario WHERE :email");
$stmt->bindParam(":email", $emailDigitado);
$stmt->execute();

$linha = $stmt->fetch(PDO::FETCH_ASSOC);
$hashArmazenado= $linha['senha'];
$acesso = $linha['cargo'];


if ($hashArmazenado) {
   
    if (password_verify($senhaDigitada, $hashArmazenado)) {
        setcookie('acesso', $acesso, time() + 86400, '/', '', true, true);
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
}else {
    echo "
        <meta http-equiv='refresh' content='0;url=./../pages/loginPage.php'>
        <script type='text/javascript'>
            alert('Email não encontrado!');
        </script>
    ";
}
