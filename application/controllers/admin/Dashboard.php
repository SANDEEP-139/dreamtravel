<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		
        $this->load->model('My_model');
        $this->load->model('com_model');
         $this->load->model('user_model');
       if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
        
	} 
	   
	public function index(){
      
        $data['title']  = COMPANYNAME.' | Dashboard';
      
 		if (empty($this->session->userdata('admin_logged_in')))
		{
		  redirect('admin');
	    }	
	    else{
	    $this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/dashboard/dashboard_view');
		$this->load->view('admin/common/footer');	
	}
	    }
				 
	}

	

  
	   



