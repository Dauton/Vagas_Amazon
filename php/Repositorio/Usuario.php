<?php

    class Usuario
    {
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo  = $pdo;
        }

        public function cadastraUsuario(string $nome, string $usuario, string $senha)
        {
            $sql = "INSERT INTO tb_usuarios(nome, usuario, senha) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $usuario);
            $senha = password_hash($senha, PASSWORD_ARGON2ID);
            $stmt->bindParam(3, $senha);
            $stmt->execute();
        }
    }