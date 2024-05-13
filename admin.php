<?php

    require_once "php/banco/conn.php";
    require_once "php/Repositorio/Vagas.php";
    require_once "php/login/verifica_sessao.php";
    require_once "php/login/protecao.php";
    require_once "php/function/style_msg.php";

    estiloMensagem();

    //========= EXIBE TODAS AS VAGAS CADASTRADA =========//
    $exibe = new Vagas($pdo);
    $exibeVagas = $exibe->exibeVagas();
    //===================================================//


    //========= EXCLUI A VAGA DA LISTA =========//
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $excluiVaga = new Vagas($pdo);
        $excluiVaga->excluiVaga($_POST['id']);

        header("Refresh: 1.5 admin.php");
        echo "<p class='acao'>Vaga excluída com sucesso!</p>";
        die();
    }
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
                    <li><a href="minha_senha.php?id=<?= $_SESSION['id'] ?>"><button id="btn">Minha senha</button></a></li>
                    <li><a href="php/login/logout.php"><button id="btn-logout">Sair</button></a></li>
                </ul>
            </nav>
        </header>

        <p><b>Usuário: </b><?= $_SESSION['nome'] ?></p>

        <section id="centro-admin">
            <h1>Gerenciamento de vagas</h1>

            <table>
                <thead>
                    <tr>
                        <td>Estado</td>
                        <td>Cidade</td>
                        <td>Link agência</td>
                        <td>Edição</td>
                        <td>Exclusão</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exibeVagas as $exibe) : ?>
                    <tr>
                        <td><?= htmlentities($exibe['uf']) ?></td>
                        <td><?= htmlentities($exibe['cidade']) ?></td>
                        <td><a href="<?= htmlentities($exibe['link']) ?>" target="_blank">Acessar link</a></td>
                        <td>
                            <form>
                                <a href="editar_vaga.php?id=<?= $exibe['id'] ?>" id="btn-editar">Editar</a>
                            </form>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $exibe['id'] ?>">
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

    <a href="home.php" id="visualizar" title="Visualizar resultado" target="_blank"><i class="fa-solid fa-eye"></i></a>

    <script src="js/jquery.js"></script>
    <script src="js/js.js"></script>
    
</body>
</html>