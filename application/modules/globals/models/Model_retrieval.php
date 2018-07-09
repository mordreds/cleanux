<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_retrieval extends CI_Model 
{
	/*******************************
		Index Function
	*******************************/
	public function index() 
  {
		#Redirect to Dashboard Where Roles Are Defined
		redirect('access');
	}

  /*******************************
    Return Count of Result
  *******************************/
  public function return_count($dbres,$tablename,$return_dataType="php_object",$where_condition=array()) 
  {
    $dbres->where($where_condition); 
    $query_result = $dbres->get($tablename);
    
    if($query_result) 
      $return_data = $query_result->num_rows();
    else
      $return_data = 0;
    
    if($return_dataType == "json")          
      return json_encode($return_data);
    else 
      return ($return_data);
  }
  
  /*******************************
    Return Array of Information
  *******************************/
  public function retrieve_allinfo($dbres,$tablename,$return_dataType="php_object",$condition=array(),$orderby = array()) 
  {
    $dbres->where($condition); 

    if($orderby) {
      foreach ($orderby as $key => $value) {
        # code...
        $dbres->order_by($key,$value); 
      }
    }
    $query_result = $dbres->get($tablename);
    //print $dbres->get_compiled_select($tablename,$condition); print "<br/><br/>";
    /*************** Query check ************/
    if($query_result->num_rows() >= 0) 
      $return_data = $query_result->result();
    else
      $return_data = ['DB_ERROR' => $dbres->error()];
    /*************** Query check ************/
    
    if($return_dataType == "json")          
      return json_encode($return_data);
    else 
      return ($return_data);
  }

  /*******************************
    Return Array of Information
  *******************************/
  public function all_info_return_result($dbres,$tablename,$condition=array(),$return_dataType="php_object") 
  {
    $dbres->where($condition); 
    $query = $dbres->get($tablename);
    
    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Condition Order BY
  *******************************/
  public function return_row_orderby_limit($dbres,$tablename,$condition,$orderby,$limit,$return_dataType="php_object") 
  {
    $dbres->where($condition); 
    # Orderby List
    foreach ($orderby as $key => $value) {
      # code...
      $dbres->order_by($key,$value); 
    }
    $dbres->limit($limit);
    $query = $dbres->get($tablename);

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Custom Selection
  *******************************/
  public function select_where_returnRow($dbres,$tablename,$return_dataType="php_object",$select,$where) 
  {
    $dbres->select($select);
    $dbres->where($where);
    $query = $dbres->get($tablename);

    if($return_dataType == "json")          
      return json_encode($query->row());
    else 
      return ($query->row());
  }

  public function select_where_returnResult($dbres,$tablename,$return_dataType="php_object",$select,$where) 
  {
    $dbres->select($select);
    $dbres->where($where);
    $dbres->limit($limit);
    $query = $dbres->get($tablename);

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /***********************************************
    Return Single Row Record
  ************************************************/
  public function all_info_return_row($dbres,$tablename,$condition=array(),$return_dataType="php_object") 
  { 
    $dbres->where($condition); 
    $query = $dbres->get($tablename); 

    if($return_dataType == "json")          
      return json_encode($query->row());
    else 
      return ($query->row());
  }

  /***********************************************
    Retreieve Table Fields From Default Database
  ************************************************/
  public function All_Info_DefaultDB($tablename,$where_condition = array()) 
  { 
    $this->db->where($where_condition);
    $query = $this->db->get($tablename); 
        
    return ( ($query->num_rows() > 0) ?$query->result() : FALSE );
  }

  /***********************************************************
    Retreieve Table Fields From Default Database Using Select
  ************************************************************/
  public function All_Info_With_Condition_Select_DefaultDB($tablename,$select_condition,$where_condition) 
  { 
    $this->db->select($select_condition);

    $this->db->where($where_condition);
        
    $query = $this->db->get($tablename); 
        
    return ( ($query->num_rows() > 0) ?$query->result() : FALSE );
  }
    
  ############################### Generating ID ################################
    
    /***********************************************
			Generating New ID
    ************************************************/
    public function LastID($TableName,$FieldName) 
    {
      $this->db->select($FieldName);

      $query = $this->db->get($TableName);
        
      return ( ($query->num_rows() > 0) ? $query->row(0) : FALSE );
	  }
  ############################### Generating ID ################################
    
  ############################### All Data Info ################################
  	public function All_Info_Row($tablename) 
      {
          $query = $this->db->get($tablename);
              
          return ( ($query->num_rows() > 0) ? $query->row() :false );
  	}

    
  ############################### All Data Info ################################
    
    ############################### Retrieval Table Fields ########################
    /***********************************************
            Retreieve Table Fields 
    ************************************************/
    
    public function ret_table_fields($tablename) 
    { 
        $result = $this->db->list_fields($tablename); 
        
        return(($result) ? $result : false);  
    }
    
    ############################### Retrieval With Single Condition ########################
    

    /***********************************************
            Retreieve Table Fields 
    ************************************************/
    public function ret_data_with_s_cond_boolean($tablename,$IdField,$data) 
    { 
      $tablename = $tablename;
        
      $this->db->where($IdField,$data[$IdField]);
        
      $query = $this->db->get_where($tablename); 
        
      return ( ($query->num_rows() > 0) ? TRUE : FALSE );
    }
    
}//End of class
