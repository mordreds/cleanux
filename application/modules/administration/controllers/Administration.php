<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends MX_Controller 
{
  /*******************************
    Constructor 
  *******************************/
  public function __construct() 
  {
    parent::__construct();
  }

  /**************** Interface ********************/
    /*******************************
      Index Function
    *******************************/
  	public function index()  {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        	redirect('administration/users');
      else
        redirect('access');
  	}

		/******************************
			 User Management
		*******************************/
		public function users($action="interface") {
      if(isset($_SESSION['user']['username'])) {
				if(in_array('users',$_SESSION['user']['roles'])) {
					switch($action) {
            /************** User Interface *******************/
            case 'interface' : 
              # Loading models
              $this->load->model('access/model_access');
              $this->load->model('globals/model_retrieval');

              # Extracting Data For Display
              $data['allusers']  = $this->model_retrieval->all_info_return_result(self::$_Default_DB,'vw_user_details');
              $data['allgroups'] = $this->model_retrieval->all_info_return_result(self::$_Default_DB,'access_roles_privileges_group');

              $data['next_usr_id'] = $this->generate_userid();
              /********** Interface ***********************/
              $data['page_controller'] = $this->uri->segment(1);
              $data['controller_function'] = $this->uri->segment(2);
              $data['_Default_DB'] = self::$_Default_DB;

              $data['title'] = "users";
              $this->load->view('header',$data);
              $this->load->view('users',$data);
              $this->load->view('footer',$data);
              /********** Interface ***********************/
            break;
            /**************  User Interface *******************/

            /****** Activate / Deactivate / Delete ************/
            case 'account_status' :
              if($privileges = "true"){ //in_array('Users-Activate / Deactivate Users',$_SESSION['user']['priviledges']))
                $this->form_validation->set_rules('user_id','User Account','required|trim');
                $this->form_validation->set_rules('email','User Email','required|trim');
                $this->form_validation->set_rules('status','Account Status','required|trim');

                if ($this->form_validation->run() === FALSE) 
                  $return_data = json_encode(['error' => (string)validation_errors()]);
                else {
                  $this->load->model('access/Model_Access');
                  $this->load->helper('encryption');

                  # Parameters settings
                  $where_condition = [
                    'id' => $this->input->post('user_id'),
                    'username' => $this->input->post('email')
                  ];
                  $dbres = self::$_Default_DB;
                  $return_dataType="php_object";
                  $status = $this->input->post('status');
                  # Parameters settings
                  
                  $query_result = $this->Model_Access->change_account_status($dbres,$return_dataType,$where_condition,$status);

                  if(!empty($query_result)) 
                    $return_data = json_encode(['success' => "User Activation Successul"]);
                  else
                    $return_data = json_encode(['error' => "Activation Process Failed"]);
                }
              }
              else
                $return_data = json_encode(['error' => "Permission Denied. Contact Administrator"]);

               print_r($return_data);
              break;
            /****** Activate / Deactivate / Delete ************/

            /**************** Password Reset ******************/
            case 'reset_password' :
              if($privileges = "true"){ //in_array('Users-Activate / Deactivate Users',$_SESSION['user']['priviledges']))
                $this->form_validation->set_rules('user_id','User Account','required|trim');
                $this->form_validation->set_rules('email','User Email','required|trim');
                $this->form_validation->set_rules('new_password','New Password','required|trim');

                if ($this->form_validation->run() === FALSE) 
                  $return_data = json_encode(['error' => (string)validation_errors()]);
                else {
                  $this->load->model('globals/db_transactions');
                  $this->load->helper('encryption');

                  # Parameters settings
                  $dbres = self::$_Default_DB;
                  $tablename = "access_users";
                  $return_dataType="php_object";
                  $set_values = [
                    'passwd' => "",
                    'default_passwd' => password_encrypt($this->input->post('new_password'))
                  ];
                  $where_condition = [
                    'id' => $this->input->post('user_id'),
                    'username' => $this->input->post('email')
                  ];
                  # Parameters settings
                  
                  $query_result = $this->db_transactions->update_info($dbres,$tablename,$return_dataType,$set_values,$where_condition);

                  if(empty($query_result->ERR) && $query_result) 
                    $return_data = json_encode(['success' => "Password Reset Successul"]);
                  else
                    $return_data = json_encode(['error' => "Password Reset Failed"]);
                }
              }
              else
                $return_data = json_encode(['error' => "Permission Denied. Contact Administrator"]);

               print_r($return_data);
              break;
            /**************** Password Reset ******************/
          }
        }
		 		else 
		 		{
					$this->session->set_flashdata('error', "Permission Denied. Contact Administrator");
					redirect('dashboard');
				}
			}
			else
				redirect('access');
		}
    
    /******************************
			Roles & Priviledges
		******************************/
		public function permissions() {
			if(isset($_SESSION['user']['username']) && in_array('permissions',$_SESSION['user']['roles'])) {
				# Loading models
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        
        #********** Interface ***********************/  
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2);
        $data['_Default_DB'] = self::$_Default_DB;

        $data['title'] = "Permissions";
        $this->load->view('header',$data);
        $this->load->view('permissions',$data);
        $this->load->view('footer',$data);
        #********** Interface ***********************/
		  }
      else {
        $this->session->set_flashdata('error',"Permission Denied. Contact Administrator");
        redirect('dashboard');
      }
    }

    /***********************************************
  			Report
  	************************************************/
  	public function Report() 
    {
  		if (isset($_SESSION['username']))
      {
        if(in_array('Audit',$_SESSION['rows_exploded']))
        {
          # Loading models...
          $this->load->model('Model_Access'); /*Needed By header, nav*/
          $this->load->model('Universal_model_retrieval');
              
          /********** Interface ***********************/    
          $headertag['title'] = "Audit";
          $this->load->view('headtag',$headertag);
          $this->load->view('header');
          $this->load->view('nav');
          $this->load->view('administration/Report');
          $this->load->view('footer');
          /********** Interface ***********************/
  		  } 
        else 
        {
          $this->session->set_flashdata('error',"Permission Denied. Contact Administrator");
          redirect('Dashboard');
        }
      }
      else
      {
        redirect('Access/Login');
      }
  	}  
  /**************** Interface ********************/

  /************** Data Insertion *****************/
    /****** Save New Employee ***********/
    public function save_employee() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','Employee ID','trim');
        $this->form_validation->set_rules('response_type','Response Type','trim');

        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('middle_name','Middle Name','trim');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('gender','Gender','trim|required');
        $this->form_validation->set_rules('marital_status','Marital Status','trim|required');
        $this->form_validation->set_rules('position','Position','trim|required');
        $this->form_validation->set_rules('residence_addr','Residence Address','trim|required');
        $this->form_validation->set_rules('primary_tel','Phone Number 1','trim|required|min_length[10]');
        $this->form_validation->set_rules('secondary_tel','Phone No #2','trim|min_length[10]');
        $this->form_validation->set_rules('email','Email Address','trim|required');
        $this->form_validation->set_rules('emergency_fullname','Emergency Name','trim|required');
        $this->form_validation->set_rules('emergency_residence','Emergency Residence','trim|required');
        $this->form_validation->set_rules('emergency_phone_1','Emergency Phone Number','trim|required');
        $this->form_validation->set_rules('emergency_relationship','Emergency Relationship','trim|required');

        $response_type = $this->input->post('response_type');
        $biodata_id = $this->input->post('id');

        if($this->form_validation->run() === FALSE) {
          $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
          
          if($response_type == "JSON") {
            $return_data['error'] = $errors;
            print_r(json_encode($return_data));
          } 
          else {
            $this->session->set_flashdata('validation_error',$errors);
            redirect('settings/company');
          }
        }
        else {
          $this->load->model('custom_retrievals');
          /***** Data Definition *****/
          $dbres = self::$_Default_DB;
          $return_dataType="php_object";
          
          $bio_data = [
            'first_name' => ucwords($this->input->post('first_name')),
            'middle_name' => ucwords($this->input->post('middle_name')),
            'last_name' => ucwords($this->input->post('last_name')),
            'gender' => ucwords($this->input->post('gender')),
            'marital_status' => ucwords($this->input->post('marital_status')),
          ];

          $contact_data = [
            'residence' => ucwords($this->input->post('residence_addr')),
            'phone_number_1' => ucwords($this->input->post('primary_tel')),
            'phone_number_2' => ucwords($this->input->post('secondary_tel')),
            'email' => ucwords($this->input->post('email')),
            'emergency_fullname' => ucwords($this->input->post('emergency_fullname')),
            'emergency_relationship' => ucwords($this->input->post('emergency_relationship')),
            'emergency_phone_1' => ucwords($this->input->post('emergency_phone_1')),
            'emergency_residence' => ucwords($this->input->post('emergency_residence')),
          ];  

          $work_data = [
            'employee_id' => $this->generate_employeeid(),
            'department_id' => 1,
            'position_id' => ucwords($this->input->post('position')),
          ];
          /***** Data Definition *****/
          /******** Insertion Of New Data ***********/
          if(!$biodata_id) {
            # bio data insert
            $tablename = "hr_employee_biodata";
            $save_data = $this->custom_retrievals->save_employee_details($bio_data,$contact_data,$work_data);

            if($save_data) 
              $this->session->set_flashdata('success', 'Saving Data Successful');
            else 
              $this->session->set_flashdata('error', 'Saving Data Failed');

            redirect('settings/company');
          }
          /******** Insertion Of New Data ***********/
          /******** Updating Of Record ***********/
          else {
            $this->load->model('globals/model_update');
            $where_condition = array('id' => $biodata_id);

            if($delete_item = $this->input->post('delete_item')){
              $update_data = array('status'=>"deleted");
              $tablename = "hr_employee_biodata";

              $biodata_query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$bio_data,$where_condition);
              if($response_type == "JSON") {
                if($biodata_query_result)
                  $return_data['success'] = "Delete Successful";
                else
                  $return_data['error'] = "Delete Failed";

                print_r(json_encode($return_data));
              }
              else{
                if($biodata_query_result)
                  $this->session->set_flashdata('success', 'Delete Successful');
                else
                  $this->session->set_flashdata('error', 'Delete Failed');

                redirect('settings/company');
              }
            }
            else {
              # Employee Biodata Update
              $tablename = "hr_employee_biodata";
              $biodata_query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$bio_data,$where_condition);
              # Employee Contact Info
              $tablename = "hr_employee_contact_info";
              $contact_data_query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$contact_data,$where_condition);
               # Employee Contact Info
              $tablename = "hr_employee_work_info";
              $work_data = array('position_id' => $this->input->post('position'));
              $work_data_query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$work_data,$where_condition);

              if($biodata_query_result && $contact_data_query_result && $work_data_query_result)
                $return_data['success'] = "Update Successful";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
          /******** Updating Of Record ***********/
        }
      }
      else {
        $return_data['error'] = 'Permission Denied.Contact Administrator';
        print_r(json_encode($return_data));
      }
    }
    /****** Save New Employee ***********/

    /*****************************
	    New User
    *****************************/
    public function new_user() {
      if(isset($_SESSION['user']['roles'])) {
        if(true /*in_array('user-C',$_SESSION['user']['privileges'])*/) {
          $this->form_validation->set_rules('fullname','Employee Fullname','trim');
          $this->form_validation->set_rules('biodata_id','User ID','trim|required');
          $this->form_validation->set_rules('employeeid','Employee ID','trim');
          $this->form_validation->set_rules('email','Email','trim|required');
          $this->form_validation->set_rules('phone_num','Phone Number','trim');
          $this->form_validation->set_rules('password','Password','trim|required|min_length[5]');
          $this->form_validation->set_rules('confirm_password','Confirm Password','trim');
          $this->form_validation->set_rules('usergroup','User Group','trim|required');

          if($this->form_validation->run() === FALSE) {
            //var_dump(validation_errors());
            $this->session->set_flashdata('error',"Validation Error");
            redirect('administration/users#new_account');
          }
          else {
            $password       = $this->input->post('password');
            $confirm_password     = $this->input->post('confirm_password');
            
            if(!empty($password)) {//strcmp($password, $confirm_password) == 0) {
              $this->load->helper('encryption');
              $this->load->model('globals/Model_insertion');
              $this->load->model('globals/model_retrieval');
              $this->load->model('administration/custom_retrievals');

              $biodata_id = $this->input->post('biodata_id');
              $fullname   = $this->input->post('fullname');
              $dbres = self::$_Default_DB;
              $tablename = "access_users";
              
              if(!empty($biodata_id) && !empty($fullname)) {
                # Employee Validity Check
                $where = ['id' => $biodata_id, 'fullname' => $fullname];
                $check_dbres = self::$_Default_DB;
                $check_tablename = "vw_employee_details";
                $select = "*";
                $validity_check = $this->model_retrieval->select_where_returnRow($check_dbres,$check_tablename,$return_dataType="php_object",$select,$where);
                
                if($validity_check->id) {
                  # Duplicate User Search
                  $where = ['username' => $this->input->post('email')];
                  $duplicate_check = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType="php_object",$select,$where);
                  if(@$duplicate_check->id)
                    $this->session->set_flashdata('error', "User Already Exists");
                  else {
                    $user_data = [
                      'username'    => $this->input->post('email'),
                      'default_passwd'      => password_encrypt($password),
                      'fullname'    => $this->input->post('fullname'),
                      'biodata_id'  => $biodata_id,
                    ];

                    if($this->input->post('usergroup') == 1)
                      $usergroup = 0;
                    else
                      $usergroup = $this->input->post('usergroup');
                    
                    $roles_priv_data = ['user_id' => "",'group_id' => $usergroup];

                    $query_result = $this->custom_retrievals->register_newuser($dbres,$return_dataType="php_object",$user_data,$roles_priv_data);

                    if($query_result)
                      $this->session->set_flashdata('success', "User Registration Successful");
                    else
                      $this->session->set_flashdata('error', "User Registration Failed");
                  }
                  # Duplicate User Search
                }
                else {
                  $this->session->set_flashdata('error',"Employee Information Mismatch");
                }
                # Employee Validity Check
              }
              else {
                $this->session->set_flashdata('error',"Please Select Employee");
              }
            }
            else
              $this->session->set_flashdata('error','Password Mismatch.');
               
            redirect('administration/users#new_account');
          }
        }
        else {
          $this->session->set_flashdata('error','Permission Denied. Contact Administrator');
          redirect('Dashboard');
        }
      }
      else {
        redirect('Access');
      }
    }

    /*****************************
      New User
    *****************************/
    public function view_allPermissions() 
    {
      $this->load->model('globals/model_retrieval');
      $dbres = self::$_Default_DB;
      $return_dataType = "php_object";
      $tablename = "settings_dashboard_tabs";
      $where_condition = ['status'=>"active"];

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$where_condition);

      $array_index = 0;
      foreach ($query_result as $key => $value) {
        if(sizeof(@$tableArray[$array_index]) == 4) {
          $array_index++;
          $tableArray[$array_index][] = $value;
        }
        else 
          $tableArray[$array_index][] = $value;
      }

      print_r(json_encode($tableArray));
    }
    /*********************************	Data Update	****************************/

  /*********************************  Data Deletion  ***********************/
  public function delete_record() {
    $this->form_validation->set_rules('id','Delete ID','required|trim');
    $this->form_validation->set_rules('tbl_ref','Table Reference','required|trim');

    if ($this->form_validation->run() === FALSE) {
      $return_data['error'] = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
      print_r(json_encode($return_data));
    }
    else {
      # Loading Model
      $this->load->model('globals/model_update');
      $keyword = $this->input->post('tbl_ref');
      $delete_id = $this->input->post('id');
      /***** Delete Employee *****/
      if($keyword == "employee") {
        # code...
        $dbres = self::$_Default_DB;
        $tablename = "hr_employee_biodata";
        $update_data = array('status' => "deleted");
        $where_condition = array('id' => $delete_id);

        $query_result = $this->model_update->update_info($dbres,$tablename,@$return_dataType,$update_data,$where_condition);

        if($query_result)
          $return_data['success'] = "Delete Successful";
        else
          $return_data['error'] = "Delete Failed";

        print_r(json_encode($return_data));
      }
      /***** Delete Employee *****/
    }
  }
  /*********************************  Data Deletion  ***********************/
    
  /*********************************	AJAX CALLS	**************************/
    /*******************************
      Retrieving System Groups
    *******************************/
    public function usergroups()
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('administration/custom_retrievals');
        $dbres = self::$_Default_DB;
        $return_dataType = "json";

        $search_result = $this->custom_retrievals->retrieve_usergroup($dbres,$return_dataType);
            
        print_r((!empty($search_result)) ? $search_result : $search_result = array());
      }
      else {
        $data = array('name' => "Permission Denied.Contact Administrator");
        print $data;
      }
    }

    /*******************************
      Retrieve All Users In System
    *******************************/
    public function retrieve_allusers($status)
    {
      if(isset($_SESSION['user']['username']) && in_array('users', $_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Default_DB;
        $tablename = "vw_user_details";
        $condition = array('status' => $status, 'group_id !=' => "1");
        $return_dataType = "json";

        $search_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$condition,$return_dataType);
            
        print_r((!empty($search_result)) ? $search_result : $search_result = array());
      }
      else {
        $data = array('name' => "Permission Denied.Contact Administrator");
        print $data;
      }
    }
    /*******************************
      Retrieve All Department
    *******************************/
    public function all_departments()
    {
      if(isset($_SESSION['user']['username']) && in_array('users', $_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Default_DB;
        $tablename = "vw_hr_departments";
        $return_dataType = "json";
        /***** Checking System Developer Role ******/
        if($_SESSION['user']['group_name'] == "System Developer")
          $condition = array();
        else
        $condition = array('id !=' => "1");

        $search_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$condition,$return_dataType);
            
        print_r((!empty($search_result)) ? $search_result : $search_result = array());
      }
      else {
        $data = array('name' => "Permission Denied.Contact Administrator");
        print $data;
      }
    }
    /*******************************
      Retrieve All Positions
    *******************************/
    public function all_positions()
    {
      if(isset($_SESSION['user']['username']) && in_array('users', $_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Default_DB;
        $tablename = "vw_hr_positions";
        $return_dataType = "json";
        /***** Checking System Developer Role ******/
        if($_SESSION['user']['group_name'] == "System Developer")
          $condition = array();
        else
        $condition = array('id !=' => "1");

        $search_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$condition,$return_dataType);
            
        print_r((!empty($search_result)) ? $search_result : $search_result = array());
      }
      else {
        $data = array('name' => "Permission Denied.Contact Administrator");
        print $data;
      }
    }
    /*******************************
      Retrieve Employees From Department
    *******************************/
    public function department_employees($department)
    {
      if(isset($_SESSION['user']['username']) && in_array('users', $_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Default_DB;
        $tablename = "vw_employee_details";
        $condition = array('department' => urldecode($department));
        $return_dataType = "json";

        $search_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$condition,$return_dataType);
            
        print_r((!empty($search_result)) ? $search_result : $search_result = array());
      }
      else {
        $data = array('name' => "Permission Denied.Contact Administrator");
        print $data;
      }
    }
  /*********************************  AJAX CALLS **************************/

  /********************************* Other Functions *********************/
    /*******************************
      Generating User ID
    *******************************/
    protected function generate_userid() {
      # Loading Model 
      $this->load->model('globals/model_retrieval');
      $this->load->model('custom_retrievals');
      /******** Generating New User Id *********/
      $dbres = self::$_Default_DB;
      $return_dataType = "";

      $last_employee_id  = $this->custom_retrievals->last_temp_employee_id($dbres,$return_dataType);
      
      if(empty($last_employee_id[0]->temp_employee_id)) 
        $next_usr_id = "BG/TEMP/001"; 
      else {
        $last_emp_id = explode("/", $last_employee_id[0]->temp_employee_id);
        $last_emp_id = (int)$last_emp_id[2];

        if(strlen($last_emp_id) == 1)
        $next_usr_id = "BG/TEMP/00".($last_emp_id + 1);

        elseif(strlen($last_emp_id) == 2)
          $next_usr_id = "BG/TEMP/0".($last_emp_id + 1);

        elseif(strlen($last_emp_id) == 3)
          $next_usr_id = "BG/TEMP/".($last_emp_id + 1);
      }

      return $next_usr_id;  
      /********** Generating New User Id ************/
    }

    /*******************************
      Generating New User ID
    *******************************/
    protected function generate_employeeid() {
      # Loading Model 
      $this->load->model('globals/model_retrieval');
      $this->load->model('custom_retrievals');
      /******** Generating New User Id *********/
      $dbres = self::$_Default_DB;
      $return_dataType = "";

      $last_employee_id  = $this->custom_retrievals->last_employee_id($dbres,$return_dataType);
      
      if(empty($last_employee_id[0]->employee_id)) 
        $next_usr_id = "BG/EMP/001"; 
      else {
        $last_emp_id = explode("/", $last_employee_id[0]->employee_id);
        $last_emp_id = (int)$last_emp_id[2];

        if(strlen($last_emp_id) == 1)
        $next_usr_id = "BG/EMP/00".($last_emp_id + 1);

        elseif(strlen($last_emp_id) == 2)
          $next_usr_id = "BG/EMP/0".($last_emp_id + 1);

        elseif(strlen($last_emp_id) == 3)
          $next_usr_id = "BG/EMP/".($last_emp_id + 1);
      }

      return $next_usr_id;  
      /********** Generating New User Id ************/
    }
  /********************************* Other Functions *********************/
    
}//End of Class
