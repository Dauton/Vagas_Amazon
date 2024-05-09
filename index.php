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
            <form class="form-login" method="post" action="php/login/validacao.php">
                <i class="fa-solid fa-right-to-bracket"></i>
                <h1>Login</h1>

                <label>Seu usuário
                    <input type="usuario" name="usuario" placeholder="Insira seu usuario" required>
                </label>
                
                <label>Sua senha
                    <input type="password" name="senha" placeholder="Insira sua senha" required>
                </label>

                <button type="submit">Entrar</button>

                <p>Acesso para administração das vagas</p>

            </form>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>
</body>
</html>