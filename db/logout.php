<?php
setcookie('acesso', '', time() - 3600, '/'); // Expira o cookie
setcookie('id', '', time() - 3600, '/'); // Expira o cookie
echo "<meta http-equiv='refresh' content='0;url=./../index.php'>";
