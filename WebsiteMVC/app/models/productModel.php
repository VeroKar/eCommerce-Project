<?php
class productModel
{
    public function __construct()
    {

        $this->db = new Model;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM products");
        return $this->db->getResultSet();
    }

    public function getProductById($product_id)
    {
        $this->db->query("SELECT * FROM products WHERE productId = :product_Id ");
        $this->db->bind(':product_Id', $product_id);
        return $this->db->getSingle();
    }

    public function filterProductsByMaterial($material)
    {
        $this->db->query("SELECT * FROM products WHERE material = :material");
        $this->db->bind(':material', $material);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceUnder($price)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice < :actualPrice");
        $this->db->bind(':actualPrice', $price);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceMiddle($lowPrice, $highPrice)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice >= :lowPrice AND actualPrice <= :highPrice");
        $this->db->bind(':lowPrice', $lowPrice);
        $this->db->bind(':highPrice', $highPrice);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceUpper($price)
    {
        $this->db->query("SELECT * FROM products WHERE actualPrice >= :actualPrice");
        $this->db->bind(':actualPrice', $price);
        return $this->db->getResultSet();
    }

    public function filterProductsByType($productType)
    {
        $this->db->query("SELECT * FROM products WHERE productType = :productType");
        $this->db->bind(':productType', $productType);
        return $this->db->getResultSet();
    }

    public function filterProductsByMaterialAndPrice($material, $price)
    {
        if ($price == "upper_200") {
            $this->db->query("SELECT * FROM products WHERE actualPrice >= :actualPrice AND material = :material");
            $this->db->bind(':material', $material);
            $this->db->bind(':actualPrice', 200);
            return $this->db->getResultSet();
        } else if ($price == "under_100") {
            $this->db->query("SELECT * FROM products WHERE actualPrice < :actualPrice AND material = :material");
            $this->db->bind(':material', $material);
            $this->db->bind(':actualPrice', 100);
            return $this->db->getResultSet();
        } else {
            $this->db->query("SELECT * FROM products WHERE actualPrice >= :lowPrice AND actualPrice <= :highPrice AND material = :material");
            $this->db->bind(':lowPrice', 100);
            $this->db->bind(':highPrice', 200);
            $this->db->bind(':material', $material);
            return $this->db->getResultSet();
        }
    }

    public function filterProductsByMaterialAndType($material, $productType)
    {
        $this->db->query("SELECT * FROM products WHERE productType = :productType AND material = :material");
        $this->db->bind(':productType', $productType);
        $this->db->bind(':material', $material);
        return $this->db->getResultSet();
    }

    public function filterProductsByPriceAndType($price, $productType)
    {
        if ($price == "upper_200") {
            $this->db->query("SELECT * FROM products WHERE actualPrice >= :actualPrice AND productType = :productType");
            $this->db->bind(':productType', $productType);
            $this->db->bind(':actualPrice', 200);
            return $this->db->getResultSet();
        } else if ($price == "under_100") {
            $this->db->query("SELECT * FROM products WHERE actualPrice < :actualPrice AND productType = :productType");
            $this->db->bind(':productType', $productType);
            $this->db->bind(':actualPrice', 100);
            return $this->db->getResultSet();
        } else {
            $this->db->query("SELECT * FROM products WHERE actualPrice >= :lowPrice AND actualPrice <= :highPrice AND productType = :productType");
            $this->db->bind(':lowPrice', 100);
            $this->db->bind(':highPrice', 200);
            $this->db->bind(':productType', $productType);
            return $this->db->getResultSet();
        }
    }

    public function filterProductsByAll($material, $price, $productType)
    {
        if ($price == "upper_200") {
            $this->db->query("SELECT * FROM products WHERE material = :material AND actualPrice >= :actualPrice AND productType = :productType");
            $this->db->bind(':productType', $productType);
            $this->db->bind(':material', $material);
            $this->db->bind(':actualPrice', 200);
            return $this->db->getResultSet();
        } else if ($price == "under_100") {
            $this->db->query("SELECT * FROM products WHERE material = :material AND actualPrice < :actualPrice AND productType = :productType");
            $this->db->bind(':productType', $productType);
            $this->db->bind(':material', $material);
            $this->db->bind(':actualPrice', 100);
            return $this->db->getResultSet();
        } else {
            $this->db->query("SELECT * FROM products WHERE material = :material AND actualPrice >= :lowPrice AND actualPrice <= :highPrice AND productType = :productType");
            $this->db->bind(':lowPrice', 100);
            $this->db->bind(':highPrice', 200);
            $this->db->bind(':productType', $productType);
            $this->db->bind(':material', $material);
            return $this->db->getResultSet();
        }
    }

    public function sortAscPrice()
    {
        $this->db->query("SELECT * FROM products ORDER BY actualPrice ASC");
        return $this->db->getResultSet();
    }

    public function sortDescPrice()
    {
        $this->db->query("SELECT * FROM products ORDER BY actualPrice DESC");
        return $this->db->getResultSet();
    }

    public function addProductToCart($product_id)
    {
        // Query to check if the product il already in the cart
        $userId = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $product_id);
        $resultSet = $this->db->getSingle();

        // If the product exist 
        if (!empty($resultSet)) {
            // Get the current quantity and update the information
            $data = ['product' => $resultSet];
            $current_quantity = (int) $data["product"]->quantity;
            $this->db->query("UPDATE user_selected_product
                              SET quantity = :quantity
                              WHERE user_id = :user_id AND product_id = :product_id");
            $this->db->bind(':quantity', $current_quantity + 1);
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $product_id);
            return $this->db->execute();
        }
        // If the product does not exist 
        else {
            // Add the product in the user cart
            $this->db->query("INSERT INTO user_selected_product (user_id, product_id, quantity)
            VALUES (:user_id, :product_id, :quantity)");
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $product_id);
            $this->db->bind(':quantity', 1);
            return $this->db->execute();
        }
    }

    public function removeProdutFromCart($product_id)
    {
        // Query to check if the product il already in the cart
        $userId = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $product_id);
        $resultSet = $this->db->getSingle();

        // If the product exist 
        if (!empty($resultSet)) {
            // Get the current quantity and update the information
            $data = ['product' => $resultSet];
            $current_quantity = (int) $data["product"]->quantity;
            $this->db->query("UPDATE user_selected_product
                              SET quantity = :quantity
                              WHERE user_id = :user_id AND product_id = :product_id");
            $this->db->bind(':quantity', $current_quantity - 1);
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $product_id);
            return $this->db->execute();
        }
        // If the product does not exist 
        else {
            // Add the product in the user cart
            $this->db->query("INSERT INTO user_selected_product (user_id, product_id, quantity)
            VALUES (:user_id, :product_id, :quantity)");
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $product_id);
            $this->db->bind(':quantity', 1);
            return $this->db->execute();
        }
    }

    /*
     * Deletes an intem prom the cart
     */
    public function deleteItemFromCart($product_id)
    {
        $userId = $_SESSION['user_id'];
        $this->db->execute();
        $this->db->query("DELETE FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind('product_id', $product_id);
        $this->db->bind('user_id', $userId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}