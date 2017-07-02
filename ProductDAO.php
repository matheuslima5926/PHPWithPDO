<?php

//interfaces
require_once 'IConnect.php';
require_once 'IProduct.php';


//classes
require_once 'Product.php';

class ProductDAO
{
    private $db;
    private $product;
    public function __construct(IConn $db, IProduct $product)
    {
        $this->db = $db->connect();
        $this->product = $product;
    }
    public function list()
    {
        $query = "Select * from `product`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function save()
    {
        $query = "Insert into `product` (`name`,`description`) VALUES (:name,:desc)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":name",$this->product->getName());
        $stmt->bindValue(":desc",$this->product->getDesc());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}