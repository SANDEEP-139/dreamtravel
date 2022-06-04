<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Admin extends Admin_Controller {
   	
   	public function __construct()
   	{
	  parent::__construct();
      $this->load->model('My_model');
   	}
   	
   	public function index()
   	{  	

    
		$data['title'] 	= COMPANYNAME.' | Login page';
		if (empty($this->session->userdata('admin_logged_in')))
		{
		  $this->load->view("admin/login/login_view",$data);
	    }
	 }

	public function adminlogin()
	{

		$redirecturl  = "admin";
		$username	  = $this->input->post('username');
		$pass 		  = $this->input->post('password');
		if($username == "") { $this->msgerror('Username is empty'); }
		else if($pass == "") { $this->msgerror('Password is empty'); }
		else {
			$result1=$this->My_model->getfields(ADMIN,"username",array('username'=>$username),"");

		if(!empty($result1)){
			$cond = array ('username' =>$username,'password'=>md5($pass),'status'=>'1');
			$fields = "id,username,last_activity_time,email,profile";
			$result=$this->My_model->getfields(ADMIN,$fields,$cond,"");
			if(!empty($result))
			 {
			  $userdata = array(
						       'admin_username'  	=> $result[0]->username,
						       'admin_email'        => $result[0]->email,
						       'adminid'            => $result[0]->id,
							   'userimage'          => $result[0]->profile,
							   'lastlogin'          => $result[0]->last_activity_time,
						       'admin_logged_in'    => TRUE,
              
					           );
		      $this->session->set_userdata($userdata);
			  $redirecturl = "admin/dashboard";
			 }
		   else 
			{ $this->msgerror('Password is incorrect'); }
			}
		else { $this->msgerror('This Username is not registered'); }
		}
	
		redirect($redirecturl);
	
	} ////--- END LOGIN FUNCTION 
	
/////=====	START LOGOUT ======////
	public function logout()
	{
		$current_date = date('Y-m-d h:i:s');
		$condition_array = array('id' =>$this->session->userdata('adminid'));
		$data_array = array('last_activity_time' =>$current_date);
		$update =$this->My_model->update_data(ADMIN,$condition_array,$data_array);
		$this->session->sess_destroy();  
		redirect('admin/admin');
	}


public function changepassword()
   	{
      $data['title'] = COMPANYNAME.' | Change Password';
      $this->load->view('admin/common/header',$data); 
 	  $this->load->view('admin/common/left-sidebar');
	  $this->load->view('admin/password/changepass_view');
	  $this->load->view('admin/common/footer');	
     } 
	
	public function changepass()
   	{
      $userid       = $this->session->userdata('adminid');
   	  $newPass      = md5($this->input->post('newpwd')); 
   	  $oldPass      = md5($this->input->post('oldpwd')); 	
   	  $confPass     = md5($this->input->post('conpwd')); 
      $condition_array = array(
							    'id'        =>  $userid,
							    'password'  =>  $oldPass,
							  );	
     
      if($this->input->post('newpwd')!=$this->input->post('oldpwd'))
       {
        $result = $this->My_model->authenticate(ADMIN,$condition_array);
        if(count($result)==1)
         { 
   	       $data_array=array("password" =>$newPass);
           if($newPass==$confPass)
   	        {
   	         $update =$this->My_model->update_data(ADMIN,$condition_array,$data_array);
             $this->msgsuccess("Password update successfully");
             redirect('admin/admin/changepassword');
   	        }
   	       else
   	        {   
   	       	 $this->msgerror('Password Mismatch');
   		     redirect('admin/admin/changepassword');	
   	        }
          }
         else
          {
    		$this->msgerror('Old Password Worng '); 
		    redirect('admin/admin/changepassword');	
          }
        }
       else
         {
	       $this->msgerror('New Password Must Be Diffrent To Old Password'); 
		   redirect('admin/admin/changepassword');	
          }
        }

     public function profile()
     {
     	$session_id =  $this->session->userdata('adminid');
     	$data['profile'] = $this->My_model->getfields(ADMIN,'*',array('id'=>$session_id),"");
    	$data['title'] = COMPANYNAME.' | Edit Profile';
		$this->load->view('admin/common/header',$data); 
 		$this->load->view('admin/common/left-sidebar');
		$this->load->view('admin/profile/editprofile_view');
		$this->load->view('admin/common/footer');	

     }   



	function editprofile()
	{
		$clientid    = $this->input->post('profileid');
		$image = $this->input->post('img');
          //upload image
      if (!empty($_FILES['imgname']['name'])) {
        $type  = explode('.', $_FILES["imgname"]["name"]);
        $type     = strtolower($type[count($type) - 1]);
        $name     = mt_rand(10000000, 99999999);
        $filename = $name . '.' . $type;
        $url = "profileimage/" . $filename;
        move_uploaded_file($_FILES["imgname"]["tmp_name"], $url);
        $data['image'] = $filename;
        $image = "profileimage/".$filename;
        }
		$updateDate = array(

                             'username'     => $this->input->post('name'),
                             'profile'             => $image,
                             'updated_date'  =>date('Y-m-d h:i:s'),

		                    );
		$update =$this->My_model->update_data('hm_admin',array('id'=>$clientid),$updateDate);
		if($update)
		{
           $this->msgsuccess("Profile Updated successfully..");
           redirect('admin/admin/profile');
        }   
       else
       {
       	 $this->msgwarning("Profile Not Updated successfully..");
       	 redirect('admin/admin/profile');
       }	 
	} 
   }
?>

