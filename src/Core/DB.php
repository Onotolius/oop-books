<?php

namespace App\Core;

use PDO;

class DB
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $sql, array $param = []): bool
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($param);

    }

    public function select(string $sql, array $param = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $sql, $param): string
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($param);
        return $this->pdo->lastInsertId();
    }

}
