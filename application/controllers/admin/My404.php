<?php 
class My404 extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() { 
	///echo "<h1>PAGE NOT FOUND</h1>";
		//$this->load->view('web/common/header');
		$this->load->view('errors/404');
		//$this->load->view('web/common/footer');
		
    } 
} 
?> 