<?php

require 'connection.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$senha = $_POST['senha'];

if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['cargo'], $_POST['senha'])) && 
   !empty($_POST['id']) && 
   !empty($_POST['nome']) && 
   !empty($_POST['cpf']) &&
   !empty($_POST['telefone']) && 
   !empty($_POST['email']) && 
   !empty($_POST['cargo']) && 
   !empty($_POST['senha'])
   {
        

   }else
   {

   }



?>