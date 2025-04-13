<?php
require './../db/connection.php';
require "./../db/redirectSemLogin.php";
$acesso = $_COOKIE['acesso'] ?? null;
$uid = $_COOKIE['id'] ?? null;

if (
    true
) {
    $idDoacao = $_GET['id'] ?? null;
    $titulo = addslashes($_POST['titulo']);
    $quantidade = addslashes($_POST['quantidade']);
    $descricao = addslashes($_POST['descricao']);
    $imagem = addslashes($_POST['imagem']);
    $tipoDoacao = addslashes($_POST['tipoDoacao']);
    $CEP = addslashes($_POST['CEP']);
    $numero = addslashes($_POST['numero']);

    // Verifica se o id do usuário da doacao é o mesmo do usuário logado
    $sql = "SELECT fk_Usuario_id FROM doacao WHERE id = '$idDoacao'";
    $sql = $pdo->query($sql);
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    if ($sql['fk_Usuario_id'] != $uid) {
        "<meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
        <script type=\"text/javascript\">
            alert(\"Você não tem permissão para editar esta doação!\");
        </script>";
        exit;
    }

    $sql = "UPDATE doacao SET titulo = '$titulo', descricao = '$descricao', quantidade = '$quantidade', imagem = '$imagem', fk_TipoDoacao_id = '$tipoDoacao', CEP = '$CEP', numero = '$numero' WHERE id = '$idDoacao'";

    $sql = $pdo->query($sql);

    echo "
      <meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
      <script type='text/javascript'>
         alert('Edição realizada com sucesso!');
      </script>
   ";
} else {
    echo "
        <meta http-equiv=refresh content='0; URL=./../pages/editarDoacaoPage.php'>
            <script type=\"text/javascript\">
                alert(\"Por favor preencha todos os campos\");
            </script>
       ";
}
