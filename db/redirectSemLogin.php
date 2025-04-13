<?php
if (!isset($_COOKIE['acesso'])) {
    echo "<meta http-equiv='refresh' content='0;url=./../pages/loginPage.php'>
    <script type=\"text/javascript\">
        alert(\"Faça login para acessar esta página\");
    </script>";
}
