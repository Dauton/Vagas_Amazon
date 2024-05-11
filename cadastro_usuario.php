<?php

require_once "php/banco/conn.php";
require_once "php/Repositorio/Usuario.php";
require_once "php/login/verifica_sessao.php";
require_once "php/login/protecao.php";
require_once "php/function/style_erro_senha.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    estiloErroSenha();

    if(!(strlen($_POST['senha']) >= 12)) {

        echo "<p class='erro'>A senha deve conter pelo menos 12 caracteres!</p>"; 

    } elseif(!(preg_match("#[a-z]#", $_POST['senha']))) {

        echo "<p class='erro'>A senha deve conter letras minusculas e maisculas!</p>";

    } elseif(!(preg_match("#['A-Z]#", $_POST['senha']))) {
        
        echo "<p class='erro'>A senha deve conter letras minusculas maiusculas</p>";

    } elseif(!(preg_match("#[0-9]#", $_POST['senha']))) {

        echo "<p class='erro'>A senha deve conter números!</p>";

    } else {

        $cadastraUsuario = new Usuario($pdo);
        $cadastraUsuario->cadastraUsuario($_POST['nome'], $_POST['usuario'], $_POST['senha']);
    
        header("Refresh: 2 index.php");
        echo "Usuário cadastrado com sucesso!";
        die();
    }

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastrar usuário</title>
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
            <nav>
                <ul>
                    <li><a href="cadastrar_vaga.php"><button id="btn">Cadastrar nova vaga</button></a></li>
                    <li><a href="admin.php"><button id="btn">Gerenciar vagas</button></a></li>
                    <li><a href="cadastro_usuario.php"><button id="btn">Cadastrar usuário</button></a></li>
                    <li><a href="admin_video.php"><button id="btn">Alterar vídeo</button></a></li>
                    <li><a href="php/login/logout.php"><button id="btn-logout">Sair</button></a></li>
                </ul>
            </nav>
        </header>

        <section class="centro">
            <form class="form-login" method="post">
                <i class="fa-solid fa-right-to-bracket"></i>

                <label>Nome completo
                    <input type="text" name="nome" placeholder="Insira o nome" required>
                </label>

                <label>Usuário
                    <input type="text" name="usuario" placeholder="Insira o usuario" required>
                </label>

                <label>Senha
                    <input type="password" name="senha" placeholder="Insira a senha" required autocomplete="new-password">
                </label>

                <button type="submit">Cadastrar</button>

                <p>Cadastro de usuário</p>

            </form>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>
</body>

</html>