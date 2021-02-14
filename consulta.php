<?php
session_start();

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
      <br>
      <div style="padding-left: 350px; " >
      <h1 style=" font-size: 40px;  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Consultar aluno</h1><br>
        <form action="proce_consulta.php" method="GET" >
          <h2>Digite a matricula do aluno:</h2>
          <input style=" padding: 10px; border-radius:5px;" type="text" name="matricula" required placeholder="Matricula" maxlength="2">
          <input style=" color:white; background-color:green;  padding: 10px; border-radius:5px;"  type="submit" value="Buscar">
        </form>
      </div>
      <br><hr><br>
      <?php
          if ( isset($_SESSION['msg']) ) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
        ?>
      
</section>
  </body>
</html>