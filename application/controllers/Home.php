<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('My_model');
    $this->load->model('com_model');
    $this->load->model('user_model');
	} 
	   
public function index()
  {
    $data['title']  = COMPANYNAME.' | Home';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->My_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->My_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->My_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->My_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->My_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->My_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->My_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    //echo "<pre>";
    //print_r($data['domestic_tour']);die;
    $data['weekend_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->My_model->getfieldslimitInternational(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->My_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->My_model->getfields('md_setting','*',array('status' =>1),"");
    $data['paymentsecurity'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['aboutus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['contactus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['product'] = $this->My_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('status' =>1),"");
    $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
	$this->load->view('common/head',$data); 
	$this->load->view('common/header'); 
	$this->load->view('home');
	$this->load->view('common/footer');
  }
  
  public function checkemail()
  {
     $email = $this->input->post('email');
     $checkemail = $this->My_model->getfields('md_user','email' ,array('email' =>$email));
    // echo $this->db->last_query();die;
     if(!empty($checkemail))
     {
        echo 1;
     }
     else
     {
        echo 2; 
     }
  }
  
  public function registeruser()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $username = $this->input->post('username');
    
    $resterData  = array(
                          'username' => $username,
                          'email'    => $email,
                          'password' => md5($password),
                          'status'   =>1,
        
                        );
    $insertData  = $this->My_model->insert_data('md_user',$resterData);  
    if($insertData)
    {
      $this->msgsuccess("You are registered successfully.");
      redirect('home');   
    }
    else
    {
        $this->msgwarning("You are not registered.");
      redirect('home');  
    }
                        
  }
  
  	 public function userLogin()
	{  
		$username	  = $this->input->post('email');
		$pass 		  = $this->input->post('password');

		$result1=$this->My_model->getfields('md_user',"email",array('email'=>$username),"");

		if(!empty($result1)){
			$cond = array ('email' =>$username,'password'=>md5($pass),'status'=>'1');
			$fields = "id,username,email,status";
			$result=$this->My_model->getfields('md_user',$fields,$cond,"");
			if(!empty($result)){
             $userdata = array(
						   'username'  	=> $result[0]->username,
						   'useremail'      => $result[0]->email,
						   'userid'         => $result[0]->id,
						   'user_logged_in' => TRUE,
              
					     );
				
               $this->session->set_userdata($userdata);
			   $this->msgsuccess('User Logged in successfully');
			   
				redirect('home');
			
				}
			else { 
			    $this->msgwarning('Password is incorrect.');
			 
               redirect('home');
				}
			}
			else { 
			       $this->msgwarning('This Email is not registered.');
                	redirect('home');
				 }
	
		}
	
  public function contactnow()
    {
    
      $createddate = date('Y-m-d H:i:s');
       $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
      $booknowData =  array(
                     'name'               => $this->input->post('name'),
                     'email'               => $this->input->post('email'),
                     'phone'             => $this->input->post('mobile'),
                     'subject'             => $this->input->post('subject'),
                     'message'             => $this->input->post('message'),
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_booknow',$booknowData);
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Phone</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Subject</th><td>'.$booknowData['subject'].'</td></tr>
                                <tr><th>Message</th><td>'.$booknowData['message'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Contact Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Contact request has been made successfully..");
           redirect('contact-us'); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect('contact-us'); 
        }   
    }

      public function enqurycab()
    {
    
      $createddate = date('Y-m-d H:i:s');
       $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
       
      $booknowData =  array(
                     'first_name'          => $this->input->post('fname'),
                     'email'               => $this->input->post('email'),
                     'phone'               => $this->input->post('phone'),
                     'pickuplocation'      => $this->input->post('pickuplocation'),
                     'droplocation'        => $this->input->post('droplocation'),
                     'pickupdate'          => date('Y-m-d',strtotime($this->input->post('pickdate'))),
                     'enquiry_type'        => "Cab Enquiry",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Pickup Loation</th><td>'.$booknowData['pickuplocation'].'</td></tr>
                                <tr><th>Drop Location</th><td>'.$booknowData['droplocation'].'</td></tr>
                                <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Pickup Date</th><td>'.$booknowData['pickupdate'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Enquiry Cab Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Cab enquiry request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        }   
    }
    
    public function feedbackme()
    {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');
      $city = $this->input->post('city');
      $pincode = $this->input->post('pincode');
      $rating ='';
      $rating = $this->input->post('rating');
      
      
      $feedbackData  = array(
                              'name'         => $this->input->post('name'),
                              'email'        => $this->input->post('email'),
                              'phone'        => $this->input->post('phone'),
                              'city'         => $this->input->post('city'),
                              'pincode'      => $this->input->post('pincode'),
                              'rating'       => $this->input->post('rating'),
                              'created_at'   => date('Y-m-d H:i:s'),
                              
        
                            );
                         
     $insertData = $this->My_model->insert_data('md_feedback',$feedbackData);
     //echo $this->db->last_query();die;   
     if($insertData)
     {
         $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Dear admin here is feedback,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$feedbackData['name'].'</td></tr>
                               <tr><th>Email</th><td>'.$feedbackData['email'].'</td></tr>
                               <tr><th>Phone</th><td>'.$feedbackData['phone'].'</td></tr>
                               <tr><th>City</th><td>'.$feedbackData['city'].'</td></tr>
                               <tr><th>Pincode</th><td>'.$feedbackData['pincode'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($feedbackData['email'])
                  ->to($settings[0]->email)
                  ->subject("Feeback Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();
         $this->msgsuccess("Feedback has been sent successfully..");
           redirect(base_url()); 
     }
     else
     {
       $this->msgwarning("Feedback not send.");
           redirect(base_url());   
     }
     
    }
    

 public function agentregister()
 {
    $createddate = date('Y-m-d H:i:s');
    $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
   
    $booknowData =  array(
                     'first_name'          => $this->input->post('fname'),
                     'last_name'           => $this->input->post('lname'),
                     'email'               => $this->input->post('email'),
                     'phone'               => $this->input->post('phone'),
                     'agentName'           => $this->input->post('agentName'),
                     'location'            => $this->input->post('city'),
                     'enquiry_type'        => "travel agent",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
         //   echo $this->db->last_query();die;
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name']." ".$booknowData['last_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Loation</th><td>'.$booknowData['location'].'</td></tr>
                                <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Date</th><td>'.$booknowData['created_date'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Agent Register Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Agent Register request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        }   
     
 }
 
 public function enqurycustpackage()
 {
    $createddate = date('Y-m-d H:i:s');
    $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
   
    $booknowData =  array(
                     'first_name'          => $this->input->post('fname'),
                     'last_name'           => $this->input->post('lname'),
                     'email'               => $this->input->post('email'),
                     'phone'               => $this->input->post('phone'),
                     'duration'            => $this->input->post('duration'),
                     'pickuplocation'      => $this->input->post('pickuplocation'),
                     'droplocation'        => $this->input->post('droplocation'),
                     'enquiry_type'        => "Customise package enquiry",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
         //   echo $this->db->last_query();die;
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name']." ".$booknowData['last_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Pickup Loation</th><td>'.$booknowData['pickuplocation'].'</td></tr>
                                <tr><th>Drop Loation</th><td>'.$booknowData['droplocation'].'</td></tr>
                                <tr><th>Duration</th><td>'.$booknowData['duration'].'</td></tr>
                                <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Date</th><td>'.$booknowData['created_date'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Customise package enquiry Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Customise package enquiry request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        }   
 }
    
 public function registerHotel()
 {
    $createddate = date('Y-m-d H:i:s');
    $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
   
    $booknowData =  array(
                     'first_name'          => $this->input->post('fname'),
                     'last_name'           => $this->input->post('lname'),
                     'email'               => $this->input->post('email'),
                     'phone'               => $this->input->post('phone'),
                     'hotelname'           => $this->input->post('hotelname'),
                     'location'            => $this->input->post('location'),
                     'enquiry_type'        => "Hotel Register",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
         //   echo $this->db->last_query();die;
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name']." ".$booknowData['last_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Loation</th><td>'.$booknowData['location'].'</td></tr>
                                <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th> Date</th><td>'.$booknowData['created_date'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Register Hotel Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Register Hotel request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        }  
 }
 
 public function registercab()
  {
      $createddate = date('Y-m-d H:i:s');
    $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
   
    $booknowData =  array(
                     'first_name'          => $this->input->post('fname'),
                     'last_name'           => $this->input->post('lname'),
                     'email'               => $this->input->post('email'),
                     'phone'               => $this->input->post('phone'),
                     'cabname'             => $this->input->post('cabname'),
                     'vehiclenumber'       => $this->input->post('vehiclenumber'),
                     'location'            => $this->input->post('location'),
                     'enquiry_type'        => "Cab Register",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
         //   echo $this->db->last_query();die;
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name']." ".$booknowData['last_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                 <tr><th>Vehicle Number</th><td>'.$booknowData['vehiclenumber'].'</td></tr>
                               <tr><th>Cab Name</th><td>'.$booknowData['cabname'].'</td></tr>
                                <tr><th>Loation</th><td>'.$booknowData['location'].'</td></tr>
                                <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th> Date</th><td>'.$booknowData['created_date'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Register Cab Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Register Cab request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        } 
  }
public function enquryvisa()
    {
    
      $createddate = date('Y-m-d H:i:s');
       $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
      $booknowData =  array(
                     'first_name'             => $this->input->post('fname'),
                     'phone'               => $this->input->post('phone'),
                     'email'                   => $this->input->post('email'),
                     'location'          => $this->input->post('location'),
                     'country'            => $this->input->post('country'),
                     'pickupdate'              => date('Y-m-d',strtotime($this->input->post('pickdate'))),
                     'enquiry_type'            => "Visa Enquiry",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Visa Enquiry Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                                <tr><th>Loation</th><td>'.$booknowData['location'].'</td></tr>
                                <tr><th>Phone</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Pickup Date</th><td>'.$booknowData['pickupdate'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Contact Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Visa enquiry request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
            redirect(base_url()); 
        }   
    }

      public function enqurytrain()
    {
    
      $createddate = date('Y-m-d H:i:s');
       $settings = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
      $booknowData =  array(
                    'first_name'               => $this->input->post('fname'),
                     'phone'               => $this->input->post('phone'),
                     'email'                   => $this->input->post('email'),
                     'pickuplocation'          => $this->input->post('pickuplocation'),
                     'droplocation'            => $this->input->post('droplocation'),
                     'pickupdate'              => date('Y-m-d',strtotime($this->input->post('pickdate'))),
                     'enquiry_type'            => "Train Enquiry",
                     'created_date'        => $createddate,
                     'status'              => '1',
                  );
            
            $id = $this->My_model->insert_data('md_enquiry_request',$booknowData);
            if($id){
                $htmlform ='<html>
                             <table border="0" width="700px">
                               <tr><td colspan="2"><h3>Booking Request has been made,Details of which are following:.</h3><td></tr>
                               <tr><th>Name</th><td>'.$booknowData['first_name'].'</td></tr>
                               <tr><th>Email</th><td>'.$booknowData['email'].'</td></tr>
                               <tr><th>Contact</th><td>'.$booknowData['phone'].'</td></tr>
                                <tr><th>Pickup Loation</th><td>'.$booknowData['pickuplocation'].'</td></tr>
                                <tr><th>Drop Location</th><td>'.$booknowData['droplocation'].'</td></tr>
                                <tr><th>Pickup Date</th><td>'.$booknowData['pickupdate'].'</td></tr>
                               <tr><td></td><td><h3>Thanks!</h3></td></tr>
                             </table>
                         </html>';
             $this->load->library('email');
             $this->email->from($booknowData['email'])
                  ->to($settings[0]->email)
                  ->subject("Train enquiry Request Form")
                  ->message($htmlform)
                  ->set_mailtype('html')
                  ->send();

           $this->msgsuccess("Train enquiry request has been made successfully..");
           redirect(base_url()); 
        }
        else
        {
             $this->msgerror("Forms are not submitted successfully..");
           redirect(base_url()); 
        }   
    }
 
   public function search()
    {
      $keyword =$_GET['term'];
      $condSubcatid= "title like '%".$keyword."%'";
      $subcategory= $this->My_model->getfields(TRIP,'title',$condSubcatid);
      $blarray=array();
       if(!empty($subcategory)){
      foreach($subcategory as $values)
      {
        $blarray[]= $values->title;
      }
      }
      else
      {
        $blarray=array('');
      }
      echo json_encode($blarray);
      
    } 
    
public function searching()
  { 
    
     $subcatdetail = $_GET['q'];
     $title = str_replace("-"," ",$subcatdetail);
     $data['title']  = COMPANYNAME.' | '.$title;
        if($title=='')
         {
           redirect('home');
         }
       else
        {
       $condSubcatid= array('title' =>$title);
       $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status'=>1),"");
       $data['banner_page'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id' =>12),"");
       $data['blog']  = $this->My_model->getfields(BLOG,'*',array('status'=>1),"");
       $data['trip_category']  = $this->My_model->getfields(CATEGORY,'*',array('status'=>1),"");
       $data['testimonials']  = $this->My_model->getfields(TESTIMONIAL,'*',array('status'=>1),"");
       $data['customised_trip']  = $this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id' =>5,'trip_type' =>0),"");
       $conditionTrending    = "status =1 and trip_type in (1)";
       $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`)";
       $conditionBackpacking = "status =1 and FIND_IN_SET(3,`trip_type`)";
       $conditionHimalayan   = "status =1 and FIND_IN_SET(4,`trip_type`)";
       $conditionAdventure   = "status =1 and FIND_IN_SET(5,`trip_type`)";
       $data['trending_trips']    = $this->My_model->getfields(TRIP,'*',$conditionTrending,"");
       $data['weekend_trips']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
       $data['backpacking_trips'] = $this->My_model->getfields(TRIP,'*',$conditionBackpacking,"");
       $data['himalayan_trips']   = $this->My_model->getfields(TRIP,'*',$conditionHimalayan,"");
       $data['adventure_trips']   = $this->My_model->getfields(TRIP,'*',$conditionAdventure,"");
       $data['our_expert'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>1),"");
       $data['about_us'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>2),"");
       $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>6),"");
       $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>5),"");
       $data['policy'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>4),"");
       $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>3),"");
       $data['video_title'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>11),"");
       $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
       $data['blogs'] = $this->My_model->getfields(BLOG,'*',array('status'=>1),"");
       $data['trending_title'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>8),"");
       $data['workcations'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>10),"");
       $data['happy_trveller'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id'=>9),"");
       $data['blog_banner'] = $this->My_model->getfields(PAGE,'*',array('status'=>1,'id' =>7),"");
      

       $data['iternary_data'] = $this->My_model->getfields(INFORMATION,'*',array('category'=>'Itinerary'),"");
       $data['costing_data_inclusions'] = $this->My_model->getfields(INFORMATION,'*',array('category'=>'Costing','title'=>'Inclusions'),"");
       $data['costing_data_exclusions'] = $this->My_model->getfields(INFORMATION,'*',array('category'=>'Costing','title'=>'Exclusions'),"");
       $data['other_data'] = $this->My_model->getfields(INFORMATION,'*',array('category'=>'Other Info'),"");
       $data['video'] = $this->My_model->getfields(VIDEO,'*',array('status'=>1),"");
       $data['gallery'] = $this->My_model->getfields(GALLERY,'*',array('status'=>1),"");
       $data['testimonials'] = $this->My_model->getfields(TESTIMONIAL,'*',array('status'=>1),"");
       $condSearch ="title ='".$title."' or location = '".$title."'";
       $data['trip_details'] = $this->My_model->getfields(TRIP,'*',$condSearch,"");
        $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
      // echo $this->db->last_query();die;
       
	     $this->load->view('common/head',$data); 
	     $this->load->view('common/header'); 
		  $this->load->view('searchbytrip');
		 $this->load->view('common/footer');	
	   }
  }
  
  public function logout()
	{
	 $this->session->sess_destroy(); 
	 $this->msgsuccess('User Logged out  successfully.');
     redirect('home');
	}

public function domestictrips()
  {
     $data['title']  = COMPANYNAME.' | Domestic Trips';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->My_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->My_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->My_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->My_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->My_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->My_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->My_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    //echo "<pre>";
    //print_r($data['domestic_tour']);die;
    $data['weekend_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->My_model->getfieldslimitInternational(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->My_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->My_model->getfields('md_setting','*',array('status' =>1),"");
    $data['paymentsecurity'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['aboutus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['contactus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['product'] = $this->My_model->getfields(PRODUCT,'*',array('status' =>1),"");
     $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('status' =>1),"");
      $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
	  $this->load->view('common/head',$data); 
	  $this->load->view('common/header'); 
	  $this->load->view('domestic-trips');
	  $this->load->view('common/footer');
  }
  
  
  public function weekendtrips()
  {
     $data['title']  = COMPANYNAME.' | Weekend Trips';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->My_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->My_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->My_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->My_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->My_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->My_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->My_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    //echo "<pre>";
    //print_r($data['domestic_tour']);die;
    $data['weekend_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->My_model->getfieldslimitInternational(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->My_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->My_model->getfields('md_setting','*',array('status' =>1),"");
    $data['paymentsecurity'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['aboutus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['contactus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['product'] = $this->My_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('status' =>1),"");
     $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
	$this->load->view('common/head',$data); 
	$this->load->view('common/header'); 
	$this->load->view('weekend-trips');
	$this->load->view('common/footer');
  }
  
    
  public function internationaltrips()
  {
    $data['title']  = COMPANYNAME.' | International Trips';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->My_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->My_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->My_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->My_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->My_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->My_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->My_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    //echo "<pre>";
    //print_r($data['domestic_tour']);die;
    $data['weekend_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->My_model->getfieldslimit(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->My_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->My_model->getfields('md_setting','*',array('status' =>1),"");
    $data['paymentsecurity'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['aboutus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['contactus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['product'] = $this->My_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('status' =>1),"");
     $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
	$this->load->view('common/head',$data); 
	$this->load->view('common/header'); 
	$this->load->view('international-trips');
	$this->load->view('common/footer');
  }
 public function dreamtrips()
  {
    $data['title']  = COMPANYNAME.' | Dream Trips';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->My_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->My_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->My_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->My_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->My_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->My_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->My_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->My_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->My_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->My_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    //echo "<pre>";
    //print_r($data['domestic_tour']);die;
    $data['weekend_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->My_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->My_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->My_model->getfields('md_setting','*',array('status' =>1),"");
    $data['paymentsecurity'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['aboutus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['contactus'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['product'] = $this->My_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['hotel'] = $this->My_model->getfields(HOTEL,'*',array('status' =>1),"");
    $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
	$this->load->view('common/head',$data); 
	$this->load->view('common/header'); 
	$this->load->view('dream-trips');
	$this->load->view('common/footer');
  }
}

