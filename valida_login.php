<?php
session_start();
include_once("conexao.php");

if( empty($_POST['usuario']) || empty($_POST['senha']) ){
	header('Location: index.php');
	exit;
}

$user=  filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

$query = "SELECT * FROM adm WHERE usuario = '$user' AND id = '$pass' ";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if( $row ){
	$_SESSION['user'] = $user;
	header('Location: lista.php');
}else{
	$_SESSION['msg'] = "<p style='color:red;' >ERRO! SENHA OU USUÁRIO INCORRETO</p>";
	header('Location: index.php'); 
}
?>
