<?php
class User_model extends CI_Model
{



	public function getCount($table,$field,$cond)
	{
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($cond);		
        return $this->db->count_all_results();
 
	}

	public function getSum($table,$feilds,$cond)
    {
        $this->db->select_sum($feilds);
        $this->db->from();
        $this->db->where($cond);
        $data = $this->db->get($table);

        return ($data->num_rows() > 0)?$data->row():0;
    } 

	

	
public function checkUserEmail($tbl,$email)
	{
		$this->db->select("id");
		$this->db->where("email",$email);
    $client = $this->db->get($tbl);

   return ($client->num_rows() >0)?TRUE:FALSE;
    }
    
    public function checkUserName($username)
  {
    $this->db->select("id");
    $this->db->where("username",$username);
   $client = $this->db->get(USERS);

  return ($client->num_rows() >0)?TRUE:FALSE;
    }
    
	public function fetchCondRow($table,$con)
    {
       $data = $this->db
	                ->select('*')
					->from($table)
					->where($con)
					->get();
					
	   	return ($data->num_rows() > 0)?$data->row():FALSE;
	}

	public function fieldCondRow($table,$filed,$con)
    {
       $data = $this->db
	                ->select($filed)
					->from($table)
					->where($con)
					->get();
		//echo 	$data->num_rows();
	  //return ($data->num_rows() > 0)?$data->row():FALSE; 
	  return $data->row();
	}

	public function resultArrayNull($table,$filed,$con)
    {
       $data = $this->db
	                ->select($filed)
					->from($table)
					->where($con)
					->get();
	  return ($data->num_rows() > 0)?$data->result_array():NULL; 
	}

	public function fieldCRow($table,$filed,$con)
    {
       $data = $this->db
	                ->select($filed)
					->from($table)
					->where($con)
					->get();
	  return ($data->num_rows() > 0)?$data->row():FALSE; 
	}

	public function getCondResult($table,$filed,$con)
    {
       $data = $this->db
	                ->select($filed)
					->from($table)
					->where($con)
					->get();
				
	   	return ($data->num_rows() > 0)?$data->result():FALSE;	
	}

	public function getCondResultArray($table,$filed,$con)
    {
       $data = $this->db
	        ->select($filed)
					->from($table)
					->where($con)
					->order_by('id','DESC')
					->get();
					
	   	return ($data->num_rows() > 0)?$data->result_array():FALSE;
	}

  public function getCondResultArray1($table,$filed,$con)
    {
       $data = $this->db
                  ->select($filed)
          ->from($table)
          ->where($con)
          ->order_by('id','DESC')
          ->group_by('provider_id')
          ->get();
          
      return ($data->num_rows() > 0)?$data->result_array():FALSE;
  }

	

   

	public function fetchValue($table,$field,$con)
    {
       $data = $this->db
	                ->select($field)
					->from($table)
					->where($con)
					->get();
		$result = $data->row();
	   	return ($data->num_rows() >0)?$result->$field:FALSE;
	}

	public function mysqlResult($table,$field,$condition,$orderby,$order)
	{
		$this->db->select($field);
		if($condition)
		   $this->db->where($condition);
		if(!empty($orderby) && !empty($order))
			$this->db->order_by($orderby,$order);
		$query = $this->db->get($table);

		return ($query->num_rows() > 0)?$query->result():FALSE;
	}

	public function mysqlResultLimit($table,$field,$condition,$orderby,$order,$limit,$limitS)
	{
		$this->db->select($field);
		if($condition)
		   $this->db->where($condition);
		if(!empty($orderby) && !empty($order))
			$this->db->order_by($orderby,$order);
		if(!empty($limitS) && !empty($limit))
			$this->db->limit($limit, $limitS);
		else if(empty($limitS) && !empty($limit))
			$this->db->limit($limit);
		$query = $this->db->get($table);

		return ($query->num_rows() > 0)?$query->result():FALSE;
	}

	public function maxIdVal($table,$field)
    {
        $this->db->select($field);
        $data = $this->db->get($table);
        return ($data->num_rows() >0)?$data->row():FALSE;
    }

    public function selectMax($table,$field)
    {
    	$this->db->select_max($field);
    	$data = $this->db->get($table);
    	$dataVal = $data->row();
    	return $dataVal->$field;
    }

    public function selectMaxCond($table,$field,$cond)
    {
    	$this->db->select_max($field);
    	$this->db->where($cond);
    	$data = $this->db->get($table);
    	$dataVal = $data->row();
    	return $dataVal->$field;
    }

    public function maxConVal($table,$field,$cond)
    {
        $this->db->select($field);
        $this->db->where($cond);
        $data = $this->db->get($table);
        return ($data->num_rows() >0)?$data->row():FALSE;
    }

    public function mysqlNumRows($table,$field,$cond)
    {
        $this->db->select($field);
        $this->db->where($cond);
        $data = $this->db->get($table);
        return ($data->num_rows() >0)?$data->num_rows():0;
    }

	

	public function checkExist($table,$field,$con)
    {
       $data = $this->db
	                ->select($field)
					->from($table)
					->where($con)
					->get();
					
	   	return ($data->num_rows() > 0)?TRUE:FALSE;
	}

	
	public function whereIn($tbl,$field,$con)
    {
	    $data = $this->db
	               ->select($field)
				   ->from($tbl)
				   ->where_in($con)
				   ->get();
		return $data->result();
		//return $this->db->last_query();
    }

   

	

	
   public function insert_data($tbl,$data)
   {
        $this->db->insert($tbl,$data);
		$insert_id = $this->db->insert_id();
		$this->db->cache_delete_all();
		return $insert_id;
   }

   
	

  public function update_data($tbl,$data,$condition) {
 		  $this->db->trans_start();
 		  $this->db->where($condition);
      $this->db->update($tbl,$data);
      $this->db->trans_complete();
      $this->db->cache_delete_all();

	    if ($this->db->affected_rows() == '1') 
	        return TRUE;
	    else {
	        if ($this->db->trans_status() === FALSE)
	          return FALSE;
	        return TRUE;
	    }
  }

	public function update_data_cache($tbl,$data,$condition)
    {
   		$this->db->trans_start();
   		$this->db->where($condition);
        $this->db->update($tbl,$data);
        $this->db->trans_complete();
        $this->db->cache_delete_all();
		if ($this->db->affected_rows() == '1') 
		    return TRUE;
		else {
		    if ($this->db->trans_status() === FALSE)
		        return FALSE;
		    return TRUE;
		}
    }
   
    public function deleteRow($table,$cond)
    {
  		$this->db->where($cond);
  		$this->db->delete($table);
  		$this->db->cache_delete_all();
  		return TRUE;
    }

    public function fetchAllRecords($school)
    {
       $data = $this->db
	                ->select('*')
					->from($school)
					->get();
					//return $data->result();
	   return ($data->num_rows() > 0)?$data->result():FALSE;					
    }
   
  

  
   
 public  function getToken()
 {
   	 $length = 20;
     $token = "";
     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
     $codeAlphabet.= "0123456789";
     $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[rand(0, $max-1)];
    }

    return $token;
}


function image_upload($image,$folder) {
      $UPLOAD_DIR = $folder."/";
       $image_parts = explode(";base64,", $image);
       $image_type_aux = explode("image/", $image_parts[0]);
       $image_type = $image_type_aux[1];
      // $image_type = $type;;
       $image_base64 = base64_decode($image_parts[1]);
       $image_base64 = base64_decode($image);
       $file = $UPLOAD_DIR.uniqid() . '.'.$image_type;
       file_put_contents($file, $image_base64);
       $file = base_url().$file;
       return $file;
   }


 function getProvider($cond)
 {
    $this->db->select('p.id,p.name,p.email,p.mobile,p.country_code,p.profile,p.status,latitude,longitude');
    $this->db->from('hms_service_provider as p');
    $this->db->join('hms_favorites f', 'f.provider_id=p.id','inner');
    //$result = $this->db->get();
      $this->db->where($cond);
    $this->db->order_by('f.id','DESC');
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }


 function tripcategoryFilter($cond)
 {
    $this->db->select('p.id,p.name,p.email,p.mobile,p.profile,AVG(rating) as rate');
    $this->db->from('hms_service_provider as p');
    $this->db->join('hms_rating r', 'r.provider_id=p.id','right');
    //$result = $this->db->get();
    $this->db->where($cond);
    $this->db->order_by('r.id','DESC');
    $data = $this->db->get();
    return ($data->num_rows() >0)?$data->result():NULL;
 }

  public function AvgRating($table,$cond)
    {
        $this->db->select('AVG(rating) as rate');
        $this->db->from();
        $this->db->where($cond);
        $this->db->order_by('id','DESC');
        $data = $this->db->get($table);
        

        return ($data->num_rows() > 0)?$data->row():0;
    }

     public function AvgRating1($table,$cond)
    {
        $this->db->select('AVG(rating) as rate,provider_id');
        $this->db->from();
        $this->db->where($cond);
         $this->db->order_by('rate','DESC');
        $data = $this->db->get($table);
       

        return ($data->num_rows() > 0)?$data->row():0;
    }


     function getCartDetail($condition)
   {
    $this->db->select('s.service_name,s.image,s.id as service_id,p.name as provider_name,p.profile,p.address,c.provider_id,p.latitude,p.longitude');
    $this->db->from('hms_cart as c');
    $this->db->join('hms_user as u', 'u.id=c.user_id','inner');
    $this->db->join('hms_service_provider as p', 'p.id=c.provider_id','inner');
    $this->db->join('hms_provider_services as s', 's.id=c.service_id','inner');
    $this->db->where($condition);
     $query = $this->db->get();
     return $query->result();
   }


  function providerBooking($condition) {
      $this->db->select('u.id as user_id,u.first_name,u.last_name,b.address,u.email,u.image,u.country_code,u.latitude,u.longitude,b.service_id,u.mobile,b.booking_date,b.schedule_date,b.schedule_time,b.booking_type,b.booking_status,b.unq_id,b.id');
      $this->db->from('hms_booking as b');
      $this->db->join('hms_user u', 'u.id=b.user_id','inner');
      //$result = $this->db->get();
      $this->db->where($condition);
      $this->db->order_by('b.id','DESC');
      $data = $this->db->get();
      return ($data->num_rows() >0)?$data->result():NULL;
  }

  function providerPastBooking($condition)
 {
    $this->db->select('u.id as user_id,u.first_name,u.last_name,b.address,u.email,u.image,b.service_id,u.mobile,u.country_code,b.booking_date,b.schedule_date,b.schedule_time,b.booking_type,py.price,b.unq_id,b.id');
    $this->db->from('hms_booking as b');
    $this->db->join('hms_user u', 'u.id=b.user_id','inner');
     $this->db->join('hms_payment py', 'py.booking_id=b.id','left');
    //$result = $this->db->get();
      $this->db->where($condition);
    $this->db->order_by('b.id','DESC');
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }


  function ReasonListing() {
      $this->db->select('id,type');
      $query = $this->db->get('hms_reasons');
      
      if ($query->num_rows() > 0) {
          $row = $query->result();
          return $row;
      } else {
          return $row = [];
      }
  }

  function userBooking($condition)
 {
    $this->db->select('p.id as pro_id,p.name,p.email,p.address,b.service_id,p.mobile,p.country_code,p.profile,b.booking_date,b.schedule_date,b.schedule_time,b.booking_type,b.booking_status,b.id,b.unq_id');
    $this->db->from('hms_service_provider as p');
    $this->db->join('hms_booking b', 'b.provider_id=p.id','inner');
    //$result = $this->db->get();
      $this->db->where($condition);
    $this->db->order_by('b.id','DESC');
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }
//booking details
  function bookingDetail($condition)
 {
    $this->db->select('p.name,p.email,p.address,b.service_id,p.mobile,p.country_code,p.profile,b.provider_id,b.booking_date,b.schedule_date,b.schedule_time,b.booking_type,b.booking_status,b.id,b.address as booking_address,py.price,b.unq_id');
    $this->db->from('hms_service_provider as p');
    $this->db->join('hms_booking b', 'b.provider_id=p.id','inner');
     $this->db->join('hms_payment py', 'py.booking_id=b.id','left');
    //$result = $this->db->get();
      $this->db->where($condition);
    $this->db->order_by('b.id','DESC');
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }

 //provider booking details

 function providerBookingDetail($condition)
 {
    $this->db->select('u.first_name,u.last_name,u.email,b.address,b.service_id,u.mobile,u.country_code,u.image,u.latitude,u.longitude,b.provider_id,b.booking_date,b.schedule_date,b.schedule_time,b.booking_type,b.booking_status,b.id,b.address as booking_address,py.price,b.unq_id');
    $this->db->from('hms_booking as b');
    $this->db->join('hms_user u', 'u.id=b.user_id','inner');
     $this->db->join('hms_payment py', 'py.booking_id=b.id','left');
    //$result = $this->db->get();
      $this->db->where($condition);
    $this->db->order_by('b.id','DESC');
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }



//================================Ajay==============//
  function myPayment($condition)
 {
    $this->db->select('a.*,b.*,c.id,d.id,d.subcategory_name');
    $this->db->from('md_service_request as a');
    $this->db->join('md_invoice b', 'a.invoice_id=b.id','left');
    $this->db->join('md_user c', 'c.id=b.user_id','left');
    $this->db->join('md_service_subcategory d','d.id=a.service_id','left');
    $this->db->where('b.user_id',$condition);
    $this->db->order_by('a.id','DESC');
    $data = $this->db->get();
   // print_r($data);
    return ($data->num_rows() >0)?$data->result():NULL;


 }
 
  function myPaymentcart($condition)
 {
    $this->db->select('a.*,b.*,c.id,d.id,d.subcategory_name');
    $this->db->from('md_service_request as a');
    $this->db->join('md_invoice b', 'a.invoice_id=b.id','left');
    $this->db->join('md_user c', 'c.id=b.user_id','left');
    $this->db->join('md_service_subcategory d','d.id=a.service_id','left');
    $this->db->where($condition);
    $this->db->order_by('a.id','DESC');
    $data = $this->db->get();
   // print_r($data);
    return ($data->num_rows() >0)?$data->result():NULL;


 }

  function myPaymentFilter($condition,$order)
 {
    $this->db->select('u.first_name,u.last_name,u.image,u.mobile,u.country_code,u.email,p.name as pro_name,py.booking_id,py.price,py.created_date,b.service_id,b.unq_id');
    $this->db->from('hms_payment as py');
    $this->db->join('hms_user u', 'u.id=py.user_id','inner');
    $this->db->join('hms_service_provider p', 'p.id=py.provider_id','inner');
     $this->db->join('hms_booking b', 'b.id=py.booking_id','inner');
    //$result = $this->db->get();
      $this->db->where($condition);
    $this->db->order_by('py.created_date',$order);
     $data = $this->db->get();
     return ($data->num_rows() >0)?$data->result():NULL;


 }


 //get latlong
    public function getLatLong($address){
        if(!empty($address)){
            //Formatted address
            $formattedAddr = str_replace(' ','+',$address);
            //Send request and receive json data by address
            $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&key=AIzaSyCHu8t8gkBK-yT0hkzrp5P5Fa51kFNUjUk'); 
            $output = json_decode($geocodeFromAddr);
            //Get latitude and longitute from json data
            $data['latitude']  = $output->results[0]->geometry->location->lat; 
            $data['longitude'] = $output->results[0]->geometry->location->lng;
            //var_dump($output->results[0]->address_components[0]->types);die;
            for($j=0;$j<count($output->results[0]->address_components);$j++){
                $city = $output->results[0]->address_components[$j]->types;
                if($city[0]=="locality"){
                     $data['city'] = $output->results[0]->address_components[$j]->long_name;    
                }
            }
            //Return latitude and longitude of the given address
            if(!empty($data)) {
                return $data;
            }else{
                return false;
            }
        }else{
            return false;   
        }
    }
  

   
 
 //==============================Ajay======================//
 
 

 
  	
	////----- GET SINGLE FIELDS VALUE WITH CONDITION -----/////
	public function getfields($table,$fields,$condition,$conor="")
	{
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		$fieldname = $this->db->list_fields($table)[0];
		$this->db->order_by($fieldname,"ASC");
		if($conor){ $this->db->or_where($conor); }	
        $results=$this->db->get(); 
		return $results->result();
	} 
   



  
}


