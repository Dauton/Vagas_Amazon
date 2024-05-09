<?php

require_once "php/banco/conn.php";
require_once "php/Repositorio/Vagas.php";
require_once "php/login/verifica_sessao.php";
require_once "php/login/protecao.php";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $editaVaga = new Vagas($pdo);
    $editaVaga->editaVaga($_POST['id'], $_POST['uf'], $_POST['cidade'], $_POST['link']);

    header("Refresh: 2 admin.php");
    echo "Vaga editada com sucesso!";
    die();
}

$buscaIdVaga = new Vagas($pdo);
$vaga = $buscaIdVaga->buscaIdVaga($_GET['id']);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar vaga</title>
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
            <a href="php/login/logout.php" id="btn-logout">Sair</a>
        </header>

        <section class="centro">
            <form class="form-login" method="post">
                <i class="fa-solid fa-briefcase"></i>

                <label>Estado UF
                    <select name="uf" required>
                        <option selected value="<?= $vaga['uf'] ?>"><?= $vaga['uf'] ?></option>
                        <option>Roraima</option>
                        <option>Alagoas</option>
                        <option>Amapá</option>
                        <option>Amazonas</option>
                        <option>Bahia</option>
                        <option>Ceará</option>
                        <option>Distrito Federal</option>
                        <option>Espírito Santo</option>
                        <option>Goiás</option>
                        <option>Maranhão</option>
                        <option>Mato Grosso</option>
                        <option>Mato Grosso do Sul</option>
                        <option>Minas Gerais</option>
                        <option>Pará</option>
                        <option>Paraíba</option>
                        <option>Paraná</option>
                        <option>Pernambuco</option>
                        <option>Piauí</option>
                        <option>Rio de Janeiro</option>
                        <option>Rio Grande do Norte</option>
                        <option>Rio Grande do Sul</option>
                        <option>Rondônia</option>
                        <option>Roraima</option>
                        <option>Santa Catarina</option>
                        <option>São Paulo</option>
                        <option>Sergipe</option>
                        <option>Tocantins</option>

                    </select>
                </label>

                <label>Cidade
                    <input type="text" name="cidade" placeholder="Insira a cidade" value="<?= $vaga['cidade'] ?>" required>
                </label>

                <label>Link agência
                    <input type="text" name="link" placeholder="Insira o link da agência" value="<?= $vaga['link'] ?>" required autocomplete="new-password">
                </label>

                <input type="hidden" name="id" value="<?= $vaga['id'] ?>">

                <button type="submit">Editar</button>

            </form>
            <a href="admin.php"><button id="btn">Gerenciar vagas</button></a>
        </section>
        <footer class="rodape">
            <small>Divulgação de vagas (Agências) - ID DO BRASIL LOGISTICA LTDA - 2024</small>
        </footer>
    </main>
</body>

</html>