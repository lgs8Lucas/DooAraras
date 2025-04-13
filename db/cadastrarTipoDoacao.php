<?php
require 'connection.php';
require 'redirectSemAdmin.php';

if (
    isset($_POST['tipo']) &&
    !empty($_POST['tipo'])
) {
    $tipo = addslashes($_POST['tipo']);

    $sql = "INSERT INTO tipodoacao (categoria) VALUES ('$tipo')";
    $sql = $pdo->query($sql);

    echo "
      <meta http-equiv='refresh' content='0;url=./../pages/tiposDoacoesPage.php'>
      <script type='text/javascript'>
         alert('Cadastro realizado com sucesso!');
      </script>
   ";
} else {
    echo "
		<meta http-equiv=refresh content='0; URL=./../pages/tiposDoacoesPage.php'>
			<script type=\"text/javascript\">
				alert(\"Por favor preencha todos os campos\");
			</script>
	   ";
}
