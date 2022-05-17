<?php
class Home extends Controller
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
        $this->cartModel = $this->model('cartModel');
    }

    /*
     *   List products in the home/main page
     */
    public function index()
    {
        /////////////////////////////////////////
        /// Cases to manage triple conditions ///
        /////////////////////////////////////////
        if (isset($_POST['materials']) && isset($_POST['prices']) && isset($_POST['type'])) {
            $products = $this->productModel->filterProductsByAll($_POST['materials'], $_POST['prices'], $_POST['type']);
            $data = ['products' => $products];
        }

        /////////////////////////////////////////
        /// Cases to manage unique conditions ///
        /////////////////////////////////////////

        //Filter products by material only
        else if (isset($_POST['materials']) && !isset($_POST['prices']) && !isset($_POST['type'])) {
            $products = $this->productModel->filterProductsByMaterial($_POST['materials']);
            $data = ['products' => $products];
        }

        //Filter products by price only    
        else if (isset($_POST['prices']) && !isset($_POST['materials']) && !isset($_POST['type'])) {
            $products = $this->filterByRangePrice($_POST['prices']);
            $data = ['products' => $products];
        }

        //Filter products by type only
        else if (isset($_POST['type']) && !isset($_POST['materials']) && !isset($_POST['prices'])) {
            $products = $this->productModel->filterProductsByType($_POST['type']);
            $data = ['products' => $products];
        }

        /////////////////////////////////////////
        /// Cases to manage double conditions ///
        /////////////////////////////////////////

        //Filter products by material and price only
        else if (isset($_POST['materials']) && isset($_POST['prices']) && !isset($_POST['type'])) {
            $products = $this->productModel->filterProductsByMaterialAndPrice($_POST['materials'], $_POST['prices']);
            $data = ['products' => $products];
        }
        //Filter products by material and type only
        else if (isset($_POST['materials']) && isset($_POST['type']) && !isset($_POST['price'])) {
            $products = $this->productModel->filterProductsByMaterialAndType($_POST['materials'], $_POST['type']);
            $data = ['products' => $products];
        }
        //Filter products by price and type only
        else if (isset($_POST['prices']) && isset($_POST['type']) && !isset($_POST['material'])) {
            $products = $this->productModel->filterProductsByPriceAndType($_POST['prices'], $_POST['type']);
            $data = ['products' => $products];
        }
        // List all products in the home/main page
        else {
            $products = $this->productModel->getAllProducts();
            $data = ['products' => $products];
        }
        $this->view('Home/index', $data);
    }

    //Sort by ascending price
    public function sortByAscendingPrice()
    {
        $products = $this->productModel->sortAscPrice();
        $data = ['products' => $products];
        $this->view('Home/index', $data);
    }

    //Sort by descending price
    public function sortByDescendingPrice()
    {
        $products = $this->productModel->sortDescPrice();
        $data = ['products' => $products];
        $this->view('Home/index', $data);
    }

    //Filter by range of price
    public function filterByRangePrice($prices)
    {
        if ($prices == "upper_200") {
            $products = $this->productModel->filterProductsByPriceUpper(200);
        } else if ($prices == "under_100") {
            $products = $this->productModel->filterProductsByPriceUnder(100);
        } else {
            $products = $this->productModel->filterProductsByPriceMiddle(100, 200);
        }
        return  $products;
    }
    //Display product details 
    public function details($product_id)
    {
        if (isset($_POST['addToCartButton'])) {
            $this->addProduct();
        }

        $products = $this->productModel->getProductById($product_id);
        $data = ['products' => $products];
        $this->view('Home/details', $data);
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