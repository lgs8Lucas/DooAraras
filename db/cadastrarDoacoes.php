<?php
require './../db/connection.php';
require "./../db/redirectSemLogin.php";
$acesso = $_COOKIE['acesso'] ?? null;
$id = $_COOKIE['id'] ?? null;

if (
   true
) {

   $titulo = addslashes($_POST['titulo']);
   $quantidade = addslashes($_POST['quantidade']);
   $descricao = addslashes($_POST['descricao']);
   $status = "A";
   $imagem = addslashes($_POST['imagem']);
   $tipoDoacao = addslashes($_POST['tipoDoacao']);
   $idUsuario = $id;
   $CEP = addslashes($_POST['CEP']);
   $numero = addslashes($_POST['numero']);

   $sql = "INSERT INTO doacao (`titulo`, `descricao`, `quantidade`, `status`, `imagem`, `fk_TipoDoacao_id`, `fk_Usuario_id`, `CEP`, `numero`) VALUES ('$titulo', '$descricao', '$quantidade', '$status', '$imagem', '$tipoDoacao', '$idUsuario', '$CEP', '$numero')";

   $sql = $pdo->query($sql);

   echo "
      <meta http-equiv='refresh' content='0;url=./../pages/minhasDoacoesPage.php'>
      <script type='text/javascript'>
         alert('Cadastro realizado com sucesso!');
      </script>
   ";
} else {
   echo "
		<meta http-equiv=refresh content='0; URL=./../pages/cadastroDoacaoPage.php'>
			<script type=\"text/javascript\">
				alert(\"Por favor preencha todos os campos\");
			</script>
	   ";
}
