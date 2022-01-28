<?php

declare(strict_types=1);

class ProductModel
{
    public function getProductsFromDB()
    {
        $database = new Database();
        return $database->getAll();
    }

    public function getCategoryFromDB()
    {
        $database = new Database();
        return $database->getCategory();
    }

    public function getProductswithCategory()
    {
        $database = new Database();
        return $database->getProducts($_GET['category']);
    }

    public function getdataForCreate($data)
    {
        $product = [
            'name' => $data['name'],
            'category' => $data["category"],
            'sku' => $data["sku"],
            'price' => $data["price"],
            'quantity' => $data["quantity"]];
        return $product;
    }

    public function creatProduct()
    {
        $productArray = $this->getdataForCreate($_POST);
        $database = new Database();

        if ($database->getProduct($productArray['name'], $productArray['category'])) {
            return false;
        }
        $database->creatProduct($productArray['name'], $productArray['category'], $productArray['sku'], $productArray['price'], $productArray['quantity']);
         return true;
    }
    public function getProductForUpdate() {
    $database = new Database();
   return $database->getProductForUpdate($_GET['name']);
    }

    public function updateProduct()
    {
        $productArray = $this->getdataForCreate($_POST);
        $database = new Database();
        $database->updateProdact($productArray['name'], $productArray['category'], $productArray['sku'], $productArray['price'], $productArray['quantity']);

    }
    public function deleteProduct() {
        $database = new Database();
        $database->deleteProduct($_GET['name'], $_GET['category']);
    }


}
