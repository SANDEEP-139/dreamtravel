<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Curatedtrip extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	    $this->load->model('My_model');
		  $this->load->model('Com_model');
		  $this->load->model('User_model');
      $this->load->helper('common_helper');
	   	$this->perPage = 10;
		//$test = admin::addlead();
	} 
	   
	public function index()
	{ 

		$this->load->library('Ajax_pagination');
		$tables = 'md_curatedtrip';
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
    $config['base_url']    = base_url('curatedtrip/ajaxPaginationData');
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
		$config['colspan']     = 9;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;

    $this->ajax_pagination->initialize($config);

	  $conditions['start'] = $offset;
	  $conditions['limit'] = $this->perPage;  
		$data['trip'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Curated Trip';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/curatedtrip/trip_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_curatedtrip';
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
        $config['base_url']    = base_url().'curatedtrip/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 9;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['trip'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/curatedtrip/trip_in', $data, false);
    }

  public function add()
    {
    $data['title'] = COMPANYNAME.' | Add Trip';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/curatedtrip/addtrip_view');
		$this->load->view('admin/common/footer');
    }
   
   public function addTrip()
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

            $url = "customisetripimage/" . $filename;

            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "customisetripimage/".$filename;
            $imgArr = array('image'=>$image);
        }
    //end upload image  

     $createddate = date('Y-m-d H:i:s');
     $tripData =  array(
             'title'             => $this->input->post('title'),
             'rating'          => $this->input->post('rating'),
             'description'       => $this->input->post('description'),
						 'created_date'      => $createddate,
						 'status'            => '1',
								
 							    );
      $finalArr = array_merge($imgArr,$tripData);
			
			
			$id = $this->My_model->insert_data(CURATEDTRIP,$finalArr);
		    if($id){


		   $this->msgsuccess("Trip are Added  successfully..");
            redirect('admin/curatedtrip'); 
        }
        else
        {
        	 $this->msgsuccess("Trip Not Added  successfully..");
           redirect('admin/curatedtrip'); 
        }
    }
}



	public function edit($id="")
	{
    $data['title'] = COMPANYNAME.' | Edit Trip';
    $data['trip'] = $this->My_model->getfields(CURATEDTRIP,'*',array('id'=>$id),"");
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/curatedtrip/edittrip_view');
	  $this->load->view('admin/common/footer');
    
	}



   public function edittrip()
    {
        $id = $this->input->post('tripid');
        $image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "customisetripimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "customisetripimage/".$filename;
        }
          //end upload image
          $updateData = array(
                              'title'         => $this->input->post('title'),
                              'rating'        => $this->input->post('rating'),
                              'description'   => $this->input->post('description'),
						                  'image'         => $image,
                              'status'        => 1,
                              'updated_date'  => date('Y-m-d h:i:s'),
                             );
                     
       $update =  $this->My_model->update_data(CURATEDTRIP,array('id'=>$id),$updateData);
       if($update)
       {
         $this->msgsuccess("Trip edit successfully.");
         redirect('admin/curatedtrip');
       }
       else
       {
         $this->msgwarning("Trip not edit successfully.");
         redirect('admin/curatedtrip');
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
