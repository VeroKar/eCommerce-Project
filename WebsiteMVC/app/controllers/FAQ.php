<?php
class FAQ extends Controller
{
    public function __construct()
    {
        $this->faqModel = $this->model('faqModel');
    }

    public function index()
    {  
        $faqs = $this->faqModel->getFAQs();
        $data = ['faqs' => $faqs];
        $this->view('FAQ/faq', $data);
    }
}
?>