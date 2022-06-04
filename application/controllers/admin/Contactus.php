<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('my_model');
    $this->load->model('com_model');
    $this->load->model('user_model');
    $this->perPage = 10;
    if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
	} 
	   
	public function index(){
      $this->load->library('Ajax_pagination');
		  $tables = BOOKNOW;
		  $data = array();
		  $cond = "id > 0";
		  $keywords   = trim($this->input->get('keywords'));
      $sortBy 	 = $this->input->get('sortBy');
      $perPage 	 = $this->input->get('perpage');
      $activePage  = $this->input->get('activePage');
      $page = $this->input->get('page');
        if(!$page)
            $offset = 0;
        else
            $offset = $page; 

      if($perPage)
			$this->perPage = $perPage;
	    if($keywords){
			   $cond .= " AND name LIKE '%".$keywords."%' ";
		    }
		    $fields = "*";
        $totalRec = $this->com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('contactus/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 10;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	  $conditions['start'] = $offset;
	   	  $conditions['limit'] = $this->perPage;  
		    $data['contact'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
        $data['title']  = COMPANYNAME.' | Contact Us';
        $this->load->view('admin/common/header',$data); 
 		    $this->load->view('admin/common/left-sidebar');
		    $this->load->view('admin/contact/contact_view');
		    $this->load->view('admin/common/footer');			 
	}


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	  $conditions = array();
    $tables = BOOKNOW;
        //calc offset number
    $page = $this->input->get('page');
    if(!$page)
        $offset = 0;
     else
      $offset = $page;
      $keywords   = trim($this->input->get('keywords'));
      $perPage 	= $this->input->get('perpage');
      $activePage = $this->input->get('activePage');
      $cond       = " id > 0";
      if($keywords){
          $cond .= " AND name LIKE '%".$keywords."%' ";
        }

		$fields = "*";
		$totalRec = $this->com_model->cuntrows($tables,"id",$cond);
		$config['target']      = '#postList';
    $config['base_url']    = base_url().'contactus/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perPage;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;
		$config['colspan']     = 10;
    $this->ajax_pagination->initialize($config);
        
    $conditions['start'] = $offset;
    $conditions['limit'] = $perPage;
    $data['contact'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
    $this->load->view('admin/contact/contact_in', $data, false);
    }

}

