<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends MX_Controller 
{
   /*******************************
      Constructor 
    *******************************/
    public function __construct() {
      parent::__construct();
    }

  /**************** Interface ********************/
    public function index() {
      # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else {
        //print_r($_SESSION['laundry']['new_order']);
        //unset($_SESSION['laundry']);
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Permission_DB'] = self::$_Permission_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/
        $data['new_client_number'] = @$_SESSION['laundry']['client_phone_number'];
        /***************** Interface *****************/
        $data['title'] = "Overview"; 
        $this->load->view('header',$data); 
        $this->load->view('overview',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /**************** Interface ********************/

  /**************** Insertions ********************/
    /*******************************
      order Search
    *******************************/
    public function save_to_list($list_type) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
          $return_data = ['error' => "Permission Denied. Please Contact Admin"];
          print_r(json_encode($return_data));
       }
      else {
        if($list_type == "washing_only") {
          $this->form_validation->set_rules('service_id','Service ID','trim|required');
          $this->form_validation->set_rules('service_name','Service Name','trim|required');
          $this->form_validation->set_rules('weight_id','Weight','trim|required');
          $this->form_validation->set_rules('weight_name','Weight','trim|required');
          $this->form_validation->set_rules('price','Price','trim|required');
          $this->form_validation->set_rules('description','Description','trim|required');
          $this->form_validation->set_rules('quantity','Item Total Quantity','trim|required');

          if($this->form_validation->run() === FALSE) {
            $return_data = ['error' => "All Fields Required"];
            print_r(json_encode($return_data));
          }
          else {
            # Assigning to session variable
            $_SESSION['laundry']['new_order'][] = [
              'service_id' => $this->input->post('service_id'),
              'service_name' => $this->input->post('service_name'),
              'weight_id' => $this->input->post('weight_id'),
              'weight_name' => $this->input->post('weight_name'),
              'price' => $this->input->post('price'),
              'description' => $this->input->post('description'),
              'quantity' => $this->input->post('quantity'),
              'array_index' => sizeof($_SESSION['laundry']['new_order'])
            ];

            $return_data = ['success' => "Adding To List Successful"];
            print_r(json_encode($return_data));
          }
        }
        else if($list_type == "others") {
          $this->form_validation->set_rules('service_id','Service Type','trim|required');
          $this->form_validation->set_rules('service_name','Service Type','trim|required');
          $this->form_validation->set_rules('garment_id','Garment ID','trim');
          $this->form_validation->set_rules('garment','Garment','trim');
          $this->form_validation->set_rules('price','Price','trim|required');
          $this->form_validation->set_rules('item_quantity','Item Total Quantity','trim|required');

          if($this->form_validation->run() === FALSE) {
            $return_data = ['error' => "All Fields Required"];
            print_r(json_encode($return_data));
          }
          else {
            # Loading model
            $this->load->model('globals/model_retrieval');

            # Assigning to session variable
            $_SESSION['laundry']['new_order'][] = [
              'service_id' => $this->input->post('service_id'),
              'service_name' => $this->input->post('service_name'),
              'garment_id' => $this->input->post('garment_id'),
              'garment_name' => $this->input->post('garment_name'),
              'price' => $this->input->post('price'),
              'description' => $this->input->post('description'),
              'quantity' => $this->input->post('item_quantity'),
              'array_index' => sizeof(@$_SESSION['laundry']['new_order'])
            ];

            $return_data = ['success' => "Adding To List Successful"];
            print_r(json_encode($return_data));
          }
        }
      }
    }
  /**************** Insertions ********************/

  /**************** Retrivals  ********************/
    /*******************************
      order Search
    *******************************/
    public function search() 
    {
      # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
          $return_data['error'] = "Permission Denied. Please Contact Admin";
          print_r(json_encode($return_data));
       }
      else { 
        $this->form_validation->set_rules('search_text','Search Text','trim|required');

        if($this->form_validation->run() === FALSE) {
          $return_data['error'] = "Order No / Phone Number Required";
          print_r(json_encode($return_data));
        }
        else {
          $this->load->model('globals/model_retrieval');

          $search = $this->input->post('search_text');

          $dbres = self::$_Default_DB;

          if(is_numeric($search)) {
            $tablename = "laundry_clients";
            $where_condition = ['phone_number_1' => $search];

            $query_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$where_condition,$return_dataType="php_object");

            if($query_result) {
              $return_data = $query_result;
              $_SESSION['laundry']['client_phone_number'] = $query_result[0]->phone_number_1;
            }
            else {
              $return_data = $query_result;
            }
          }
          else 
            $return_data['success'] = "Order Number";

          print_r(json_encode($return_data));
        }
      }
    }

    /*******************************
      order Search
    *******************************/
    public function laundry_cart() 
    {
      if(isset($_SESSION['laundry']['new_order'])) {
        # Loading Model
        $this->load->model('globals/model_retrieval');

        /****** Variables Assignment ******/
        $dbres = self::$_Default_DB;
        $tablename = 'laundry_services';
        $return_dataType="php_object";
        $select = "code";
        /****** Variables Assignment ******/

        if(isset($_SESSION['laundry']['new_order'])) {
          for($i=0; $i < sizeof($_SESSION['laundry']['new_order']) ; $i++) { 
            # code...
            $where_condition = ['id' => $_SESSION['laundry']['new_order'][$i]['service_id']];

            $service_code =  $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);
            $_SESSION['laundry']['new_order'][$i]['service_code'] = $service_code->code; 
          }

          print_r(json_encode($_SESSION['laundry']['new_order']));
        }
        else {
          print_r(json_encode($_SESSION['laundry']['new_order'] = array()));
        }
      }
    }

    /*******************************
      Clear Chart
    *******************************/
    public function clear_cart() 
    {
       # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) 
          $return_data = ['error' => "Permission Denied. Please Contact Admin"];
          
      else { 
        unset($_SESSION['laundry']);
        $return_data = ['success' => "Cart Cleared"];
      }

      print_r(json_encode($return_data));
    }
  /**************** Retrivals  ********************/

    /*******************************
      Retrieving All data
    *******************************/
    public function addnew() 
    {
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

        /***************** Interface *****************/
        $data['title'] = "Add new"; 
        $this->load->view('header',$data); 
        $this->load->view('addnew',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }

    /**************** Deleting Items in Cart  ********************/
    public function delete_from_cart($array_index) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data['error'] = "Permission Denied. Conatat Amin";
        print_r(json_encode($return_data));
      }
      else {
        unset($_SESSION['laundry']['order']);
      }
    }   
    /**************** Deleting Items in Cart  ********************/
    
}//End of Class
