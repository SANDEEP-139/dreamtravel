<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('my_model');
    $this->load->model('com_model');
    $this->load->model('user_model');
	} 
	   
	public function aboutus(){
    $data['title']  = COMPANYNAME.' | About Us';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
		$this->load->view('aboutus');
		$this->load->view('common/footer');			 
	}


	public function feedback(){
    $data['title']  = COMPANYNAME.' | Feedback';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
		$this->load->view('feedback');
		$this->load->view('common/footer');			 
	}
	
  public function contactus()
  {
    $data['title']  = COMPANYNAME.' | Contact Us';
         $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('contactus');
    $this->load->view('common/footer'); 
  }
 
  public function blog()
  {
    $data['title']  = COMPANYNAME.' | Blog';
         $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['blogibanner'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>15));
    $data['blogS'] = $this->my_model->getfields(BLOG,'*',array('status' =>1));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('blog');
    $this->load->view('common/footer');   
  }
  
    public function blogdetails($id='')
  {
    $data['title']  = COMPANYNAME.' | Blog-Details';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['blogdetails'] = $this->my_model->getfields(BLOG,'*',array('status' =>1,'id' =>$id));
  $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('blog-details');
    $this->load->view('common/footer');   
  }
  public function terms(){
    $data['title']  = COMPANYNAME.' | Terms & Conditions';
         $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
     $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('terms-condition');
    $this->load->view('common/footer');      
  }

  public function privacy(){
    $data['title']  = COMPANYNAME.' | Privacy Policy';
         $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
   $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('privacy');
    $this->load->view('common/footer');      
  }
  
  	   
	public function searchresults(){
    $data['title']  = COMPANYNAME.' | Search Results';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('search-result');
    $this->load->view('common/footer');			 
	}
  
   public function myaccounts()
   {
     $data['title']  = COMPANYNAME.' | My Accounts';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('my-account');
    $this->load->view('common/footer');	   
   }
  
  
   public function mydashboard()
   {
     $data['title']  = COMPANYNAME.' | My Dashboard';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('my-dashboard');
    $this->load->view('common/footer');	   
   }
  
  
public function hotelresults()
   {
     $data['title']  = COMPANYNAME.' | Hotel Results';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('hotel-results');
    $this->load->view('common/footer');	   
   }
  
  public function agents()
   {
     $data['title']  = COMPANYNAME.' | Agents';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('agents');
    $this->load->view('common/footer');	   
   }
  
  public function carresults()
  {
     $data['title']  = COMPANYNAME.' | Car Results';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('car-results');
    $this->load->view('common/footer');	     
  }
  
  public function agentdashboard()
  {
    $data['title']  = COMPANYNAME.' | Agent Dashbaord';
    $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('agent-dashboard');
    $this->load->view('common/footer'); 
  }
  
  
  
  
    public function paymentsecurity(){
    $data['title']  = COMPANYNAME.' | Payment-Security';
         $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
   $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('payment-security');
    $this->load->view('common/footer');      
  }
   public function disclaimer(){
    $data['title']  = COMPANYNAME.' | Disclaimer';
     $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
     $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('disclaimer');
    $this->load->view('common/footer');      
  }

  public function agreement(){
    $data['title']  = COMPANYNAME.' | User-Agreement';
     $conditionDomestic   = "status =1 and trip_type in (1) and place_type in(1)";
    $conditionWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and place_type in(1)";
    $conditionhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and place_type in(1)";
    $conditioncustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and place_type in(1)";
    $conditionIDomestic   = "status =1 and FIND_IN_SET(1,`trip_type`)and FIND_IN_SET(2,`place_type`)";
    $conditionIWeeknd      = "status =1 and FIND_IN_SET(2,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIhoneymoonPackage = "status =1 and FIND_IN_SET(3,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $conditionIcustomised   = "status =1 and FIND_IN_SET(4,`trip_type`) and FIND_IN_SET(2,`place_type`)";
    $data['domestic_package']    = $this->my_model->getfields(TRIP,'*',$conditionDomestic,"");

    $data['weekend_package']     = $this->my_model->getfields(TRIP,'*',$conditionWeeknd,"");
    $data['honeymoon_package'] = $this->my_model->getfields(TRIP,'*',$conditionhoneymoonPackage,"");
    $data['customised_package']   = $this->my_model->getfields(TRIP,'*',$conditioncustomised,"");
    $data['domestic_Ipackage']    = $this->my_model->getfields(TRIP,'*',$conditionIDomestic,"");
      // echo $this->db->last_query();die;
    $data['weekend_Ipackage']     = $this->my_model->getfields(TRIP,'*',$conditionIWeeknd,"");
    $data['honeymoon_Ipackage'] = $this->my_model->getfields(TRIP,'*',$conditionIhoneymoonPackage,"");
    $data['customised_Ipackage']   = $this->my_model->getfields(TRIP,'*',$conditionIcustomised,"");
    $data['banner'] = $this->my_model->getfields(BANNER,'*',array('status' =>1),"");
    $data['settings'] = $this->my_model->getfields(SETTING,'*',array('status'=>1,'id'=>1),"");
    $data['domestic_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>9));
    $data['weekend_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>10)); 
    $data['international_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>11)); 
    $data['dream_tour'] =$this->my_model->getfields(TRIP,'*',array('status'=>1,'trip_category_id'=>12));  
    $data['packages'] = $this->my_model->getfields('md_package','*',array('status' =>1),"");
    $data['footerdata'] = $this->my_model->getfields('md_setting','*',array('status' =>1),"");
    $data['gallery'] = $this->my_model->getfields(GALLERY,'*',array('status' =>1),"");
    $data['product'] = $this->my_model->getfields(PRODUCT,'*',array('status' =>1),"");
    $data['aboutus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
	$data['searchresults'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>1));
    $data['vision'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>2));
    $data['career'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>4));
    $data['director_first'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>5));
    $data['director_second'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>6));
    $data['contactus'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>8));
    $data['paymentsecurity'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>9));
    $data['privacy'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>10));
    $data['useragreement'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>11));
    $data['disclaimer'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>14));
    $data['terms'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>12));
    $data['feedback'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>13));
    $data['internationalguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>17));
    $data['domesticguide'] = $this->my_model->getfields(PAGE,'*',array('status' =>1,'id' =>16));
    $this->load->view('common/head',$data); 
    $this->load->view('common/header'); 
    $this->load->view('user-agreement');
    $this->load->view('common/footer');      
  }
  

  
  
  
  
  

}

