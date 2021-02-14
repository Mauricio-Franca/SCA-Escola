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
		<br><br>
	  <div style="margin-left: 350px;" >
			<h1>Cadastrar aluno</h1><hr>
			<br>
			<?php
        if ( isset($_SESSION['msg']) ) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
      ?>
    
		<style>
          label{
              color: #9e9e00;
              font-size: 20px;
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
          }
          input{
            font-size:13px;
            width:300px;
            margin: 3px;
            padding:8px;
            border-radius: 5px;  
          }
          select{
            font-size:13px;
            width:300px;
            margin: 3px;
            padding:8px;
            border-radius: 5px;
            }

          h1{
            font-size: 40px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
          } 
         
           div#formulario{
             text-align: left;
             background-color: #4B0082;
             margin: 10px 190px 0px 30px;
             border-radius: 5px;
             padding:40px;
             -webkit-box-shadow: 9px 10px 9px -1px rgba(158,158,0,1);
             -moz-box-shadow: 9px 10px 9px -1px rgba(158,158,0,1);
             box-shadow: 9px 10px 9px -1px rgba(158,158,0,1);
           }
      
    </style>
      <div id="formulario">
          <br>
          <form method="POST" action="proce_cadastro.php" >
          <label>Matricula: </label><br>
          <input type="text" name="matricula" required placeholder="Crie uma matricula (Máximo 2 digitos)" maxlength="2"><br><br>
          <label>CPF: </label><br>
          <input type="text" name="cpf" required placeholder="Digite o CPF (Apenas números)" maxlength="11" minlength="11"  ><br><br>
          <label>Nome Completo: </label><br>
          <input type="text" name="nome" required  placeholder="Nome completo"><br><br>
          <label>Data de nascimento: </label><br>
          <input type="date" name="data_nasc" required><br><br> 
          <label>Turno: </label><br>
          <select name="turno"> 
            <option value="Manhã" selected>Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
          </select><br><br>
          <label>Nome da mãe: </label><br>
          <input type="text" name="nome_mae"  placeholder="Nome completo"><br><br>
          <label>Nome do pai: </label><br>
          <input type="text" name="nome_pai"  placeholder="Nome completo"><br><br>
          <label>Endereço: </label><br>
          <input type="text" name="endereco"  placeholder="Endereço">
          <br><br>

          <input style=" color:white; background-color:green; text-align:center; margin-top:50px; padding: 10px; border-radius:5px;" type="submit" value="Cadastrar"><br><br><br>
          </form>
      </div>
    </div> 	
</section>
  </body>
</html>
