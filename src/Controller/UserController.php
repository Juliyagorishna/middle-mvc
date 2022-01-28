<?php

declare(strict_types=1);
require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__ . '/../Service/Router.php';


class UserController
{
    public function login()
    {
        if($_POST) {
            $userModel = new UserModel();
            $user = $userModel->getUserForLogin();
            $userModel->saveCookie($user['user_login']);
            $router = new Router();
            $router->redirectToProductTable();
        }
        require_once __DIR__ . '/../View/user/login.php';
    }

}
