<?php
class VisitUs extends Controller
{
    public function __construct()
    {
        $this->visitUsModel = $this->model('visitUsModel');
    }

    public function index()
    {
            $stores = $this->visitUsModel->getStores();
            $data = ['stores' => $stores];
            $this->view('VisitUs/index', $data);
    }

    public function storeDetails($storeID)
    {
            $store = $this->visitUsModel->getStore($storeID);
            $data = ['store' => $store];
            $this->view('VisitUs/storeDetails', $data);
    }
}
?>