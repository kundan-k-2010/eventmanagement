<?php
class Common extends CI_Model {
   function __construct(){
		parent::__construct(); 
   }
   function bind_query( $query='', $params=array() ){
		$result = $this->db->query( $query, $params );
      if( is_bool( $result ) )
          return $result;
      else
          return $result->result();      
   }
   /***************************************************************************************
	* Purpose 		: Show last executed query.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
   function insert_data($tableName, $params){
	   $this->db->insert($tableName, $params );
      $result = $this->db->insert_id();
          return $result; 
   }
   /***************************************************************************************
	* Purpose 		: Show last executed query.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
   function update_data($tableName,$data, $id){
		$this->db->where('id', $id);
        $this->db->update($tableName, $data);
		return 1; 
   }
   /***************************************************************************************
	* Purpose 		: Show last executed query.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
   function soft_delete($tableName,$data,$id){
		$this->db->where('id', $id);
        $this->db->update($tableName, $data);
		$this->_displaySQLQuery();
		return 1; 
   }
   /***************************************************************************************
	* Purpose 		: Show last executed query.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
   function soft_delete_by_column($tableName,$data,$column,$id){
		$this->db->where($column, $id);
        $this->db->update($tableName, $data);
		$this->_displaySQLQuery();
		return 1; 
   }
   /***************************************************************************************
	* Purpose 		: Show last executed query.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	private function _displaySQLQuery(){
		if(isset($_COOKIE['debug'])){
			echo '<br />------------------------------------'.__FUNCTION__.'------------------------------------------<br />';
			echo '<pre>'.$this->db->last_query().'</pre>'; 
			echo '<br />----------------------------------------------------------------------------------------------<br />';
		}		
	}
   
}