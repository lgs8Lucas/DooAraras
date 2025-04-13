<?php
if (isset($_COOKIE['acesso'])) {
    echo "<meta http-equiv='refresh' content='0;url=./../index.php'>
    <script type=\"text/javascript\">
        alert(\"Você já está logado\");
    </script>";
}
