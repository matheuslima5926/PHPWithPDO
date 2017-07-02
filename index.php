<?php
//classes
require_once 'Connect.php';
require_once 'Product.php';
//interfaces
require_once 'IConnect.php';
require_once 'IProduct.php';
require_once 'ProductDAO.php';

$db = new Connect("localhost","crud","root","");

$product = new Product;
$product->setName("Product name")
        ->setDesc("Product description");

$service = new ProductDAO($db,$product);
print_r($service->save());

