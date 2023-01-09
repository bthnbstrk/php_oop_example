<?php

namespace Batuhan\EpttavmCase\ServiceProviders;

class DataProvider
{
    public function fetchData(){

        $file = "Storage/products.txt";
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        $products = [];
        foreach ($lines as $line) {
            $product_line = explode("@", $line);
            $product['id']=intval(explode("=", $product_line[0])[1]);
            $product['name']=trim(explode("=", $product_line[1])[1]);
            $product['price']=floatval(explode("=", $product_line[2])[1]);
            $product['category']=trim(explode("=", $product_line[3])[1]);
            $products[] = $product;
            $product_check = $this->validateProduct($product);
            if ($product_check) {
                $products[] = $product;
            }
        }

        return $products;
    }

    private function validateProduct($product)
    {
        if (is_int($product['id']) && is_float($product['price']) && $product['name'] != null && $product['category'] != null) {
            return true;
        }
        return false;
    }

}