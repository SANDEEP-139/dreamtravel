<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Testimonial extends Admin_Controller
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
		$tables = 'md_testimonial';
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
			
		$cond .= " AND (client_name LIKE '%".$keywords."%' OR title LIKE '%".$keywords."%') ";
		}
		$fields = "*";
        $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('testimonial/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 9;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	  $conditions['start'] = $offset;
	     	$conditions['limit'] = $this->perPage;  
		    $data['testimonial'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Testimonial';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/testimonial/testimonial_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_testimonial';
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
			$cond .= " AND (client_name LIKE '%".$keywords."%') ";

		  }
		    $fields = "*";
		    $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
		    $config['target']      = '#postList';
        $config['base_url']    = base_url().'testimonial/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 9;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['testimonial'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
        $this->load->view('admin/testimonial/testimonial_in', $data, false);
    }

    function add()
    {
    	$data['title'] = COMPANYNAME.' | Add Testimonial';
    	//$data['unit_name'] = $this->My_model->fieldResult(UNIT,'id,unit_name');
		  $this->load->view('admin/common/header',$data); 
 		  $this->load->view('admin/common/left-sidebar');
		  $this->load->view('admin/testimonial/addtestimonial_view');
		  $this->load->view('admin/common/footer');
    }
   
   public function addTestimonial()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('url', 'Youtube Url', 'trim|required|xss_clean');
       
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

            $url = "testimonialimage/" . $filename;

            move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "testimonialimage/".$filename;
            $imgArr = array('image'=>$image);
        }

     $createddate = date('Y-m-d H:i:s');
     $testimonialData =  array(
						                    'title'          => $this->input->post('title'),
                                'client_name'    => $this->input->post('cname'),
                                'designation'    => $this->input->post('designation'),
                                'client_desc'    => $this->input->post('sdescription'),
                                'content'        => $this->input->post('content'),
						                    'url'            => $this->input->post('url'),
						                    'created_date'   => $createddate,
						                    'status'         => '1',
								
 							                 );
      $finalArr = array_merge($imgArr,$testimonialData);

			$id = $this->My_model->insert_data(TESTIMONIAL,$finalArr);
		    if($id){


		   $this->msgsuccess("Testimonial Url are Added  successfully..");
            redirect('admin/testimonial'); 
        }
        else
        {
        	 $this->msgsuccess("Testimonial Url Not Added  successfully..");
            redirect('admin/testimonial'); 
        }
    }
}



	function edit($id="")
	{
    $data['testimonial'] = $this->My_model->getfields(TESTIMONIAL,'*',array('id'=>$id));
    $data['title'] = COMPANYNAME.' | Edit Testimonial';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/testimonial/edittestimonial_view');
	  $this->load->view('admin/common/footer');
    
	}



   public function edittestimonial()
    {
        $id = $this->input->post('cat_id');
         $image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "testimonialimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "testimonialimage/".$filename;
        }
        
          //end upload image
          $updateData = array(
                         'title'      => $this->input->post('title'),
                         'client_name'        => $this->input->post('cname'),
                          'designation'         => $this->input->post('designation'),
                           'client_desc'    => $this->input->post('sdescription'),
                          'content'     => $this->input->post('content'),
                          'image'               => $image,
                          'url'       => $this->input->post('url'),
                          'status'    => 1,
                          'updated_date' => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(TESTIMONIAL,array('id'=>$id),$updateData);
       if($update)
       {
         $this->msgsuccess("Testimonial details are edit successfully.");
         redirect('admin/testimonial');
       }
       else
       {
         $this->msgwarning("Testimonial details are not edit successfully.");
         redirect('admin/testimonial');
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
    public function getSubcategory()
    {
      $catId = $this->input->post('cat');
      $subcat = $this->input->post('subcat');
     
      $subcatdata = $this->My_model->getfields(SUBCATEGORY,'*',array('category_id'=>$catId),"");
      if(!empty($subcatdata)){
       echo "<select  name ='subcategory_id' class='form-control' data-validation='required' placeholder='Select Subcategory'>";
      
      foreach($subcatdata as $catdata)
      {
       echo "<option value='".$catdata->id."'"; 
       	if($catdata->id==$subcat) { echo "selected='true'";}
       	echo "> ".$catdata->subcategory_name."</option>";

      }
       echo "</select>";
     }
     
    }

    public function getSubcategoryreload()
    {
      $catId = $this->input->post('cat');
      //$subcatId = $this->input->post('subcat');
      //$subbannerId = $this->My_model->fetchValue(BANNER,'banner_subcategory',array('banner_subcategory'=>$subcatId));
      $subcatdata = $this->My_model->getfields(SUBCATEGORY,'*',array('category'=>$catId),"");
      if(!empty($subcatdata)){
       echo "<select  name ='subcategory_id' class='form-control' data-validation='required' placeholder='Select Subcategory'>";
      
      foreach($subcatdata as $catdata)
      {
       
        echo "<option value='".$catdata->subcategory_name."'>".$catdata->subcategory_name."</option>";
       

      }
       echo "</select>";
     }
     
    }

}	

?>
