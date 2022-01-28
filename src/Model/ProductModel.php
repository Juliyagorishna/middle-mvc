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

    public function GetdataForCreate($data)
    {
        $product = [
            'name' => $data['name'],
            'category' => $data["category"],
            'sku' => $data["sku"],
            'price' => $data["price"],
            'quantity' => $data["quantity"]];
        return $product;
    }

    public function СreatProduct()
    {
        $productArray = $this->GetdataForCreate($_POST);
        $database = new Database();

        if ($database->GetProduct($productArray['name'], $productArray['category'])) {
            return false;
        }
        $database->CreatProduct($productArray['name'], $productArray['category'], $productArray['sku'], $productArray['price'], $productArray['quantity']);
         return true;
    }
    public function GetProductForUpdate() {
    $database = new Database();
   return $database->getProductForUpdate($_GET['name']);
    }

    public function UpdateProduct()
    {
        $productArray = $this->GetdataForCreate($_POST);
        $database = new Database();
        $database->UpdateProdact($productArray['name'], $productArray['category'], $productArray['sku'], $productArray['price'], $productArray['quantity']);

    }
    public function deleteProduct() {
        $database = new Database();
        $database->DeleteProduct($_GET['name'], $_GET['category']);
    }


}
