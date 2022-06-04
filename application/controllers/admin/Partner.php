<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Partner extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	    $this->load->model('My_model');
		$this->load->model('Com_model');
		
       $this->load->helper('common_helper');
	   	$this->perPage = 10;
		//$test = admin::addlead();
	} 
	   
	public function index()
	{ 

		$this->load->library('Ajax_pagination');
		$tables = 'md_partner';
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
        $config['base_url']    = base_url('partner/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 7;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	  $conditions['start'] = $offset;
	     	$conditions['limit'] = $this->perPage;  
		    $data['gallery'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Partner';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/partner/partner_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	  $conditions = array();
        $tables = 'md_partner';
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
        $config['base_url']    = base_url().'partner/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 7;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['gallery'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/partner/partner_in', $data, false);
    }

    public function add()
    {
      $data['title'] = COMPANYNAME.' | Add Partner';
      $this->load->view('admin/common/header',$data); 
 		  $this->load->view('admin/common/left-sidebar');
		  $this->load->view('admin/partner/addpartner_view');
		  $this->load->view('admin/common/footer');
    }
   
   public function addpartner()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean');
       
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

            $url = "partnerimage/" . $filename;

            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "partnerimage/".$filename;
            $imgArr = array('image'=>$image);
        }
    //end upload image  

     $createddate = date('Y-m-d H:i:s');
     $categoryData =  array(
						 'title' => $this->input->post('name'),
				
						
						 'created_date'  => $createddate,
						 'status'        => '1',
								
 							    );
         $finalArr = array_merge($imgArr,$categoryData);
			
			
			$id = $this->My_model->insert_data(PARTNER,$finalArr);
		    if($id){
		            $this->msgsuccess("Partner image are Added  successfully..");
                redirect('admin/partner'); 
        }
        else
        {
        	 $this->msgsuccess("Partner image are Not Added");
           redirect('admin/partner'); 
        }
    }
}



	function edit($id="")
	{

	 $data['gallery'] = $this->My_model->getfields(PARTNER,'*',array('id'=>$id),"");
   $data['title'] = COMPANYNAME.' | Edit Partner';
	 $this->load->view('admin/common/header',$data); 
 	 $this->load->view('admin/common/left-sidebar');
	 $this->load->view('admin/partner/editpartner_view');
	 $this->load->view('admin/common/footer');
    
	}

   public function editpartner()
    {
        $id = $this->input->post('cat_id');
        $image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "partnerimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "partnerimage/".$filename;
        }
          //end upload image
          $updateData = array(
                             'title'             => $this->input->post('name'),
						                 'image'             => $image,
                             'status'            => 1,
                             'updated_date'      => date('Y-m-d h:i:s'),
                            );
                     
         $update =  $this->My_model->update_data(PARTNER,array('id'=>$id),$updateData);
         if($update)
          {
           $this->msgsuccess("Partner images are updated successfully.");
           redirect('admin/partner');
          }
        else
         {
           $this->msgwarning("Partner not edit successfully.");
           redirect('admin/partner');
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
