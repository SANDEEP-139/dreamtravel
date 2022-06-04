<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller
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
		$tables = USERS;
		$data = array();
		$cond = "id > 0";
		$keywords   = $this->input->get('keywords');
        $sortBy 	 = $this->input->get('sortBy');
        $perPage 	 = $this->input->get('perpage');
        $activePage  = $this->input->get('activePage');
         $datefrom   = $this->input->get('datefrom');
         $dateto   = $this->input->get('dateto');

   
       
      $page = $this->input->get('page');
        if(!$page)
            $offset = 0;
        else
            $offset = $page; 

        if($perPage)
			$this->perPage = $perPage;

	
		if($keywords){
			
		$cond .= " AND name LIKE '%".$keywords."%' OR email LIKE '%".$keywords."%')";
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
        $config['base_url']    = base_url('user/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		    $config['colspan']     = 10;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;

        $this->ajax_pagination->initialize($config);

	  $conditions['start'] = $offset;
	  $conditions['limit'] = $this->perPage;  
	  $data['user'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
    $data['title']  = COMPANYNAME.' | USER';
    $this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/user/user_view');
		$this->load->view('admin/common/footer');			 
	}


	function ajaxPaginationData()
	{
		$this->load->library('Ajax_pagination');
	   		
        $conditions = array();
        $tables = USERS;
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
        $cond       = " id > 0";
        
		  if($keywords){
			
				$cond .= " AND name LIKE '%".$keywords."%' OR email LIKE '%".$keywords."%'";

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
        $config['base_url']    = base_url().'user/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $perPage;
        $config['link_func']   = 'searchFilter';
        $config['activePage']  = $activePage;
		    $config['colspan']     = 10;
        $this->ajax_pagination->initialize($config);
        
        $conditions['start'] = $offset;
        $conditions['limit'] = $perPage;
        
        $data['user'] = $this->com_model->getRows($tables,$fields,$cond,$conditions);
        //echo $this->db->last_query();die;
        $this->load->view('admin/user/user_in', $data, false);
    }


    function add()
    {
        $data['title']  = COMPANYNAME.' | Add User';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/user/adduser_view');
        $this->load->view('admin/common/footer'); 
    }


    function addUser()
    {
        
          $insertData = array(
                             'name'             => $this->input->post('name'),
                             'email'            => $this->input->post('email'),
							 'phone'            => $this->input->post('mobile'),
							 'country'            => $this->input->post('country'),
							 'city'            => $this->input->post('city'),
                             'address'         => $this->input->post('address'),
                             'status'           => '1',
                             'created_date'     => date('Y-m-d'),
                            );
        
       $insertid =  $this->my_model->insert_data(USERS,$insertData);
      // echo $this->db->last_query();die;
       if($insertid)
       {
         $this->msgsuccess("User added successfully.");
         redirect('admin/user');
       }else
       {
         $this->msgwarning("User not added successfully.");
         redirect('admin/user');
       }
    }

     function edit($id="")
    {
        $data['user'] = $this->my_model->getfields(USERS,'*',array('id'=>$id));
       // print_r($data['user']);
        $data['title']  = COMPANYNAME.' | Edit User';
        $this->load->view('admin/common/header',$data); 
        $this->load->view('admin/common/left-sidebar');
        $this->load->view('admin/user/edituser_view');
        $this->load->view('admin/common/footer'); 
    }



    function editUser()
    {
    $id = $this->input->post('user_id');
    
          $updateData = array(
                            'name'             => $this->input->post('name'),
                             'email'            => $this->input->post('email'),
							 'phone'            => $this->input->post('mobile'),
							 'country'            => $this->input->post('country'),
							 'city'            => $this->input->post('city'),
                             'address'         => $this->input->post('address'),
                             'updated_date'     => date('Y-m-d h:i:s'),
                            );
        
      $update =  $this->my_model->update_data(USERS,array('id'=>$id),$updateData);
      // echo $this->db->last_query();die;
       if($update)
       {
         $this->msgsuccess("User edit successfully.");
         redirect('admin/user');
       }else
       {
         $this->msgwarning("User not edit successfully.");
         redirect('admin/user');
       }
    }


   public function checkemail()
    {
       $email = $this->input->post('email');	
      $checkemail  = $this->my_model->getfields(USER,'email',array('email'=>$email));
      if(!empty($checkemail))
      {
      	echo 1;
      }else
      {
      	echo 0;
      }

    }

     public function checkmobile()
    {
       $phone = $this->input->post('phone');	
       $checkMobile  = $this->my_model->getfields(USER,'mobile',array('mobile'=>$phone));
      if(!empty($checkMobile))
      {
      	echo 1;
      }else
      {
      	echo 0;
      }

    }	

   public function exportcsvd()
   {
         
         $Company_name             = 'User Record';
         $delimiter                = ",";
         $filename                 = $Company_name."_" .date('Y-m-d').".csv";    
     
         $f = fopen('php://memory', 'w');//========Create a file pointer  
       
         $fields = array('Sr.No','Name','Email','Mobile','Status','Created Date');//Set column headers
       
         fputcsv($f,$fields,$delimiter);

        // $lineData = array(1,2,3,4,'iuiwuirueireiur',5,6);
         //fputcsv($f, $lineData, $delimiter);

         $datefromm = $this->input->post('datefromm');
         $datetoo = $this->input->post('datetoo');
         $keysearch = $this->input->post('keysearch');
       
  
         if($keysearch){
      
            $cond = "name LIKE '%".$keysearch."%'";
           }
         if(empty($keysearch))
         {
           $cond = "id >0";
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

    $idvalue = $this->input->post('idvalue');
     if(!empty($idvalue))
     {
       $impcheckValue = implode(",",$idvalue);
       $cond .= " and id in (".$impcheckValue.")"; 
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

       $tables='md_user';
       $fields ='*';
       $data =array();
       $data = $this->com_model->getRows($tables,$fields,$cond,$conditions='');
        
     //get records from database
         
      // $Sample_Pricing = $this->db->query("SELECT * FROM ".DB_PREFIX."pricing_sample WHERE 1")->result();

     if(!empty($data))
       {       
       $Counter = 1;
       foreach($data as $row)
         {
           $created_date = date('d-m-Y',strtotime($row->created_date));
           if($row->status =='1')
           {
            $stats='Active';
           }
           else
           {
            $stats='Inactive';
           }
           $lineData = array($Counter,$row->name,$row->email,$row->mobile,$stats,$created_date);

       fputcsv($f, $lineData, $delimiter);
       
       $Counter++;
     }    
     
     
         fseek($f, 0);//move back to beginning of file    
         header('Content-Type: text/csv');//set headers to download file rather than displayed
         header('Content-Disposition: attachment; filename="'.$filename.'";');         
         fpassthru($f);//output all remaining data on a file pointer     
     }
     else 
     {
         $Company_name             = 'User Record';
         $delimiter                = ",";
         $filename                 = $Company_name."_" .date('Y-m-d').".csv";    
     
         $f = fopen('php://memory', 'w');//========Create a file pointer  
       
         $fields = array('Sr.No','Name','Email','Mobile','Status','Created Date');//Set column headers
       
         fputcsv($f,$fields,$delimiter);
        fseek($f, 0);//move back to beginning of file    
         header('Content-Type: text/csv');//set headers to download file rather than displayed
         header('Content-Disposition: attachment; filename="'.$filename.'";');         
         fpassthru($f);//o
     }

 
   }
	   

}

