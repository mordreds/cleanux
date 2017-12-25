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
    $dbres->like('temp_employee_id',"BG/TEMP/");
    $dbres->order_by('temp_employee_id','desc');
    $dbres->limit(1);
    $query = $dbres->get('users');

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Retrieve Last Employee ID
  *******************************/
  public function last_employee_id($dbres,$return_dataType="php_object") 
  {
    $dbres->select('employee_id');
    $dbres->like('employee_id',"BG/EMP/");
    $dbres->order_by('employee_id','desc');
    $dbres->limit(1);
    $query = $dbres->get('hr_employee_work_info');

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
    $restrictions = array('1');
    $dbres->where_not_in('id',$restrictions);
    $query = $dbres->get($tablename);

    if($return_dataType == "json")          
      return json_encode($query->result());
    else 
      return ($query->result());
  }

  /*******************************
    Save Employee Details
  **********************************/
  public function save_employee_details($bio_data,$contact_data,$work_info) 
  {
    $this->db->trans_start();
    /**** Bio Data Insertion *****/
    $tablename = "hr_employee_biodata";
    $query = $this->db->insert($tablename,$bio_data);
    $biodata_id = $this->db->insert_id();
    /**** Bio Data Insertion *****/
    
    /**** Contact Data Inset *****/
    $tablename = "hr_employee_contact_info";
    $contact_data['biodata_id'] = $biodata_id;
    $query = $this->db->insert($tablename,$contact_data);
    /**** Contact Data Inset *****/

    /**** Bio Data Insertion *****/
    $tablename = "hr_employee_work_info";
    $work_info['biodata_id'] = $biodata_id;
    $query = $this->db->insert($tablename,$work_info);
    /**** Bio Data Insertion *****/
    $this->db->trans_complete();

    if($this->db->trans_status() === FALSE)
      return FALSE;
    else
      return TRUE;
  }
    
}//End of class
