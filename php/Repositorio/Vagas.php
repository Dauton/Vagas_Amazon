<?php

class Vagas
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastraVaga(string $uf, string $cidade, string $link): void
    {
        $sql = "INSERT INTO tb_vagas(uf,cidade,link) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $uf);
        $stmt->bindParam(2, $cidade);
        $stmt->bindParam(3, $link);
        $stmt->execute();
    }

    public function exibeVagas(): array
    {
        $sql = "SELECT * FROM tb_vagas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function excluiVaga(int $id) : void
    {
        $sql = "DELETE FROM tb_vagas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function buscaIdVaga(int $id): array
    {
        $sql = "SELECT * FROM tb_vagas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $resultado = $stmt->fetch();
        return $resultado;
    }

    public function editaVaga(int $id, string $uf, string $cidade, string $link): void
    {
        $sql = "UPDATE tb_vagas SET uf = ?, cidade = ?, link = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $uf);
        $stmt->bindParam(2, $cidade);
        $stmt->bindParam(3, $link);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }
}