<?php require APPROOT . '/views/includes/header.php'; 
?>
<div class="container">
    <h1>Admin Page</h1>
    <p>This is the local Admin Page</p></br>
	
    <h2>Users</h2>
    <table  class="table table-bordered">
        <tr>
            <td>User_ID</td>
            <td>Username</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Admin</td>
            <td>Delete User</td>
        </tr>
        <?php
            foreach($data["clients"] as $master) {
                echo"<tr>";
                echo"<td>$master->user_id</td>";
                echo"<td>$master->username</td>";
                echo"<td>$master->first_name</td>";
                echo"<td>$master->last_name</td>";
                echo"<td>$master->email</td>";
                echo"<td>$master->isAdmin</td>";
                echo"<td><a href='/WebsiteMVC/Owner/deleteUser/$master->user_id'>Delete</td>";
                echo"</tr>";

            }
        ?>
    </table>
    </br></br></br>
    <h2>Orders</h2>
    <table  class="table table-bordered">
        <tr>
            <td>Order_ID</td>
            <td>User_ID</td>
            <td>Order_Date</td>
            <td>Price</td>
        </tr>
        <?php
            foreach($data["order"] as $order) {
                echo"<tr>";
                echo"<td>$order->order_id</td>";
                echo"<td>$order->user_id</td>";
                echo"<td>$order->order_date</td>";
                echo"<td>$order->price</td>";
                echo"</tr>";

            }
        ?>
    </table>
    </br></br></br>
    <h2>Products</h2>
    <button type="button"  class="btn btn-secondary btn-lg"><a href="/WebsiteMVC/Owner/addProduct">Add Product</a></button></br>
    <table  class="table table-bordered">
        <tr>
            <td>Product_ID</td>
            <td>Product Name</td>
            <td>Product Short Description</td>
            <td>Product Description</td>
            <td>Product Type</td>
            <td>Previous Price</td>
            <td>Actual Price</td>
            <td>Material</td>
            <td>Inventory</td>
            <td>Can it be a gift?</td>
            <td>Image</td>
            <td>Update Product</td>
            <td>Delete Product</td>
        </tr>
        <?php
            foreach($data["product"] as $product) {
                echo"<tr>";
                echo"<td>$product->productId</td>";
                echo"<td>$product->productName</td>";
                echo"<td>$product->productShortDescription</td>";
                echo"<td>$product->productDescription</td>";
                echo"<td>$product->productType</td>";
                echo"<td>$product->previousPrice</td>";
                echo"<td>$product->actualPrice</td>";
                echo"<td>$product->material</td>";
                echo"<td>$product->quantity</td>";
                echo"<td>$product->isGift</td>";
                echo"<td>$product->pictureName</td>";
                echo"<td><a href='/WebsiteMVC/Owner/updateProduct/$product->productId'>Update</td>";
                echo"<td><a href='/WebsiteMVC/Owner/deleteProduct/$product->productId'>Delete</td>";
                echo"</tr>";

            }
        ?>
    </table>
    </br></br></br>
    <h2>Carts</h2>
    <table  class="table table-bordered">
        <tr>
            <td>Cart ID</td>
            <td>User ID</td>
            <td>Product ID</td>
            <td>Order ID</td>
            <td>Quantity</td>
        </tr>
        <?php
            foreach($data["cart"] as $cart) {
                echo"<tr>";
                echo"<td>$cart->cart_id</td>";
                echo"<td>$cart->user_id</td>";
                echo"<td>$cart->product_id</td>";
                echo"<td>$cart->order_id</td>";
                echo"<td>$cart->quantity</td>";
                echo"</tr>";

            }
        ?>
    </table>
    </br></br></br>
    <h2>Profit</h2>
    <table  class="table table-bordered">
        <tr>
            <td>Total Profit</td>
        </tr>
        <?php
            foreach($data["profit"] as $profit) {
                echo"<tr>";
                echo"<td>$$profit->profit</td>";
                echo"</tr>";
            }
        ?>
    </table>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>