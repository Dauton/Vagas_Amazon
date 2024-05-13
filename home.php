<?php

require_once "php/banco/conn.php";
require_once "php/Repositorio/Vagas.php";
require_once "php/Repositorio/Video.php";

$exibe = new Vagas($pdo);
$exibeVagas = $exibe->exibeVagas();

$video = new Video($pdo);
$exibeVideo = $video->exibeVideo();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ID Logistics</title>
    <link rel="shortcut icon" type="imagex/png" href="img/id-logo-browser.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style_home.css'>

    <script src="https://kit.fontawesome.com/d8ed80570b.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
</head>

<body>
    <main class="principal">
        <header class="cabecalho">
        <a href="https://www.id-logistics.com/br/" target="_blank"><img src="img/logo-id-extenso.png"></a>
            <div class="cabecalho-title">
                <h1>TRABALHE EM UMA MULTINACIONAL REPLETA DE OPORTUNIDADES</h1>
                <p>Conte com salário e benefícios competitívos no mercado, além da alta gama de oportunidades de crescimento profissional.</p>
            </div>
        </header>
        <section class="center">

            <h1 class="center-title"><i class="fa-solid fa-star"></i> Um pouco da ID Logitics</h1>

            <article class="center-sessao-imgs">
                <h3>Somos um dos principais nomes da logística internacional 🌎</h3>
                <p>A ID Logistics foi fundada na França em 2001 e há 20 anos desembarcou no Brasil já se tornando referência no mercado logístico brasileiro, com mais de 860 mil m² de área distribuída em 5 estados com cerca de 6.000 colaboradores.</p>

                <img src="img/imagem08.jpg">
                <img src="img/imagem04.jpg">
                <img src="img/imagem02.jpg">
            </article>

            <hr>

            <h1 class="center-title"><i class="fa-solid fa-star"></i> Nossa missão, nossa visão e nossos valores</h1>

            <article class="center-sessao-mvv">
                <section class="center-sessao-mvv-boxs">
                    <div>
                        <img src="img/missao.png">
                    </div>
                    <h2>Missão</h2>
                    <p>Oferecer soluções na cadeia logística de forma inovadora e transparente, favorecendo competitividade aos nossos clientes e com desenvolvimento sustentável.</p>
                </section>
                <section class="center-sessao-mvv-boxs">
                    <div>
                        <img src="img/visao.png">
                    </div>
                    <h2>Visão</h2>
                    <p>Ser referência na execução e na inovação em contratos logísticos.</p>
                </section>
                <section class="center-sessao-mvv-boxs">
                    <div>
                        <img src="img/valores.png">
                    </div>
                    <h2>Valores</h2>
                    <p>Solidariedade, Empreendedorismo, Altos Padrões e Excelência Operacional.</p>
                </section>
            </article>

            <hr>

            <section class="vagas">
            <h1 class="center-title"><i class="fa-solid fa-star"></i> VENHA FAZER PARTE DO NOSSO TIME! <i class="fa-solid fa-star"></i></h1>
            <p><b>Confira</b> algumas oportunidades através de algumas agências parceiras! <b><br>#VempraID #OrgulhoEmSerID</b> 💙</p>
            <br>
            <table>
                <thead>
                    <tr>
                        <td>ESTADO UF</td>
                        <td>CIDADE</td>
                        <td>CANDIDATURA</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exibeVagas as $exibe) : ?>
                    <tr>
                        <td><?= htmlentities($exibe['uf']) ?></td>
                        <td><?= htmlentities($exibe['cidade']) ?></td>
                        <td class="ultima-coluna"><a href="<?= htmlentities($exibe['link']) ?>" target="_blank">Candidate-se <i class="fa-solid fa-forward"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>

        </section>

            <hr>

            <h1 class="center-title"><i class="fa-solid fa-star"></i> #ORGULHO EM SER ID</h1>

            <article class="center-sessao-video">
                <h3>Aceleramos a transformação logística no Brasil 🇧🇷</h3>
                <p>Com mais de 9 mil colaboradores, a ID Logistics é uma das maiores operadoras logísticas do Brasil! Atualmente, contamos com um milhão de metros quadrados de armazenagem, destinados à logística de players de grande porte em mais de 60 centros de distribuição espalhados no território brasileiro. Acreditamos que nosso maior valor são as nossas pessoas, estamos focados no desenvolvimento de nossos talentos, de forma que todos os nossos colaboradores sintam orgulho em pertencer ao agora e ao futuro de nossa empresa. Somos um só time, com uma responsabilidade e um único objetivo. Aqui temos <b>#OrgulhoEmSerID!</b></p>
                
                <?php foreach($exibeVideo as $video) : ?>
                    <?= $video['iframe'] ?>
                <?php endforeach ?>
            </article>
            
            <hr>

            <article class="center-sessao-imgs">
                <img src="img/imagem03.jpg">
                <img src="img/imagem06.jpg">
                <img src="img/imagem01.jpg">
            </article>

        </section>

        <footer class="rodape">

            <div class="rodape-social-media">
                <a href="https://www.linkedin.com/company/id-logistics/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://www.id-logistics.com/br/" target="_blank"><img src="img/id-logo-branco.png"></a>
            </div>

            <small>&copy; Todos os direitos reservados | ID LOGISTICA DO BRASIL LTDA - 2024</small>

        </footer>
    </main>
    <img src="img/id-logo.png" id="id-logo-transparente">
</body>

</html>