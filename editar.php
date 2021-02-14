<?php 
session_start();
if( ! isset($_SESSION['user']) ){
  header('Location:index.php');
  exit;
}
include_once("conexao.php");
$matricula = filter_input(INPUT_GET, 'matricula',FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM alunos WHERE matricula = '$matricula' ";
$resultado = mysqli_query($conn,$result);
$row_alunos = mysqli_fetch_assoc($resultado);
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
    <br><br>
   <div style="margin-left:350px;">
    <?php
		 if ( isset($_SESSION['msg']) ) {
		 	echo $_SESSION['msg'];
		 	unset($_SESSION['msg']);
		 }
    ?>
   
      <style>
          label{
              font-size: 20px;
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
          }
          input{
            font-size:15px;
            width:300px;
            padding:10px;
            margin: 8px 0px;
            border-radius: 5px;
            
          }
      </style>
          <h2 style="font-size: 40px;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Editar dados</h2><hr> 
          <form method="POST" action="proce_edita.php">
            <br> 
            <label>Matricula:</label>  
            <b style="font-size: 20px; border-radius: 5px;  background-color:chartreuse; padding:3px 20px;" ><?php echo $row_alunos['matricula']; ?></b><br>
            <input type="hidden" required name="matricula" value="<?php echo $row_alunos['matricula']; ?>"><br>
            <label>CPF</label><br>
            <input type="text" name="cpf" requered  maxlength="11" minlength="11"  value="<?php  echo $row_alunos['cpf']; ?>"> <br>	
            <label>Nome</label><br>
            <input type="name" name="nome" requered  value="<?php  echo $row_alunos['nome']; ?>"> <br>
            <label>Data de nascimento</label><br>
            <input type=text name="data_nasc" requered  value="<?php echo $row_alunos['data_nasc']; ?>"> <br>
            <label>Turno</label><br>
            <input type=text name="turno" value="<?php echo $row_alunos['turno']; ?>"> <br><br>
            <label>Nome da mãe</label><br>
            <input type="name" name="nome_mae" requered  value="<?php  echo $row_alunos['nome_mae']; ?>"> <br>
            <label>Nome do pai</label><br>
            <input type="name" name="nome_pai" requered  value="<?php  echo $row_alunos['nome_pai']; ?>"> <br>
            <label>Endereço</label><br>
            <input type="name" name="endereco" requered  value="<?php  echo $row_alunos['endereco']; ?>"> <br>
                
            <input style=" color:white; background-color:green;  padding: 10px; border-radius:5px;" type="submit" value="Salvar mudanças">
          </form>
    </div>  
    <br><br>
</section>
  </body>
</html>