
<?php

class Fullcalendar_model extends CI_Model
{
 function fetch_all_event1($id){
  $this->db->select('*');
  $this->db->from('md_event');	
  $this->db->where('subcategory_id',$id);
  $this->db->order_by('id');
  return $this->db->get();
 }
 function fetch_all_event(){
  $this->db->select('*');
  $this->db->from('md_event');	
  
  $this->db->order_by('id');
  return $this->db->get();
 }

 function insert_event($data)
 {
  $this->db->insert('md_event', $data);
 }

 function update_event($data, $id)
 {
  $this->db->where('id', $id);
  $this->db->update('md_event', $data);
 }

 function delete_event($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('md_event');
 }
}

?>