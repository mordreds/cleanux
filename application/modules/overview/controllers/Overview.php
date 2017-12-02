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
        //print "<pre>"; print_r(@$_SESSION['laundry']); print "</pre>";
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
        if(isset($_SESSION['laundry']['client_phone_number'])) {
          # Loading Model 
          $this->load->model('globals/model_retrieval');
          /****** Retrieve Service Code *******/
          $dbres = self::$_Default_DB; $tablename = 'laundry_services';
          $return_dataType="php_object"; $select = "code";
          $where_condition = ['id' => $this->input->post('service_id')];

          $query_result =  $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);

          if($query_result)
            $service_code = $query_result->code;
          else
            $service_code = "N/A";

          $arr_keys = array_keys($_SESSION['laundry']['new_order']);
          if(!isset($_SESSION['laundry']['new_order'][0]))
            $next_array_key = 0;
          else
            $next_array_key = end($arr_keys) + 1;

          if(!isset($_SESSION['laundry']['new_order'][0]) && !empty(end($arr_keys)))
            $next_array_key = end($arr_keys) + 1;
          /****** Retrieve Service Code *******/

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
                'service_code' => $service_code,
                'array_index' => $next_array_key,
                'total_cost' => $this->input->post('price')
              ];
              @$_SESSION['laundry']['cart_total_amount'] += $this->input->post('price');
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
                'service_code' => $service_code,
                'array_index' => $next_array_key,
                'total_cost' => $this->input->post('price') * $this->input->post('item_quantity')
              ];
              @$_SESSION['laundry']['cart_total_amount'] += ($this->input->post('price') * $this->input->post('item_quantity'));
              $return_data = ['success' => "Adding To List Successful"];
              print_r(json_encode($return_data));
            }
          }
        }
        else {
          $return_data = ['error' => "No Client Selected"];
          print_r(json_encode($return_data));
        }
      }
    }

    /*******************************
      Save New Order
    *******************************/
    public function save_order() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      else {
        $this->form_validation->set_rules('order_due_date','Order Due Date','trim|required');
        $this->form_validation->set_rules('delivery_method','Delivery Method','trim|required');
        $this->form_validation->set_rules('amount_paid','Amount Paid','trim|required');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/Model_insertion');
          
          if(isset($_SESSION['laundry']['new_order']) && !empty($_SESSION['laundry']['new_order'])) {
            # Assigning to session variable
            $dbres = self::$_Default_DB;
            $tablename = "";
            $data = [
              
            ];
          }
          else {
            $return_data = ['error' => "No Client Selected"];
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
      if(isset($_SESSION['laundry']['new_order']) && !empty($_SESSION['laundry']['new_order'])) {
        
        foreach ($_SESSION['laundry']['new_order'] as $key => $value) {
          # code...
          $return_data[] = $value;
        }
        if(!empty($return_data))
          print_r(json_encode(array_reverse($return_data)));
        //print_r($_SESSION['laundry']['new_order']);
        else
          print "";
      }
      else 
        print_r(json_encode($_SESSION['laundry']['new_order'] = array()));
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
    public function receipt() 
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
        $this->load->view('receipt',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
    /*******************************
      Deleting Items in Cart
    *******************************/
    public function delete_from_cart() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        print_r(json_encode($return_data));
      }
      else {
        $this->form_validation->set_rules('deleteid','Item To Delete','trim|required');

        if($this->form_validation->run() === FALSE) {
          $return_data = ['error' => "No Item Selected"];
          print_r(json_encode($return_data));
        }
        else{
          $array_index = $this->input->post('deleteid');
          if(isset($_SESSION['laundry']['new_order'])) {
            @$_SESSION['laundry']['cart_total_amount'] -= $_SESSION['laundry']['new_order'][$array_index]['total_cost'];
            unset($_SESSION['laundry']['new_order'][$array_index]);
            $return_data = ['success' => "Item Deleted"];
          }
          else {
            $return_data = ['error' => "Cart is Empty"];
          }

          print_r(json_encode($return_data));
        }
      }
    } 
    /*******************************
      New Order Total Cost
    *******************************/  
    public function new_order_totalCost() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        return json_encode($return_data);
      }
      else {
        if(isset($_SESSION['laundry']['cart_total_amount']) && !empty($_SESSION['laundry']['cart_total_amount'])) {
          $return_data = ['total' => number_format($_SESSION['laundry']['cart_total_amount'],2)];
          print_r(json_encode($return_data));
        }
      }
    } 
}//End of Class
