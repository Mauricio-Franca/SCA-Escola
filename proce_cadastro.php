<?php
session_start();
include_once("conexao.php");

$matricula = filter_input(INPUT_POST,'matricula',FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$data_nasc = filter_input(INPUT_POST,'data_nasc',FILTER_SANITIZE_STRING);
$turno = filter_input(INPUT_POST,'turno',FILTER_SANITIZE_STRING);
$nome_mae = filter_input(INPUT_POST,'nome_mae',FILTER_SANITIZE_STRING);
$nome_pai = filter_input(INPUT_POST,'nome_pai',FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST,'endereco',FILTER_SANITIZE_STRING);


/*
echo "matricula: $matricula <br>";
echo "Nome: $nome <br>";
echo "idade: $idade <br>";
echo "turno: $turno <br>";
*/
$result = "SELECT * FROM alunos WHERE matricula = '$matricula' or cpf = '$cpf' ";
$resultado = mysqli_query($conn,$result);
$row_alunos = mysqli_fetch_assoc($resultado);

if( mysqli_affected_rows($conn) ){
	$_SESSION['msg'] = "<p style= 'font-size:30px; color: red;'>Erro! Essa matrícula ou CPF já pertence a um aluno<br><h4>Escolha uma matrícula diferente ou vefirique o CPF</4> <br></p>";
	header("Location:cadastro.php");
}else{

	$result = "INSERT INTO alunos (matricula,cpf,nome,data_nasc,turno,nome_mae,nome_pai,endereco,created) VALUES('$matricula','$cpf','$nome','$data_nasc','$turno','$nome_mae','$nome_pai','$endereco',NOW() )";
	$resultado= mysqli_query($conn, $result);

	if( mysqli_insert_id ($conn) ){
		$_SESSION['msg'] = "<p style= 'font-size:30px; color: green;'>Usuário cadastrado com sucesso!<br></>";
		header("Location: cadastro.php");
	}else{
		$_SESSION['msg'] = "<p style= 'font-size:30px; color: red;'>Erro! Usuario NÃO foi cadastrado<br></p>";
		header("Location:cadastro.php");
	}

}

?>
