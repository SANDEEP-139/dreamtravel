<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends Admin_Controller
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
		$tables = SETTING;
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
			
		$cond .= " AND email LIKE '%".$keywords."%' ";
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
		  $data['setting'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
	//	echo "<pre>";
	//	print_r($data['category']);die;
    $data['title']  = COMPANYNAME.' | Setting';
    $this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/setting/setting_view');
		$this->load->view('admin/common/footer');			 
	}


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = SETTING;
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
          $cond .= " AND email LIKE '%".$keywords."%' ";
        }

		$fields = "*";
		$totalRec = $this->com_model->cuntrows($tables,"id",$cond);
		$config['target']      = '#postList';
    $config['base_url']    = base_url().'setting/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perPage;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;
		$config['colspan']     = 9;
    $this->ajax_pagination->initialize($config);
    $conditions['start'] = $offset;
    $conditions['limit'] = $perPage;
    $data['setting'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
    $this->load->view('admin/setting/setting_in', $data, false);
    }


    function add()
    {
      $data['title']  = COMPANYNAME.' | Add Setting';
      $this->load->view('admin/common/header',$data); 
      $this->load->view('admin/common/left-sidebar');
      $this->load->view('admin/setting/addsetting_view');
      $this->load->view('admin/common/footer'); 
    }


    function addsetting()
    {
        
       //$imgArr =array();
         $image ='';
            if (!empty($_FILES['imgname']['name'])) {

            $type     = explode('.', $_FILES["imgname"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;
            $url = "profileimage/" . $filename;
            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "profileimage/".$filename;
           // $imgArr = array('image'=>$image);
        } 
        $image1 ='';
            if (!empty($_FILES['imgnamee']['name'])) {

            $type     = explode('.', $_FILES["imgnamee"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;
            $url = "profileimage/" . $filename;
            move_uploaded_file($_FILES["imgnamee"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image1 = "profileimage/".$filename;
           // $imgArr = array('image'=>$image);
        } 
       
          $insertData = array(
                             'email'             => $this->input->post('email'),
                             'contact'       => $this->input->post('contact'),
                             'instagram_url'       => $this->input->post('instagram'),
                             'facebook_url'       => $this->input->post('facebook'),
                             'twitter_url'       => $this->input->post('twitter'),
                             'linkedin_url'       => $this->input->post('linkedin'),
                             'youtube_url'       => $this->input->post('youtube'),
                             'footer_text'       => $this->input->post('ftext'),
                             'discount_percantage'       => $this->input->post('discount_percantage'),
                              'discount_price'       => $this->input->post('discount_price'),
                              'discount_text'       => $this->input->post('discount_text'),

                             'status'           => $this->input->post('status'),
                             'created_date'     => date('Y-m-d h:i:s'),
                             'logo'            => $image,
                             'discount_background'  => $image1,
                          
                            );
                           // echo "<pre>";
                           // print_r($insertData);die;
        
       $insertid =  $this->my_model->insert_data(SETTING,$insertData);
      // echo $this->db->last_query();die;
       if($insertid)
       {
         $this->msgsuccess("Global Data created successfully.");
         redirect('admin/setting');
       }else
       {
         $this->msgwarning("Global Data created successfully.");
         redirect('admin/setting');
       }
    }

     function edit($id="")
    {
      $data['setting'] = $this->my_model->getfields(SETTING,'*',array('id'=>$id));
        $data['title']  = COMPANYNAME.' | Edit Setting';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/setting/editsetting_view');
        $this->load->view('admin/common/footer'); 
    }



    function editsetting()
    {
      $id = $this->input->post('page_id');
      $image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "profileimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "profileimage/".$filename;
        } 

      $image1 = $this->input->post('imgg');
          //upload image
      if (!empty($_FILES['imgnamee']['name'])) {
        $type  = explode('.', $_FILES["imgnamee"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "profileimage/" . $filename;
        move_uploaded_file($_FILES["imgnamee"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image1 = "profileimage/".$filename;
        } 
       
          $updateData = array(
                             'email'             => $this->input->post('email'),
                             'contact'       => $this->input->post('contact'),
                             'website'       => $this->input->post('website'),
                              'address'       => $this->input->post('address'),
                              'contact1'       => $this->input->post('contact1'),
                             'instagram_url'       => $this->input->post('instagram'),
                             'facebook_url'       => $this->input->post('facebook'),
                             'twitter_url'       => $this->input->post('twitter'),
                             'linkedin_url'       => $this->input->post('linkedin'),
                             'adviser_rating'       => $this->input->post('adviser_rating'),
                             'adviser_review'       => $this->input->post('adviser_review'),
                             'facebook_rating'       => $this->input->post('facebook_rating'),
                             'facebook_review'       => $this->input->post('facebook_review'),
                             'youtube_url'       => $this->input->post('youtube'),
                             'footer_text'       => $this->input->post('ftext'),
                             'discount_percantage'       => $this->input->post('discount_percantage'),
                              'discount_price'       => $this->input->post('discount_price'),
                              'discount_text'       => $this->input->post('discount_text'),
                             'updated_date'     => date('Y-m-d h:i:s'),
                             'logo'            => $image,
                             'discount_background'  => $image1,
                          
                            );
                          //  print_r($updateData);die;
        
      $update =  $this->my_model->update_data(SETTING,array('id'=>$id),$updateData);
     // echo $this->db->last_query();die;
       if($update)
       {
         $this->msgsuccess("Setting edit successfully.");
         redirect('admin/setting');
       }else
       {
         $this->msgwarning("Setting not edit successfully.");
         redirect('admin/setting');
       }
    }
}

