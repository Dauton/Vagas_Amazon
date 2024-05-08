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
}