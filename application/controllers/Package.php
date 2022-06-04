<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('My_model');
    $this->load->model('com_model');
    $this->load->model('user_model');
	} 
	   
	public function allpackage($slug='')
  {
  
    $data['title']  = COMPANYNAME.' | '.$slug;
    $getTripidsmain = $this->My_model->fetchValue(TRIP,'id',array('slug' =>$slug));
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
   // echo "<pre>";
  //  print_r($data['domestic_tour']);die;
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
    $data['all_package'] = $this->My_model->getfields(SUBTRIP,'*',array('trip_id' =>$getTripidsmain));
     $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
   // echo "<pre>";
   //print_r($data['all_package']);die;
	  $this->load->view('common/head',$data); 
	  $this->load->view('common/header'); 
	  $this->load->view('package');
	  $this->load->view('common/footer');
  }
  public function contactnow()
    {
    
      $createddate = date('Y-m-d H:i:s');
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
                  ->to('abhiazm688@gmail.com')
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

  public function tourdetails($slug='')
    {   
    $data['title']  = COMPANYNAME.' | '.$slug;
    $subtripIds  = $this->My_model->fetchValue(SUBTRIP,'id',array('slug' =>$slug));
    $getTripidsmain = $this->My_model->fetchValue(TRIP,'id',array('slug' =>$slug));
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
   // echo "<pre>";
  //  print_r($data['domestic_tour']);die;
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
    
    $data['package_details'] = $this->My_model->getfields(SUBTRIP,'*',array('id' =>$subtripIds));
     $data['iternary_des'] = $this->My_model->getfields(ITERNARY,'*',array('subtrip_id' =>$subtripIds));
      $data['internationalguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->My_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
   // echo "<pre>";
    //print_r($data['package_details']);die;
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('tour-details');
    $this->load->view('common/footer');
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

}

