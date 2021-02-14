<?php
session_start();
if( isset($_SESSION['user']) ){
  header('Location:lista.php');
  exit;
}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
<li><a href="#"><i class="fas fa-qrcode"></i>Listas Todos</a></li>
<li><a href="#"><i class="fas fa-link"></i>Cadastrar</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Consultar</a></li>
</ul>
</div>
<section>
          <div class="bg-img">
            <div class="content" style="border-bottom-right-radius: 80px 80px; background-color:#4B0082"; >
              <header>Login</header>
              <form action="valida_login.php" method="POST">
                <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name="usuario"  placeholder="Usuário">
                </div>
          <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="senha" class="pass-key"  placeholder="Senha">
                  <span class="show">Exibir</span>
                </div><br>

                <?php
                    if ( isset($_SESSION['msg']) ) {
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                  }          
                ?>
                <div class="pass">
                  <a href="#">Recuperar minha senha</a>
                </div>

                <div class="field">
                  <input type="submit" value="Entrar">
                </div>
      </form>
      </div>
          <script>
            const pass_field = document.querySelector('.pass-key');
            const showBtn = document.querySelector('.show');
            showBtn.addEventListener('click', function(){
            if(pass_field.type === "password"){
              pass_field.type = "text";
              showBtn.textContent = "Ocultar";
              showBtn.style.color = "#3498db";
            }else{
              pass_field.type = "password";
              showBtn.textContent = "Exibir";
              showBtn.style.color = "#222";
            }
            });
          </script>
    </section>
  </body>
</html>
