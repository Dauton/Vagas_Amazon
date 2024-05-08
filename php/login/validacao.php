<?php

    require_once "../banco/conn.php";

    session_start();

    if(isset($_POST['usuario']) && isset($_POST['senha']))
    {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM tb_usuarios WHERE usuario = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":usuario" => $usuario));
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if($resultado) {
            if(password_verify($senha, $resultado['senha'])) {
                $_SESSION['usuario'] = $resultado['usuario'];
                $_SESSION['senha'] = $resultado['senha'];

                header("Location: ../../admin.php");
                die();
            } else {
                header("Refresh: 2 ../../index.php");
                echo "Credenciais inválidas";
                die();
            }
        } else {
            header("Refresh: 2 ../../index.php");
            echo "Credenciais inválidas";
            die();
        }
    } else {
        header("Refresh: 2 ../../index.php");
        echo "Credenciais inválidas";
        die();
    }