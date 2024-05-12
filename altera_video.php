<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Video.php";
    require_once "php/login/verifica_sessao.php";
    require_once "php/login/protecao.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $editaVaga = new Video($pdo);
        $editaVaga->alteraVideo($_POST['id'], $_POST['iframe']);

        header("Refresh: 2 admin_video.php");
        echo "Vídeo alterado com sucesso!";
        die();
    }

    $buscaIdVideo = new Video($pdo);
    $IDvideo = $buscaIdVideo->buscaIDVideo($_GET['id']);

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
    <title>Alterar vídeo</title>
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

        <section  id="centro-admin"">
            <form class="form-login" method="post">
                <i class="fa-solid fa-video"></i>

                <label>Iframe YouTube
                    <input type="text" name="iframe" placeholder="Insira o iframe do video do YouTube" required>
                </label>

                <input type="hidden" name="id" value="<?= $IDvideo['id'] ?>">

                <button type="submit">Alterar</button>

                <p>Altera o vídeo exibido na página</p>

            </form>

            <p>Video que está sendo exibido atualmente na página</p>
            
            <?php foreach($exibeVideo as $video) : ?>
                <?= $video['iframe'] ?>
            <?php endforeach ?>


        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>

    <a id="ajuda" title="Visualizar resultado" target="_blank"><i class="fa-solid fa-question"></i></a>
    <a href="home.php" id="visualizar" title="Visualizar resultado" target="_blank"><i class="fa-solid fa-eye"></i></a>

    <div class="box-ajuda">
        <h3>Como encontrar o iframe do vídeo no Youtube?</h3>
        <br>
            <p><b>1</b> - Acesse o vídeo desejado no Youtube.</p>
            <p><b>2</b> - Clique no botão "Compartilhar".</p>
            <p><b>3</b> - Selecione a opção "Incorporar".</p>
            <p><b>4</b> - Clique no botão "Copiar".</p>
            <p><b>5</b> - Agora basta colar o iframe no campo e alterar o vídeo!</p>
    </div>

</body>

</html>