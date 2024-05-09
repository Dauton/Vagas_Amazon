<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Usuario.php";

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        $cadastraUsuario = new Usuario($pdo);
        $cadastraUsuario->cadastraUsuario($_POST['nome'], $_POST['usuario'], $_POST['senha']);

        header("Refresh: 2 index.php");
        echo "Usuário cadastrado com sucesso!";
        die();

    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8ed80570b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="principal">

        <header class="cabecalho">
            <img src="img/id-logo-branco-extenso.png">
        </header>

        <section class="centro">
            <form class="form-login" method="post">
                <i class="fa-solid fa-right-to-bracket"></i>

                <label>Seu usuário
                    <input type="text" name="nome" placeholder="Insira seu nome" required>
                </label>

                <label>Seu usuário
                    <input type="text" name="usuario" placeholder="Insira seu usuario" required>
                </label>
                
                <label>Sua senha
                    <input type="password" name="senha" placeholder="Insira sua senha" required autocomplete="new-password">
                </label>

                <button type="submit">Entrar</button>

            </form>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>
</body>
</html>