<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////====	START LEAD CONTROLLERS CLASS   =======///////
class Project extends Admin_Controller
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
	$tables = 'md_package';
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
		$cond .= " AND (package_name LIKE '%".$keywords."%') ";
		}
	$fields = "*";
    $totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
    $config['target']      = '#postList';
    $config['base_url']    = base_url('project/ajaxPaginationData');
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
		$config['colspan']     = 9;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;

    $this->ajax_pagination->initialize($config);

	$conditions['start'] = $offset;
	$conditions['limit'] = $this->perPage;  
	$data['category'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
	  
	$data['title'] = COMPANYNAME.' | Manage Package';
    $this->load->view('admin/common/header',$data); 
 	$this->load->view('admin/common/left-sidebar');
	$this->load->view('admin/project/project_view');
	$this->load->view('admin/common/footer');
	}

	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = 'md_package';
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
			$cond .= " AND (package_name LIKE '%".$keywords."%') ";

		  }
		$fields = "*";
		$totalRec = $this->Com_model->cuntrows($tables,"id",$cond);
		$config['target']      = '#postList';
    $config['base_url']    = base_url().'project/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perPage;
    $config['link_func']   = 'searchFilter';
    $config['activePage']  = $activePage;
		$config['colspan']     = 9;
    $this->ajax_pagination->initialize($config);
        
    $conditions['start'] = $offset;
    $conditions['limit'] = $perPage;
        
    $data['category'] = $this->Com_model->getRows($tables,$fields,$cond,$conditions);
       // echo $this->db->last_query();die;
    $this->load->view('admin/project/project_in', $data, false);
    }
    public function imagesview($id='')
    {

      $data['title'] = COMPANYNAME.' | View Package Images'; 
      $data['project_image'] = $this->My_model->getfields(PROJECTIMAGE,'*',array('package_id'=>$id),"");
      $data['project_name'] = $this->My_model->fetchValue(PROJECT,'package_name',array('id'=>$id),"");
      $data['projetct_id'] = $id;
      $this->load->view('admin/common/header',$data); 
      $this->load->view('admin/common/left-sidebar');
      $this->load->view('admin/project/image_view');
      $this->load->view('admin/common/footer'); 
    }

    function add()
    {
    	$data['title'] = COMPANYNAME.' | Add Package';
		  $this->load->view('admin/common/header',$data); 
 		  $this->load->view('admin/common/left-sidebar');
		  $this->load->view('admin/project/addproject_view');
		  $this->load->view('admin/common/footer');
    }
   
   public function addProject()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
       
	    if($this->form_validation->run() == FALSE)
		{
		$this->add();
		}
		else{
		$imgArr =array();
            if (!empty($_FILES['imgnamee']['name'])) {

            $type     = explode('.', $_FILES["imgnamee"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;

            $url = "projectimage/" . $filename;

            move_uploaded_file($_FILES["imgnamee"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = "projectimage/".$filename;
            $imgArr = array('image'=>$image);
        }
      $createddate = date('Y-m-d H:i:s');
      $projectData =  array(
						      'package_name'      => $this->input->post('name'),
                              'duration'          => $this->input->post('duration'),
                              'price'          => $this->input->post('price'),
                              'location'          => $this->input->post('location'),
                              'description'       => $this->input->post('description'),
                              'long_description'  => $this->input->post('ldescription'),
						      'created_date'      => $createddate,
						      'status'            => '1',
 							);
      $finalArr = array_merge($imgArr,$projectData);
	  $id = $this->My_model->insert_data(PROJECT,$finalArr);
		  if($id){
          $imgArrData =array();
          $countfiles = count($_FILES['imgname']['name']);
          if(!empty($countfiles)) {
             for($i=0;$i<$countfiles;$i++){
              $filenames =  $_FILES["imgname"]["name"][$i];
              
               $name     = mt_rand(10000000, 99999999);
               $filename = $name . '.' .$filenames;
               $url = "projectimage/".$filename;
               move_uploaded_file($_FILES["imgname"]["tmp_name"][$i], $url);
               $data['image'] = $filename;
               $image = "projectimage/".$filename;
               $imgArrData = array(
                                   'package_id'   =>$id,
                                   'image'        =>$image,
                                   'created_date' =>date('Y-m-d H:i:s'),
                                   'status'       =>1
                                  );
               $this->My_model->insert_data(PROJECTIMAGE,$imgArrData); 
            }
          }
		       $this->msgsuccess("Package are Added  successfully..");
            redirect('admin/project'); 
        }
        else
        {
        	 $this->msgsuccess("Package Not Added  successfully..");
            redirect('admin/project'); 
        }
    }
}



	function edit($id="")
	{
	  $data['category'] = $this->My_model->getfields(PROJECT,'*',array('id'=>$id),"");
       $data['title'] = COMPANYNAME.' | Edit Package';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/project/editproject_view');
	  $this->load->view('admin/common/footer');
    
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
             $url = "projectimage/" . $filename;
             move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
             $data['image'] = $filename;
             $image = "projectimage/".$filename;
           }
      
          //end upload image
          $updateData = array(
                             'image_type'       => $this->input->post('imgtype'),
						                 'image'            => $image,
                             'updated_date'     => date('Y-m-d h:i:s'),
                            );
                     
       $update =  $this->My_model->update_data(PROJECTIMAGE,array('id'=>$id),$updateData);
     
       if($update)
       {
         $this->msgsuccess("Package Image edit successfully.");
         redirect('admin/project/imagesview/'.$projectids);
       }
       else
       {
         $this->msgwarning("Package Image not edit successfully.");
        redirect('admin/project/imagesview/'.$projectids);
       }
    }
 public function editproject()
    {
        $id = $this->input->post('cat_id');
         $image = $this->input->post('imgg');
          //upload image
       if (!empty($_FILES['imgnamee']['name'])) {
        $type  = explode('.', $_FILES["imgnamee"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "projectimage/" . $filename;
        move_uploaded_file($_FILES["imgnamee"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "projectimage/".$filename;
        }
          //end upload image
          $updateData = array(
                            
                             'package_name'      => $this->input->post('name'),
                             'duration'          => $this->input->post('duration'),
                              'price'          => $this->input->post('price'),
                              'location'          => $this->input->post('location'),
                             'description'       => $this->input->post('description'),
                             'long_description'  => $this->input->post('ldescription'),
                             'image'             => $image,
                             'updated_date'      => date('Y-m-d h:i:s'),

                            );
                     
       $update =  $this->My_model->update_data(PROJECT,array('id'=>$id),$updateData);
     
       if($update)
       {
        $imgArrData =array();
            $countfiles = count($_FILES['imgname']['name']);
          if(!empty($countfiles)) {
              for($i=0;$i<$countfiles;$i++){
              $filenames =  $_FILES["imgname"]["name"][$i];
              
               $name     = mt_rand(10000000, 99999999);
               $filename = $name . '.' .$filenames;
               $url = "projectimage/".$filename;
               move_uploaded_file($_FILES["imgname"]["tmp_name"][$i], $url);
               $data['image'] = $filename;
               $image = "projectimage/".$filename;
               $imgArrData = array(
                                   'package_id'   =>$id,
                                   'image'        =>$image,
                                   'created_date' =>date('Y-m-d H:i:s'),
                                   'status'       =>1
                                  );
               $this->My_model->insert_data(PROJECTIMAGE,$imgArrData); 
            }
          }
         $this->msgsuccess("Package edit successfully.");
         redirect('admin/project');
       }
       else
       {
         $this->msgwarning("Project not edit successfully.");
        redirect('admin/project');
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
