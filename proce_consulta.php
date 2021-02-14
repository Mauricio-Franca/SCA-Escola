<?php
        session_start();
        
        include_once("conexao.php");
        $matricula= filter_input(INPUT_GET, 'matricula',FILTER_SANITIZE_NUMBER_INT);
        $result = "SELECT * FROM alunos WHERE matricula = '$matricula' ";
        $resultado = mysqli_query($conn,$result);
        $row_alunos = mysqli_fetch_assoc($resultado);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "
            <div style='padding-left: 350px;' >
                <h1>Aluno(a): ".$row_alunos['nome']."</h1><br>
                <p><b>Matricula:</b> ".$row_alunos['matricula']." <br></p>
                <p><b>CPF:</b> ".$row_alunos['cpf']." <br></p>
                <p><b>Nome:</b> ".$row_alunos['nome']." <br></p>
                <p><b>Data de nascimento:</b> ".$row_alunos['data_nasc']." <br></p>
                <p><b>Turno:</b> ".$row_alunos['turno']." <br></p>
                <p><b>Nome da mãe:</b> ".$row_alunos['nome_mae']." <br></p>
                <p><b>Nome do pai:</b> ".$row_alunos['nome_pai']." <br></p>
                <p><b>Endereço:</b> ".$row_alunos['endereco']." <br></p><br>
                <b><a style='color:white; background-color:red;  padding: 10px; border-radius:5px;'  href='proce_apaga.php?matricula=   ". $row_alunos['matricula']." '>Apagar</a></b>
                <b><a style='color:white; background-color:orange;  padding: 10px; border-radius:5px;'  href='editar.php?matricula= ". $row_alunos['matricula']." '>Editar</a> <br></b>
            </div>
            ";
            header("Location: consulta.php");

        }else{
            $_SESSION['msg'] = "<br><br><p style=' padding-left: 350px; font-size:30px; color:red;'>Matrícula inexistente<br> </p>";
            header("Location: consulta.php");
        }	

?>

