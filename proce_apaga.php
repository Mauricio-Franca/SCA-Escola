
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

                    $matricula= filter_input(INPUT_GET,'matricula',FILTER_SANITIZE_NUMBER_INT);
                    $result = "DELETE FROM alunos WHERE matricula='$matricula'";
                    $resultado = mysqli_query($conn, $result);
                    
                    if (!empty($matricula)) {
                          if(mysqli_affected_rows($conn)){
                            $_SESSION['msg'] = "<br><br><p style=' padding-left: 350px; font-size:30px; color: green;'> Usuário apagado com sucesso!</p>";
                            header("Location: consulta.php");
                          }else{
                            $_SESSION['msg'] = "<br><br><p style=' padding-left: 350px; font-size:30px; color:red;'> Nao foi possivel deletar</p>";
                            header("Location: consulta.php");
                          }	
                    }else{
                        $_SESSION['msg'] = "<br><br><p style=' padding-left: 350px; font-size:30px; color:red;'> Você precisa digitar uma matricula para deletar</p><a href='consulta.php';>Voltar</a>";
                        header("Location: consulta.php");
                    }     
                ?>
              </div>
    </section>
  </body>
  
</html>