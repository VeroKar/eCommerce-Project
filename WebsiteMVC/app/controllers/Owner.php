<?php
class Owner extends Controller
{
    public function __construct()
    {
		$this->OwnerModel = $this->model('OwnerModel');            
    }

    public function index(){
        $user = $this->OwnerModel->getUsers();
        $product = $this->OwnerModel->getProducts();
        $carts = $this->OwnerModel->getCarts();
        $order = $this->OwnerModel->getOrders();
        $profit = $this->OwnerModel->profitSum();
        $data = [
            "clients" => $user,
            "product" => $product,
            "order" => $order,
            "cart" => $carts,
            "profit" => $profit
        ];
        $this->view('OwnerAdmin/OwnerPage', $data);
    }

    function addProduct() {
        if(!isset($_POST['addProductBtn'])) {
            $this->view('OwnerAdmin/OwnerAdd');
        }
        else {
            $data = [
                'name' => $_POST['productName'],
                'shortDescription' => $_POST['productShortDescription'],
                'description' => $_POST['productDescription'],
                'type' => $_POST['productType'],
                'previous' => $_POST['previousPrice'],
                'actual' => $_POST['actualPrice'],
                'material' => $_POST['material'],
                'quantity' => $_POST['quantity'],
                'isGift' => $_POST['isGift'],
                'picture' => $_POST['pictureName']
            ];
            if($this->OwnerModel->addProduct($data)) {
                echo 'Adding Product';
                echo '<meta http-equiv="Refresh" content="2; url=/WebsiteMVC/views/OwnerAdmin/OwnerAdd/">';
            }
        }
    }

    function updateProduct($productId) {
            $display = $this->OwnerModel->getProduct($productId);
            if(!isset($_POST['updateProductBtn'])) {
                $this->view('OwnerAdmin/OwnerUpdate', $display);
            }
            else {
                $data = [
                    'id' => $productId,
                    'name' => $_POST['productName'],
                    'shortDescription' => $_POST['productShortDescription'],
                    'description' => $_POST['productDescription'],
                    'type' => $_POST['productType'],
                    'previous' => $_POST['previousPrice'],
                    'actual' => $_POST['actualPrice'],
                    'material' => $_POST['material'],
                    'quantity' => $_POST['quantity'],
                    'isGift' => $_POST['isGift'],
                    'picture' => $_POST['pictureName']
                ];
                if($this->OwnerModel->updateProduct($data)) {
                    echo 'Updating Product';
                    echo '<meta http-equiv="Refresh" content="2; url=/WebsiteMVC/Owner/index">';
                }
            }
    }

    function deleteProduct($productId) {
        $data=[
            'ID' => $productId
        ];
        if($this->OwnerModel->deleteProduct($data)){
            echo 'Please wait we are deleting the product for you!';
            echo '<meta http-equiv="Refresh" content=".2; url=/WebsiteMVC/Owner/index">';
        }
    }

    function deleteUser($user_id) {
        $data=[
            'ID' => $user_id
        ];
        if($this->OwnerModel->deleteUser($data)){
            echo 'Please wait we are deleting the user for you!';
            echo '<meta http-equiv="Refresh" content=".2; url=/WebsiteMVC/Owner/index">';
        }
    }

    function getAccess() {
        $data = $this->OwnerModel->getAccess();
        return $data;
    }
}
?>