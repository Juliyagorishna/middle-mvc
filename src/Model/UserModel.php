<?php

declare(strict_types=1);

require_once __DIR__ . '/../Service/Database.php';

class UserModel
{

    public function getUserFromCookie(): ?array
    {
        $database = new Database();

        return $database->getUserByName($_COOKIE['user']);

    }
    public function getUserForLogin() : ?array
    {
        $database = new Database();
        return $database->GetUser($_POST['name'], $_POST['email']);
    }
    public function saveCookie(string $userLogin) :void
    {
        setcookie('user', $userLogin, time() + 3700, "/");
    }
}

