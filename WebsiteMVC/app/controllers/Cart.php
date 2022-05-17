<?php
class Cart extends Controller
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->cartModel = $this->model('cartModel');
        $this->productModel = $this->model('productModel');
    }
 
    /*
     *   List products in the Cart page
     */
    public function index()
    {
        $this->cartSummary();
    }
 
    public function addSingleProduct($product_id)
    {
        $this->cartModel->addSingleProduct($product_id);
        $this->cartSummary();
    }
 
    public function cartSummary()
    {
        $products = $this->cartModel->getAllCartProducts();
        $data = ['products' => $products];
        // Compute total price and number of item
        $totalPrice = 0;
        $numberItems = 0;
        foreach ($data["products"] as $product) {
            $numberItems = $numberItems + $product->quantity;
            $totalPrice = $totalPrice + ($product->quantity * $product->actualPrice);
        }
        $data = ['products' => $products, 'totalPrice' => $totalPrice, 'numberItems' => $numberItems];
        $this->view('Cart/index', $data);
    }
 
    public function removeSingleProduct($product_id)
    {
        $this->cartModel->removeSingleProduct($product_id);
        $products = $this->cartModel->getAllCartProducts();
        $data = ['products' => $products];
        // Compute total price and number of item
        $totalPrice = 0;
        $numberItems = 0;
        foreach ($data["products"] as $product) {
            $numberItems = $numberItems + $product->quantity;
            $totalPrice = $totalPrice + ($product->quantity * $product->actualPrice);
        }
        $data = ['products' => $products, 'totalPrice' => $totalPrice, 'numberItems' => $numberItems];
        $this->view('Cart/index', $data);
    }
 
    public function deleteProduct($product_id)
    {
        $this->cartModel->deleteItemFromCart($product_id);
        $products = $this->cartModel->getAllCartProducts();
        $data = ['products' => $products];
        // Compute total price and number of item
        $totalPrice = 0;
        $numberItems = 0;
        foreach ($data["products"] as $product) {
            $numberItems = $numberItems + $product->quantity;
            $totalPrice = $totalPrice + ($product->quantity * $product->actualPrice);
        }
        $data = ['products' => $products, 'totalPrice' => $totalPrice, 'numberItems' => $numberItems];
        $this->view('Cart/index', $data);
    }
 
    public function checkout()
    {
        $this->cartModel->checkout();
        $products = $this->productModel->getAllProducts();
        $data = ['products' => $products];
        echo "<script>alert('Checkout has been successfully completed!')</script>";
        $this->view('Home/index', $data);
    }
}