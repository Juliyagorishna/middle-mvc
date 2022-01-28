<?php

declare(strict_types=1);

class Router
{
    public function redirectToProductTable(string $message = null) {
    //redirect - переход
        if ($message !== null) {
          $parametr = '&message=' . $message;
        } else {
            $parametr = '';
        }
        header('Location: http://localhost:8080/middleworkMVC/index.php?action=show-product-table' . $parametr);
        exit();
    }
}
