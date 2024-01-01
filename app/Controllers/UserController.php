<?php

use Models\User;
require_once 'app/Models/User.php';
class UserController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @throws Exception
     */
    public function registerUser(User $user, string $plainPassword): int
    {

        if ( strlen($user->getUsername()) > 20 ) {
            throw new Exception('Логин не должен быть более 20 символов');
        }
        $statement = $this->pdo->prepare(
            'INSERT INTO users (username, password) VALUES (:username, :password)'
        );

        $statement->execute([
            'username' => $user->getUsername(),
            'password' => md5($plainPassword)
        ]);

        return $this->pdo->lastInsertId();
    }

    // Метод получения пользователя. Если данные не совпали, вернет null
    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT id, username FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        $statement->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$username]) ?: null;
    }

    public function checkUsername (string $username): bool
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $statement->execute([$username]);
        return !$statement->fetch();
    }

}