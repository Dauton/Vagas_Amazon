<?php

require_once "php/banco/conn.php";
require_once "php/Repositorio/Usuario.php";
require_once "php/login/verifica_sessao.php";
require_once "php/login/protecao.php";
require_once "php/function/style_msg.php";

estiloMensagem();

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    if(!(strlen($_POST['senha']) >= 12)) {

        echo "<p class='erro'>A senha deve conter pelo menos 12 caracteres!</p>"; 

    } elseif(!(preg_match("#[a-z]#", $_POST['senha']))) {

        echo "<p class='erro'>A senha deve conter letras minusculas e maisculas!</p>";

    } elseif(!(preg_match("#['A-Z]#", $_POST['senha']))) {
        
        echo "<p class='erro'>A senha deve conter letras minusculas maiusculas</p>";

    } elseif(!(preg_match("#[0-9]#", $_POST['senha']))) {

        echo "<p class='erro'>A senha deve conter números!</p>";

    } elseif($_POST['senha'] != $_POST['repete_senha']) {

        echo "<p class='erro'>A s senhas não conferem!</p>";

    } else {

        $minhaSenha = new Usuario($pdo);
        $minhaSenha->minhaSenha($_POST['id'], $_POST['senha']);
    
        header("Refresh: 1.5 index.php");
        echo "<p class='acao'>Senha alterada com sucesso!</p>";
        die();
    }

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Minha senha</title>
    <link rel="shortcut icon" type="imagex/png" href="img/id-logo-browser.png">
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
            <i class="fa-solid fa-bars" id="btn-menu"></i>
            <nav>
                <ul>
                    <li><a href="cadastrar_vaga.php"><button id="btn">Cadastrar nova vaga</button></a></li>
                    <li><a href="admin.php"><button id="btn">Gerenciar vagas</button></a></li>
                    <li><a href="cadastro_usuario.php"><button id="btn">Cadastrar usuário</button></a></li>
                    <li><a href="admin_video.php"><button id="btn">Alterar vídeo</button></a></li>
                    <li><a href="minha_senha.php?id=<?= $_SESSION['id'] ?>"><button id="btn">Minha senha</button></a></li>
                    <li><a href="php/login/logout.php"><button id="btn-logout">Sair</button></a></li>
                </ul>
            </nav>
        </header>
        
        <p><b>Usuário: </b><?= $_SESSION['nome'] ?></p>
    

        <section class="centro">
            <form class="form-login" method="post">

                <i class="fa-solid fa-right-to-bracket"></i>

                <label>Nova senha
                    <input type="password" name="senha" placeholder="Insira a senha" required autocomplete="new-password">
                </label>

                <label>Repita a nova senha
                    <input type="password" name="repete_senha" placeholder="Repita a senha" required autocomplete="new-password">
                </label>

                <input type="hidden" name="id" value="<?= $_GET['id']?>">

                <button type="submit">Alterar</button>

                <p>Alterar senha</p>

            </form>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>

    <script src="js/jquery.js"></script>
    <script src="js/js.js"></script>
</body>

</html>