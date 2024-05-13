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

    } else {

        $cadastraUsuario = new Usuario($pdo);
        $cadastraUsuario->cadastraUsuario($_POST['nome'], $_POST['usuario'], $_POST['senha']);
    
        header("Refresh: 1.5 index.php");
        echo "<p class='acao'>Usuário cadastrado com sucesso!</p>";
        die();
    }

}

$usuario = new Usuario($pdo);
$exibeUsuarios = $usuario->exibeUsuarios();

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastrar usuário</title>
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
            <br>
            <p>Gereniar usuários</p>
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Usuário</td>
                        <td>Edição</td>
                        <td>Senha</td>
                        <td>Exclusão</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exibeUsuarios as $usuario) : ?>
                    <tr>
                        <td><?= htmlentities($usuario['nome']) ?></td>
                        <td><?= htmlentities($usuario['usuario']) ?></td>
                        <td>
                            <form>
                                <a href="editar_vaga.php?id=<?= $usuario['id'] ?>" id="btn-editar">Editar</a>
                            </form>
                        </td>
                        <td>
                            <form>
                                <a href="reseta_senha.php?id=<?= $usuario['id'] && $usuario['nome'] ?>" id="btn-resetar">Resetar</a>
                            </form>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                <button id="btn-excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>

    <script src="js/jquery.js"></script>
    <script src="js/js.js"></script>
</body>

</html>