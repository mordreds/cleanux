<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
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
		public function template() 
		{ 
			if(!isset($_SESSION['user']['roles'])) 			
				redirect('access/login');

			elseif(@$_SESSION['LockScreen'] == "Yes" && !empty(@$_SESSION['action_url']))
				redirect("access/lockScreen");

      else
      {
        #Loading Model
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');

        $data['_Permission_DB'] = self::$_Permission_DB;

        /*********** Interface ******************/
        	$data['title'] = "Dashboard";
        	$this->load->view('header',$data);
        	//$this->load->view('dashboard',$data);
        	$this->load->view('footer');
        /*********** Interface ******************/
      }
    }

    /*******************************
      Index Function
    *******************************/
		public function index() 
		{ 
			if(!isset($_SESSION['user']['roles'])) 			
				redirect('access/login');
			else
      {
        #Loading Model
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');

        $data['_Permission_DB'] = self::$_Permission_DB;

        /*********** Rearranging Dashboard Tabs From User Permissions *********/
	        $user_roles = $_SESSION['user']['roles'];

	        $dashboard_items_details =  $this->model_access->retrieve_all_system_types(self::$_Permission_DB);
	       	
	       	/********* Creating Different Types Of System ***************/
	       	foreach ($dashboard_items_details as $value) {
	       		# code...
	       		$system_type[] = $value->system_type;
	       	}

          $counter = 0;
	       	/********* Creating Different Types Of System ***************/
	        foreach($user_roles As $role_name) 
	        {
	          $roles_details = $this->model_access->retrieve_dashboard_tab_details(self::$_Permission_DB,$role_name);
	       		
	          if(!empty($roles_details)) 
	          {
            	#Assigning
            	$classification_type = strtolower($roles_details->system_type);

              $data['dashboard_tabs'][$classification_type][$counter]['name'] = $roles_details->name;
              $data['dashboard_tabs'][$classification_type][$counter]['link'] = $roles_details->link;
              $data['dashboard_tabs'][$classification_type][$counter]['icon'] = $roles_details->icon;
              $data['dashboard_tabs'][$classification_type][$counter]['comment'] = $roles_details->comment;
              $data['dashboard_tabs'][$classification_type][$counter]['bg'] = $roles_details->bg;
              $counter++;	     	
	          }
	          
	        } /*print "<pre>"; print_r($data); print "</pre>"; exit;*/     
        /*********** Rearranging Dashboard Tabs From User Permissions *********/
        
        /*********** Interface ******************/
         $data['page_controller'] = $this->uri->segment(1);
         $data['controller_function'] = $this->uri->segment(2);

        	$data['title'] = "Dashboard";
        	$this->load->view('header',$data);
        	$this->load->view('dashboard',$data);
        	$this->load->view('footer');
        /*********** Interface ******************/
      }
		}

	/***************************************	Interfaces 	***********************************/
    
	/******************************
			 New User
	*******************************/

	public function Users() {
		
		//loading register view

		if ( isset($_SESSION['Role']['Users']) ) {
			# code...

			//loading model 
			$this->load->model('user_model');
			$this->load->model('settings_model');
			$this->load->model('events_model');

			//Retrieving Company Profile
			$data['companyinfo'] = $this->settings_model->retrieve_companyinfo();

			//Retrieving User Data
			$data['allmembers'] = $this->user_model->allmembers();

			//Retrieving User Data
			$data['countries'] = $this->user_model->country();

			//Retrieving Department Data
            $data['dept_info'] = $this->settings_model->retrieve_dept();

            //Retrieving Position Data
            $data['position_info'] = $this->settings_model->retrieve_position();

            //Retrieving Grade_Category Data
            $data['grade_category_info'] = $this->settings_model->retrieve_grade_category();

			//Generating New Employee Id
            $id_unexploded  = $this->settings_model->retrieve_emp_id();
            
            foreach ($id_unexploded as $ret_dept_id) {
            	# code...
            	$id_exploded = explode('/', $ret_dept_id);
            }

            (($id_exploded[2] == NULL) ? $id_exploded[2] = 1 : $id_exploded[2]+=1 );

            if( $id_exploded[2] < 10)
            	$data['id'] = "ML/EMP/00".$id_exploded[2];
            elseif( $id_exploded[2] < 99)
            	$data['id'] = "ML/EMP/0".$id_exploded[2];
            elseif( $id_exploded[2] >= 100)
            	$data['id'] = "ML/EMP/".$id_exploded[2];

			$title['title'] = "Users";
			//$data['user'] = $_SESSION['username'];
			$this->load->view('header_view',$title);
			$this->load->view('New_User',$data);
			$this->load->view('footer_view');
		
		} else {
			# code...
			//loading login view
			redirect('Access/login');
		}
	}

    
  /***********************************************
			Setting View
	************************************************/
	public function Settings() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "Settings";
            $this->load->model('EventsModel');
			//$data['user'] = $_SESSION['username'];
			$this->load->view('header',$title);
			$this->load->view('settings_view');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}

	/***********************************************
			overview View
	************************************************/
	public function overview() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "Overview";
            $this->load->model('EventsModel');
			//$data['user'] = $_SESSION['username'];
			$this->load->view('header',$title);
			$this->load->view('settings_view');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}
	/***********************************************
			Inhouse View
	************************************************/
	public function Inhouse() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "Inhouse";
            $this->load->model('EventsModel');
			//$data['user'] = $_SESSION['username'];
			$this->load->view('header',$title);
			$this->load->view('settings_view');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}
	/***********************************************
			Inhouse View
	************************************************/
	public function Dispatch() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "Dispatch";
            $this->load->model('EventsModel');
			//$data['user'] = $_SESSION['username'];
			$this->load->view('header',$title);
			$this->load->view('settings_view');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}

	/***********************************************
			Setting View
	************************************************/
	public function Form() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			
			# Loading models
      $this->load->model('Universal_Retrieval');
      $this->load->model('Model_HR');
      $this->load->model('Model_Access');
      $title = "Form Wizard";

			$headertag['title'] = "Users";
      $this->load->view('headtag',$headertag);
      $this->load->view('header');
      $this->load->view('nav');
			$this->load->view('form-wizard');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}

	/***********************************************
			Setting View
	************************************************/
	public function Statistics() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			
			# Loading models
      $this->load->model('Universal_Retrieval');
      $this->load->model('Model_HR');
      $this->load->model('Model_Access');
      $title = "Form Wizard";

			$headertag['title'] = "Users";
      $this->load->view('headtag',$headertag);
      $this->load->view('header');
      $this->load->view('nav');
			$this->load->view('statistics');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access');
		}
	}
    
	
	/***********************************************
			 User Registraion
	************************************************/

	public function User_Registration() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "User Registration";
			//$data['user'] = $_SESSION['username'];
			//Retrieving Roles
			$this->load->model('EventsModel');

			$data['roles'] = $this->EventsModel->Roles_Retreieve();
			$data['atmgroups'] = $this->EventsModel->atm_group_retrieve();

			$this->load->view('header',$title);
			$this->load->view('new_user',$data);
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access/Login');
		}
	}

	/***********************************************
			 User Registraion
	************************************************/

	public function User_Management() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "User Management";
			//$data['user'] = $_SESSION['username'];

			//Retrieving Roles
			$this->load->model('UserModel');
			$this->load->model('EventsModel');

			$data['allusers'] = $this->UserModel->allmembers();
			$data['atmgroups'] = $this->EventsModel->atm_group_retrieve();
			$data['roles'] = $this->EventsModel->Roles_Retreieve();
			
			$this->load->view('header',$title);
			$this->load->view('user_manage',$data);
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access/Login');
		}
	}


    /***********************************************
			 Audits
	************************************************/

	public function Reports() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "Reports";
			//$data['user'] = $_SESSION['username'];

			//Retrieving Roles
			$this->load->model('UserModel');
			$this->load->model('EventsModel');
			
			$this->load->view('header',$title);
			$this->load->view('reports');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access/Login');
		}
	}
    
    /***********************************************
			 User Logs
	************************************************/

	public function User_Logs() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "User Logs";
			//$data['user'] = $_SESSION['username'];

			//Retrieving Roles
			$this->load->model('UserModel');
			$this->load->model('EventsModel');
			
			$this->load->view('header',$title);
			$this->load->view('userlogs');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access/Login');
		}
	}
    /***********************************************
			 User Logs
	************************************************/

	public function System_Logs() {
		
		//loading register view

		if ( isset($_SESSION['username']) ) {
			# code...
			$title['title'] = "User Logs";
			//$data['user'] = $_SESSION['username'];

			//Retrieving Roles
			$this->load->model('UserModel');
			$this->load->model('EventsModel');
			
			$this->load->view('header',$title);
			$this->load->view('syslogs');
			$this->load->view('footer');
		
		} else {
			# code...
			//loading login view
			redirect('Access/Login');
		}
	}


	/***************************	Data Insertion	*****************************/
    
    /***********************************
			 File Upload
	***********************************/
    public function File_Upload() {

    	if (isset($_POST['upload'])) {
			# code...
    		print $_FILES['csvfile']['name'];


			if ($_FILES['csvfile']['size'] > 0 && $_FILES['csvfile']['size'] < 50000) {

				$csv_mimetypes = array('text/csv', 'application/csv', 'text/comma-separated-values', 'application/excel', 'application/vnd.ms-excel', 'application/vnd.msexcel', 'application/txt');

				$filetype = $_FILES['csvfile']['type'];

				if(in_array($filetype,$csv_mimetypes )) {

					$name = explode("_", $_FILES['csvfile']['name']);

					$mainfolder = $name[0];

					if ($mainfolder == "ATMH" && file_exists($mainfolder)) {

						MainLogic:

						$target_dir = $mainfolder."/".gmdate('F Y');
						//$target_dir = ATMH/January 2016

						MonthLogic:

						if (file_exists($target_dir)) {

							$target_dir .= "/"; 
							//$target_dir = ATMH/January 2016/

							$name = explode(".", $_FILES['csvfile']['name']);

							$filename = gmdate('d_m_Y').".".$name[1];

							$target_dir .= $filename;
							//$target_dir = ATMH/January 2016/04_04_2016.csv 

							if(!move_uploaded_file($_FILES['csvfile']['tmp_name'], $target_dir)){
	    				
	    						print "Error uploading file - check destination directory is writeable OR created.')";
							
							} else {
								print "File Uploaded";
								$_SESSION['success'] = "File Uploaded";
								//now call file and read to screen
								echo "<html><body><table border='1'>\n\n";
								$f = fopen($target_dir, "r");
								while (($line = fgetcsv($f)) !== false) {
								        echo "<tr>";
								        foreach ($line as $cell) {
								                echo "<td>" . htmlspecialchars($cell) . "</td>";
								        }
								        echo "</tr>\n";
								}
								fclose($f);
								echo "\n</table></body></html>";
							}

						}	else {

							//creating //$target_dir = ATMH/January 2016
							if(mkdir($target_dir,0755))
								goto MonthLogic;
						
						}

					} elseif ($mainfolder == "BANKH" && file_exists($mainfolder)) {
						# code...

						goto MainLogic;
					
					}	else{

						print "Main Folders Creation Failed";
					}

				}	else {
						
						print "File Type Not Supported.<br>Please Upload a CSV or Excel File ";
						//redirect('');
				}

			} else {
					
					print "File Size Too Big";
					//redirect('');
			}

		}

    }
    

    /*********************************	Data Update	****************************/

    /******************************
				ATM Update
	******************************/
    
    public function ATM_Update() {

    	if( isset($_POST['update_atm']) &&  isset($_SESSION['username'])) {
	    	//Setting validation rules
			$this->form_validation->set_rules('atm_name','ATM Name','required|trim|xss_clean');
			$this->form_validation->set_rules('terminalid','Terminal ID','required|trim|xss_clean');
			$this->form_validation->set_rules('terminalip','Terminal IP','required|trim|xss_clean');
            $this->form_validation->set_rules('branch_id','Branch Name','required|trim|xss_clean');
			$this->form_validation->set_rules('location','Location','required|trim|xss_clean');
			
			//Variables Assignment
			$data['atmName'] 		= $this->input->post('atm_name');
			$data['terminalid'] 	= $this->input->post('terminalid');
			$data['terminalip']		= $this->input->post('terminalip');
            $data['branch_id']		= $this->input->post('branch_id');
			$data['location']		= $this->input->post('location');
			$data['atmId']			= $this->input->post('atmId');
        

			//load model
			$this->load->model('EventsModel');
			$result = $this->EventsModel->atm_update($data);

			if($result) {

				$_SESSION['success'] = "ATM Info Updated";
				redirect('Dashboard/ATM_Manage');
			
			} else {

				$_SESSION['error'] = "ATM Info Update Failed";
				redirect('Dashboard/ATM_Add');
			}
		} 
		 else{
		 	$_SESSION['error'] = "Update ATM Info Command Failed";
			redirect('Dashboard/ATM_Add');
		}
    }

    /***********************************************
				ATM Group Update
	************************************************/
    
    public function ATM_Group_Update() {

    	if( isset($_POST['update_atm_group']) ) {
	    	//Setting validation rules
			$this->form_validation->set_rules('group_name','Group Name','required|trim|xss_clean');
			$this->form_validation->set_rules('desc','Description','required|trim|xss_clean');
			$this->form_validation->set_rules('atmGroupId','Description','required|trim|xss_clean');
            $this->form_validation->set_rules('oldFolder','Old Folder Names','required|trim|xss_clean');
			
			//Variables Assignment
			$data['GroupName'] 		= $this->input->post('group_name');
			$data['Description'] 	= $this->input->post('desc');
			$data['atmGroupId'] 	= $this->input->post('atmGroupId');
            $folder_name            = $this->input->post('oldFolder');

			//load model
			$this->load->model('EventsModel');
			$result = $this->EventsModel->group_update($data);

			if($result) {
			     $_SESSION['success'] = "ATM Group Update successful";
                 
			     #Checking if Name was Changed
                 if(strcasecmp($folder_name,$data['GroupName']) != 0) {
                    #Checking for existence of file and updating 
                    $old_uploads = "Uploads/".$folder_name;
                    $old_logs = "Logs/".$folder_name;
                    $new_uploads = "Uploads/".$data['GroupName']; 
                    $new_logs = "Logs/". $data['GroupName']; 
                    if(file_exists($upload_folder)) {
                        #Create Logs
                        if(file_exists($logs_folder)) {
                            //rename file codes
                            if(rename($old_uploads,$new_uploads) && rename($old_logs,$new_logs))
                            $_SESSION['success'] .= "<br>Folders Renamed";
                        }
                    }
                }
                
                redirect('Dashboard/ATM_Manage_Groups');
			
			} else {

				$_SESSION['error'] = "ATM Group Update Failed";
				redirect('Dashboard/ATM_Manage_Groups');
			}
		} 
		 else{
		 	$_SESSION['error'] = "Update Group Command Failed";
			redirect('Dashboard/ATM_Add');
		}
    }
    
    /***********************************************
				ATM Group Update
	************************************************/
    
    public function Update_Branch() {

    	if( isset($_POST['update_branch']) ) {
	    	//Setting validation rules
			$this->form_validation->set_rules('branch_name','Branch Name','required|trim|xss_clean');
			$this->form_validation->set_rules('group_id','Group Name','required|trim|xss_clean');
            $this->form_validation->set_rules('branch_id','Branch ID','required|trim|xss_clean');
			
			//Variables Assignment
			$data['name'] 		= $this->input->post('branch_name');
            $data['branch_id'] 	= $this->input->post('branch_id');
			$data['group_id'] 	= $this->input->post('group_id');

			//load model
			$this->load->model('EventsModel');
            //print_r($data);
			$result = $this->EventsModel->branch_update($data);

			if($result) {
			     $_SESSION['success'] = "Branch Update successful";
                 
			     #Checking if Name was Changed
                 /*if(strcasecmp($folder_name,$data['GroupName']) != 0) {
                    #Checking for existence of file and updating 
                    $old_uploads = "Uploads/".$folder_name;
                    $old_logs = "Logs/".$folder_name;
                    $new_uploads = "Uploads/".$data['GroupName']; 
                    $new_logs = "Logs/". $data['GroupName']; 
                    if(file_exists($upload_folder)) {
                        #Create Logs
                        if(file_exists($logs_folder)) {
                            //rename file codes
                            if(rename($old_uploads,$new_uploads) && rename($old_logs,$new_logs))
                            $_SESSION['success'] .= "<br>Folders Renamed";
                        }
                    }
                }*/
                
                redirect('Dashboard/Manage_Branches');
			
			} else {

				$_SESSION['error'] = "Branch Update Failed";
				redirect('Dashboard/Manage_Branches');
			}
		} 
		 else{
		 	$_SESSION['error'] = "Update Group Command Failed";
			redirect('Dashboard/Manage_Branches');
		}
    }


    /******************************************************	Data Delete	****************************************/
    
     /***********************************************
				Delete Bracnhes  > ATMs 
	************************************************/
    
    public function atm_users_del($branch_id) {
        
        //load model
        $this->load->model('EventsModel');
        $this->load->model('UserModel');
        
        //Deleting All ATMs Within the branch
            #retrieve atms
        $atm_ret = $this->EventsModel->atm_search($branch_id);
            #deleteing atms
        if(!empty($atm_ret)) {
            foreach($atm_ret As $atm) {
                #code
                $atm_del_result = $this->EventsModel->atm_delete($atm->atmId);
            }
            if(!empty($atm_del_result)) {
                    //Sending Confirmation of atm Delete
                    $_SESSION['success'] = "<br/>ATMs Deleted";
                //Deleting all users unders branch
                    #retrieve users
                $users_ret = $this->UserModel->branch_users($branch_id);
                    #deleteing users
                if(!empty($users_ret)) {
                    foreach($users_ret As $usr) {
                        #code
                        $user_del_result = $this->UserModel->delete_user($branch_id);
                    }
                        #compare nums of delete & Total 
                    if($user_del_result) {
                        //Sending Confirmation of Users Delete
                        $_SESSION['success2'] = "<br>Users Deleted";
                        return true;
                    }    
                    else {
                            //Sending Confirmation of atm Delete
                            $_SESSION['error'] = "Users Deletion Failed"; 
                            return false;
                        }
                }   else {
                    $_SESSION['error'] = "No Users Registered ";
                    return false;
                }
            }
                
        } else {
           //Sending Confirmation of atm Delete
            $_SESSION['error'] = "No ATM Registered ";
            return false; 
        }
       
    }

    /***********************************************
				Delete ATM 
	************************************************/
    
    public function ATM_Delete() {

    	if( isset($_POST['delete_atm']) && isset($_SESSION['username'])) {
	    	//Setting validation rules
			$this->form_validation->set_rules('atmId','ATM ID','required|trim|xss_clean');
			
			//Variables Assignment
			$atmId		= $this->input->post('atmId');

			//load model
			$this->load->model('EventsModel');
			$result = $this->EventsModel->atm_delete($atmId);

			if($result) {

				$_SESSION['success'] = "ATM Deleted";
				redirect('Dashboard/ATM_Manage');
			
			} else {

				$_SESSION['error'] = "ATM Delete Failed";
				redirect('Dashboard/ATM_Manage');
			}
		} 
		 else{
		 	$_SESSION['error'] = "ATM Delete Failed";
			redirect('Dashboard/ATM_Manage');
		}
    }
    
    /***********************************************
				Delete ATM 
	************************************************/
    
    public function Delete_Branch() {

    	if( isset($_POST['delete_branch']) && isset($_SESSION['username'])) {
	    	//Setting validation rules
			$this->form_validation->set_rules('branch_id','Branch ID','required|trim|xss_clean');
            
            //Loading Model
            $this->load->model('EventsModel');
            $this->load->model('UserModel');
			
			//Variables Assignment
			$branch_id		= $this->input->post('branch_id');
            $data['branch_id']		= $this->input->post('branch_id');
            
            //Retrieving Group Name
                #retrieve group id
                $groupId_ret = $this->EventsModel->branch_retrieve($data);
                foreach ($groupId_ret As $grp) {
                    #code
                    $group_id = $grp->group_id;
                    $branch_name = $grp->name;
                }
                #retrieve group Name
                $groupName_ret = $this->EventsModel->group_id_name_ret($group_id);
                foreach ($groupName_ret As $grp_nome) {
                    #code
                    $groupName = $grp_nome->GroupName;
                }
            
            //calling ATM ==> Users Delete function
			$result = $this->atm_users_del($branch_id);
            
            if($result) {
                
                //Deleting Folders from upload and logs
                    #Deleting group folder
                $upload_folder = "Uploads/$groupName/$branch_name"; 
                $logs_folder = "Logs/$groupName/$branch_name";
                
                if(file_exists($upload_folder) && file_exists($logs_folder)) {
                    #remove folders
                    if(rmdir($upload_folder) && rmdir($logs_folder)) {
                        #code
                        $branch_del_result = $this->EventsModel->branch_delete($branch_id);
                        
                        if($branch_del_result) {
                            $_SESSION['success3'] = "<br>Branch Deletion Complete";
                        }
                    }
                }
                else {
                    #code
                    $_SESSION['error'] .= "<br>Folder Do Not Exists";
                }

			} else {

				$_SESSION['error'] .= "<br>Branch Deletion Failed";
                print_r($_SESSION);
				redirect('Dashboard/Branch_Search');
			}
            
            redirect('Dashboard/Branch_Search');
		} 
		 else{
		 	$_SESSION['error'] = "Delete Button Not Clicked";
			redirect('Dashboard/Branch_Search');
		}
    }


    /***********************************************
				Delete ATM Group
	************************************************/
    
    public function Group_Delete() {

    	if( isset($_POST['delete_group']) ) {
    	   
            $this->load->model('EventsModel');
            
	    	//Setting validation rules
			$this->form_validation->set_rules('atmGroupId','ATM Group ID','required|trim|xss_clean');
			
			//Variables Assignment
			$atmGroupId		= $this->input->post('atmGroupId');
            $result         = $this->EventsModel->group_id_name_ret($atmGroupId);
            
            foreach($result As $res) {
                #code
                $atmGroupName = $res->GroupName;
            }

			//load model
			$this->load->model('EventsModel');
            
            //Deleting all Branches under Group
            
                //Deleting all atms under branches
                
            //Deleting Group
			$result = $this->EventsModel->group_delete($atmGroupId);

			if($result) {
                //Deleting group folder
                $upload_folder = "Uploads/$atmGroupName"; 
                $logs_folder = "Logs/$atmGroupName";
                
                if(file_exists($upload_folder) && file_exists($logs_folder)) {
                    #code
                    if(rmdir($upload_folder) && rmdir($upload_folder)) {
                        #code
                        $_SESSION['success'] = "All Branches Deleted";
                        $_SESSION['success'] .= "<br>Group Files Deleted";
                        $_SESSION['success'] .= "<br>Group Deleted";
                    }
                    else {
                       #code
                        $_SESSION['error'] = "Group Files Deleting Failed";
                    }
                }
                else {
                    #code
                     $_SESSION['error'] = "Group Files Do Not Exist";
                }
                    
                 redirect('Dashboard/ATM_Manage_Groups');    
				
				
			
			} else {

				$_SESSION['error'] = "ATM Group Delete Failed";
				redirect('Dashboard/ATM_Manage_Groups');
			}
		} 
		 else{
		 	$_SESSION['error'] = "Delete ATM Group Command Failed";
			redirect('Dashboard/ATM_Manage_Groups');
		}
    }

    /***********************************************
				Session Create
	************************************************/
    
    public function Create_Session() {

    	if( isset($_POST['create_session']) && ($_SESSION['position'] == "System Administrator" || $_SESSION['position'] == "Administrator") && isset($_SESSION['Role']['System Settings']) ) {
	    	//Setting validation rules
	    	$this->form_validation->set_rules('session_date','Session Date','required|trim|xss_clean');
			$this->form_validation->set_rules('employee_id','Employe ID','required|trim|xss_clean');
			
			$data['session_date']		= $this->input->post('session_date');
			$data['employee_id']		= $this->input->post('employee_id');

			//load model
			$this->load->model('EventsModel');
			$result = $this->EventsModel->create_session($data);

			if($result) {

				$_SESSION['success'] = "Session Created";

				//navtab activation
				$_SESSION['company_navtab'] 	= "";
				$_SESSION['dept_navtab']		= "";
				$_SESSION['position_navtab'] 	= "";
				$_SESSION['priv_navtab']		= "";
				$_SESSION['session_navtab']		= "active";

				//tabpane activation
				$_SESSION['company_tabpane']  	= "";
				$_SESSION['dept_tabpane']		= "";
				$_SESSION['position_tabpane'] 	= "";
				$_SESSION['priv_tabpane']		= "";
				$_SESSION['session_tabpane']	= "active";

				redirect('Dashboard/Settings');
			
			} else {

				$_SESSION['error'] = "Session Creation Failed";
				//navtab activation
				$_SESSION['company_navtab'] 	= "";
				$_SESSION['dept_navtab']		= "";
				$_SESSION['position_navtab'] 	= "";
				$_SESSION['priv_navtab']		= "";
				$_SESSION['session_navtab']		= "active";

				//tabpane activation
				$_SESSION['company_tabpane']  	= "";
				$_SESSION['dept_tabpane']		= "";
				$_SESSION['position_tabpane'] 	= "";
				$_SESSION['priv_tabpane']		= "";
				$_SESSION['session_tabpane']	= "active";
				
				redirect('Dashboard/Settings');
			}
		
		}	else {
				$_SESSION['error'] = "Create Session Button Not Clicked";
				redirect('Dashboard');
		}
    }

    

    /***********************************************
				File Upload 
	************************************************/
    
    /**********************************************************************************************************************************************************
	********************************************************	Data Update	*****************************************************************************
	**********************************************************************************************************************************************************/

	/***********************************************
		Update Subordinate comment  
	************************************************/

	public function Update_Comment() {
		
		//loading register view

		if ( isset($_POST['edit_comment']) && isset($_SESSION['Role']['Reports']) ) {
			# code...

			$this->form_validation->set_rules('employee_id','Employee Id','required|trim|xss_clean');
			$this->form_validation->set_rules('comment','Comment','required|trim|xss_clean');
			$this->form_validation->set_rules('commentid','Comment ID','required|trim|xss_clean');

			//loading model 
			$this->load->model('EventsModel');

			//Retrieving data
			$data['employee_id']    = $this->input->post('employee_id');
			$data['Comment']    	= $this->input->post('comment');
			$data['commentid']		= $this->input->post('commentid');

			$result = $this->EventsModel->comment_update($data);

			if ($result) {
				# code...
				$_SESSION['successful'] = "Comment Updated";
				redirect('Dashboard/View_Comments');
			
			} else {
				$_SESSION['error'] = "Comment Update Failed";
				redirect('Dashboard/View_Comments');
			}
		
		} else {
			# code...
			
			redirect('Dashboard/View_Comments');
		}
	}

	/**********************************************************************************************************************************************************
	********************************************************	Data Retrieval	*****************************************************************************
	**********************************************************************************************************************************************************/

	/***********************************************
				ATMs
	************************************************/

	public function Search_Reports() {
		
		//loading register view

		if ( isset($_POST['Comment_view']) && isset($_SESSION['Role']['Reports']) ) {
			# code...

			$this->form_validation->set_rules('employee_id','Employee Id','required|trim|xss_clean');

			//loading model 
			$this->load->model('EventsModel');
			$this->load->model('UserModel');
			$this->load->model('settings_model');

			//Retrieving data
			$data['employee_id']    = $this->input->post('employee_id');
			$data['report_history'] = $this->EventsModel->daybook_retrieve($data['employee_id']);
			$data['dept_info'] = $this->settings_model->retrieve_dept();
			$data['Subordinate_Selected_info'] = $this->UserModel->employee_info($data['employee_id']);
			
            foreach ($data['Subordinate_Selected_info'] as $Subordinate) {
				# code...
				$data['Subordinate_Selected'] = $Subordinate->fullname;
			}

			//print_r($data['report_comment']);
			$title['title'] = "Daybook / Reports";
			$this->load->view('header_view',$title);
			$this->load->view('view_comments',$data);
			$this->load->view('footer_view');
		
		} else {
			# code...
			
			redirect('Dashboard/View_Comments');
		}
	}

}//End of Class
