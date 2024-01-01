<?php

class CreateReport
{
    private int $user_id;
    private PDO $pdo;

    public function __construct($user_id, PDO $pdo)
    {
        $this->user_id = $user_id;
        $this->pdo = $pdo;
    }

    public function getReport()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM url_mapping WHERE user_id = ?"
        );

        $statement->execute([$this->user_id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}