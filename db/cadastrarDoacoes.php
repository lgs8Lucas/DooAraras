<?php
require 'connection.php';
require 'redirectComLogin.php';

if (
   isset($_POST['titulo'], $_POST['quantidade'], $_POST['descricao'], $_POST['status'], $_POST['imagem']) &&
   !empty($_POST['quantidade']) &&
   !empty($_POST['descricao']) &&
   !empty($_POST['status']) &&
   !empty($_POST['imagem']) &&
   !empty($_POST['CEP']) &&
   !empty($_POST['numero']) &&
) {

   $titulo = addslashes($_POST['titulo']);
   $quantidade = addslashes($_POST['quantidade']);
   $descricao = addslashes($_POST['descricao']);
   $status = addslashes($_POST['statu']);
   $imagem = addslashes($_POST['imagem']);
   $CEP = addslashes($_POST['CEP']);
   $numero = addslashes($_POST['numero']);

   $sql = "INSERT INTO  Doacao (titulo, descricao, statu, imagem) VALUES ('$titulo', '$quantidade', '$descricao', '$status', '$imagem', '$CEP', '$numero')";
   $sql = $pdo->query($sql);

   $sql = "SELECT id FROM usuario WHERE CPF = '$cpf'";
   $sql = $pdo->query($sql);
   $sql = $sql->fetch(PDO::FETCH_ASSOC);
   $id = $sql['id'];
   
   setcookie('id', $id, time() + 86400, '/');
   setcookie('acesso', $cargo, time() + 86400, '/');
   echo "
      <meta http-equiv='refresh' content='0;url=./../minhasDoacoesPage.php'>
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
