<?php

require_once 'app/Models/User.php';
class UrlShortener
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        // Подключение к базе данных
        $this->pdo = $pdo;
    }

    public function generateShortUrl($url): string
    {
        // Генерация уникального короткого хвоста URL
        $shortUrl = $this->generateRandomString();

        // Сохранение соответствия оригинального и короткого URL в базе данных
        $sql = $this->pdo->prepare("INSERT INTO url_mapping (user_id, original_url, short_url) VALUES (:user_id, :url, :shortUrl)");
        $sql->execute([
            ':user_id' => $_SESSION['userId'],
            ':url' => $url,
            ':shortUrl' => $shortUrl,
        ]);

        return $shortUrl;
    }

    public function getOriginalUrl($shortUrl)
    {
        // Получение оригинального URL по короткому URL из базы данных
        $sql = $this->pdo->prepare("SELECT original_url FROM url_mapping WHERE short_url = ? ");
        $sql->execute([$shortUrl]);

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            return $row['original_url'];
        } else {
            return null;
        }
    }

    private function generateRandomString($length = 6): string
    {
        // Генерация случайной строки для короткого URL
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function countFollowURL($shortURL): void
    {
        $sql = $this->pdo->prepare("UPDATE url_mapping SET follow_url = follow_url + 1 WHERE short_url = ?");
        $sql->execute([$shortURL]);
    }
}