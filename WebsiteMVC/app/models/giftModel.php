<?php
class giftModel
{
    public function __construct(){

        $this->db = new Model;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM products WHERE isGift = 1");
        return $this->db->getResultSet();
    }

    public function getProductById($product_id)
    {
        $this->db->query("SELECT * FROM products WHERE productId = :product_Id AND isGift = 1");
        $this->db->bind(':product_Id', $product_id);
        return $this->db->getSingle();
    }

    public function filterProductsByMaterial($material)
    {
        $this->db->query("SELECT * FROM products WHERE material = :material AND isGift = 1");
        $this->db->bind(':material', $material);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceUnder($price)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice < :actualPrice AND isGift = 1");
        $this->db->bind(':actualPrice', $price);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceMiddle($lowPrice, $highPrice)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice >= :lowPrice AND actualPrice <= :highPrice AND isGift = 1");
        $this->db->bind(':lowPrice', $lowPrice);
        $this->db->bind(':highPrice', $highPrice);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceUpper($price)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice >= :actualPrice AND isGift = 1");
        $this->db->bind(':actualPrice', $price);
        return $this->db->getResultSet();
    }

    public function filterProductsByType($productType)
    {
        $this->db->query("SELECT * FROM products WHERE productType = :productType AND isGift = 1");
        $this->db->bind(':productType', $productType);
        return $this->db->getResultSet();
    }

    public function filterProductsByMaterialAndPrice($material, $price)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice = :actualPrice AND material = :material AND isGift = 1");
        $this->db->bind(':material', $material);
        $this->db->bind(':actualPrice', $price);
        return $this->db->getResultSet();
    }

    public function filterProductsByMaterialAndType($material, $productType)
    {
        $this->db->query("SELECT * FROM products WHERE productType = :productType AND material = :material AND isGift = 1");
        $this->db->bind(':productType', $productType);
        $this->db->bind(':material', $material);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceAndType($price, $productType)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice = :actualPrice AND productType = :productType AND isGift = 1");
        $this->db->bind(':actualPrice', $price);
        $this->db->bind(':productType', $productType);
        return $this->db->getResultSet();
    }

    public function filterProductsByAll($material, $price, $productType)
    {
        $this->db->query("SELECT * FROM products WHERE material = :material AND actualPrice = :actualPrice AND productType = :productType AND isGift = 1");
        $this->db->bind(':material', $material);
        $this->db->bind(':actualPrice', $price);
        $this->db->bind(':productType', $productType);
        return $this->db->getResultSet();
    }

    public function sortAscPrice()
    {
        $this->db->query("SELECT * FROM products WHERE isGift = 1 ORDER BY actualPrice ASC");
        return $this->db->getResultSet();
    }

    public function sortDescPrice()
    {
        $this->db->query("SELECT * FROM products WHERE isGift = 1 ORDER BY actualPrice DESC");
        return $this->db->getResultSet();
    }
}
