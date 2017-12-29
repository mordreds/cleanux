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

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/Model_insertion');
          $this->load->model('globals/model_retrieval');
          if(isset($_SESSION['laundry']['new_order']) && !empty($_SESSION['laundry']['new_order'])) {
            //print "<pre>"; print_r($_SESSION['laundry']['new_order']); print "</pre><br/><br/>";
            # delivery price retrieve
            $dbres = self::$_Default_DB;
            $tablename = "laundry_delivery_method";
            $return_dataType = "php_object";
            $select = "price";
            $where_condition = array('id' => $this->input->post('delivery_method'));
            $delivery_price = $this->model_retrieval->select_where_returnRow($dbres,$tablename,$return_dataType,$select,$where_condition);   
            # variable declaration
            $pricelist_ids = $quantities = $unit_prices = $total_sums = $description = array();
            $delivery_price = $delivery_price->price;
            $total_cost = $_SESSION['laundry']['new_order']['cart_total_amount'] + $delivery_price;
            $balance = $total_cost - $this->input->post('amount_paid');

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
              'total_cost' => $total_cost,
              'amount_paid' => $this->input->post('amount_paid'),
              'balance' => $balance,
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
              unset($_SESSION['laundry']['new_order']);
              $this->session->set_flashdata('success', "Order Saving Successful");
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
          $dbres = self::$_Views_DB;
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

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else {
          # Loading Model 
          $this->load->model('globals/model_insertion');
          
          # variable delcarations
          $dbres = self::$_Default_DB;
          $tablename = "laundry_order_comments";
          $data = [
            'order_id' => $this->input->post('order_id'), 
            'user_id' => $_SESSION['user']['id'], 
            'comment' => $this->input->post('comment'), 
          ];

          $query_result = $this->model_insertion->datainsert($dbres,$tablename,$data);

          if($query_result)
            $this->session->set_flashdata('success',"Comment Save Successful");
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
            $tablename = "laundry_clients";
            $where_condition = ['phone_number_1' => $search];
            $query_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$where_condition,$return_dataType="php_object");

            if($query_result) {
              $return_data = $query_result;
              $_SESSION['laundry']['new_order']['client']['phone_number'] = $query_result[0]->phone_number_1;
              $_SESSION['laundry']['new_order']['client']['id'] = $query_result[0]->id;
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
              $tablename = "laundry_clients";
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
      Clear Chart
    *******************************/
    public function clear_cart() 
    {
      # Permission Check
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) 
        $return_data = ['error' => "Permission Denied. Please Contact Admin"];
      else { 
        unset($_SESSION['laundry']['new_order']);
        $return_data = ['success' => "Cart Cleared"];
      }

      print_r(json_encode($return_data));
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
        $dbres = self::$_Views_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = array('DATE(date_created)' => $day, '');
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
        $dbres = self::$_Views_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = array('order_number' => $order_number,'status !=' => "Completed");

        $query_result = $this->model_retrieval->all_info_return_row($dbres,$tablename,$where_condition,$return_dataType="php_object");
        //print_r($query_result);
        if($query_result) {
            $return_data[] = [
              'id' => $query_result->id,
              'order_number' => $query_result->order_number,
              'total_cost' => number_format($query_result->total_cost,2),
              'amount_paid' => number_format($query_result->amount_paid,2),
              'balance' => number_format($query_result->balance,2),
              'delivery_method' => $query_result->delivery_method,
              'processing_stage' => $query_result->status,
              'status' => $query_result->status,
              'date_created' => $query_result->date_created,
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
    public function search_order_details_by_orderno($order_id,$page = null) {
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
          $dbres = self::$_Views_DB;
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

              $return_data_array[] = [
                'service_name' => $pricelist_query_result->service_name,
                'description' => $description,
                'quantity' => $quantities[$a],
                'unit_price' => $unit_prices[$a],
                'total_sums' => $total_sums[$a],
                'status'  => @$status[$a],
                'changed_by' => @$changed_by[$a],
                'change_date' => @$change_date[$a],
                'order_number' => @$view_result->order_number,
                'date_created' => date('M d, Y',strtotime(@$view_result->date_created)),
                'due_date' => date('M d, Y',strtotime(@$view_result->due_date)),
                'total_cost' => number_format(@$view_result->total_cost,2),
                'client' => @$view_result->client_fullname,
                'tax' => @$view_result->tax,
                'tax_value' => number_format((@$view_result->tax * $view_result->total_cost)/100,2),
                'delivery_method' => @$view_result->delivery_method
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
        $dbres = self::$_Views_DB;
        $tablename = "vw_orderlist_summary";
        $where_condition = "status Not In ('Delivered','Cancelled') AND client_phone_no_1 = $phone_number";
        $query_result = $this->model_retrieval->all_info_return_result($dbres,$tablename,$where_condition,$return_dataType="php_object");

        if($query_result) {
          for ($a=0; $a < sizeof($query_result); $a++) { 
            # code...
            $return_data[] = [
              'id' => $query_result[$a]->id,
              'order_number' => $query_result[$a]->order_number,
              'total_cost' => number_format($query_result[$a]->total_cost,2),
              'amount_paid' => number_format($query_result[$a]->amount_paid,2),
              'balance' => number_format($query_result[$a]->balance,2),
              'delivery_location' => $query_result[$a]->delivery_method,
              'processing_stage' => $query_result[$a]->status,
              'status' => $query_result[$a]->status,
              'date_created' => $query_result[$a]->date_created,
              'total_comments' => $query_result[$a]->total_comments
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
            @$_SESSION['laundry']['new_order']['cart_total_amount'] -= $_SESSION['laundry']['new_order']['orders'][$array_index]['total_cost'];
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
