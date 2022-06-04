<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		
        $this->load->model('My_model');
        $this->load->model('com_model');
        $this->load->model('user_model');
         	$this->perPage = 10;
         	if($this->session->userdata('admin_logged_in')!=TRUE){
			 	 redirect('admin/admin');
			 }
	} 
	   
	public function index(){
       
	  $this->load->library('Ajax_pagination');
		$tables = BLOG;
		$data = array();
		$cond = "id > 0";
		$keywords   = $this->input->get('keywords');
    $sortBy 	 = $this->input->get('sortBy');
    $perPage 	 = $this->input->get('perpage');
    $activePage  = $this->input->get('activePage');
    $datefrom   = $this->input->get('datefrom');
    $dateto   = $this->input->get('dateto');
    $servicecat   = $this->input->get('servicecat');
 

   $page = $this->input->get('page');
        if(!$page)
            $offset = 0;
        else
            $offset = $page; 

        if($perPage)
			$this->perPage = $perPage;

		if($keywords){
			
		$cond .= " AND blog_title LIKE '%".$keywords."%'";
		}
     
  if(!empty($datefrom) && !empty($dateto))
   {
      $datefrom =date('Y-m-d',strtotime($datefrom));
      $dateto =date('Y-m-d',strtotime($dateto));
       if($datefrom == $dateto){
         $cond .= " AND created_date like '%$datefrom%'";
       }
       if($datefrom != $dateto)
       {
          $cond .= " AND created_date between '$datefrom' and '$dateto'";
       }
   }
   
  
   if(!empty($datefrom) && empty($dateto)) 
   {
     $datefrom =date('Y-m-d',strtotime($datefrom));
     $cond .= " AND date_format(created_date,'%Y-%m-%d') >= '$datefrom'"; 
   }     
  if(empty($datefrom) && !empty($dateto)) 
   {
      $dateto =date('Y-m-d',strtotime($dateto));
     $cond .= " AND date_format(created_date,'%Y-%m-%d') <= '$dateto'"; 
   }
		    $fields = "*";
        $totalRec = $this->com_model->cuntrows($tables,"id",$cond);
        $config['target']      = '#postList';
        $config['base_url']    = base_url('blog/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 7;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	   	 $conditions['start'] = $offset;
	   	 $conditions['limit'] = $this->perPage;  
		   $data['blog'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       $data['title']  = COMPANYNAME.' | Blogs';
       $this->load->view('admin/common/header',$data); 
 		   $this->load->view('admin/common/left-sidebar');
		   $this->load->view('admin/blog/blog_view');
		   $this->load->view('admin/common/footer');			 
    }


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = BLOG;
        //calc offset number
        $page = $this->input->get('page');
        if(!$page)
            $offset = 0;
        else
            $offset = $page;
        
		    $keywords   = $this->input->get('keywords');
        $perPage 	= $this->input->get('perpage');
        $activePage = $this->input->get('activePage');
        $datefrom   = $this->input->get('datefrom');
        $dateto   = $this->input->get('dateto');
        $servicecat   = $this->input->get('servicecat');
        $cond       = " id > 0";
        
		if($keywords){
            
        $cond .= " AND blog_title LIKE '%".$keywords."%' ";
        }
     
      if(!empty($datefrom) && !empty($dateto))
       {
           $datefrom =date('Y-m-d',strtotime($datefrom));
           $dateto =date('Y-m-d',strtotime($dateto));
           if($datefrom == $dateto){
               $cond .= " AND created_date like '%$datefrom%'";
              }
           if($datefrom != $dateto)
             {
               $cond .= " AND created_date between '$datefrom' and '$dateto'";
             }
        }
   
  
   if(!empty($datefrom) && empty($dateto)) 
   {
     $datefrom =date('Y-m-d',strtotime($datefrom));
     $cond .= " AND date_format(created_date,'%Y-%m-%d') >= '$datefrom'"; 
   }     
  if(empty($datefrom) && !empty($dateto)) 
   {
      $dateto =date('Y-m-d',strtotime($dateto));
     $cond .= " AND date_format(created_date,'%Y-%m-%d') <= '$dateto'"; 
   }    

		    $fields = "*";
		    $totalRec = $this->com_model->cuntrows($tables,"id",$cond);
		    $config['target']      = '#postList';
        $config['base_url']    = base_url().'blog/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 7;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['blog'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
       
        $this->load->view('admin/blog/blog_in', $data, false);
    }


    function add()
    {
        $data['title']  = COMPANYNAME.' | Add Blog';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/blog/addblog_view');
        $this->load->view('admin/common/footer'); 
    }


    function addblog()
    {

          $image = "";
          
           //upload image
            if (!empty($_FILES['image']['name'])) {

            $type     = explode('.', $_FILES["image"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;

            $url = "blogimage/" . $filename;

            move_uploaded_file($_FILES["image"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = 'blogimage/'.$filename;
            //$imgArr = array('image'=>$image);
        }

      $news_date = $this->input->post('blog_date');
    
      $insertData = array(
                          'blog_title'       => $this->input->post('blog_title'),
                          'image'            => $image,
                          'blog_date'        => date('Y-m-d',strtotime($news_date)),
                         
                          'description'       => $this->input->post('description'),
                          'ldescription'       => $this->input->post('ldescription'),
                          'status'            => $this->input->post('status'),
                          'created_date'      => date('Y-m-d H:i:s'),
                         );
        
       $insertid =  $this->My_model->insert_data(BLOG,$insertData);

       if($insertid)
       {
         $this->msgsuccess("Blog are added successfully.");
         redirect('admin/blog');
       }else
       {
         $this->msgwarning("Blog not added successfully.");
         redirect('admin/blog');
       }
    }
  
   public function edit($id="")
    {
         $data['blog'] = $this->My_model->getfields(BLOG,'*',array('id'=>$id),"");
       // print_r($data['user']);
        $data['title']  = COMPANYNAME.' | Edit Blog';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/blog/editblog_view');
        $this->load->view('admin/common/footer'); 
    }



    public function editblog()
    {
          $id = $this->input->post('event_id');
          $image = $this->input->post('img');
         
           //upload image
            if (!empty($_FILES['image']['name'])) {

            $type     = explode('.', $_FILES["image"]["name"]);
            $type     = strtolower($type[count($type) - 1]);
            $name     = mt_rand(10000000, 99999999);
            $filename = $name . '.' . $type;

            $url = "blogimage/" . $filename;

            move_uploaded_file($_FILES["image"]["tmp_name"], $url);
            $data['image'] = $filename;
            $image = 'blogimage/'.$filename;
            //$imgArr = array('image'=>$image);
        }
 
          //end upload image
          
           $news_date = $this->input->post('blog_date');
          $updateData = array(
                          'blog_title'       => $this->input->post('blog_title'),
                          'image'       => $image,
                          'blog_date'        => date('Y-m-d',strtotime($news_date)),
                        
                          'description' => $this->input->post('description'),
                           'ldescription'       => $this->input->post('ldescription'),
                          'updated_date'      => date('Y-m-d H:i:s'),
                         );
        
        $update =  $this->My_model->update_data(BLOG,array('id'=>$id),$updateData);
        // echo $this->db->last_query();die;
        if($update)
        {
         $this->msgsuccess("Blog are edit successfully.");
         redirect('admin/blog');
        }else
        {
         $this->msgwarning("Blog are not edit.");
         redirect('admin/blog');
        }
    }


	 public function checkcategory()
    {
       $cat = $this->input->post('cat');	
      $checkCategory  = $this->my_model->getfields(CATEGORY,'name',array('name'=>$cat));
      if(!empty($checkCategory))
      {
      	echo 1;
      }else
      {
      	echo 0;
      }

    }

  
 public function exportcsvd()
   {

         $Company_name             = 'Event Record';
         $delimiter                = ",";
         $filename                 = $Company_name."_" .date('Y-m-d').".csv";    
     
         $f = fopen('php://memory', 'w');//========Create a file pointer  
       
         $fields = array('Sr.No','Event Title','Category Name','Subcategory Name','Event Date','Event Time','Status','Created Date');//Set column headers
       
         fputcsv($f,$fields,$delimiter);

        // $lineData = array(1,2,3,4,'iuiwuirueireiur',5,6);
         //fputcsv($f, $lineData, $delimiter);

          $datefromm = $this->input->post('datefromm');
          $datetoo = $this->input->post('datetoo');
          $keysearch = $this->input->post('keysearch');
          $cate = $this->input->post('cate');
          $subcat = $this->input->post('subcat');
         if($keysearch){
      
            $cond = "name LIKE '%".$keysearch."%'";
           }
          if($cate){
      
            $cond = "category_id ='".$cate."'";
           }

          if($subcat){
      
            $cond = "subcategory_id ='".$subcat."'";
           }
          if($keysearch){
      
            $cond = "name LIKE '%".$keysearch."%'";
           }
         if(!empty($datefromm) && !empty($datetoo))
          {
            $datefrom =date('Y-m-d',strtotime($datefromm));
            $dateto =date('Y-m-d',strtotime($datetoo));
            if($datefrom == $dateto){
           $cond .= " AND created_date like '%$datefrom%'";
          }
        if($datefrom != $dateto)
         {
           $cond .= " AND created_date between '$datefrom' and '$dateto'";
         }
    }
   
  
   if(!empty($datefromm) && empty($datetoo)) 
   {
     $datefrom =date('Y-m-d',strtotime($datefromm));
     $cond .= " AND date_format(created_date,'%Y-%m-%d') >= '$datefrom'"; 
   }     
  if(empty($datefromm) && !empty($datetoo)) 
   {
      $dateto =date('Y-m-d',strtotime($datetoo));
      $cond .= " AND date_format(created_date,'%Y-%m-%d') <= '$dateto'"; 
   }

       $tables='md_event';
       $fields ='*';
       $data = $this->com_model->getRows($tables,$fields,$cond,$conditions='');
      
     //get records from database
         
      // $Sample_Pricing = $this->db->query("SELECT * FROM ".DB_PREFIX."pricing_sample WHERE 1")->result();
     if(!empty($data))
       {       
       $Counter = 1;
       foreach($data as $row)
         {

        $categoryname =  $this->user_model->getCondResult(CATEGORY,'category_name',array('id'=>$row->category_id)); 
        $subcategoryname =  $this->user_model->getCondResult(SUBCATEGORY,'subcategory_name',array('id'=>$row->subcategory_id));
         if(!empty( $categoryname))
          { 
            $catname= $categoryname[0]->category_name; 
          } 
          else
          {
            $catname='';
          }
          if(!empty($subcategoryname))
          {
             $subcatname= $subcategoryname[0]->subcategory_name; 
          }
          else
          {
            $subcatname='';
          }
        
        if($row->created_date=='0000-00-00 00:00:00')
           {
            $created = '';
           }
         else{
             $created =  date('d-m-Y',strtotime($row->created_date));
          }
       
          if($row->status =='1')
           {
            $stats='Active';
           }
           else
           {
            $stats='Inactive';
           }

          if($row->event_date=='0000-00-00')
           {
            $eventdate =  '';
           }
         else{
             $eventdate =  date('d-m-Y',strtotime($row->event_date));
          }
        $lineData = array($Counter,$row->event_title,$catname,$subcatname,$eventdate,$row->event_time,$stats,$created);

        fputcsv($f, $lineData, $delimiter);
       
       $Counter++;
     }    
     
     
         fseek($f, 0);//move back to beginning of file    
         header('Content-Type: text/csv');//set headers to download file rather than displayed
         header('Content-Disposition: attachment; filename="'.$filename.'";');         
         fpassthru($f);//output all remaining data on a file pointer     
     }
 
   }
	   

}

