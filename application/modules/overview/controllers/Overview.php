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
    /*******************************
      Index Function
    *******************************/
    public function index() { 
      # Permission Check
       if(!isset($_SESSION['user']['username']))
        redirect('access/login');
      else if(!in_array('overview', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', 'Permission Denied. Contact Admin');
        redirect($_SERVER['HTTP_REFERER']);
      }
      else { 
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Default_DB'] = self::$_Default_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/
        $data['new_client_number'] = @$_SESSION['laundry']['new_order']['client']['phone_number'];
        /****** Total Orders ******/
        $dbres = self::$_Default_DB;
        $tablename = "laundry_orders";
        $where_condition = array('processor_user_id' => $_SESSION['user']['id'],'DATE(date_created)' => gmdate('Y-m-d'));

        $data['total_orders'] = $this->model_retrieval->return_count($dbres,$tablename,$return_dataType="php_object",$where_condition);
        /****** Total Orders ******/
        /***************** Interface *****************/
        $data['title'] = "Overview"; 

        $this->load->view('header',$data); 
        $this->load->view('overview',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }

    /*******************************
      Receipt Function
    *******************************/
    public function receipt($order_id) {
      # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else {
        /***************** Interface *****************/
        $data['order'] = $order_id;
        $this->load->view('receipt',$data); 
        /***************** Interface *****************/
      }
    }

    /*******************************
      Check order details
    *******************************/
    public function order_details() {
      # Permission Check
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else {
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Default_DB'] = self::$_Default_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/
        /***************** Interface *****************/
        $data['title'] = "Order Details"; 

        $this->load->view('header',$data); 
        $this->load->view('view_order_details',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }

    /*******************************
      TimeLine Function
    *******************************/
    public function timeline() { //print "<pre>"; print_r($_SESSION); print "</pre>";
      # Permission Check
      if(!isset($_SESSION['user']['username']))
        redirect('access/login');
      else if(!in_array('overview', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', 'Permission Denied. Contact Admin');
        redirect($_SERVER['HTTP_REFERER']);
      }
      else { 

        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Default_DB'] = self::$_Default_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2); 
        /****** Required Parameters To Render A Page ******/

        /****** Page Logics / Functions ******/
        # Global Variable Declaration
          $dbres = self::$_Default_DB;
          $return_dataType="php_object";
          $tablename = "vw_orderlist_summary";
          $laundry_orders = "laundry_orders";

        # Timeline For User Logged in
          $condition  = [
            'where_condition' =>  array('processor_user_id' => $_SESSION['user']['id']),
            'orderby' => array('id' => "desc"),
            'limit' => 1
          ];
          $retrieve_last_work_date = $this->model_retrieval->retrieve_allinfo($dbres,$laundry_orders,$condition);
          
          if(!isset($retrieve_last_work_date['DB_ERROR']) && !empty($retrieve_last_work_date[0])) {
              $retrieve_last_work_date = $retrieve_last_work_date[0];
            # Retrieving timeline
            $condition = [
              'where_condition' => array('DATE(date_created)' => date('Y-m-d',strtotime($retrieve_last_work_date->date_created)), 'processor_user_id' => $_SESSION['user']['id']),
              'orderby' => array('id' => "desc")
            ];
            
            $retrieve_timeline = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
            
            if(!isset($retrieve_timeline['DB_ERROR'])) {
              $data['timeline'] = $retrieve_timeline;
              $data['timeline_date'] = date('D M d, Y',strtotime($retrieve_last_work_date->date_created));
              //print_r(date('l F d, Y',strtotime($retrieve_last_work_date->date_created)));
            }
          }
        /****** Page Logics / Functions ******/

        /***************** Interface *****************/
        $data['title'] = "My TimeLine"; 

        $this->load->view('header',$data); 
        $this->load->view('timeline',$data); 
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
        if(isset($_SESSION['laundry']['new_order']['client']['phone_number'])) {
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

          $arr_keys = array_keys($_SESSION['laundry']['new_order']['orders']);
          if(!isset($_SESSION['laundry']['new_order']['orders'][0]))
            $next_array_key = 0;
          else
            $next_array_key = end($arr_keys) + 1;

          if(!isset($_SESSION['laundry']['new_order']['orders'][0]) && !empty(end($arr_keys)))
            $next_array_key = end($arr_keys) + 1;
          /****** Retrieve Service Code *******/

          if($list_type == "washing_only") {
            $this->form_validation->set_rules('service_id','Service ID','trim|required');
            $this->form_validation->set_rules('service_name','Service Name','trim|required');
            $this->form_validation->set_rules('weight_id','Weight','trim|required');
            $this->form_validation->set_rules('weight_name','Weight','trim|required');
            $this->form_validation->set_rules('price','Price','trim|required');
            $this->form_validation->set_rules('pricelist_id','Price','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('quantity','Item Total Quantity','trim|required');

            if($this->form_validation->run() === FALSE) {
              $return_data = ['error' => "All Fields Required"];
              print_r(json_encode($return_data));
            }
            else {
              # Assigning to session variable
              $_SESSION['laundry']['new_order']['orders'][] = [
                'service_id' => $this->input->post('service_id'),
                'service_name' => $this->input->post('service_name'),
                'weight_id' => $this->input->post('weight_id'),
                'weight_name' => $this->input->post('weight_name'),
                'price' => $this->input->post('price'),
                'pricelist_id' => $this->input->post('pricelist_id'),
                'description' => $this->input->post('description'),
                'quantity' => $this->input->post('quantity'),
                'service_code' => $service_code,
                'array_index' => $next_array_key,
                'total_cost' => $this->input->post('price')
              ];
              @$_SESSION['laundry']['new_order']['cart_total_amount'] += $this->input->post('price');
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
            $this->form_validation->set_rules('pricelist_id','Price','trim|required');
            $this->form_validation->set_rules('item_quantity','Item Total Quantity','trim|required');

            if($this->form_validation->run() === FALSE) {
              $return_data = ['error' => "All Fields Required"];
              print_r(json_encode($return_data));
            }
            else {
              # Loading model
              $this->load->model('globals/model_retrieval');

              # Assigning to session variable
              $_SESSION['laundry']['new_order']['orders'][] = [
                'service_id' => $this->input->post('service_id'),
                'service_name' => $this->input->post('service_name'),
                'garment_id' => $this->input->post('garment_id'),
                'garment_name' => $this->input->post('garment_name'),
                'price' => $this->input->post('price'),
                'pricelist_id' => $this->input->post('pricelist_id'),
                'description' => $this->input->post('description'),
                'quantity' => $this->input->post('item_quantity'),
                'service_code' => $service_code,
                'array_index' => $next_array_key,
                'total_cost' => $this->input->post('price') * $this->input->post('item_quantity')
              ];
              @$_SESSION['laundry']['new_order']['cart_total_amount'] += ($this->input->post('price') * $this->input->post('item_quantity'));
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
        $this->form_validation->set_rules('delivery_location','Delivery Location','trim|required');
        $this->form_validation->set_rules('amount_paid','Amount Paid','trim|required');
        $this->form_validation->set_rules('change','Change Paid','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/Model_insertion');
          $this->load->model('globals/model_retrieval');
          if(isset($_SESSION['laundry']['new_order']) && !empty($_SESSION['laundry']['new_order'])) {
            //print "<pre>"; print_r($_SESSION['laundry']['new_order']); print "</pre><br/><br/>"; exit;
            # delivery price retrieve
            $dbres = self::$_Default_DB;
            $tablename = "laundry_delivery_method";
            $return_dataType = "php_object";
            $select = "price";
            $where_condition = array('id' => $this->input->post('delivery_method'));
            $delivery_price = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition); 
            # Retrieve Tax Value
            $dbres = self::$_Default_DB;
            $tablename = "settings_tax_system";
            $return_dataType = "php_object";
            $select = "MAX(id) as id";
            $where_condition = array();
            $tax_value = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);
            //print_r($tax_value); exit;
            if(empty($tax_value->id)) {
              $this->session->set_flashdata('error', 'Please Setup VAT Percent First');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
            }

            # variable declaration
            $pricelist_ids = $quantities = $unit_prices = $total_sums = $description = array();
            $delivery_price = $delivery_price->price;
            $service_cost = $_SESSION['laundry']['new_order']['cart_total_amount'];
            $total_cost = $service_cost + $delivery_price;
            $change = $this->input->post('change');
            $balance = ($change >0) ? 0 : $total_cost - $this->input->post('amount_paid');
            $client_fullname = $_SESSION['laundry']['new_order']['client']['fullname'];
            $sms_alert = $_SESSION['laundry']['new_order']['client']['sms_alert'];

            if(isset($_SESSION['laundry']['new_order']['orders']) && !empty($_SESSION['laundry']['new_order']['orders'])) {
              foreach ($_SESSION['laundry']['new_order']['orders'] as $key => $value) {
                $pricelist_ids[] = $value['pricelist_id'];
                $quantities[] = $value['quantity'];
                $unit_prices[] = $value['price'];
                $total_sums[] = $value['total_cost'];
                $description[] = $value['description'];
              }
            }
            /*********** Saving Order Info ***********/
            $order_table_info = [
              'order_number' => $this->generate_order_no(),
              'service_charge' => number_format($service_cost,2),
              'delivery_cost' => number_format($delivery_price,2),
              'total_cost' => $total_cost,
              'amount_paid' => $this->input->post('amount_paid'),
              'change_paid' => $change,
              'balance' => $balance,
              'tax_id' => $tax_value->id,
              'client_id' => $_SESSION['laundry']['new_order']['client']['id'],
              'due_date' => $this->input->post('order_due_date'),
              'processor_user_id' => $_SESSION['user']['id'],
              'delivery_method_id' => $this->input->post('delivery_method'),
              'delivery_location' => $this->input->post('delivery_location'),
              'status' => "Pending",
            ];
            $dbres = self::$_Default_DB;
            $tablename = "laundry_orders";
            
            $order_info_insert = $this->Model_insertion->datainsert($dbres,$tablename,$order_table_info);
            /*********** Saving Order Info ***********/
            /********* Saving Order DEtails **********/
            $order_details_info = [
              'order_id' => $order_info_insert,
              'pricelist_ids' => implode("|", $pricelist_ids),
              'quantities' => implode("|", $quantities),
              'unit_prices' => implode("|", $unit_prices),
              'total_sums' => implode("|", $total_sums),
              'description' => implode("|", $description),
            ];
            $dbres = self::$_Default_DB;
            $tablename = "laundry_order_details";

            $order_details_insert = $this->Model_insertion->datainsert($dbres,$tablename,$order_details_info);
            /********* Saving Order DEtails **********/
            if($order_details_insert) {
              $this->session->set_flashdata('success', "Order Saving Successful");
              $this->session->set_flashdata('order_successful', $order_info_insert);
              /******** Sending Email & SMS Notice ************/
                # Load SMS Helper
                $this->load->helper('send_sms');
                
                # Sending Sms To Client To Monitor
                $to = $_SESSION['laundry']['new_order']['client']['phone_number'];
                $message = "Dear ".$client_fullname.", Thanks for choosing our services! Your Order reference number is ".$order_table_info['order_number']; /* ." Click link below for more details ".base_url()."overview/order_details"; */

                if(!empty($sms_alert)) {
                  $sendsms = sendSMS($to,$message);

                  if(!empty($sms_result['error'])) 
                    $this->session->set_flashdata('error', $sms_result['error']);
                }
              
              /******** Sending Email & SMS Notice ************/
              unset($_SESSION['laundry']['new_order']);
              redirect($_SERVER['HTTP_REFERER']);
            }
            else {
              $this->session->set_flashdata('error', "Order Saving Failed");
              redirect($_SERVER['HTTP_REFERER']);
            }
          }
          else {
            $this->session->set_flashdata('error',"No Client Selected");
            redirect($_SERVER['HTTP_REFERER']);
          }
        }
      }
    }

    /*******************************
      Balance Payment
    *******************************/
    public function pay_balance() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      else {
        $this->form_validation->set_rules('order_id','Order','trim|required');
        $this->form_validation->set_rules('balance_paid','Balance Paid','trim|required');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/Model_insertion');
          $this->load->model('globals/model_retrieval');

          $balance = $this->input->post('balance_paid');
          # Retrieving Order Balance
          $dbres = self::$_Default_DB;
          $tablename = "vw_orderlist_summary";
          $return_dataType = "php_object";
          $select = "balance";
          $where_condition = array('id' => $this->input->post('order_id'));
          $balance_query = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);   
          if($balance_query) {
            if($balance_query->balance > $balance){
              $this->session->set_flashdata('error',"Insufficient Payment Amount");
              redirect('overview');
            }
            else{
              # storing balance data
              $dbres = self::$_Default_DB;
              $tablename = "laundry_order_balances";
              $order_balance_table = [
                'order_id' => $this->input->post('order_id'),
                'balance_paid' => $balance,
                'user_id' => $_SESSION['user']['id'],
                'status' => "Paid",
              ];
              
              $order_balance_insert = $this->Model_insertion->datainsert($dbres,$tablename,$order_balance_table);

              if($order_balance_insert)
                $this->session->set_flashdata('success',"Balance Payment Successful");
              else
                $this->session->set_flashdata('error',"Balance Payment Failed");
              
              redirect('overview');
            }
          }
          else {
            $this->session->set_flashdata('error',"Invalid Order");
            redirect('overview');
          }
        }
      }
    }

    /*******************************
      Save New Order
    *******************************/
    public function save_comment() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      else {
        $this->form_validation->set_rules('order_id','Order','trim|required');
        $this->form_validation->set_rules('comment','Order','trim|required');
        $this->form_validation->set_rules('alert_customer','Customer Alert','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors()));
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/model_insertion');
          $this->load->model('globals/model_retrieval');
          
          # variable delcarations
          $dbres = self::$_Default_DB;
          $tablename = "laundry_order_comments";
          $data = [
            'order_id' => $this->input->post('order_id'), 
            'user_id' => $_SESSION['user']['id'], 
            'comment' => $this->input->post('comment'), 
            'client_notified' => ($this->input->post('alert_customer') == "on") ? "Yes" : "No"
          ];
          //print_r); exit;
          $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);

          if($query_result) {
            $this->session->set_flashdata('success',"Comment Save Successful");
            /******* Sending SMS **********/
            $dbres = self::$_Default_DB;
            $tablename = "vw_orderlist_summary";
            $where_condition = [ 'where_condition' => array('id' => $data['order_id']) ];
            $order_details = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
            
            if(empty($order_details['DB_ERROR'])) {
              $order_details = $order_details[0];
              $sms_option = ($this->input->post('alert_customer') == "on") ? true : false;
              $to = $order_details->client_phone_no_1;
              $message = "Order ".$order_details->order_number." Comment --- ". $this->input->post('comment');
              
              if($sms_option && !empty($to)) {
                $this->load->helper('send_sms');
                $sms_result = sendSMS($to,$message);
                
                if(!empty($sms_result['error'])) 
                  $this->session->set_flashdata('error', 'Error Sending SMS');
              }
            }
            /******* Sending SMS **********/
          }
          else
            $this->session->set_flashdata('error',"Comment Save Failed");
          
          redirect($_SERVER['HTTP_REFERER']);
        }
      }
    }
  /**************** Insertions ********************/

  /**************** Retrievals  ********************/
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
          #Loading model
          $this->load->model('globals/model_retrieval');
          $search = $this->input->post('search_text');
          $dbres = self::$_Default_DB;
          /***** Search By Phone Number ********/
          if(is_numeric($search) && strlen($search) >= 10) {
            $tablename = "vw_laundry_clients";
            $where_condition = ['phone_number_1' => $search];
            $query_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$where_condition,$return_dataType="php_object");

            if($query_result) {
              $return_data = $query_result;
              $_SESSION['laundry']['new_order']['client']['phone_number'] = $query_result[0]->phone_number_1;
              $_SESSION['laundry']['new_order']['client']['id'] = $query_result[0]->id;
              $_SESSION['laundry']['new_order']['client']['fullname'] = $query_result[0]->fullname;
              $_SESSION['laundry']['new_order']['client']['sms_alert'] = $query_result[0]->sms_alert;
            }
            else {
              $return_data = array();
            }
          }
          /***** Search By Order No ********/
          else {
            /********** Order Number Search **********/
            $tablename = "laundry_orders";
            $where_condition = ['order_number' => $search];
            $query_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");

            if($query_result) {
              $client_id = $query_result->client_id;
              /********** Phone Number Search **********/
              $tablename = "vw_laundry_clients";
              $where_condition = ['id' => $client_id];
              $query_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$where_condition,$return_dataType="php_object");

              if($query_result) {
                $return_data = $query_result;
                $_SESSION['laundry']['new_order']['client']['phone_number'] = $search;
                $_SESSION['laundry']['new_order']['client']['id'] = $query_result[0]->id;
              }
              else {
                $return_data = $query_result;
              }
            }
            else {
              $return_data = array();
            }
          }

          print_r(json_encode($return_data));
        }
      }
    }

    /*******************************
      order Search
    *******************************/
    public function laundry_cart() 
    {
      if(isset($_SESSION['laundry']['new_order']['orders']) && !empty($_SESSION['laundry']['new_order']['orders'])) {
        
        foreach ($_SESSION['laundry']['new_order']['orders'] as $key => $value) {
          # code...
          $return_data[] = $value;
        }
        if(!empty($return_data))
          print_r(json_encode(array_reverse($return_data)));
        else
          print "";
      }
      else 
        print_r(json_encode($_SESSION['laundry']['new_order']['orders'] = array()));
    }

    /*******************************
      Clear Record
    *******************************/
    public function clear_record() 
    {
      # Permission Check
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) 
        $return_data = ['error' => "Permission Denied. Please Contact Admin"];
      else { 
        unset($_SESSION['laundry']['new_order']);
        $this->session->set_flashdata('success', "Record Cleared");
        
        redirect(base_url()."overview");
      }
    }

    /*******************************
      Clear Cart
    *******************************/
    public function clear_cart() 
    {
      # Permission Check
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) 
        $return_data = ['error' => "Permission Denied. Please Contact Admin"];
      else { 
        unset($_SESSION['laundry']['new_order']['orders']);
        $this->session->set_flashdata('success', "Cart Cleared");
        
        redirect(base_url()."overview");
      }
    }

    /*******************************
      Total Order Details
    *******************************/  
    public function retrieve_order($day,$display_limit) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        print_r(json_encode($return_data));
      }
      else {
        /******* Parameters Definion ********/
        if($day == "today")
          $day = gmdate('Y-m-d');
        if(!is_numeric($display_limit))
          $display_limit = "";
        /******* Parameters Definion ********/
        # loading model 
        $this->load->model('globals/model_retrieval');
        # data definition 
        $dbres = self::$_Default_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = array('DATE(date_created)' => $day, 'processor_user_id' => $_SESSION['user']['id']);
        $orderby = array('date_created'=>"desc");
        $limit = $display_limit;

        $query_result = $this->model_retrieval->return_row_orderby_limit($dbres,$tablename,$where_condition,$orderby,$limit,$return_dataType="php_object");

        if($query_result) {
          $return_data = $query_result;
        }
        else
          $return_data = array();

        print_r(json_encode($return_data));
      }
    }

    /*******************************
      Search Order By Order No
    *******************************/  
    public function search_order_by_orderno($order_number) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        print_r(json_encode($return_data));
      }
      else {
        # loading model 
        $this->load->model('globals/model_retrieval');
        # data definition 
        $dbres = self::$_Default_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = array('order_number' => $order_number,'status !=' => "Completed");

        $query_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");
        /******* Calculating Days More Before Due Date **********/
        $due_date = new DateTime($query_result->due_date);
        $today = new DateTime(gmdate('Y-m-d'));
        $interval = $today->diff($due_date);
        $date_diff = $interval->format('%R%a');
        /******* Calculating Days More Before Due Date **********/
        if($query_result) {
            $return_data[] = [
              'id' => $query_result->id,
              'order_number' => $query_result->order_number,
              'total_cost' => number_format($query_result->total_cost,2),
              'amount_paid' => number_format($query_result->amount_paid,2),
              'balance' => number_format($query_result->balance,2),
              'total_amount_paid' => number_format($query_result->total_amount_paid,2),
              'delivery_method' => $query_result->delivery_method,
              'processing_stage' => $query_result->status,
              'status' => $query_result->status,
              'date_created' => $query_result->date_created,
              'due_date' => $date_diff,
              'total_comments' =>$query_result->total_comments
            ];
        }
        else
          $return_data = array();

        print_r(json_encode(array_reverse($return_data)));
      }
    }

    /*******************************
      Search Order Details By Order No
    *******************************/  
    public function search_order_details_by_orderno($order_id,$page = null,$return_type="JSON") {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        print_r(json_encode($return_data));
      }
      else {
        # loading model 
        $this->load->model('globals/model_retrieval');
        # data definition 
        $dbres = self::$_Default_DB;
        $tablename = "laundry_order_details";
        $where_condition = array('order_id' => $order_id);
        $query_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");
        
        if(!empty($page)) {
          # code...
          $dbres = self::$_Default_DB;
          $tablename = "vw_orderlist_summary";
          $where_condition = array('id' => $order_id);
          $view_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");
        }

        if($query_result) {
          $return_data_array = array();

          $pricelists = explode('|',$query_result->pricelist_ids);
          $quantities = explode('|',$query_result->quantities);
          $unit_prices = explode('|',$query_result->unit_prices);
          $total_sums = explode('|',$query_result->total_sums);
          $descriptions = explode('|',$query_result->description);
          $status = explode('|',$query_result->service_status);
          $changed_by = explode('|',$query_result->status_change_userids);
          $change_date = explode('|',$query_result->status_change_dates);
          $total_amount = array_sum($total_sums);

          if($pricelists) {
            for ($a=0; $a < sizeof($pricelists) ; $a++) { 
              /***** Return Data Array ******/
              $dbres = self::$_Default_DB;
              $tablename = "vw_laundry_prices";
              $where_condition = array('id' => $pricelists[$a]);
              $pricelist_query_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");

              if(!empty($descriptions[$a]))
                $description = $descriptions[$a];
              else
                $description = $pricelist_query_result->garment_name;

              # Mathematics calculations
              $tax_value = (@$view_result->tax * @$total_amount) / 100;
              $sub_total = $total_amount - $tax_value;
              
              $return_data_array[] = [
                'price_list_id' => $pricelist_query_result->id,
                'service_name' => $pricelist_query_result->service_name,
                'service_code' => $pricelist_query_result->service_code,
                'description' => $description,
                'quantity' => $quantities[$a],
                'unit_price' => @$unit_prices[$a],
                'total_sums' => @$total_sums[$a],
                'status'  => @$status[$a],
                'changed_by' => @$changed_by[$a],
                'change_date' => @$change_date[$a],
                'order_number' => @$view_result->order_number,
                'date_created' => date('M d, Y',strtotime(@$view_result->date_created)),
                'due_date' => date('M d, Y',strtotime(@$view_result->due_date)),
                'tax' => @$view_result->tax,
                'tax_value' => number_format($tax_value,2),
                'subtotal' => number_format(@$sub_total,2),
                'balance' => number_format(@$view_result->balance,2),
                'amount_paid' => number_format(@$view_result->amount_paid,2),
                'client' => substr(@$view_result->client_fullname, 0, 13),
                'delivery_method' => @$view_result->delivery_method,
                'delivery_location' => substr(@$view_result->delivery_location, 0, 13),
                'delivery_cost' => number_format(@$view_result->delivery_cost,2),
                'total_cost' => number_format(@$sub_total + $tax_value + @$view_result->delivery_cost,2)
              ]; 
              /***** Return Data Array ******/
            }
            
            if(isset($return_data_array)) 
              $return_data = $return_data_array;
            else
              $return_data = array();
          }
        }
        else
          $return_data = array();

        if($return_type != "JSON")
          return $return_data;
        else
          print_r(json_encode($return_data));
      }
    }

    /*******************************
      Search Order By Telephone No
    *******************************/  
    public function search_order_by_telno($phone_number) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data = ['error' => "Permission Denied. Contact Amin"];
        print_r(json_encode($return_data));
      }
      else {
        # loading model 
        $this->load->model('globals/model_retrieval');
        # data definition 
        $dbres = self::$_Default_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = [
          'where_condition' => array('client_phone_no_1' => $phone_number),
          'where_not_in_condition' => array('status' => "Delivered,Cancelled")
        ];
        $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
        
        if($query_result) {
          for ($a=0; $a < sizeof($query_result); $a++) { 
            # code...
            @$_SESSION['laundry']['total_billing_cost'] += number_format($query_result[$a]->total_cost,2);
            @$billing_info_total_amount_paid += number_format($query_result[$a]->total_amount_paid,2);
            /******* Calculating Days More Before Due Date **********/
            $due_date = new DateTime($query_result[$a]->due_date);
            $today = new DateTime(gmdate('Y-m-d'));
            $interval = $today->diff($due_date);
            $date_diff = $interval->format('%R%a');
            /******* Calculating Days More Before Due Date **********/
            $return_data[] = [
              'id' => $query_result[$a]->id,
              'order_number' => $query_result[$a]->order_number,
              'total_cost' => number_format($query_result[$a]->total_cost,2),
              'total_amount_paid' => number_format($query_result[$a]->total_amount_paid,2),
              'balance' => number_format($query_result[$a]->balance,2),
              'delivery_location' => $query_result[$a]->delivery_method,
              'processing_stage' => $query_result[$a]->status,
              'status' => $query_result[$a]->status,
              'date_created' => $query_result[$a]->date_created,
              'due_date' => $date_diff,
              'total_comments' => $query_result[$a]->total_comments,
              'billing_info_total_cost' => @$billing_info_total_cost,
              'billing_info_total_amount_paid' => @$billing_info_total_amount_paid,
            ];

          }
          //$return_data = array_reverse($query_result);
        }
        else
          $return_data = array();

        print_r(json_encode(array_reverse($return_data)));
      }
    }
  /**************** Retrievals  ********************/

  /**************** Deletion  ********************/
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
          //print $array_index; exit;
          if(isset($_SESSION['laundry']['new_order'])) {
            @$_SESSION['laundry']['new_order']['cart_total_amount'] -= $_SESSION['laundry']['new_order']['orders'][$array_index]['total_cost'];
            unset($_SESSION['laundry']['new_order']['orders'][$array_index]);
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
        if(isset($_SESSION['laundry']['new_order']['cart_total_amount']) && !empty($_SESSION['laundry']['new_order']['cart_total_amount'])) {
          $return_data = ['total' => $_SESSION['laundry']['new_order']['cart_total_amount']];
          print_r(json_encode($return_data));
        }
      }
    }

    /*******************************
      New Order Total Cost
    *******************************/  
    public function generate_order_no() {
      $order_no = sprintf("%08d",mt_rand(1,99999999));
      # loading model
      $this->load->model('globals/model_retrieval');
      # variables declaration
      $dbres = self::$_Default_DB;
      $tablename = "laundry_orders";
      $return_dataType = "php_object";
      $select = "order_number";
      $where_condition = array('order_number'=>$order_no);
      # query results
      $query_result = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);
      if($query_result)
        $this->generate_order_no();
      else
        return $order_no;
    }
}//End of Class
