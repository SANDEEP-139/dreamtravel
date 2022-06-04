<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller
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
		$tables = PAGE;
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
        $config['base_url']    = base_url('page/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 9;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	$conditions['start'] = $offset;
	   	$conditions['limit'] = $this->perPage;  
		$data['page'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
	//	echo "<pre>";
	//	print_r($data['category']);die;
    $data['title']  = COMPANYNAME.' | Page';
    $this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/page/page_view');
		$this->load->view('admin/common/footer');			 
	}


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = PAGE;
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
        $config['base_url']    = base_url().'page/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		$config['colspan']     = 9;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['page'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/page/page_in', $data, false);
    }


    function add()
    {
     //   $data['subcat'] = $this->my_model->getfields(SUBCATEGORY,'id,name',array('status'=>'1'));
        $data['title']  = COMPANYNAME.' | Add Page';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/page/addpage_view');
        $this->load->view('admin/common/footer'); 
    }


    function addpage()
    {
        
       //$imgArr =array();
         $image ='';
            if (!empty($_FILES['imgname']['name'])) {

            $type     = explode('.', $_FILES["imgname"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;

            $url = "pageimage/" . $filename;

            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "pageimage/".$filename;
           // $imgArr = array('image'=>$image);
        } 
       
          $insertData = array(
                             'title'             => $this->input->post('title'),
                             'description'       => $this->input->post('description'),
                             'ldescription'       => $this->input->post('ldescription'),
                             'status'           => $this->input->post('status'),
                             'created_date'     => date('Y-m-d h:i:s'),
                             'image'            => $image,
                          
                            );
                           // echo "<pre>";
                           // print_r($insertData);die;
        
       $insertid =  $this->my_model->insert_data(PAGE,$insertData);
      // echo $this->db->last_query();die;
       if($insertid)
       {
         $this->msgsuccess("Page created successfully.");
         redirect('admin/page');
       }else
       {
         $this->msgwarning("Page not created successfully.");
         redirect('admin/page');
       }
    }

     function edit($id="")
    {
        $data['page'] = $this->my_model->getfields(PAGE,'id,title,image,ldescription,description,status',array('id'=>$id));
       // $data['subcat'] = $this->my_model->getfields(SUBCATEGORY,'id,name',array('status'=>'1'));

       // print_r($data['user']);
        $data['title']  = COMPANYNAME.' | Edit Page';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/page/editpage_view');
        $this->load->view('admin/common/footer'); 
    }



    function editpage()
    {
          $id = $this->input->post('page_id');
          $image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "pageimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "pageimage/".$filename;
        } 
       
          $updateData = array(
                             'title'             => $this->input->post('title'),
                             'description'       => $this->input->post('description'),
                             'ldescription'       => $this->input->post('ldescription'),
                             'status'           => $this->input->post('status'),
                              'image'             => $image,
                            );
                          //  print_r($updateData);die;
        
      $update =  $this->my_model->update_data(PAGE,array('id'=>$id),$updateData);
     // echo $this->db->last_query();die;
       if($update)
       {
         $this->msgsuccess("Page edit successfully.");
         redirect('admin/page');
       }else
       {
         $this->msgwarning("Page not edit successfully.");
         redirect('admin/page');
       }
    }


	

  
	   

}

