<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Vagas.php";

    $exibe = new Vagas($pdo);
    $exibeVagas = $exibe->exibeVagas();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ID Logistics</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style_home.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8ed80570b.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="centro">
        <header class="cabecalho">
            <img src="img/logo-id-extenso.png">
        </header>
        <article class="artigo-01">
            <h2>OPORTUNIDADE EM UMA MULTINACIONAL</h2>
            <p>Aqui você contará com salário e benefícios competitivos, além da ampla gama de oportunidades de crescimento.</p>
        </article>
        <article class="artigo-02">
            <img src="img/imagem01.jpg">
            <img src="img/imagem04.jpg">
            <img src="img/imagem02.jpg">
        </article>
            <h1>UM POUCO SOBRE A ID LOGISTICS</h1>
        <article class="artigo-03">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/KnEzHdFAN9M?si=n-MLOTzXsfnFOaCz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p><b>Somos um dos principais nomes da logística internacional.</b>
                A ID Logistics foi fundada na França em 2001 e há 20 anos desembarcou no Brasil já se tornando referência no mercado logístico brasileiro, com mais de 860 mil m² de área distribuída em 5 estados com cerca de 6.000 colaboradores.</p>
        </article>
        <h1>Missão, Visão e Valores</h1>
        <article class="artigo-04">
            <section class="sessao-mvv">
                <div>
                    <div class="box-img">
                        <img src="img/missao.png">
                    </div>
                    <h2>Missão</h2>
                    <p>Oferecer soluções na cadeia logística de forma inovadora e transparente, favorecendo competitividade aos nossos clientes e com desenvolvimento sustentável.</p>
                </div>
                <div>
                    <div class="box-img">
                        <img src="img/visao.png">
                    </div>
                    <h2>Visão</h2>
                    <p>Ser referência na execução e na inovação em contratos logísticos.</p>
                </div>
                <div>
                    <div class="box-img">
                        <img src="img/valores.png">
                    </div>
                    <h2>Valores</h2>
                    <p>Solidariedade, Empreendedorismo, Altos Padrões e Excelência Operacional.</p>
                </div>
            </section>
        </article>
        <h1>Confira nossas vagas</h1>
        <article class="artigo-05">
            <p>Essas vagas são disponilizadas através de nossas agências parceiras</p>
                <table>
                    <thead>
                        <tr>
                            <td>Estado UF</td>
                            <td>Cidade</td>
                            <td>Candidatura</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($exibeVagas as $exibe) : ?>
                        <tr>
                            <td><?= htmlentities($exibe['uf']) ?></td>
                            <td><?= htmlentities($exibe['cidade']) ?></td>
                            <td><a href="<?= htmlentities($exibe['link']) ?>">Candidate-se</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </article>
        <footer class="rodape">

        </footer>

    </section>
</body>

</html>