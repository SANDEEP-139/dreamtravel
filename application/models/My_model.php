<?php
//////------ COMMON MODEL -------/////
class My_model extends CI_Model
{
	function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();

  }
  
  /////-----INSERT DATA MODEL-------//////
	public function insert_data($tbl,$data)
	{
		$this->db->insert($tbl,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}    //////-----CLOSE INSERT MODEL 
	
	/////----  UPDATE DATA MODEL-----/////
	public function update_data($tbl,$con,$data_array)
	{
	  	return $this->db
				 ->where($con)
				 ->update($tbl,$data_array);
				  return $this->db->last_query();
	} ////----- CLOSE UPDATE MODEL 

	 public function deleteRow($table,$cond)
    {
  		$this->db->where($cond);
  		$this->db->delete($table);
  		$this->db->cache_delete_all();
  		return TRUE;
    }
	
	
	////----- GET SINGLE FIELDS VALUE WITH CONDITION -----/////
	public function getfields($table,$fields,$condition,$conor="")
	{
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		$fieldname = $this->db->list_fields($table)[0];
		$this->db->order_by($fieldname,"ASC");
		if($conor){ $this->db->or_where($conor); }	
		
		
 //print_r($this->db->list_fields($table)[0]);		
		 ///$this->db->or_where($conor);
        
        $results=$this->db->get(); 
		return $results->result();
	}    //////------- CLOSE SINGLE FIELDS 
	////---- FETCH ALL RECODS WITH CODITION AND SEARCH LIMIT ORDERS WITH PAGINATION ---------//////
	
		////----- GET SINGLE FIELDS VALUE WITH CONDITION -----/////
	public function getfieldslimit($table,$fields,$condition,$conor="")
	{
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		$fieldname = $this->db->list_fields($table)[0];
		$this->db->order_by($fieldname,"ASC");
		$this->db->limit(6); 
		if($conor){ $this->db->or_where($conor); }	
		
		
 //print_r($this->db->list_fields($table)[0]);		
		 ///$this->db->or_where($conor);
        
        $results=$this->db->get(); 
		return $results->result();
	}    //////------- CLOSE SINGLE FIELDS 
	////---- FETCH ALL RECODS WITH CODITION AND SEARCH LIMIT ORDERS WITH PAGINATION ---------//////

	public function getfieldslimitInternational($table,$fields,$condition,$conor="")
	{
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		$fieldname = $this->db->list_fields($table)[0];
		$this->db->order_by($fieldname,"ASC");
		$this->db->limit(5); 
		if($conor){ $this->db->or_where($conor); }	
		
		
 //print_r($this->db->list_fields($table)[0]);		
		 ///$this->db->or_where($conor);
        
        $results=$this->db->get(); 
		return $results->result();
	}    //////------- CLOSE SINGLE FIELDS 
	////---- FETCH ALL RECODS WITH CODITION AND SEARCH LIMIT ORDERS WITH PAGINATION ---------//////

public function getfieldsss1($table,$fields,$condition,$conor="")
	{
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		$fieldname = $this->db->list_fields($table)[0];
		$this->db->order_by($fieldname,"ASC");
		$this->db->limit(1); 
		if($conor){ $this->db->or_where($conor); }	
		
		
 //print_r($this->db->list_fields($table)[0]);		
		 ///$this->db->or_where($conor);
        
        $results=$this->db->get(); 
		return $results->result();
	} 
	
public function fieldResult($table,$filed)
    {
       $data = $this->db
	                ->select($filed)
					->from($table)
					->get();
	  return ($data->num_rows() > 0)?$data->result():FALSE; 
	}



	
	
	////--- GET TABLE ROW LAST ID -----//// 
	public function custom($query)
	{
		$result=$this->db->query($query)->result();
		return $result;
	} ////---- CLOSE LAST ID 
	
	////--- GET TABLE ROW LAST ID -----//// 
	public function maxid($table,$field)
	{
		$results=$this->db->query("SELECT MAX(".$field.") as maxid FROM ".$table."");
		return $results->result();
	} ////---- CLOSE LAST ID 
	
	
	public function coutrow($table,$fields,$condition){
		$this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
		//if($conor){ $this->db->or_where($conor); }		
        return $this->db->count_all_results();
        //$results=$this->db->get(); 
		//return $results->result();
	}
	
		public function coutrows($table,$fields,$condition){
		$this->db->select($fields);
        $this->db->from($table);
       // $this->db->where($condition);
		//if($conor){ $this->db->or_where($conor); }		
        return $this->db->count_all_results();
        //$results=$this->db->get(); 
		//return $results->result();
	}
	
	public function fieldsum($table,$fields,$condition){
		$this->db->select("SUM(".$fields.") AS total");
        $this->db->from($table);
        $this->db->where($condition); 
		$getdata = $this->db->get();
		 if($getdata->num_rows() > 0)
			return $getdata->result_array();
		else
		return null;
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
public function fetchValueimage($table,$field,$con)
    {
       $data = $this->db
	                ->select($field)
					->from($table)
					->where($con)
					->limit(1)
					->get();

		$result = $data->row();
	   	return ($data->num_rows() >0)?$result->$field:FALSE;
	}

	public function authenticate($tbl,$condition)
    {
		$q = $this->db
			  ->where($condition)
			  ->get($tbl);
			  return $q->row();
	}

	

	public function getfields1($table,$fields,$condition,$conor="")
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

	

	 public function mysqlNumRows($table,$field,$cond)
    {
        $this->db->select($field);
        $this->db->where($cond);
        $data = $this->db->get($table);
        return ($data->num_rows() >0)?$data->num_rows():0;
    }

     public function deleteRole($id,$data = array())
    {
    	if($id != "" && !empty($data) )
    	{
    		$this->db->where('staff_id',$id);
    		$this->db->where_in('menu_id',$data);
    		$this->db->delete(ROLES);
    		
    	}



}

 public function getRoles($id)
    {
    	if(empty($id))
    	{
    		return FALSE;
    	}else{
    		$this->db->select('menu_id');
    		$this->db->from(ROLES);
    		$this->db->where('staff_id',$id);
    		$query = $this->db->get();
    		//return $this->db->last_query();
    		return ($query->num_rows() > 0)?$query->result_array():FALSE;
    	}
    	
    }

    public function getSum($table,$feilds,$cond)   { 
       $fields = "amount";
       $this->db->select("SUM(".$fields.") AS total");
        $this->db->from(EARNING);
        
        $this->db->where($cond);
         $data =  $this->db->get();
        return ($data->num_rows() > 0)?$data->row():0;
    } 
	
	
}