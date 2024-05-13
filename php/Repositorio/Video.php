<?php


    class Video
    {
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        //========= EXIBE O VIDEO =========//
        public function exibeVideo(): array
        {
            $sql = "SELECT * FROM tb_video";
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        //=========================================


        //========= BUSCA O ID DO VIDEO PARA ALTERAÇÃO =========//
        public function buscaIDVideo(int $id): array
        {
            $sql = "SELECT * FROM tb_video WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetch();
            return $resultado;
        }
        //========================================

        
        //========= ALTERA O VIDEO =========//
        public function alteraVideo(int $id, string $iframe) : void
        {
            $sql = "UPDATE tb_video SET iframe = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $iframe);
            $stmt->bindParam(2, $id);
            $stmt->execute();

        }
        //=========================================
    }