<?php
require 'connection.php';
require 'redirectComLogin.php';

if (
   isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['cargo'], $_POST['senha']) &&
   !empty($_POST['nome']) &&
   !empty($_POST['cpf']) &&
   !empty($_POST['telefone']) &&
   !empty($_POST['email']) &&
   !empty($_POST['cargo']) &&
   !empty($_POST['senha'])
) {
   $nome = addslashes($_POST['nome']);
   $cpf = addslashes($_POST['cpf']);
   $telefone = addslashes($_POST['telefone']);
   $email = addslashes($_POST['email']);
   $cargo = addslashes($_POST['cargo']);
   $senha = addslashes($_POST['senha']);
   $senha = password_hash($senha, PASSWORD_DEFAULT);

   $sql = "SELECT CPF, email FROM usuario WHERE CPF = '$cpf' OR email = '$email'";
   $sql = $pdo->query($sql);
   $sql = $sql->fetch(PDO::FETCH_ASSOC);
   $cpf2 = $sql['CPF'];
   $email2 = $sql['email'];
   
   if($cpf2){
      echo "
         <meta http-equiv='refresh' content='0;URL=./../pages/CadastroPage.php'>
         <script type='text/javascript'>
            alert('CPF já cadastrado!');
         </script>
      ";
      exit;
   }else if ($email2){
      echo "
         <meta http-equiv='refresh' content='0;URL=./../pages/CadastroPage.php'>
         <script type='text/javascript'>
            alert('Email já cadastrado!');
         </script>
      ";
      exit;
   }

   $sql = "INSERT INTO usuario (nome, cpf, telefone, email, cargo, senha) VALUES ('$nome', '$cpf', '$telefone', '$email', '$cargo', '$senha')";
   $sql = $pdo->query($sql);

   $sql = "SELECT id FROM usuario WHERE CPF = '$cpf'";
   $sql = $pdo->query($sql);
   $sql = $sql->fetch(PDO::FETCH_ASSOC);
   $id = $sql['id'];
   
   setcookie('id', $id, time() + 86400, '/');
   setcookie('acesso', $cargo, time() + 86400, '/');
   echo "
      <meta http-equiv='refresh' content='0;url=./../index.php'>
      <script type='text/javascript'>
         alert('Cadastro realizado com sucesso!');
      </script>
   ";
} else {
   echo "
		<meta http-equiv=refresh content='0; URL=./../pages/CadastroPage.php'>
			<script type=\"text/javascript\">
				alert(\"Por favor preencha todos os campos\");
			</script>
	   ";
}
