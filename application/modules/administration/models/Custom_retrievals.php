<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_retrievals extends CI_Model 
{
	/*******************************
    Retrieve Last Employee ID
  *******************************/
  public function last_temp_employee_id($dbres,$return_dataType="php_object") 
  {
    $dbres->select('temp_employee_id');
    $dbres->like('temp_employee_id',"KAD/TEMP/");
    $dbres->order_by('temp_employee_id','desc');
    $dbres->limit(1);
    $query = $dbres->get('users');

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Employees Without Users
  **********************************/
  public function employees_without_username($dbres,$return_dataType="php_object",$department) 
  {
    $employees_without_username = [];
    $dbres->where(['department' => $department]);
    $query_result = $dbres->get('vw_employee_details');

    foreach ($query_result as $value) {
      
    }

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Register New User
  **********************************/
  public function register_newuser($dbres,$return_dataType="php_object",$user_data,$roles_priv_data) 
  {
    $tablename_1 = "users"; $tablename_2 = "roles_privileges_user";
    
    $dbres->trans_start();
      $query = $dbres->insert($tablename_1,$user_data);
          
      $roles_priv_data['user_id'] = $dbres->insert_id();

      $query = $dbres->insert($tablename_2,$roles_priv_data);
    $dbres->trans_complete();

    if($dbres->trans_status() === FALSE) 
      return FALSE;
    else
      return TRUE;
  }

  /*******************************
    User Group Retrieve
  **********************************/
  public function retrieve_usergroup($dbres,$return_dataType="php_object") 
  {
    $tablename = "roles_privileges_group";
    $restrictions = array('1','2');
    $dbres->where_not_in('id',$restrictions);
    $query = $dbres->get($tablename);

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }
    
}//End of class
