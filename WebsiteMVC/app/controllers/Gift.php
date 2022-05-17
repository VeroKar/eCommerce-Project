<?php
class Gift extends Controller
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->giftModel = $this->model('giftModel');
        $this->productModel = $this->model('productModel');
    }
    /*
     *   List products in the Gift page
     */
    public function index()
    {
        /////////////////////////////////////////
        /// Cases to manage unique conditions ///
        /////////////////////////////////////////
        //1. Filter products by material only
        if (isset($_POST['materials']) && !isset($_POST['prices']) && !isset($_POST['type'])) {
            $products = $this->giftModel->filterProductsByMaterial($_POST['materials']);
            $data = ['products' => $products];
        }
        //2. Filter products by price only    
        else if (isset($_POST['prices']) && !isset($_POST['materials']) && !isset($_POST['type'])) {
            $products = $this->filterByRangePrice($_POST['prices']);
            $data = ['products' => $products];
        }
        //3. Filter products by type only
        else if (isset($_POST['type']) && !isset($_POST['materials']) && !isset($_POST['prices'])) {
            $products = $this->giftModel->filterProductsByType($_POST['type']);
            $data = ['products' => $products];
        }
        /////////////////////////////////////////
        /// Cases to manage double conditions ///
        /////////////////////////////////////////
        //1. Filter products by material and price only REVIEW!!
        else if (isset($_POST['materials']) && isset($_POST['prices']) && !isset($_POST['type'])) {
            $products = $this->giftModel->filterProductsByMaterialAndPrice($_POST['materials'], $_POST['prices']);
            $data = ['products' => $products];
        }
        //2. Filter products by material and type only
        else if (isset($_POST['materials']) && isset($_POST['type']) && !isset($_POST['price'])) {
            $products = $this->giftModel->filterProductsByMaterialAndType($_POST['materials'], $_POST['type']);
            $data = ['products' => $products];
        }
        //3. Filter products by price and type only  REVIEW!!
        else if (isset($_POST['prices']) && isset($_POST['type']) && !isset($_POST['material'])) {
            $products = $this->giftModel->filterProductsByPriceAndType($_POST['materials'], $_POST['prices']);
            $data = ['products' => $products];
        }
        /////////////////////////////////////////
        /// Cases to manage triple conditions ///
        /////////////////////////////////////////
        else if (isset($_POST['materials']) && isset($_POST['prices']) && isset($_POST['type'])) {
            $products = $this->giftModel->filterProductsByAll($_POST['materials'], $_POST['prices'], $_POST['type']);
            $data = ['products' => $products];
        }
        // List all products in the gift page
        else {
            $products = $this->giftModel->getAllProducts();
            $data = ['products' => $products];
        }
        $this->view('Gift/index', $data);
    }
    //Sort by ascending price
    public function sortByAscendingPrice()
    {
        $products = $this->giftModel->sortAscPrice();
        $data = ['products' => $products];
        $this->view('Gift/index', $data);
    }
    //Sort by descending price
    public function sortByDescendingPrice()
    {
        $products = $this->giftModel->sortDescPrice();
        $data = ['products' => $products];
        $this->view('Gift/index', $data);
    }
    //Filter by range of price
    public function filterByRangePrice($prices)
    {
        if ($prices == "upper_200") {
            $products = $this->giftModel->filterProductsByPriceUpper(200);
        } else if ($prices == "under_100") {
            $products = $this->giftModel->filterProductsByPriceUnder(100);
        } else {
            $products = $this->giftModel->filterProductsByPriceMiddle(100, 200);
        }
        return  $products;
    }
    //Display product details 
    public function details($product_id)
    {
        if (isset($_POST['addToCartButton'])) {
            $this->addProduct();
        }
        $products = $this->giftModel->getProductById($product_id);
        $data = ['products' => $products];
        $this->view('Gift/details', $data);
    }
    /*
     *   Add new product to cart when the button from the Home controller is pressed
     */
    public function addProduct()
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $pos = strrpos($url, "/");
        $product_id = (int)substr($url, $pos + 1);
        $this->productModel->addProductToCart($product_id);
        echo "<script>alert('Product has been successfully added to cart!')</script>";
    }
}