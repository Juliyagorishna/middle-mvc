<?php

require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__ . '/../Model/ProductModel.php';


class ProductController
{
    public function table()
    {
        $userModel = new UserModel;
        $user = $userModel->getUserFromCookie();

        if($user != 0) {
            $hello = "Привет, " . $user['user_login'] . " Добро пожаловать";
        } else {
            $hello = '';
        }
        $productModel = new ProductModel;
        $products = $productModel->getProductsFromDB();

        require_once __DIR__ . '/../View/product/table.php';
    }
    public function create()
    {
       $productModel = new ProductModel();
        $creatProduct = $productModel->СreatProduct();
        if ($creatProduct == false) {
            $router = new Router();
            $router->redirectToProductTable('Продукт уже существует');

        } else {
            $router = new Router();
            $router->redirectToProductTable('Продукт создан');
        }
    }
    public function getDataForupdate()
    {
        $productModel = new ProductModel();
        $products = $productModel->GetProductForUpdate();
        require_once __DIR__ . '/../View/product/FormForUpdateMVC.php';
    }
    public function update() {
        $productModel = new ProductModel();
        $productModel->UpdateProduct();
        $router = new Router();
        $router->redirectToProductTable('Продукт обновлен');

    }
    public function delete()
    {
        $productModel = new ProductModel();
        $productModel->deleteProduct();
        $router = new Router();
        $router->redirectToProductTable('Продукт Удален');
    }

    public function listOfCategory()
    {
        $productModel = new ProductModel;
        $list = $productModel->getCategoryFromDB();
        require_once __DIR__ . '/../View/product/listOfCategory.php';
    }
    public function categoryWithProducts() {
        $productModel = new ProductModel;
        $categoryWithProducts = $productModel->getProductswithCategory();
        require_once __DIR__ . '/../View/product/categoryWithProducts.php';

    }
}
