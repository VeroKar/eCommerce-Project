<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->searchModel = $this->model('searchModel');
    }

    public function index()
    {
        $searchTerms = $_POST['search_form'];    
        $searchResult = $this->searchModel->searchProducts($searchTerms);
        $data = ['products' => $searchResult];

        
        if ($searchTerms == null) {
            $data = [
                'msg' => "Please enter a seach term.",
            ];
        }
        elseif ($searchResult == null) {
            $data = [
                'msg' => "No products found for the search terms selected.",
            ];
        }
        else {
            $data = ['searchResult' => $searchResult];
        }

        $this->view('Search/searchResults', $data);
    }
}
?>