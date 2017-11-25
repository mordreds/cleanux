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
      if(isset($_SESSION['user']['username'])) {
        if(isset($_SESSION['user']['roles']) ) 
        	redirect('administration/users');
        else
          redirect('dashboard');
      }
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

              #Extracting Data For Display
              $data['allusers']  = $this->model_retrieval->all_info_return_result(self::$_Permission_DB,'vw_user_details');
              $data['allgroups'] = $this->model_retrieval->all_info_return_result(self::$_Permission_DB,'roles_privileges_group');

              $data['next_usr_id'] = $this->generate_userid();
              /********** Interface ***********************/
              $data['page_controller'] = $this->uri->segment(1);
              $data['controller_function'] = $this->uri->segment(2);
              $data['_Permission_DB'] = self::$_Permission_DB;

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
                  $dbres = self::$_Permission_DB;
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
                  $dbres = self::$_Permission_DB;
                  $tablename = "users";
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
        $data['_Permission_DB'] = self::$_Permission_DB;

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


	public function User_Roles() {
		
		//User Roles
		if (isset($_POST['user_roles']) && in_array('Roles & Priv.',$_SESSION['rows_exploded'])) {
			# code...
			$this->form_validation->set_rules('user','User Selected','required|trim');
            $this->form_validation->set_rules('user_group','User Selected','required|trim');
            #Checking Form Validation Rule Result
            # If Failed
            if ($this->form_validation->run() == FALSE) {
                #Redirecting With Error
                $this->Roles_Priviledges();
            }
            # If Passed
            else {
	            #Variable Assignment
	            $_SESSION['user_roles']['employee_id'] = $this->input->post('user');
	            $_SESSION['user_roles']['group_id'] =  $this->input->post('user_group');
	            $data['roles'] = "activate";
	            # Loading model...
	            $this->load->model('SettingsModel');
	            $this->load->model('UserModel'); 
	            #Extracting Data For Display
	            $data['allusers'] = $this->SettingsModel->users();
            	$data['allgroups'] = $this->SettingsModel->groups();
            	$data['all_users_result']  = $this->UserModel->allemployees();
	            $data['dash_tabs'] = $this->SettingsModel->dashboard_tabs();
	            $data['grp_roles_result'] = $this->SettingsModel->ret_grp_roles_id($_SESSION['user_roles']['group_id']);
	            /******* Interface ******/
					$headertag['title'] = "Roles & Priviledges";
	            $this->load->view('headtag',$headertag);
                $this->load->view('header');
                $this->load->view('nav');
	            $this->load->view('roles_priv',$data);
	            $this->load->view('footer');
	            /******* Interface ******/
			}
		} else {
			# code...
			//loading login view
            $_SESSION['error'] = "Permission Denied. Contact Administrator";
			redirect('administration/roles_priviledges');
		}
	}
    
	public function Group_Roles() {
		
		//User Roles
		if (isset($_POST['group_roles'])&& in_array('Roles & Priv.',$_SESSION['rows_exploded'])) {
			# code...
			$this->form_validation->set_rules('group','Group Selected','required|trim');
            #Checking Form Validation Rule Result
            # If Failed
            if ($this->form_validation->run() == FALSE) {
                #Redirecting With Error
                $this->Roles_Priviledges();
            }
            # If Passed
            else {
	            #Variable Assignment
                $_SESSION['user_roles']['group_id'] = $this->input->post('group');
	            $data['group_id'] = $_SESSION['user_roles']['group_id'];
	            $data['grp_to_belong'] = $_SESSION['user_roles']['group_id'];
	            $data['roles'] = "activate";
	            # Loading model...
	            $this->load->model('SettingsModel');
	            $this->load->model('UserModel'); 
	            #Extracting Data For Display
	            $data['groups'] = $this->SettingsModel->groups();
	            $data['dash_tabs'] = $this->SettingsModel->dashboard_tabs();
	            $_SESSION['grp_roles_result'] = $this->SettingsModel->ret_grp_roles_id($_SESSION['user_roles']['group_id']);
                $data['grp_roles_result'] = $_SESSION['grp_roles_result'];
                $_SESSION['grp_request'] = "group";
	            /******* Interface ******/
				$headertag['title'] = "Roles & Priviledges";
	            $this->load->view('headtag',$headertag);
                $this->load->view('header');
                $this->load->view('nav');
	            $this->load->view('roles_priv',$data);
	            $this->load->view('footer');
	            /******* Interface ******/
			}
		} else {
			# code...
			//loading login view
			redirect('administration/roles_priviledges');
		}
	}

    /******************************
  			 License
  	*******************************/
  	public function License() 
    {
  		if (isset($_SESSION['username']))
      {
        if(in_array('License',$_SESSION['rows_exploded'])) 
        {
          # Loading models...
            $this->load->model('Model_Access'); /*Needed By header, nav*/
            $this->load->model('Universal_model_retrieval');

          # Extracting Data For Display
            $data['license_info'] = $this->Universal_model_retrieval->all_info_return_result("companyinfo");

  		    /********** Interface ***********************/    
            $headertag['title'] = "License";
            $this->load->view('headtag',$headertag);
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('administration/license',$data);
            $this->load->view('footer');
          /********** Interface ***********************/
  		  } 
        else 
        {
  		    $this->session->set_flashdata('error',"Permission Denied. Contact Administrator");
  		    redirect('dashboard');
  		  }
      }
      else
      {
        redirect('access/login');
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

  /***************************  Data Insertion  *****************************/
  
	/*********************	Data Insertion (Privileges)	***********************/
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

              $dbres = self::$_Permission_DB;
              $tablename = "users";
              
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

                    if($this->input->post('usergroup') == 1 || $this->input->post('usergroup') == 2)
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
    public function view_permissions() {
      /*$this->form_validation->set_rules('user_id','User Name','trim');
      $this->form_validation->set_rules('group_id','Group Name','trim');
      
      if ($this->form_validation->run() == FALSE) {
        $return_data = ['error' => "Validation Error"];
        print_r($return_data);
      }
      # If Passed
      else {
        # Loading Model
        $this->load->model('globals/model_retrieval');

        $user_id = $this->input->post('user_id');
        $group_id = $this->input->post('group_id');

        if(empty($user_id) && empty($group_id)) {
          $return_data = ['error' => "No Selection Made"];
          print_r($return_data);
        } else {
          # Variables
          $dbres = self::$_Permission_DB;
          $return_dataType = "json";
          $tablename = "dashboard_tabs";
          $where_condition = ['status'=>"active"];

          $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$where_condition);

          print_r($query_result); 
        }
      }*/

      $this->load->model('globals/model_retrieval');
      $dbres = self::$_Permission_DB;
      $return_dataType = "php_object";
      $tablename = "dashboard_tabs";
      $where_condition = ['status'=>"active"];

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$where_condition);

      //print "<pre>"; print_r($query_result); print "</pre>";

      $counter = 1; $array_index = 0;
      foreach ($query_result as $key => $value) {
        if($counter == 4) {
          $array_index++;
          $counter = 1;

          $tableArray[$array_index][] = $value;
        }
        else {
          $counter ++;
          $tableArray[$array_index][] = $value;
        }
      }

      print "<br/><br/><pre>"; print_r($tableArray); print "</pre>";
    }
    
    /***********************************************
	       New Group
	  ************************************************/
    
    public function Add_Group() 
    {
        
        if( isset($_POST['add_grp']) && isset($_SESSION['username']) && in_array('Roles & Priv.',$_SESSION['rows_exploded']) ) {
	    	//Setting validation rules
			$this->form_validation->set_rules('grp_id','Group ID','required|trim');
            $this->form_validation->set_rules('grp_name','Group Name','required|trim');
            //$this->form_validation->set_rules('grp_desc','Group Description','trim|xss_clean');
            
            #Checking Form Validation Rule Result
            # If Failed
            if ($this->form_validation->run() == FALSE) {
                #Redirecting With Error
                $this->Roles_Priviledges();
            }
            # If Passed
            else {
	            #Variables Assignment
	            $data['group_id'] = $this->input->post('grp_id');
	            $data['name'] = ucwords($this->input->post('grp_name'));
	            //$data['desc'] = $this->input->post('grp_desc');
	            # Loading model...
	            $this->load->model('SettingsModel');
	            #
	            $result = $this->SettingsModel->create_grp($data);
	            
	            if($result) {
	                $_SESSION['success'] = "Group Created";
	            }
	            else {
	                $_SESSION['error'] = "Creating Group Failed."; 
	            }
	            /******* Interface ******/
					redirect('Administration/Roles_Priviledges');
	            /******* Interface ******/
	        }
		} else{
		 	$_SESSION['error'] = "Permission Denied. Contact Administrator";
			redirect('Administration/Roles_Priviledges');
		}
    }
    
    /***********************************************
	       Roles Assignment  
	************************************************/
    
    public function Assign_Roles() {
        
        if( isset($_POST['assign']) && isset($_SESSION['username']) && in_array('Roles & Priv.',$_SESSION['rows_exploded'])) {
  		    //Setting validation rules
	        $this->form_validation->set_rules('general[]','General Role(s)','trim');
            $this->form_validation->set_rules('site[]','Site Role(s)','trim');
            $this->form_validation->set_rules('accounts[]','Accounts Role(s)','trim');
            $this->form_validation->set_rules('procurement[]','Procurement Role(s)','trim');
            $this->form_validation->set_rules('human_resource[]','Human Resource Role(s)','trim');
            $this->form_validation->set_rules('stores[]','Store Role(s)','trim');
            $this->form_validation->set_rules('administration[]','Administration Role(s)','trim');
            #Checking Form Validation Rule Result
            # If Failed
            if ($this->form_validation->run() === FALSE) {
                #Redirecting With Error
                $this->Roles_Priviledges();
            }
            # If Passed
            else {
            	$Roles[] = $this->input->post('general[]');
	            $Roles[] = $this->input->post('site[]');
	            $Roles[] = $this->input->post('accounts[]');
	            $Roles[] = $this->input->post('procurement[]');
	            $Roles[] = $this->input->post('human_resource[]');
	            $Roles[] = $this->input->post('stores[]');
	            $Roles[] = $this->input->post('administration[]');

	            # Loading model...
	            $this->load->model('SettingsModel');
	            $this->load->model('UserModel'); 
	            #
	            foreach($Roles As $role_array) {
	                #
	                if(!empty($role_array)) {
	                    #code
	                    foreach($role_array As $role) {
	                        #
	                        if(!empty($role))
	                        	{
	                            	@$_SESSION['user_roles']['roles'] .= $role."|";
	                            	#Retrieving Priviledges Associated With Role
	                            	$data['priv_result'][$role] = $this->SettingsModel->retrieve_priviledges($role);
	                        	}
	                    }
	                } 
	            }
	            #
	            /****** Interface *******/
					$headertag['title'] = "Roles & Priviledges";
	            $this->load->view('headtag',$headertag);
	            $this->load->view('roles_priv',$data);
	            $this->load->view('footer');
	            /******* Interface ******/
	         }
		} 
		 else{
		 	$_SESSION['error'] = "Permission Denied. Contact Administrator";
			redirect('Administration/Roles_Priviledges');
		}
    }

    /***********************************************
	       Priviledges Assignment  
	************************************************/
    
    public function Assign_Priviledges() {
        
        if( isset($_POST['assign_priv']) && isset($_SESSION['username']) && in_array('Roles & Priv.',$_SESSION['rows_exploded'])) {
	    		//Setting validation rules
				$this->form_validation->set_rules('Priviledges[]','Priviledges','trim');
            #Checking Form Validation Rule Result
            # If Failed
            if ($this->form_validation->run() === FALSE) {
                #Redirecting With Error
                $this->Roles_Priviledges();
            }
            # If Passed
            else {
                #Loading Model 
                $this->load->model('SettingsModel');
                $this->load->model('Update');
                
                $Priviledges[] = $this->input->post('Priviledges[]');
                
                foreach($Priviledges As $value) {
                    #
                    if(!empty($value)) {
                        #
                        foreach($value As $val) {
                            #
                            if(!empty($val)) {
                                #
                                @$_SESSION['user_roles']['priviledges'] .= $val."|";
                            }
                        }
                    }
                }
                if(!empty($_SESSION['grp_request'])) {
                    #
                    $result = $this->SettingsModel->set_group_roles_priviledges($_SESSION['user_roles']);
                    unset($_SESSION['grp_request']);
                }
                else {
                    $result = $this->SettingsModel->set_user_roles_priviledges($_SESSION['user_roles']);
                    # Variables Declaration
                    $tablename = "users";
                    $IdField = "employee_id";
                    $FieldUpdate = "active_status";
                    #Variables Assignment
    	            $data['employee_id'] = $_SESSION['user_roles']['employee_id'];
                    $data['active_status'] = 1;
    	            
    	            $result = $this->Update->OneFieldUpdate($tablename,$IdField,$FieldUpdate,$data);
                 }
                
	            if($result) {
	                
	                $_SESSION['success'] = "Role(s) & Priviledge(s) Assigned";
	            }
	            else {
	                $_SESSION['error'] = "Role(s) & Priviledge(s) Assigning Failed"; 
	            }
	            /****** Interface *******/
					redirect("Administration/Roles_Priviledges");
	            /******* Interface ******/
	         }
		} 
		 else{
		 	$_SESSION['error'] = "Permission Denied. Contact Administrator";
			redirect('Administration/Roles_Priviledges');
		}
    }
    
    

    /*********************************	Data Update	****************************/

    
  /*********************************	AJAX CALLS	**************************/
    /*******************************
      Retrieving System Groups
    *******************************/
    public function usergroups($tablename)
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('administration/custom_retrievals');

        $dbres = self::$_Permission_DB;
        $condition = array('status' => "active", 'id !=' => '1', 'id !=' => '2');
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

        $dbres = self::$_Permission_DB;
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
        $tablename = "hr_departments";
        $return_dataType = "json";

        $search_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$condition=array(),$return_dataType);
            
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
  protected function generate_userid() {
    # Loading Model 
    $this->load->model('globals/model_retrieval');
    $this->load->model('custom_retrievals');

    /******** Generating New User Id *********/
    $dbres = self::$_Permission_DB;
    $return_dataType = "";

    $last_employee_id  = $this->custom_retrievals->last_temp_employee_id($dbres,$return_dataType);
    
    if(empty($last_employee_id[0]->temp_employee_id)) 
      $next_usr_id = "KAD/TEMP/001"; 
    else {
      $last_emp_id = explode("/", $last_employee_id[0]->temp_employee_id);
      $last_emp_id = (int)$last_emp_id[2];

      if(strlen($last_emp_id) == 1)
      $next_usr_id = "KAD/TEMP/00".($last_emp_id + 1);

      elseif(strlen($last_emp_id) == 2)
        $next_usr_id = "KAD/TEMP/0".($last_emp_id + 1);

      elseif(strlen($last_emp_id) == 3)
        $next_usr_id = "KAD/TEMP/".($last_emp_id + 1);
    }

    return $next_usr_id;  
    /********** Generating New User Id ************/
  }
  /********************************* Other Functions *********************/
    
}//End of Class
