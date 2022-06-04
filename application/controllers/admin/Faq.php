<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('my_model');
    $this->load->model('com_model');
    $this->load->model('user_model');
    $this->perPage = 10;
	} 
	   
	public function index(){
       
	    $this->load->library('Ajax_pagination');
		$tables = FAQS;
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
			
		$cond .= " AND title LIKE '%".$keywords."%' ";
		}
		    $fields = "*";
        $totalRec = $this->com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('faq/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 9;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
        $this->ajax_pagination->initialize($config);

	   	$conditions['start'] = $offset;
	   	$conditions['limit'] = $this->perPage;  
		  $data['faq'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
	    //	echo "<pre>";
	    //	print_r($data['category']);die;
    $data['title']  = COMPANYNAME.' | Faqs';
    $this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/faq/faq_view');
		$this->load->view('admin/common/footer');			 
	}


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = FAQS;
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
            
        $cond .= " AND title LIKE '%".$keywords."%' ";
        }

		$fields = "*";
		$totalRec = $this->com_model->cuntrows($tables,"id",$cond);
		$config['target']      = '#postList';
    $config['base_url']    = base_url().'faq/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perPage;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;
		$config['colspan']     = 9;
    $this->ajax_pagination->initialize($config);
        
    $conditions['start'] = $offset;
    $conditions['limit'] = $perPage;
        
    $data['faq'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
    $this->load->view('admin/faq/faq_in', $data, false);
    }


    function add()
    {
     //   $data['subcat'] = $this->my_model->getfields(SUBCATEGORY,'id,name',array('status'=>'1'));
        $data['title']  = COMPANYNAME.' | Add Faqs';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/faq/addfaq_view');
        $this->load->view('admin/common/footer'); 
    }


    function addfaq()
    {
     
      $insertData = array(
                             'title'             => $this->input->post('title'),
                             'status'            => $this->input->post('status'),
                             'description'       => $this->input->post('description'),
                             'created_date'     => date('Y-m-d h:i:s'),
                           
                            );
                           // echo "<pre>";
                           // print_r($insertData);die;
        
       $insertid =  $this->my_model->insert_data(FAQS,$insertData);
      // echo $this->db->last_query();die;
       if($insertid)
       {
         $this->msgsuccess("Faqs created successfully.");
         redirect('admin/faq');
       }else
       {
         $this->msgwarning("Faqs not created successfully.");
         redirect('admin/faq');
       }
    }

     function edit($id="")
    {
        $data['page'] = $this->my_model->getfields(FAQS,'*',array('id'=>$id));
        $data['title']  = COMPANYNAME.' | Edit Faqs';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/faq/editfaq_view');
        $this->load->view('admin/common/footer'); 
    }



    function editfaq()
    {
          $id = $this->input->post('page_id');
          $image = $this->input->post('img');
        
       
        $updateData = array(
                             'title'             => $this->input->post('title'),
                             'status'            => $this->input->post('status'),
                             'description'       => $this->input->post('description'),
                              
                            );
                          //  print_r($updateData);die;
        
        $update =  $this->my_model->update_data(FAQS,array('id'=>$id),$updateData);
     // echo $this->db->last_query();die;
       if($update)
       {
         $this->msgsuccess("Faqs edit successfully.");
         redirect('admin/faq');
       }else
       {
         $this->msgwarning("Faqs not edit successfully.");
         redirect('admin/faq');
       }
    }


	

  
	   

}

