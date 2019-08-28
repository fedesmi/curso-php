<?php
class Articulo_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function dame_ultimos_articulos(){
         $query = $this->db->get('articulo'); 
         return $query->result_array();
   }
   
   function dame_articulo($id){
      $this->db->where('id', $id);
      $query = $this->db->get('articulo');
      return $query->result_array();
      

   }

}
?> 
