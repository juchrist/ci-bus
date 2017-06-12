<?php

class BusModel extends CI_Model{

  function __construct(){
    parent::__construct();
  }

public function insert($data,$table){
if ($this->db->insert($table, $data)) {
return true;
}
}
public function delete($id,$field,$table){
if ($this->db->delete($table, $field = $id)) {
return true;
}
}
/* public function update($data,$fmr_id){
$this->db->set($data);
$this->db->where("gi_blog", $fmr_id);
$this->db->update("gi_blog", $data);
} */
}
 ?>
