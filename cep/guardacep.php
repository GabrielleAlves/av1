<?php

require("conexao.php");

$cep = $_POST['cp'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];



  $query = "INSERT INTO consultacep (cep, logradouro, numero, complemento, bairro, cidade, uf) VALUES ('$cep', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$uf')";
  $insert = mysqli_query($conn, $query);

  if($insert){
    echo"<script language='javascript' type='text/javascript'>
    alert('Usuário cadastrado com sucesso!');window.location.
    href='cep.php'</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar esse usuário');window.location
    .href='cep.php'</script>";
  }

?>
