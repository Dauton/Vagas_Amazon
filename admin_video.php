<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Video.php";
    require_once "php/login/verifica_sessao.php";
    require_once "php/login/protecao.php";

    //========= EXIBE O VIDEO =========//
    $video = new Video($pdo);
    $exibeVideo = $video->exibeVideo();
    //===================================================//

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gerenciar vagas</title>
    <link rel="shortcut icon" type="imagex/png" href="img/id-logo-browser.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                    <li><a href="php/login/logout.php"><button id="btn-logout">Sair</button></a></li>
                </ul>
            </nav>
        </header>

        <section id="centro-admin">
            <p>Video que está sendo exibido atualmente na página</p>
            <?php foreach($exibeVideo as $video) : ?>
                <?= $video['iframe'] ?>
                <a href="altera_video.php?id=<?= $video['id'] ?>" id="btn">Alterar o vídeo</a>
            <?php endforeach ?>
            
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>

    <script src="js/jquery.js"></script>
    <script src="js/js.js"></script>
</body>
</html>