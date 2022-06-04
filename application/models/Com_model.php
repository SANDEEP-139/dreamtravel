<?php
class Com_model extends CI_Model
{   
    public function getRows($tables,$fields,$cond,$params = array())
    {     
		$this->db->cache_on();
		$this->db->cache_off();
        $this->db->select($fields);
        $this->db->from($tables);
        if($cond != ""):
			$this->db->where($cond);
		endif;
        //sort data by ascending or desceding order
        $this->db->order_by('id','desc');

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
        
        //get records
        $query = $this->db->get();
		$this->db->cache_off();
		//echo $this->db->last_query();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result():NULL;
    }
	

    
	public function cuntrows($tables,$fields,$cond)
    {     
        $this->db->select($fields);
        $this->db->from($tables);
        if($cond != ""):
			$this->db->where($cond);
		endif;
        //sort data by ascending or desceding order
        $this->db->order_by('id','desc');

        //set start and limit
       /*  if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
         */
        //get records
        $query = $this->db->get();
		//echo $this->db->last_query();
        //return fetched data
        return ($query->num_rows() > 0)?$query->num_rows():NULL;
    }


    public function serviceProvider($params = array())
{
   // print_r($params);die;
          $this->db->select('p.name as provider_name,email,mobile,gender,p.image,c.name as category_name,p.id,p.address,p.timing,p.status,p.company_name,p.dob,p.profile');
          $this->db->from(PROVIDER.' as p');
          $this->db->join(CATEGORY.' as c', 'c.id=p.category','left');
       
          $cond = "p.id>0";
          if(isset($params['search']['keywords'])){
             $keywords = $params['search']['keywords'];
            // echo"<pre>";print_r($keywords);die;
          if($keywords)
                $cond .= " AND (concat(p.name LIKE '%".$keywords."%' OR p.email LIKE '%".$keywords."%' OR p.mobile LIKE '%".$keywords."%' OR c.name LIKE '%".$keywords."%' )) ";

          }
      
        if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
            $this->db->where($cond);
            $this->db->order_by('p.id','DESC');
             $data = $this->db->get();
       
        return ($data->num_rows() >0)?$data->result():NULL;

}

//this function is used for upcoming booking
  public function booking($params = array())
{
   // print_r($params);die;
          $this->db->select('u.first_name,u.last_name,u.address,u.mobile,u.email,p.name,b.service_id,b.id,b.booking_status,b.booking_date,b.schedule_date,b.schedule_time,b.booking_status,b.unq_id');
          $this->db->from(BOOKING.' as b');
          $this->db->join(USER.' as u', 'u.id=b.user_id','left');
         $this->db->join(PROVIDER.' as p', 'p.id=b.provider_id','left');
       
          $cond = "booking_status='0' || booking_status='1' || booking_status='2'";
          if(isset($params['search']['keywords'])){
             $keywords = $params['search']['keywords'];
            // echo"<pre>";print_r($keywords);die;
          if($keywords)
                $cond .= " AND (concat(p.name LIKE '%".$keywords."%' OR u.email LIKE '%".$keywords."%' OR u.mobile LIKE '%".$keywords."%' OR u.first_name LIKE '%".$keywords."%' OR b.unq_id LIKE '%".$keywords."%' )) ";

          }
      
        if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
            $this->db->where($cond);
            $this->db->order_by('b.id','DESC');
             $data = $this->db->get();
       
        return ($data->num_rows() >0)?$data->result():NULL;

}

 public function pastBooking($params = array())
{
   // print_r($params);die;
          $this->db->select('u.first_name,u.last_name,u.address,u.mobile,u.email,p.name,b.service_id,b.id,b.booking_status,b.booking_date,b.schedule_date,b.schedule_time,b.booking_status,b.unq_id');
          $this->db->from(BOOKING.' as b');
          $this->db->join(USER.' as u', 'u.id=b.user_id','left');
         $this->db->join(PROVIDER.' as p', 'p.id=b.provider_id','left');
       
          $cond = "b.id>0 and booking_status='3'";
          if(isset($params['search']['keywords'])){
             $keywords = $params['search']['keywords'];
            // echo"<pre>";print_r($keywords);die;
          if($keywords)
                $cond .= " AND (concat(p.name LIKE '%".$keywords."%' OR u.email LIKE '%".$keywords."%' OR u.mobile LIKE '%".$keywords."%' OR u.first_name LIKE '%".$keywords."%' OR b.unq_id LIKE '%".$keywords."%')) ";

          }
      
        if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
            $this->db->where($cond);
            $this->db->order_by('b.id','DESC');
             $data = $this->db->get();
       
        return ($data->num_rows() >0)?$data->result():NULL;

}
//this function is used for cancel booking
public function cancelledbooking($params = array())
{
   // print_r($params);die;
          $this->db->select('u.first_name,u.last_name,u.address,u.mobile,u.email,p.name,b.service_id,b.id,b.booking_status,b.booking_date,b.schedule_date,b.schedule_time,b.booking_status,b.unq_id');
          $this->db->from(BOOKING.' as b');
          $this->db->join(USER.' as u', 'u.id=b.user_id','left');
         $this->db->join(PROVIDER.' as p', 'p.id=b.provider_id','left');
       
          $cond = "b.id>0 and booking_status='4'";
          if(isset($params['search']['keywords'])){
             $keywords = $params['search']['keywords'];
            // echo"<pre>";print_r($keywords);die;
          if($keywords)
                $cond .= " AND (concat(p.name LIKE '%".$keywords."%' OR u.email LIKE '%".$keywords."%' OR u.mobile LIKE '%".$keywords."%' OR u.first_name LIKE '%".$keywords."%' OR b.unq_id LIKE '%".$keywords."%' )) ";

          }
      
        if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit'],$params['start']);
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            $this->db->limit($params['limit']);
            $this->db->where($cond);
            $this->db->order_by('b.id','DESC');
             $data = $this->db->get();
       
        return ($data->num_rows() >0)?$data->result():NULL;

}




//================================Ajay==============//
// display in admin account in Payment section
public function payment($params = array())
{
   $this->db->select('a.*,a.id as invoiceid,b.*,c.id,c.name,c.email,c.mobile,d.id,d.subcategory_name');
   $this->db->from('md_service_request as a');
   $this->db->join('md_invoice b', 'a.invoice_id=b.id','left');
   $this->db->join('md_user c', 'c.id=b.user_id','left');
   $this->db->join('md_service_subcategory d','d.id=a.service_id','left');

   $cond = "b.id>0";
   if(isset($params['search']['keywords'])){
      $keywords = $params['search']['keywords'];
     // echo"<pre>";print_r($keywords);die;
if($keywords)
         $cond .= " AND (concat(c.name LIKE '%".$keywords."%' OR c.email LIKE '%".$keywords."%' OR c.mobile LIKE '%".$keywords."%' OR b.transaction_id LIKE '%".$keywords."%')) ";
	   

   }

    if(isset($params['search']['servicecat'])){
      $servicecat = $params['search']['servicecat'];
     // echo"<pre>";print_r($keywords);die;
  if($servicecat)
         $cond .= " AND a.service_id = '$servicecat'";
     

   }
   
    if(isset($params['search']['dateFrom']) || isset($params['search']['dateTo'])){
      $dateFrom = $params['search']['dateFrom'];
	  $dateTo = $params['search']['dateTo'];

   if(!empty($dateFrom) && !empty($dateTo))
   {
       if($dateFrom == $dateTo){
         $cond .= " AND b.created_date like '%$dateFrom%'";
       }
       if($dateFrom != $dateTo)
       {
          $cond .= " AND b.created_date between '$dateFrom' and '$dateTo'";
       }
   }
   
  
	 if(!empty($dateFrom) && empty($dateTo)) 
	 {
		 $cond .= " AND date_format(b.created_date,'%Y-%m-%d') >= '$dateFrom'"; 
	 }		 
  if(empty($dateFrom) && !empty($dateTo)) 
	 {
		 $cond .= " AND date_format(b.created_date,'%Y-%m-%d') <= '$dateTo'"; 
	 }
   }
  
   
    


   if(array_key_exists("start",$params) && array_key_exists("limit",$params))
   $this->db->limit($params['limit'],$params['start']);
elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
   $this->db->limit($params['limit']);
   $this->db->where($cond);
   $this->db->order_by('a.id','DESC');
    $data = $this->db->get();

     //print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}



public function paymentexport($params = array())
{
   $this->db->select('a.*,a.id as invoiceid,b.*,c.id,c.name,c.email,c.mobile,d.id,d.subcategory_name');
   $this->db->from('md_service_request as a');
   $this->db->join('md_invoice b', 'a.invoice_id=b.id','left');
   $this->db->join('md_user c', 'c.id=b.user_id','left');
   $this->db->join('md_service_subcategory d','d.id=a.service_id','left');

   $cond = "b.id>0";
   if(isset($params['search']['keywords'])){
      $keywords = $params['search']['keywords'];
     // echo"<pre>";print_r($keywords);die;
if($keywords)
         $cond .= " AND (concat(c.name LIKE '%".$keywords."%' OR c.email LIKE '%".$keywords."%' OR c.mobile LIKE '%".$keywords."%' OR b.transaction_id LIKE '%".$keywords."%')) ";
     

   }

    if(isset($params['search']['servicecat'])){
      $servicecat = $params['search']['servicecat'];
     // echo"<pre>";print_r($keywords);die;
  if($servicecat)
         $cond .= " AND a.service_id = '$servicecat'";
     

   }
   
    if(isset($params['search']['dateFrom']) || isset($params['search']['dateTo'])){
      $dateFrom = $params['search']['dateFrom'];
    $dateTo = $params['search']['dateTo'];

   if(!empty($dateFrom) && !empty($dateTo))
   {
       if($dateFrom == $dateTo){
         $cond .= " AND b.created_date like '%$dateFrom%'";
       }
       if($dateFrom != $dateTo)
       {
          $cond .= " AND b.created_date between '$dateFrom' and '$dateTo'";
       }
   }
   
  
   if(!empty($dateFrom) && empty($dateTo)) 
   {
     $cond .= " AND date_format(b.created_date,'%Y-%m-%d') >= '$dateFrom'"; 
   }     
  if(empty($dateFrom) && !empty($dateTo)) 
   {
     $cond .= " AND date_format(b.created_date,'%Y-%m-%d') <= '$dateTo'"; 
   }
   }
  
   
    


 //  if(array_key_exists("start",$params) && array_key_exists("limit",$params))
   //$this->db->limit($params['limit'],$params['start']);
//elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
   //$this->db->limit($params['limit']);
   $this->db->where($cond);
   $this->db->order_by('a.id','DESC');
    $data = $this->db->get();

     //print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}
//====================display in admin account for perticular detail=========//

function paymentdetails($invoiceid)
{
   $this->db->select('a.*,b.*,c.*,c.id,d.id,d.subcategory_name');
   $this->db->from('md_service_request as a');
   $this->db->join('md_invoice b', 'a.invoice_id=b.id','left');
   $this->db->join('md_user c', 'c.id=b.user_id','left');
   $this->db->join('md_service_subcategory d','d.id=a.service_id','left');
   $this->db->where('b.id',$invoiceid);
  //$this->db->order_by('a.id','DESC');
   $data = $this->db->get();
  // print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}

function cartdetails($userid)
{
   $this->db->select('a.*,b.*,c.*,c.name,d.*,a.status as st,a.price as unitprice,a.total_price as Total,a.id as Id');
   $this->db->from('md_addtocart as a');
   $this->db->join('md_product b', 'a.product_id=b.id','left');
   $this->db->join('md_product_category d', 'd.id=b.product_category','left');
   $this->db->join('md_user c', 'c.id=a.user_id','left');
   $this->db->where('c.id',$userid);
  //$this->db->order_by('a.id','DESC');
   $data = $this->db->get();
  // print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}


function orderdetails($userid)
{
   $this->db->select('a.*,b.*,c.*,c.name,d.*,a.status as st,a.price as unitprice,a.total_price as Total,a.id as Id');
   $this->db->from('md_order_details as a');
   $this->db->join('md_product b', 'a.product_id=b.id','left');
   $this->db->join('md_product_category d', 'd.id=b.product_category','left');
   $this->db->join('md_user c', 'c.id=a.user_id','left');
   $this->db->where('c.id',$userid);
  //$this->db->order_by('a.id','DESC');
   $data = $this->db->get();
  // print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}

function orderdetailsByorder($orderIdconditions)
{
   $this->db->select('a.*,b.*,s.shipping_address,c.*,c.name,d.*,a.status as st,a.price as unitprice,a.total_price as Total,a.id as Id');
   $this->db->from('md_order_details as a');
   $this->db->join('md_order s', 'a.product_id=s.id','left');
   $this->db->join('md_product b', 'a.product_id=b.id','left');
   $this->db->join('md_product_category d', 'd.id=b.product_category','left');
   $this->db->join('md_user c', 'c.id=a.user_id','left');
   $this->db->where($orderIdconditions);
  
  //$this->db->order_by('a.id','DESC');
   $data = $this->db->get();
  // print_r($data);
   return ($data->num_rows() >0)?$data->result():NULL;


}




	
	
}

?>