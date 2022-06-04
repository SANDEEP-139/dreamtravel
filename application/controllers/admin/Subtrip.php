<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Subtrip extends Admin_Controller
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
	  if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
	} 
	   
	public function index()
	{ 
		$this->load->library('Ajax_pagination');
		$tables = 'md_subtrip';
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
			
		$cond .= " AND (trip_title LIKE '%".$keywords."%') ";
		}
		$fields = "*";
        $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('subtrip/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		$config['colspan']     = 9;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	$conditions['start'] = $offset;
	    $conditions['limit'] = $this->perPage;  
		$data['trip'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Sub Package';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/subtrip/trip_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_subtrip';
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
			$cond .= " AND (trip_title LIKE '%".$keywords."%') ";

		  }
		$fields = "*";
		$totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
		$config['target']      = '#postList';
        $config['base_url']    = base_url().'subtrip/ajaxPaginationData';
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
        $this->load->view('admin/subtrip/trip_in', $data, false);
    }

 public function add()
  {
    $data['title'] = COMPANYNAME.' | Add Sub Trip';
    $data['trip'] = $this->My_model->getfields(TRIP,'*',array('status'=>1),"");
	$this->load->view('admin/common/header',$data); 
 	$this->load->view('admin/common/left-sidebar');
	$this->load->view('admin/subtrip/addtrip_view');
	$this->load->view('admin/common/footer');
  }
   public function imagesview($id='')
    {

      $data['title'] = COMPANYNAME.' | View Sub Trip Images'; 
      $data['trip_image'] = $this->My_model->getfields(TRIPIMAGE,'*',array('trip_id'=>$id),"");
      $data['project_name'] = $this->My_model->fetchValue(SUBTRIP,'subtitle',array('id'=>$id),"");
      $data['projetct_id'] = $id;
      $this->load->view('admin/common/header',$data); 
      $this->load->view('admin/common/left-sidebar');
      $this->load->view('admin/subtrip/image_view');
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

        $imptryType=$this->input->post('type');
        if(empty($imptryType))
        {
          $imptryTypes= 0;
        }
        else
        {
              $imptryTypes = implode(",",$imptryType);
        }
       
    //end upload image  
     $createddate = date('Y-m-d H:i:s');

     $tripData =  array
                (
			    'trip_id'  => $this->input->post('trip_id'),
                'subtitle'             => $this->input->post('title'),
                'duration'          => $this->input->post('duration'),
                'arrival_date'      => date('Y-m-d',strtotime($this->input->post('arrival_date'))),
                'departure_date'    => date('Y-m-d',strtotime($this->input->post('departure_date'))),
                'location'          => $this->input->post('location'),
                'slug'          => $this->input->post('slug'),
                'price'             => $this->input->post('price'),
                'discount_price'    => $this->input->post('discount'),
                'discount_percentage'    => $this->input->post('discount_percentage'),
                 'trptype'           => $this->input->post('trptype'),
                'rating'             => $this->input->post('rating'),
                'description'       => $this->input->post('description'),
			    'created_date'      => $createddate,
			    'status'            => '1',
								
 			);
     
			$id = $this->My_model->insert_data(SUBTRIP,$tripData);
           // echo $this->db->last_query();die;
		  if($id){
            $imgArrData =array();
            $countfiles = count($_FILES['imgname']['name']);
          if(!empty($countfiles)) {
              for($i=0;$i<$countfiles;$i++){
              $filenames =  $_FILES["imgname"]["name"][$i];
              
               $name     = mt_rand(10000000, 99999999);
               $filename = $name . '.' .$filenames;
               $url = "subtripimage/".$filename;
               move_uploaded_file($_FILES["imgname"]["tmp_name"][$i], $url);
               $data['image'] = $filename;
               $image = "subtripimage/".$filename;
               $imgArrData = array(
                                   'trip_id'   =>$id,
                                   'image'        =>$image,
                                   'created_date' =>date('Y-m-d H:i:s'),
                                   'status'       =>1
                                  );
               $this->My_model->insert_data(TRIPIMAGE,$imgArrData); 
            }
          }
       
		    $this->msgsuccess("Trip are Added  successfully..");
        redirect('admin/subtrip'); 
        }
        else
        {
        	 $this->msgsuccess("Trip Not Added  successfully..");
           redirect('admin/subtrip'); 
        }
    }
}



	public function edit($id="")
	{
	  $data['subtrip'] = $this->My_model->getfields(SUBTRIP,'*',array('id'=>$id),"");
      $data['trip'] = $this->My_model->getfields(TRIP,'*',array('status'=>1),"");
      $data['title'] = COMPANYNAME.' | Edit Sub Trip';
	  $this->load->view('admin/common/header',$data); 
 	  $this->load->view('admin/common/left-sidebar');
	  $this->load->view('admin/subtrip/edittrip_view');
	  $this->load->view('admin/common/footer');
    
	}



   public function edittrip()
    {
        $id = $this->input->post('tripid');
        $imptryType=0;
        $imptryType = implode(",",$this->input->post('type'));
          //end upload image
        $updateData = array(
                             'trip_id'  => $this->input->post('trip_id'),
                          
                             'subtitle'             => $this->input->post('title'),
                             'duration'          => $this->input->post('duration'),
                             'arrival_date'      => date('Y-m-d',strtotime($this->input->post('arrival_date'))),
                             'departure_date'    => date('Y-m-d',strtotime($this->input->post('departure_date'))),
                             'location'          => $this->input->post('location'),
                              'slug'          => $this->input->post('slug'),
                             'price'             => $this->input->post('price'),
                             'discount_price'    => $this->input->post('discount'),
                             'discount_percentage'    => $this->input->post('discount_percentage'),
                              'trptype'           => $this->input->post('trptype'),
                             'rating'             => $this->input->post('rating'),
                             'description'        => $this->input->post('description'),       
                             'status'             => 1,
                             'updated_date'       => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(SUBTRIP,array('id'=>$id),$updateData);
      // echo $this->db->last_query();die;
       if($update)
       {
           $imgArrData =array();
          //  print_r($_FILES['imgname']['name']);die;
            $countfiles = count($_FILES['imgname']['name']);
          if($countfiles>1 && !empty($_FILES['imgname']['name']) ) {
          
              for($i=0;$i<$countfiles;$i++){
              $filenames =  $_FILES["imgname"]["name"][$i];
              
               $name     = mt_rand(10000000, 99999999);
               $filename = $name . '.' .$filenames;
               $url = "subtripimage/".$filename;
               move_uploaded_file($_FILES["imgname"]["tmp_name"][$i], $url);
               $data['image'] = $filename;
               $image = "subtripimage/".$filename;
               $imgArrData = array(
                                   'trip_id'   =>$id,
                                   'image'        =>$image,
                                   'created_date' =>date('Y-m-d H:i:s'),
                                   'status'       =>1
                                  );
               $this->My_model->insert_data(TRIPIMAGE,$imgArrData); 
            }
          }
         $this->msgsuccess("Trip edit successfully.");
         redirect('admin/subtrip');
       }
       else
       {
         $this->msgwarning("Trip not edit successfully.");
         redirect('admin/subtrip');
       }
    }

   public function editimage()
    {

        $id = $this->input->post('cat_id');
        $image = $this->input->post('img');
        $projectids = $this->input->post('projectids');
       // $image1 = $this->input->post('img1');
          //upload image
       if (!empty($_FILES['imgname']['name'])) {
             $type     = explode('.', $_FILES["imgname"]["name"]);
             $type     = strtolower($type[count($type) - 1]);
             $name     = mt_rand(10000000, 99999999);
             $filename = $name . '.' . $type;
             $url = "subtripimage/" . $filename;
             move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
             $data['image'] = $filename;
             $image = "subtripimage/".$filename;
           }
      
          //end upload image
          $updateData = array(
                             'image_type'       => $this->input->post('imgtype'),
                             'image'            => $image,
                             'updated_date'     => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(TRIPIMAGE,array('id'=>$id),$updateData);
     
       if($update)
       {
         $this->msgsuccess("Trip Image edit successfully.");
         redirect('admin/subtrip/imagesview/'.$projectids);
       }
       else
       {
         $this->msgwarning("Trip Image not edit successfully.");
        redirect('admin/subtrip/imagesview/'.$projectids);
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
