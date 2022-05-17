<?php
class cartModel
{
    public function __construct()
    {

        $this->db = new Model;
    }

    /*
     * Gets all products from the cart
     */
    public function getAllCartProducts()
    {
        $user = $_SESSION['user_id'];

        $this->db->query("SELECT user_selected_product.product_id, 
                                 products.productName, 
                                 products.pictureName, 
                                 products.actualPrice,
                                 user_selected_product.quantity
                          FROM products
                          INNER JOIN user_selected_product
                          ON products.productId = user_selected_product.product_id
                          WHERE user_selected_product.user_id = :user_id;");
        $this->db->bind(':user_id', $user);

        $resultSet = $this->db->getResultSet();
        $data = ['product' => $resultSet];
        return $resultSet;
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

    public function removeSingleProduct($product_id)
    {
        // Query to check the product quanity
        $userId = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $product_id);
        $resultSet = $this->db->getSingle();

        // Get the current quantity and update the information
        $data = ['product' => $resultSet];
        $current_quantity = (int) $data["product"]->quantity;

        // If the quanity is egal to 1 remove the item
        if ($current_quantity == 1) {
            $this->db->query("DELETE FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
            $this->db->bind('product_id', $product_id);
            $this->db->bind('user_id', $userId);
            return $this->db->execute();
        }
        // Else remove one frome the current quantity
        else {
            $this->db->query("UPDATE user_selected_product
                               SET quantity = :quantity
                               WHERE user_id = :user_id AND product_id = :product_id");
            $this->db->bind(':quantity', $current_quantity - 1);
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $product_id);
            return $this->db->execute();
        }
    }

    public function addSingleProduct($product_id)
    {
        // Get user id
        $userId = $_SESSION['user_id'];

        // Query to check the product quanity
        $userId = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $product_id);
        $resultSet = $this->db->getSingle();

        // Get the current quantity and update the information
        $data = ['product' => $resultSet];
        $current_quantity = (int) $data["product"]->quantity;

        // Update the quantity by one
        $this->db->query("UPDATE user_selected_product
                               SET quantity = :quantity
                               WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind(':quantity', $current_quantity + 1);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $product_id);
        return $this->db->execute();
    }



    /*
     * Deletes items prom the cart
     */
    public function deleteItemFromCart($product_id)
    {
        $userId = $_SESSION['user_id'];
        $this->db->query("DELETE FROM user_selected_product WHERE user_id = :user_id AND product_id = :product_id");
        $this->db->bind('product_id', $product_id);
        $this->db->bind('user_id', $userId);
        return $this->db->execute();
    }

    /*
     * Shows number of items in the cart
     */
    public function selectAllItemsFromCart()
    {
        $userId = $_SESSION['user_id'];
        $this->db->query("SELECT SUM(quantity) FROM user_selected_product WHERE user_id = $userId");
        $this->db->bind('user_id', $userId);
        return $this->db->execute();
    }

    public function checkout()
    {
        $userId = $_SESSION['user_id'];
        $this->db->query("DELETE FROM user_selected_product WHERE user_id = :user_id");
        $this->db->bind(':user_id', $userId);
        $this->db->execute();

        $this->db->query("UPDATE user
                          SET gotFirstDiscount = :isNewMember
                          WHERE user_id = :user_id");
        $this->db->bind(':isNewMember', 0);
        $this->db->bind(':user_id', $userId);
        $_SESSION['is_new_user'] = 0;
        return $this->db->execute();
    }
}