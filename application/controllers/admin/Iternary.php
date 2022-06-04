<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Iternary extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
		$this->load->model('Com_model');
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
		$tables = 'md_iternary';
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
    $config['base_url']    = base_url('iternary/ajaxPaginationData');
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
		$config['colspan']     = 9;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;

    $this->ajax_pagination->initialize($config);

	  $conditions['start'] = $offset;
	  $conditions['limit'] = $this->perPage;  
	  $data['iternary'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	 	$data['title'] = COMPANYNAME.' | Manage Iternary';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/iternary/iternary_view');
		$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_iternary';
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
    $config['base_url']    = base_url().'iternary/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perPage;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;
		$config['colspan']     = 9;
    $this->ajax_pagination->initialize($config);
        
    $conditions['start'] = $offset;
    $conditions['limit'] = $perPage;
        
    $data['iternary'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
    $this->load->view('admin/iternary/iternary_in', $data, false);
    }

    function add()
    {
      $data['subpackage'] = $this->My_model->getfields(SUBTRIP,'*',array('status'=>1),"");
    	$data['title'] = COMPANYNAME.' | Add Iternary';
		  $this->load->view('admin/common/header',$data); 
 		  $this->load->view('admin/common/left-sidebar');
		  $this->load->view('admin/iternary/additernary_view');
		  $this->load->view('admin/common/footer');
    }
   
   public function addIternary()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
       
	    if($this->form_validation->run() == FALSE)
		{
		$this->add();
		}
		else{

     $createddate = date('Y-m-d H:i:s');
     $iternaryData =  array(
						 'subtrip_id'        => $this->input->post('subtrip_id'),
             'title'             => $this->input->post('name'),
						 'description'       => $this->input->post('description'),
						 'created_date'      => $createddate,
						 'status'            => '1',
								
 							    );
			$id = $this->My_model->insert_data(ITERNARY,$iternaryData);
		    if($id){
		       $this->msgsuccess("Iternary  are Added  successfully..");
            redirect('admin/iternary'); 
        }
        else
        {
        	 $this->msgsuccess("Iternary Not Added  successfully..");
            redirect('admin/iternary'); 
        }
    }
}



	function edit($id="")
	{
     $data['subpackage'] = $this->My_model->getfields(SUBTRIP,'*',array('status'=>1),"");
	  $data['iternary'] = $this->My_model->getfields(ITERNARY,'*',array('id'=>$id),"");
    $data['title'] = COMPANYNAME.' | Edit Iternary';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/iternary/edititernary_view');
	  $this->load->view('admin/common/footer');
    
	}



   public function edititernary()
    {
        $id = $this->input->post('cat_id');
          $updateData = array(
                            'subtrip_id'        => $this->input->post('subtrip_id'),
                            'title'             => $this->input->post('name'),
                            'description'       => $this->input->post('description'),
                            'status'            => 1,
                             'updated_date'     => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(ITERNARY,array('id'=>$id),$updateData);
       if($update)
       {
         $this->msgsuccess("Iternary edit successfully.");
         redirect('admin/iternary');
       }
       else
       {
         $this->msgwarning("Iternary not edit successfully.");
         redirect('admin/iternary');
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
     
      $subcatdata = $this->My_model->getfields('tbl_test_sub_category','*',array('cat_id'=>$catId),"");
      if(!empty($subcatdata)){
       echo "<select  name ='subcategory_id' class='form-control' data-validation='required' placeholder='Select Subcategory'>";
      
      foreach($subcatdata as $catdata)
      {
       echo "<option value='".$catdata->sub_cat_id."'"; 
       	if($catdata->sub_cat_id==$subcat) { echo "selected='true'";}
       	echo "> ".$catdata->sub_category_name."</option>";

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
