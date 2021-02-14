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
    <li><a href="index.php"><i class="fas fa-link"></i>Sair</a></li>
    </ul>
</div>
<section>
    <div style="margin-left: 350px;" >	
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
            
            $result = "UPDATE alunos SET matricula='$matricula',cpf='$cpf',nome='$nome', data_nasc='$data_nasc', turno='$turno', nome_mae='$nome_mae', nome_pai='$nome_pai', endereco='$endereco' WHERE matricula='$matricula' ";
            $resultado = mysqli_query($conn, $result);
            
                if( mysqli_affected_rows($conn) ){
                  echo"<br><br><p style=' font-size:30px; color: green;'> As alterações foram salvas com sucesso!</p><br><a href='consulta.php?'; style='border-radius: 5px; padding:3px 20px; font-size:20px; color:white; background-color:green; ' >Voltar para consulta</a>";
                }else{
                  echo"<br><br><p style=' font-size:30px; color: red; '> Nenhum dado foi modificado.<br> Modifique algo e clique em SALVAR MUDANÇAS </p><br><a href='consulta.php?'; style='border-radius: 5px; padding:3px 20px; font-size:20px; color:white; background-color:red; ' >Voltar para consulta</a>";
                }
        ?>
    </div>
</section>
  </body>
</html>
