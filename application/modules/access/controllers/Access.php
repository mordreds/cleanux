<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MX_Controller 
{
    /*******************************
      Constructor 
    *******************************/
    public function __construct() 
    {
      parent::__construct();
    }

    /*******************************
           Logout
    *******************************/
    public function logout() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['login_id']) ) 
      {
        $this->load->model('model_access');
        $result = $this->model_access->logout_user(self::$_Audit_DB,'successful_logins',$_SESSION['user']['login_id']);
        
        if($result) 
        {
          session_destroy();
          redirect('access');
        } 
        
        else 
        {
          $this->session->set_flashdata('error',"Log Out Failed");
          redirect('dashboard');
        }
      }
      else
         redirect('access/login');
    }

  /**************** Interface ********************/
    /*******************************
      Index Function
    *******************************/
    public function index() 
    {
      $this->login();
    }

    /*******************************
      Login 
    *******************************/
    public function login() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else
      {
        $title['title'] = "Login - ProjectName"; 
        $this->load->view('login_header',$title); 
        $this->load->view('login'); 
        $this->load->view('login_footer'); 
      }
    }

    /*******************************
      Password Recovery 
    *******************************/
    public function password_reset() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        redirect('dashboard');

      else
      {
        $title['title'] = "Login - ProjectName"; 
        $this->load->view('login_header',$title); 
        $this->load->view('forgot_password'); 
        $this->load->view('login_footer'); 
      }
    }

  /**************** Interface ********************/

  /**************** Verifying Methods ********************/
    /***********************************************
      Login Validation 
    ************************************************/
    public function login_validation() 
    {
      if(isset($_POST['login'])) 
      {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('passwd', 'Password', 'required|trim');

        if($this->form_validation->run() === FALSE) 
        {
          $this->session->set_flashdata('error','All Fields Required');
          redirect('access/login');
        }
        else 
        {
          # Loading Helper / Models
          $this->load->model('model_access');
          $this->load->model('globals/model_retrieval');

          # Performing Database Verfication ==> Username
          $username = $this->input->post('email',TRUE);
          $password = $this->input->post('passwd',TRUE);
                
          $user = $this->model_access->verify_username(self::$_Permission_DB,$username);
          
          if(empty($user)){
            $this->session->set_flashdata('error',"Invalid Username / Password Combination");
            redirect('access/login');
          }

          # Deleted Accounts
          if($user->status == "deleted") {
            $this->session->set_flashdata('error',"Invalid Username / Password Combination");
            redirect('access/login');
          }
          # Inactive Accounts
          else if($user->status == "inactive") {
            $this->session->set_flashdata('error',"Account Disabled.<br/>Please Contact Administrator");
            redirect('access/login');
          }
          # Active Accounts
          else if($user->status == "active") {
            # Login Attempt
            if($user->login_attempt <= 0 ) {
              $this->session->set_flashdata('error',"Login Attempts Exceeded. Please Contact Administrator");
              redirect('access/login');
            }
            else {
              # Password Verifications
              if(!empty($user->passwd)) {
                # Calling Helper
                $this->load->helper('encryption');
                
                if(password_decrypt($password, $user->passwd)) { 
                  /************************ Retrieving Company Info ********************/
                    $companyinfo = $this->model_access->retrieve_company_info();
                    
                    if(!empty($companyinfo->name)) {
                      $session_array['companyinfo'] = [  
                        'id'            => $companyinfo->id,
                        'name'          => $companyinfo->name,
                        'telephone_1'   => $companyinfo->telephone_1,
                        'telephone_2'   => $companyinfo->telephone_2,
                        'fax'           => $companyinfo->fax,
                        'email'         => $companyinfo->email,
                        'postal_address'    => $companyinfo->postal_address,
                        'residence_address' => $companyinfo->residence_address,
                        'website'           => $companyinfo->website,
                      ];
                      # Retrieving logo
                      /*$condition = ['id' => $companyinfo->logo_id];
                      $logo_search = $this->model_retrieval->all_info_return_row(self::$_Default_DB,'blobs',$condition);
                      $session_array['companyinfo']['logo'] = @$logo_search->blob_path;*/
                    } 
                    else
                      $session_array['companyinfo']['name'] = "Unregisted" ;
                  /************************ End of Company Info ********************/
                  /************************ User Roles & Priviledges ********************/
                    if(!empty($user) && $user->user_roles_status == "active") {
                      $custom_roles = $user->custom_roles;
                      $custom_privileges  = $user->custom_privileges;
                      $group_id         = $user->group_id;
                      $group_roles      = $user->group_roles; 
                      # If user has no roles completely
                      
                      if(empty($custom_roles) && empty($group_roles)) {
                        $this->session->set_flashdata('error','No Permissions Set For User.<br/>Please Contact Administrator');
                        redirect('access/login');
                      }
                      # If user belongs to a group or has custom roles & priviledges
                      else {
                        if(!empty($user)) {
                          $temp_array['group_roles'] = explode("|",$user->group_roles);
                          $temp_array['group_privileges'] = explode("|",$user->group_privileges);
                        } else {
                          $temp_array['group_roles'] = $temp_array['group_priviledges'] = array();
                        }
                        # Custom roles and priviledges processing
                        if(!empty($custom_roles) || !empty($custom_privileges)) {
                          $temp_array['custom_roles'] = explode("|",$custom_roles);
                          $temp_array['custom_privileges'] = explode("|",$custom_privileges);
                        } else {
                          $temp_array['custom_roles'] = $temp_array['custom_privileges'] = array();
                        }
                        # assignment into session variable
                        $user_roles['roles'] = array_merge($temp_array['group_roles'],$temp_array['custom_roles']);
                        $user_privileges['privileges'] = array_merge($temp_array['group_privileges'],$temp_array['custom_privileges']);
                      }
                    
                    } else {
                      $this->session->set_flashdata('error','No Permissions Set For User. Contact Administrator');
                      redirect('access/login');
                    }
                  /************************ End User Roles & Priviledges ****************/
                  
                  /************************ Employee's Personal Info  ********************/
                    # Merging Emploee Data with client
                      unset($user->group_description,$user->group_roles,$user->group_privileges,$user->group_status,$user->passwd);
                      $session_array['user'] = array_merge((array)$user,$user_roles,$user_privileges);

                    /*$employee_data = $this->model_retrieval->all_info_return_row(self::$_Default_DB,"",$user->employee_id); 
                    
                    if(!empty($employee_data->id)) 
                    {
                      #Storing in variable
                      $employee = [
                        'fullname' => $employee_data->lastname." ".$employee_data->firstname,
                        'username' => $username,
                      ];
                      
                    }
                    else
                      $this->session->set_flashdata('error',"Employee Personal Data Loading Failed<br>");
                  /************************ Employee's Personal Info  ********************/
                  
                  /************************ Recording Login Information ******************/
                  $client_ip = $this->get_ip_address();
                  # If Local 
                  if($client_ip == "::1" || $client_ip == "127.0.0.1")
                  {
                    $login_data = 
                    [
                      'user_id'     => $user->id,
                      'user_agent'  =>  $_SERVER['HTTP_USER_AGENT'] ,
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                    ];
                  }                  
                  else
                  {
                    $ip_API_result = file_get_contents("http://ip-api.com/json/$client_ip");
                    $Ip_Info = json_decode($ip_API_result);
                    
                    $login_data = 
                    [
                      'user_id'     => $user->id,
                      'user_agent'  =>  $_SERVER['HTTP_USER_AGENT'] ,
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                      'city_region' => $Ip_Info->city.",".$Ip_Info->regionName,
                      'country'     => $Ip_Info->country
                    ];
                  }
                  
                  # Condition Array
                  $condition = array(
                      'password_check'=> TRUE,
                      'users_dbres' => self::$_Permission_DB,
                  );

                  $result = $this->model_access->record_login(self::$_Audit_DB,$condition,$login_data);
                  
                  if(!empty($result['login_id'])) 
                  {
                    $session_array['user']['login_id'] = $result['login_id'];
                    $session_array['user']['login_attempt'] = $result['login_attempt'];
                    $session_array['user']['fullname'] = $user->fullname;
                    $this->session->set_userdata($session_array);
                    redirect('dashboard');
                    //print "<pre>";print_r($_SESSION);print "</pre>";
                  }
                  /************************ Recording Login Success **********************/  
                }
                else {
                  /************************ Recording Failed Login Information ************/
                    $client_ip = $this->get_ip_address();
                    # Local 
                    if($client_ip == "::1" || $client_ip == "127.0.0.1") {
                      $password = password_encrypt($password);
                      $login_data = 
                      [
                        'username'    => $username,
                        'user_id'     => $user->id,
                        'password'    => $password,
                        'user_agent'  => $_SERVER['HTTP_USER_AGENT'],
                        'ipaddress'   => $client_ip,
                        'hostname'    => gethostbyaddr($client_ip),
                      ];
                    }  
                    # Online                 
                    else {
                      $ip_API_result = file_get_contents("http://ip-api.com/json/$client_ip");
                      $Ip_Info = json_decode($ip_API_result);
                      $login_data = 
                      [
                        'username'    => $username,
                        'user_id'     => $user->id,
                        'password'    => $this->password_encrypt($password),
                        'user_agent'  => $_SERVER['HTTP_USER_AGENT'] ,
                        'ipaddress'   => $client_ip,
                        'hostname'    => gethostbyaddr($client_ip),
                        'city_region' => $Ip_Info->city.",".$Ip_Info->regionName,
                        'country'     => $Ip_Info->country
                      ];
                    }

                    # Condition Array
                    $condition = array(
                      'password_check'=> FALSE,
                      'users_dbres' => self::$_Permission_DB,
                      'login_attempt' => $user->login_attempt,
                    );

                    $result = $this->model_access->record_login(self::$_Audit_DB,$condition,$login_data);
                    $this->session->set_flashdata('error',"Invalid Username / Password Combination.<br/>Remaining Login Attempts:<b> ".$result['login_attempt']."</b>");
                    
                    redirect('access/login');
                  /************************ Recording Failed Login Success ****************/
                }
              }
              else {
                $this->session->set_flashdata('error','Invalid Username / Password');
                redirect('access/login');
              }
            }
          }
        }
      }
      else
        redirect('access');
    } 

    /***********************************************
      Password Reset
    ************************************************/
    public function reset_password_request() 
    {
      if(isset($_POST['reset_password'])) 
      {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if($this->form_validation->run() === FALSE) 
        {
          $this->session->set_flashdata('error','Email Fields Required');
          redirect('access/password_reset');
        }
        else 
        {
          # Loading Helper / Models
          $this->load->model('model_access');
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_retrieval');
          $this->load->helper('encryption');

          # Performing Database Verfication ==> Username
          $email = $this->input->post('email',TRUE);
          # Email Verification       
          $verify_email_result = $this->model_access->verify_username(self::$_Permission_DB,$email);
          
          if(empty($verify_email_result)){
            $this->session->set_flashdata('error',"Invalid Email");
            redirect('access/password_reset');
          }
          # Check For Previous Pending Request
          $condition = array('status'=>"Pending",'requestor_user_id'=>$verify_email_result->id);
          $pending_approval_check = $this->model_retrieval->all_info_return_result(self::$_Permission_DB,'password_reset_requests',$condition);

          if(!empty($pending_approval_check)) {
            $this->session->set_flashdata('info_alert',"A Previous Request Awaits Approval. Kindly Be Patience, Thank You.");
            redirect('access/password_reset');
          }

          # Sending Request To Admin For Approval
          $fullname = $verify_email_result->firstname.' '.$verify_email_result->lastname;
          $data = ['requestor_user_id'=>$verify_email_result->id, 'status'=>"Pending"];
          $query_result = $this->model_insertion->DataInsert(self::$_Permission_DB,'password_reset_requests', $data);

          if($query_result) {
            # Retrieving All Administrator Email
            $this->load->library('email');
            $condition = array('user_type' => "administrator");
            $all_admin_emails = $this->model_retrieval->all_info_return_result(self::$_Permission_DB,'users',$condition);

            if(!empty($all_admin_emails)) {
              foreach ($all_admin_emails as $value) {
                # code...
                $subject = "Password Reset";
                $message = "Dear Admin, I, $fullname, request the reset of my password urgently. Counting on your usual co-operation. Thank You.";
                
                $this->email->from($email,$fullname);
                $this->email->to($value->email);
                $this->email->subject($subject);
                $this->email->message($message);
                $email_status = $this->email->send();
              }
            }
            # Sending Token to Email
            $this->session->set_flashdata('success_alert',"Administrator would notify you upon approval of your request.");
            redirect('access/password_reset');
          } 
          else {
            $this->session->set_flashdata('error_alert',"Password Reset Request Failed");
            redirect('access/password_reset');
          }
        }
      }
      else
        redirect('access/password_reset');
    }      
  /**************** Verifying Methods ********************/

  /***********************************************
      Password Reset Approval
    ************************************************/
    public function reset_password_approved() 
    {
      if(isset($_POST['reset_password_approval'])) 
      {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if($this->form_validation->run() === FALSE) 
        {
          $this->session->set_flashdata('error','Email Fields Required');
          redirect('access/password_reset');
        }
        else 
        {
          # Loading Helper / Models
          $this->load->helper('encryption');

          # Generating Verification Token
          $token = getToken(15);
          $message = "Please your request for change of password has been approved by the Administrator. Your new password is <b>$token</b>. Please Note that upon login you shall be requested to set a new password. Thank You. ";

          # Sending Token to Email
          $this->load->library('email');
          $this->email->from($email,$query_result->firstname.' '.$query_result->lastname);
          $this->email->to('another@another-example.com');

          $this->email->subject('Password Reset');
          $this->email->message('Testing the email class.');

          $this->email->send();
        }
      }
    }

  /**************** Other Functions **********************/
    /**
    * Retrieves the best guess of the client's actual IP address.
    * Takes into account numerous HTTP proxy headers due to variations
    * in how different ISPs handle IP addresses in headers between hops.
    */
    public function get_ip_address() 
    {
      // check for shared internet/ISP IP
      if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP'])) 
      {
        return $_SERVER['HTTP_CLIENT_IP'];
      }
      // check for IPs passing through proxies
      if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
      {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
          $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
          foreach ($iplist as $ip) {
            if ($this->validate_ip($ip))
              return $ip;
          }
        } else {
          if ($this->validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
      }
      if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
      if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
      if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
      if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
      // return unreliable ip since all else failed
      return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Ensures an ip address is both a valid IP and does not fall within
     * a private network range.
     */
    public function validate_ip($ip) 
    {
      if (strtolower($ip) === 'unknown')
        return false;
      // generate ipv4 network address
      $ip = ip2long($ip);
      // if the ip is set and not equivalent to 255.255.255.255
      if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
      }
      return true;
    }

  /**************** Other Functions **********************/

}//End of Class
