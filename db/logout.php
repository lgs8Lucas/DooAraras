<?php
setcookie('acesso', '', time() - 3600, '/', '', true, true); // Expira o cookie
echo "<meta http-equiv='refresh' content='0;url=./../index.php'>";
