<?php
require "../db/redirectSemLogin.php";
require "../db/connection.php";
$acesso = $_COOKIE['acesso'] ?? null;
$id = $_COOKIE['id'] ?? null;

if (
   isset($_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['senha']) &&
   !empty($_POST['nome']) &&
   !empty($_POST['telefone']) &&
   !empty($_POST['email']) &&
   !empty($_POST['senha'])
) {
   $nome = addslashes($_POST['nome']);
   $telefone = addslashes($_POST['telefone']);
   $email = addslashes($_POST['email']);
   $senha = addslashes($_POST['senha']);
   $senha = password_hash($senha, PASSWORD_DEFAULT);

   $sql = "SELECT email FROM usuario WHERE email = '$email' and id != '$id'";
   $sql = $pdo->query($sql);
   $sql = $sql->fetch(PDO::FETCH_ASSOC);
   
   if ($sql) {
      echo "
         <meta http-equiv='refresh' content='0;URL=./../pages/CadastroPage.php'>
         <script type='text/javascript'>
            alert('Email já cadastrado!');
         </script>
      ";
      exit;
   }

   $sql = "UPDATE usuario SET nome = '$nome', telefone = '$telefone', email = '$email', senha = '$senha' WHERE id = '$id'";
   $sql = $pdo->query($sql);
   

   echo "
      <meta http-equiv='refresh' content='0;url=./../pages/contaPage.php'>
      <script type='text/javascript'>
         alert('Usuário atualizado com sucesso!');
      </script>
   ";
} else {
   echo "
		<meta http-equiv=refresh content='0; URL=./../pages/editarContaPage.php'>
			<script type=\"text/javascript\">
				alert(\"Por favor preencha todos os campos\");
			</script>
	   ";
}
