<?php
session_start();
include_once("conexao.php");
if( ! isset($_SESSION['user']) ){
  header('Location:index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style = "background-color:#4682B4;">
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>MENU</header>
  <ul>
<li><a href="lista.php"><i class="fas fa-qrcode"></i>Listas Todos</a></li>
<li><a href="cadastro.php"><i class="fas fa-link"></i>Cadastrar</a></li>
<li><a href="consulta.php"><i class="fas fa-stream"></i>Consultar</a></li>
<li><a href="sair.php"><i class="fas fa-link"></i>Sair</a></li>
</ul>
</div>
<section>
    <div style="margin-left: 350px;" >
        <br><br><br>
        <h1 style="font-size: 40px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; ">Alunos Cadastrados</h1><hr>
        <br>
		<?php
			$result = "SELECT * FROM alunos";
            $resultado = mysqli_query($conn,$result);
                while( $row_alunos = mysqli_fetch_assoc($resultado) ) {
                    echo "<br><p><b>Matricula:&nbsp</b> ". $row_alunos['matricula'] ."</p>";
                    echo "<p><b>CPF:&nbsp</b>   ". $row_alunos['cpf'] ."</p>";
                    echo "<p><b>Nome:&nbsp</b>   ". $row_alunos['nome'] ."</p>";
                    echo "<p><b>Data de nascimento:&nbsp</b>  ". $row_alunos['data_nasc'] ."</p>";
                    echo "<p><b>Turno:&nbsp</b>  ". $row_alunos['turno'] ."</p>";
                    echo "<p><b>Nome da mãe:&nbsp</b>   ". $row_alunos['nome_mae'] ."</p>";
                    echo "<p><b>Nome do pai:&nbsp</b>   ". $row_alunos['nome_pai'] ."</p>";
                    echo "<p><b>Endereco:&nbsp</b>   ". $row_alunos['endereco'] ."</p>";
                    echo "<p><b>Data e hora do cadastro:&nbsp</b>  ". $row_alunos['created'] ."</p><hr>";
                };		
			?>    
        </div>
        <br><br>  
</section>
  </body>
</html>
