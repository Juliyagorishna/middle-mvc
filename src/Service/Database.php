<?php

declare(strict_types=1);

class Database
{
    public PDO $connection;

    public function __construct()
    {
        $host = 'mysql';
        $port = 3306;
        $dbname = 'study';
        $username = 'root';
        $password = 'root';
        $this->connection = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    }

    public function getAll()
    {
        $statement = $this->connection->query('select * from products');
        return $statement->fetchAll();
    }

    public function getCategory()
    {
        $statement = $this->connection->query('select distinct category  from products');
        return $statement->fetchAll();
    }

    public function getProducts($category)
    {
        $statement = $this->connection->query('select name  from products where category ="' . $category . '";');
        return $statement->fetchAll();
    }

    public function CreatProduct($name, $category, $sku, $price, $quantity)
    {
        $newProduct = $this->connection->prepare('INSERT INTO products (name , category, sku, price, quantity)
 values ( :name , :category, :sku, :price, :quantity);');
        $newProduct->execute([
            ':name' => $name,
            ':category' => $category,
            ':sku' => $sku,
            ':price' => $price,
            ':quantity' => $quantity]);
    }

    public function DeleteProduct($name, $category)
    {
        $productDelete = $this->connection->prepare('Delete from products
        where name = :name and category = :category');
        $productDelete->execute([
            ':name' => $name,
            ':category' => $category]);
    }

    public function UpdateProdact($name, $category, $sku, $price, $quantity)
    {
        $productUpdated = $this->connection->prepare('UPDATE products SET price = :price, sku = :sku, quantity = :quantity
        where name = :name and category = :category');
        $productUpdated->execute(
            [
                ':name' => $name,
                ':category' => $category,
                ':price' => $price,
                ':sku' => $sku,
                ':quantity' => $quantity,
            ]
        );
        $count = $productUpdated->rowCount();
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function GetProduct($name, $category)
    {
        $getProducts = $this->connection->prepare('SELECT * from products where name = :name and category = :category');
        $getProducts->execute(
            [
                ':name' => $name,
                ':category' => $category,
            ]
        );
        return $getProducts->fetch();
    }

    public function getProductForUpdate($name)
    {
        $statement = $this->connection->query('select name, category, sku, price, quantity  from products where name ="' . $name . '";');
        return $statement->fetchAll();
    }

    public function CreatUser($user_login, $user_password)
    {
        $newUser = $this->connection->prepare('INSERT INTO Users ( user_login, user_password, user_hash)
 values ( :user_login , :user_password, :user_hash);');
        $newUser->execute(
            [
                ':user_login' => $user_login,
                ':user_password' => $user_password,
                ':user_hash' => md5($user_login)
            ]
        );
    }

    public function GetUser($name, $email)
    {
        $user = $this->connection->query('SELECT * FROM users WHERE user_login ="' . $name . '" AND user_password = "' . $email . '";');
        return $user->fetch();
    }

    public function getUserByName($name): ?array
    {
        $statement = $this->connection->query('SELECT * FROM users WHERE user_login ="' . $name . '";');
        $user = $statement->fetch();

        if (is_array($user)) {
            return $user;
        }
        return null;
    }
}
