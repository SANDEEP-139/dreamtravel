<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Hotels extends Admin_Controller
{
	public function __construct()
	{
	  parent::__construct();
      $this->load->model('My_model');
	  $this->load->model('Com_model');
	  $this->load->model('User_model');
      $this->load->helper('common_helper');
	  $this->perPage = 10;
	  if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
	  //$test = admin::addlead();
	} 
	   
	public function index()
	{ 
		$this->load->library('Ajax_pagination');
		$tables = 'md_hotel';
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
			
		$cond .= " AND (title LIKE '%".$keywords."%') ";
		}
		$fields = "*";
        $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('hotels/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		$config['colspan']     = 9;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	$conditions['start'] = $offset;
	    $conditions['limit'] = $this->perPage;  
		$data['hotel'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Top Hotels';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/hotel/hotel_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_hotel';
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
        $config['base_url']    = base_url().'hotel/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 9;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['hotel'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/hotel/hotel_in', $data, false);
    }

 public function add()
  {
    $data['title'] = COMPANYNAME.' | Add Hotel';
	$this->load->view('admin/common/header',$data); 
 	$this->load->view('admin/common/left-sidebar');
	$this->load->view('admin/hotel/addhotel_view');
	$this->load->view('admin/common/footer');
  }
  
   public function addHotel()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('title', 'Trip Title', 'trim|required|xss_clean');
       
	    if($this->form_validation->run() == FALSE)
		{
		$this->add();
		}
		else{
            $imgArr =array();
            if (!empty($_FILES['imgname']['name'])) {

            $type     = explode('.', $_FILES["imgname"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;

            $url = "hotelimage/" . $filename;

            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "hotelimage/".$filename;
            $imgArr = array('image'=>$image);
        }
    //end upload image  
     $createddate = date('Y-m-d H:i:s');

     $hotelData =  array
                     (
			          'title'             => $this->input->post('title'),
                      'price'             => $this->input->post('price'),
                      'slug'             => $this->input->post('slug'),
                      'image'             => $image,
                      'rating'            => $this->input->post('rating'),
                      'description'       => $this->input->post('description'),  
			          'created_date'      => $createddate,
			          'status'            => '1',				
 			         );
     
			$id = $this->My_model->insert_data(HOTEL,$hotelData);
           
		    if($id){
           
		    $this->msgsuccess("Hotel are Added  successfully..");
            redirect('admin/hotels'); 
        }
        else
        {
        	 $this->msgsuccess("Hotel Not Added  successfully..");
           redirect('admin/hotels'); 
        }
    }
}



	public function edit($id="")
	{
	  $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('id'=>$id),"");
      $data['title'] = COMPANYNAME.' | Edit HOTEL';
	  $this->load->view('admin/common/header',$data); 
 	  $this->load->view('admin/common/left-sidebar');
	  $this->load->view('admin/hotel/edithotel_view');
	  $this->load->view('admin/common/footer');
    
	}



   public function edithotel()
    {
      $id = $this->input->post('tripid');
      $image = $this->input->post('img');
      //upload image
       if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "hotelimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "hotelimage/".$filename;
        }
      //end upload image
        $updateData = array(
                             'title'             => $this->input->post('title'),
                             'price'             => $this->input->post('price'),
                             'slug'             => $this->input->post('slug'),
                             'image'             =>$image,
                             'rating'             => $this->input->post('rating'),
                             'description'        => $this->input->post('description'),       
                             'status'             => 1,
                             'updated_date'       => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(HOTEL,array('id'=>$id),$updateData);
      // echo $this->db->last_query();die;
       if($update)
       {
         $this->msgsuccess("Hotel edit successfully.");
         redirect('admin/hotels');
       }
       else
       {
         $this->msgwarning("Hotel not edit successfully.");
         redirect('admin/hotels');
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
