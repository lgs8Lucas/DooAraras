<?php
require 'redirectSemLogin.php';
if ($_COOKIE['acesso'] != 'A') {
    echo "<meta http-equiv='refresh' content='0;url=./../index.php'>
    <script type=\"text/javascript\">
        alert(\"Você não tem acesso à esta página!\");
    </script>";
}