<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Video extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	    $this->load->model('My_model');
		$this->load->model('Com_model');
		
       $this->load->helper('common_helper');
	   	$this->perPage = 10;
		//$test = admin::addlead();
		if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
	} 
	   
	public function index()
	{ 

		$this->load->library('Ajax_pagination');
		$tables = 'md_video';
		$data = array();
		$cond = "id > 0";
		$keywords   = $this->input->get('keywords');
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
			
		$cond .= " AND (title LIKE '%".$keywords."%' OR unit_name LIKE '%".$keywords."%') ";
		}
		$fields = "*";
        $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('video/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 7;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	  $conditions['start'] = $offset;
	     	$conditions['limit'] = $this->perPage;  
		    $data['video'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Video';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/video/video_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	  $conditions = array();
        $tables = 'md_video';
        //calc offset number
        $page = $this->input->get('page');
        if(!$page)
            $offset = 0;
        else
            $offset = $page;
        
		    $keywords   = $this->input->get('keywords');
        $perPage 	= $this->input->get('perpage');
        $activePage = $this->input->get('activePage');
        $cond       = " id > 0";
        
		  if($keywords){
			$cond .= " AND (title LIKE '%".$keywords."%') ";

		  }
		    $fields = "*";
		    $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
		    $config['target']      = '#postList';
        $config['base_url']    = base_url().'video/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 7;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['video'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/video/video_in', $data, false);
    }

    public function add()
    {
      $data['title'] = COMPANYNAME.' | Add Video';
      $this->load->view('admin/common/header',$data); 
 		  $this->load->view('admin/common/left-sidebar');
		  $this->load->view('admin/video/addvideo_view');
		  $this->load->view('admin/common/footer');
    }
	
	public function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}
   
   
   
   public function addVideo()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean');
       
	    if($this->form_validation->run() == FALSE)
		{
		$this->add();
		}
		else{
		
		$url = $this->input->post('videourl');
		

     $createddate = date('Y-m-d H:i:s');
     $categoryData =  array(
						 'title'         => $this->input->post('name'),
						 'description'   => $this->input->post('description'),
						 'created_date'  => $createddate,
						 'status'        => '1',
                         'video_url'     => $url,
								
 							    );
        
			
			$id = $this->My_model->insert_data(VIDEO,$categoryData);
		    if($id){
		            $this->msgsuccess("Video are Added  successfully..");
                redirect('admin/video'); 
        }
        else
        {
        	 $this->msgsuccess("Video are Not Added");
           redirect('admin/video'); 
        }
    }
}



	function edit($id="")
	{

	 $data['video'] = $this->My_model->getfields(VIDEO,'*',array('id'=>$id),"");
   $data['title'] = COMPANYNAME.' | Edit Video';
	 $this->load->view('admin/common/header',$data); 
 	 $this->load->view('admin/common/left-sidebar');
	 $this->load->view('admin/video/editvideo_view');
	 $this->load->view('admin/common/footer');
    
	}
   
 
   
   
   public function editvideo()
    {
		$url11 = $this->input->post('videourl');
		
        $id = $this->input->post('cat_id');
       
          //end upload image
          $updateData = array(
                             'title'             => $this->input->post('name'),
						     'description'       => $this->input->post('description'),
                             'status'            => 1,
                             'video_url'         => $url11,
                             'updated_date'      => date('Y-m-d h:i:s'),
                            );
                     
         $update =  $this->My_model->update_data(VIDEO,array('id'=>$id),$updateData);
         if($update)
          {
           $this->msgsuccess("Video are updated successfully.");
           redirect('admin/video');
          }
        else
         {
           $this->msgwarning("Video not edit successfully.");
           redirect('admin/video');
         }
      }


	public function deleteAll()
		{
		  $userid = $this->input->post('fieldvalue');
		  $table = strrev($this->input->post('table'));
		  $delete = $this->My_model->deleteRow($table,array('id'=>$userid));
		  if($delete)
		  {
		    // $this->my_model->deleteRow('md_experts_connect',array('client_id'=>$userid));
		     $this->msgsuccess("Record has been successfully deleted ");
			 echo 1;
		  	
		  }
		  else
		  {
		  	$this->msgerror("Record deletion failed ");
			echo 0;
		  }
		}
		


}	

?>
