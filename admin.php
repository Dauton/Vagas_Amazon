<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Vagas.php";
    require_once "php/login/verifica_sessao.php";
    require_once "php/login/protecao.php";

    $exibe = new Vagas($pdo);
    $exibeVagas = $exibe->exibeVagas();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src="https://kit.fontawesome.com/d8ed80570b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="principal">

        <header class="cabecalho">
            <img src="img/id-logo-branco-extenso.png">
            <a href="php/login/logout.php" id="btn-logout">Sair</a>
        </header>

        <section class="centro">
            <h1>Gerenciamento de vagas</h1>

            <table>
                <thead>
                    <tr>
                        <td>Estado</td>
                        <td>Cidade</td>
                        <td>Candidatura</td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exibeVagas as $exibe) : ?>
                    <tr>
                        <td><?= htmlentities($exibe['uf']) ?></td>
                        <td><?= htmlentities($exibe['cidade']) ?></td>
                        <td><a href="#"><?= htmlentities($exibe['link']) ?></a></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="cadastrar_vaga.php"><button id="btn">Cadastrar nova vaga</button></a>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>
</body>
</html>