<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MX_Controller 
{
  /********** Constructor ************/
  public function __construct() {
    parent::__construct();
  }
  /********** Constructor ************/

  /**************** Interfaces ****************/
    /********** Index call  ************/
    public function index() {
      redirect("dashboard");
    }
    /********** Index call  ************/
    /****** Company  Details*********/
    public function company() {
      # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else
      {
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Permission_DB'] = self::$_Permission_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/

        /****** Additional Functions  ****************/
        $dbres = self::$_Default_DB;
        $tablename = "hr_company_info";
        $return_dataType="php_object";
        $condition = array('id' => 1);

        $company_info = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);

        if(isset($company_info['ERR']['message'])) {
          $data['company_info'] = "";
          $this->session->set_flashdata('error',"Uable To Retrieve Company Details");
        }
        else
          $data['company_info'] = $company_info;
        /****** Additional Functions  ****************/

        /***************** Interface *****************/
        $data['title'] = "Company Details"; 
        $this->load->view('header',$data); 
        $this->load->view('company',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
    /****** Company Details  *********/
    /****** New Registration  *********/
    public function new_registration() {
      # Permission Check
       if(!in_array('new registration', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', "Permission Denied. Please Contact Admin");
        redirect('dashboard');
       }
      else
      {
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Permission_DB'] = self::$_Permission_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/
        /****** Additional Functions  ****************/
        $dbres = self::$_Default_DB;
        $tablename = "laundry_services";
        $condition = array('status' => "active");

        $data['services'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType="php_object",$condition); 
        /****** Additional Functions  ****************/
        /***************** Interface *****************/
        $data['title'] = "New Registration"; 
        $this->load->view('header',$data); 
        $this->load->view('new_registration',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /****** New Registration  *********/

  /**************** Interfaces ****************/

  /**************** Insertions ****************/
    /****** Save Company Details  ******/
    public function save_company_details() {
      if(in_array('users', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim|required');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('postal_addr','Postal Address','trim|required');
        $this->form_validation->set_rules('residence_addr','Residence Address','trim|required');
        $this->form_validation->set_rules('phone_num_1','Primary Telephone','trim|required');
        $this->form_validation->set_rules('phone_num_2','Secondary Telephone','trim|required');
        $this->form_validation->set_rules('fax','Fax','trim');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('website','Website','trim');
        $this->form_validation->set_rules('mission','Mission Statment','trim');
        $this->form_validation->set_rules('vision','vision Statment','trim');
        $this->form_validation->set_rules('tin_number','Tin Number','trim');
        if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/company');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');

          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "hr_company_info";
          $data = [
            'name' => $this->input->post('name'),
            'postal_address' => $this->input->post('postal_addr'),
            'residence_address' => $this->input->post('residence_addr'),
            'telephone_1' => $this->input->post('phone_num_1'),
            'telephone_2' => $this->input->post('phone_num_2'),
            'fax' => $this->input->post('fax'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website'),
            'mission' => $this->input->post('mission'),
            'vision' => $this->input->post('vision'),
            'tin_number' => $this->input->post('tin_number')
          ];
          $return_dataType="php_object";

          if(empty($id)) {
            $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
            if($query_result)
              $this->session->set_flashdata('success',"Company Registration Successful");
            else
              $this->session->set_flashdata('error',"Company Registration Failed");
          }
          else {
            $where_condition = ['id' => $this->input->post('id')];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
            if($query_result)
              $this->session->set_flashdata('success',"Company Details Updated");
            else
              $this->session->set_flashdata('error',"Update Failed");
          }

          redirect('settings/company');
        }
      }
      else 
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/company');
    }
    /****** Save Company Details  ******/

    /****** Save Services    ***********/
    public function save_services() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('service_name','Name','trim');
        $this->form_validation->set_rules('service_desc','Description','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/new_registration');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_services";
          $data = [
            'name' => ucwords($this->input->post('service_name')),
            'description' => $this->input->post('service_desc'),
          ];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";

              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              if($query_result)
                $this->session->set_flashdata('success',"Save Successful");
              else
                $this->session->set_flashdata('error',"Save Failed");

              redirect('settings/new_registration');
            }
            else {
              $where_condition = ['id' => $id];

              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              if($query_result)
                $return_data['success'] = "Update Successul";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/new_registration');
      }
    }
    /****** Save Services    ***********/

    /****** Save Weight      ***********/
    public function save_weight() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('service_type','Service Type','trim');
        $this->form_validation->set_rules('weight','Weight','trim');
        $this->form_validation->set_rules('weight_unit','Unit','trim');
        $this->form_validation->set_rules('weight_description','Note','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/new_registration');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_weights";
          $data = [
            'service_type' => ucwords($this->input->post('service_type')),
            'weight' => ucwords($this->input->post('weight'))." ".strtoupper($this->input->post('weight_unit')),
            'description' => ucwords($this->input->post('weight_description')),
          ];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";

              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              if($query_result)
                $this->session->set_flashdata('success',"Save Successful");
              else
                $this->session->set_flashdata('error',"Save Failed");

              redirect('settings/new_registration#weight');
            }
            else {
              $where_condition = ['id' => $id];

              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              if($query_result)
                $return_data['success'] = "Update Successul";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/new_registration#weight');
      }
    }
    /****** Save Weight      ***********/

    /****** Save Garments      ***********/
    public function save_garment() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('garment_name','Garment Name','trim');
        $this->form_validation->set_rules('garment_desc','Description','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/new_registration');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_garments";
          $data = [
            'name' => ucwords($this->input->post('garment_name')),
            'description' => ucwords($this->input->post('garment_desc')),
          ];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";

              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              if($query_result)
                $this->session->set_flashdata('success',"Save Successful");
              else
                $this->session->set_flashdata('error',"Save Failed");

              redirect('settings/new_registration#garments');
            }
            else {
              $where_condition = ['id' => $id];

              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              if($query_result)
                $return_data['success'] = "Update Successul";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/new_registration#garments');
      }
    }
    /****** Save Garments    ***********/

    /****** Save Prices      ***********/
    public function save_price() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('service_id','Service Type','trim');
        $this->form_validation->set_rules('weight_id','Weight','trim');
        $this->form_validation->set_rules('garment_id','Garment Type','trim');
        $this->form_validation->set_rules('amount','Amount','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/new_registration');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_prices";
          $data = [
            'service_id' => ucwords($this->input->post('service_id')),
            'weight_id' => ucwords($this->input->post('weight_id')),
            'garment_id' => ucwords($this->input->post('garment_id')),
            'amount' => (float)$this->input->post('amount'),
          ];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";

              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              if($query_result)
                $this->session->set_flashdata('success',"Save Successful");
              else
                $this->session->set_flashdata('error',"Save Failed");

              redirect('settings/new_registration#pricing');
            }
            else {
              $where_condition = ['id' => $id];

              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              if($query_result)
                $return_data['success'] = "Update Successul";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/new_registration#pricing');
      }
    }
    /****** Save Prices    ***********/

    /****** Save Weight      ***********/
    public function save_delivery() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('location','Location','trim');
        $this->form_validation->set_rules('duration','Duration','trim');
        $this->form_validation->set_rules('price','Price','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('settings/new_registration#delivery');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_delivery_method";
          $data = [
            'location' => ucwords($this->input->post('location')),
            'duration' => ucwords($this->input->post('duration')),
            'price' => ucwords($this->input->post('price')),
          ];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";

              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              if($query_result)
                $this->session->set_flashdata('success',"Save Successful");
              else
                $this->session->set_flashdata('error',"Save Failed");

              redirect('settings/new_registration#delivery');
            }
            else {
              $where_condition = ['id' => $id];

              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              if($query_result)
                $return_data['success'] = "Update Successul";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $this->session->set_flashdata('error','Permission Denied.Contact Administrator');
        redirect('settings/new_registration#delivery');
      }
    }
    /****** Save Weight      ***********/

    /****** Save Client Info ***********/
    public function save_client_info() {
      if(in_array('new registration', $_SESSION['user']['roles'])) {
        $this->form_validation->set_rules('id','ID','trim');
        $this->form_validation->set_rules('fullname','Fullname','trim');
        $this->form_validation->set_rules('gender','Gender','trim');
        $this->form_validation->set_rules('company_name','Company Name','trim');
        $this->form_validation->set_rules('residence_addr','Residence Address','trim');
        $this->form_validation->set_rules('postal_addr','Postal Address','trim');
        $this->form_validation->set_rules('primary_tel','Phone No #1','trim');
        $this->form_validation->set_rules('secondary_tel','Phone No #2','trim');
        $this->form_validation->set_rules('email','Email','trim');
        $this->form_validation->set_rules('sms','SMS','trim');
        $this->form_validation->set_rules('online','Online Access','trim');
        $this->form_validation->set_rules('update_item','Update Action','trim');
        $this->form_validation->set_rules('delete_item','Delete Action','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', "Validation Error");
          redirect('overview');
        }
        else {
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_update');
          $this->load->model('globals/model_retrieval');
          /***** Data Definition *****/
          $id = $this->input->post('id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_clients";
          $data = [
            'fullname' => ucwords($this->input->post('fullname')),
            'gender' => ucwords($this->input->post('gender')),
            'company' => ucwords($this->input->post('company_name')),
            'residence_address' => ucwords($this->input->post('residence_addr')),
            'postal_address' => $this->input->post('postal_addr'),
            'phone_number_1' => $this->input->post('primary_tel'),
            'phone_number_2' => $this->input->post('secondary_tel'),
            'email' => $this->input->post('email'),
            'sms_alert' => ($this->input->post('sms') == "on") ? 1 : 0,
            'online_access' => ($this->input->post('online')== "on") ? 1 : 0,
          ]; 
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          /***** Data Definition *****/
          if(isset($delete_confirmed) && isset($id)) {
            $delete_data['status'] = "deleted";

            $where_condition = ['id' => $id];

            $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$delete_data,$where_condition) ;
            if($query_result)
              $return_data['success'] = "Delete Successul";
            else
              $return_data['error'] = "Delete Failed";

            print_r(json_encode($return_data));
            exit();
          } 
          else {
            if(empty($id)) {
              $data['status'] = "active";
              /****** Form Validation ********/
              $primary_tel_search = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select = "phone_number_1",$where=array('phone_number_1' => $data['phone_number_1']));
              
              if(strlen($data['phone_number_1']) < 10) {
                $this->session->set_flashdata('error',"Invalid Phone Number");
                redirect('overview');
              }
              
              if($primary_tel_search) {
                $this->session->set_flashdata('error',"Phone Number Already Exists");
                redirect('overview');
              }
              /****** Form Validation ********/
              $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);
              
              if($query_result) {
                $this->session->set_flashdata('success',"Save Successful");
                $_SESSION['laundry']['new_order']['client']['phone_number'] = $this->input->post('primary_tel');
              }
              else
                $this->session->set_flashdata('error',"Save Failed");
              redirect('overview');
            }
            else {
              $where_condition = ['id' => $id];
              $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$data,$where_condition) ;
              
              if($query_result)
                $return_data['success'] = "Client Info Updated";
              else
                $return_data['error'] = "Update Failed";

              print_r(json_encode($return_data));
            }
          }
        }
      }
      else {
        $return_data['error'] = 'Permission Denied.Contact Administrator';
        print_r(json_encode($return_data));
      }
    }
    /****** Save Client Info ***********/

    /****** Search From Customers Table ***********/
    public function customer_new_order($phone_number) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Please Contact Admin"];
        print_r(json_encode($return_data));
      }
      else {
        $_SESSION['laundry']['new_order']['client']['phone_number'] = $phone_number;
        redirect('overview');
      }
    }
    /****** Search From Customers Table ***********/
  /**************** Insertions ****************/

  /*********************************  AJAX CALLS  **************************/
    /*******************************
      Retrieving All data
    *******************************/
    public function retrieve_alldata($tablename,$dbtype,$where_field = "",$where_value = "")
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        if($dbtype == "default")
          $dbres = self::$_Default_DB;
        else if($dbtype == "permissions") {
          $dbres = self::$_Permission_DB;
          $return_dataType = "json";
        }
        
        if(!empty($where_field) && !empty($where_value)) {
          $fields = explode('~',$where_field);
          $values = explode('~',$where_value);

          for($a=0; $a < sizeof($fields); $a++) {
            $condition[$fields[$a]] = $values[$a];
          }

        }
        else {
          $condition = array('status' => "active");
        }

        if($tablename == "services") {
          $tablename = "laundry_services";
          $return_dataType = "json";
        }

        if($tablename == "vw_weights") {
          $tablename = "vw_laundry_weights";
          $return_dataType = "json";
        }

        if($tablename == "garments") {
          $tablename = "laundry_garments";
          $return_dataType = "json";
        }

        if($tablename == "vw_prices") {
          $tablename = "vw_laundry_prices";
          $return_dataType = "json";
        }

        if($tablename == "delivery") {
          $tablename = "laundry_delivery_method";
          $return_dataType = "json";
        }

        if($tablename == "clients") {
          $tablename = "laundry_clients";
          $return_dataType = "json";
        }

        if($tablename == "inhouse_orders") {
          $dbres = self::$_Views_DB;
          $tablename = "vw_orderlist_summary";
          $return_dataType = "json";
          $condition = array('status !=' => "Completed",'status !=' => "Dispatch"  );
        }

        $search_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
            
        if(!empty($search_result)) 
          $return_data = $search_result;
        else
          $return_data['error'] = "Data Retrieval Failed";
      }
      else 
        $return_data['error'] = "Permission Denied.Contact Administrator";
      
      print_r($return_data);
    }

    /*******************************
      Retrieving All data
    *******************************/
    public function retrieve_permissions($target)
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      {
        # Loading Model 
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Permission_DB;
        if($target == "users") {
          $tablename = "vw_user_details";
          $condition = array('group_id !=' => 1);
        }
        else if($target == "groups"){
          $tablename = "roles_privileges_group";
          $condition = array('id !=' => 1);
        }
        $return_dataType = "json";

        $search_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
            
        if(!empty($search_result)) 
          $return_data = $search_result;
        
        else
          $return_data = ['error' => "Data Retrieval Failed"];
      }
      else 
        $return_data = ['error' => "Permission Denied.Contact Administrator"];
      
      print_r($return_data);
    }
  /*********************************  AJAX CALLS **************************/

  
}//End of Class
