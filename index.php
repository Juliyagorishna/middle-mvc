<?php
require_once __DIR__ . '/src/Controller/ProductController.php';
require_once __DIR__ . '/src/Controller/UserController.php';

session_start();

switch ($_GET['action']) {
    case 'show-product-table':
       $showproducttable = new ProductController();
       $showproducttable->table();
        break;
    case 'show-list-of-category':
        $showlistofcategory = new ProductController();
        $showlistofcategory->listOfCategory();
        break;
    case 'show-category-with-product':
        $showcategorywithproducts = new ProductController();
        $showcategorywithproducts->categoryWithProducts();
        break;
    case 'creat-product':
        $creatproduct = new ProductController();
        $creatproduct->create();
        break;
    case 'update-product':
        $updateproduct = new ProductController();
        $updateproduct->getDataForupdate();
        break;
    case 'update-product2':
        $updateproduct = new ProductController();
        $updateproduct->update();
        break;
    case 'delete-product':
        $deleteproduct = new ProductController();
        $deleteproduct->delete();
        break;
    default:
        $showlogin = new UserController();
        $showlogin->login();
}
