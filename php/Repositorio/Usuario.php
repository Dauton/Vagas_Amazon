<?php

    class Usuario
    {
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo  = $pdo;
        }



    //========= CADASTRA USUARIO =========//
        public function cadastraUsuario(string $nome, string $usuario, string $senha) : void
        {
            $sql = "INSERT INTO tb_usuarios(nome, usuario, senha) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $usuario);
            $senha = password_hash($senha, PASSWORD_ARGON2ID);
            $stmt->bindParam(3, $senha);
            $stmt->execute();
        }
        //==================================


        //========= BUSCA ID DO USUARIO PARA TROCA DA SENHA =========//
        public function buscaIdSenha(int $id) : array
        {
            $sql = "SELECT * FROM tb_usuarios WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetch();
            return $resultado;
        }
        //==================================

        //========= ALTERAR A SENHA =========//
        public function minhaSenha(int $id, string $senha) : void
        {
            $sql = "UPDATE tb_usuarios SET senha = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $senha = password_hash($senha, PASSWORD_ARGON2ID);
            $stmt->bindParam(1, $senha);
            $stmt->bindParam(2, $id);
            $stmt->execute();
        }
        //==================================
    }