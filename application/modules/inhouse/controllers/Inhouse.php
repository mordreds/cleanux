<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inhouse extends MX_Controller 
{
   /*******************************
      Constructor 
    *******************************/
    public function __construct() 
    {
      parent::__construct();
    }

  /**************** Interface ********************/
    public function index() 
    {
      # Permission Check
      if(!isset($_SESSION['user']['username']))
        redirect('access');

      elseif (!in_array('inhouse', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', "Permission Denied. Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      
      else {
        
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        
        # Total Pending Orders
          $condition = array('status' => 'Pending');
          $data['pending_orders'] = $this->order_status($condition);
        
        # Total Processing Orders
          $condition = array('status' => 'Processing');
          $data['processing_orders'] = $this->order_status($condition);
        
        # Total Cancelled Orders
          $condition = array('status' => 'Cancelled');
          $data['cancelled_orders'] = $this->order_status($condition);
         
        # Total Overdue Orders
          $condition = array('due_date <' => gmdate('Y-m-d'), 'status !=' => 'Delivered');
          $data['overdue_orders'] = $this->order_status($condition);

        /****** Required Parameters To Render A Page ******/
        $data['_Default_DB'] = self::$_Default_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2);
        /****** Required Parameters To Render A Page ******/

        /***************** Interface *****************/
        $data['title'] = "Inhouse"; 
        $this->load->view('header',$data); 
        $this->load->view('inhouse',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }

    public function cancelled_orders() 
    {
      # Permission Check
      if(!isset($_SESSION['user']['username']))
        redirect('access');

      elseif (!in_array('inhouse', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', "Permission Denied. Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      
      else
      {
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        
        /****** Required Parameters To Render A Page ******/
        $data['_Default_DB'] = self::$_Default_DB;
        $data['page_controller'] = $this->uri->segment(1);
        $data['controller_function'] = $this->uri->segment(2);
        /****** Required Parameters To Render A Page ******/

        /***************** Interface *****************/
        $data['title'] = "Inhouse"; 
        $this->load->view('header',$data); 
        $this->load->view('cancelled_orders',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /**************** Interface ********************/

  /**************** Data Retrieval ********************/
    /*******************************
      Order Comments 
    *******************************/
    public function retrieve_comments() 
    {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data['error'] = "Permission Denied. Please Contact Admin";
        print_r(json_encode($return_data));
      }
      else {
        $this->form_validation->set_rules('order_id','Order','trim|required');

        if($this->form_validation->run() === FALSE) {
          $return_data['error'] ="Validation Error";
          print_r(json_encode($return_data));
        }
        else {
          # Loading Model 
          $this->load->model('globals/model_retrieval');

          $dbres = self::$_Default_DB;
          $tablename = "vw_laundry_order_comments";
          $where_condition = [
            'where_condition' => array('order_id' => $this->input->post('order_id'))
          ];
          $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 
          if($query_result) 
            $return_data = $query_result;
          else 
            $return_data = array();
          
          print_r(json_encode($return_data));
        }
      }
    }
  /**************** Data Retrieval ********************/

  /**************** Data Insertion ********************/
    /*******************************
      Order Completed
    *******************************/
    public function order_complete() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect('inhouse');
      }
      else {
        $this->form_validation->set_rules('dispatch_order_id','Order','trim|required');
        $this->form_validation->set_rules('status','Order','trim');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('inhouse');
        }
        else {
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('dispatch_order_id');
          if($this->input->post('status')) {
            $status = $this->input->post('status');
            $success_msg = "Status Changed";
            $error_msg = "Status Changing Failed";
            $response = "ajax";
          }
          else {
            $status = "Dispatch";
            $success_msg = "Order Moved For Dispatch";
            $error_msg = "Moving Order Failed";
            $response = "post";
          }
          $dbres = self::$_Default_DB;
          $tablename = "laundry_orders";
          $update_data = ['status' => $status, 'modified_by' => $_SESSION['user']['id'], 'modified_date'=>gmdate('Y-m-d H:i:s')];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          $where_condition = ['id' => $id];
          /***** Data Definition *****/
          $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$update_data,$where_condition) ;
        
          if($response == "post") {
            if($query_result)
              $this->session->set_flashdata('success', $success_msg);
            else
              $this->session->set_flashdata('error', $error_msg);

            redirect('inhouse');
          }
          else if($response = "ajax") {
            if($query_result)
              $return_data['success'] = "Status Changed";
            else
              $return_data['error'] = "Status Failed";

            print_r(json_encode($return_data));
          }
          
        }
      }
    }

    /*******************************
      Order Delivered
    *******************************/
    public function order_delivered() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect('inhouse');
      }
      else {
        $this->form_validation->set_rules('delivery_order_id','Order','trim|required');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('dispatch');
        }
        else {
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('delivery_order_id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_orders";
          $update_data = ['status' => "Delivered"];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          $where_condition = ['id' => $id];
          /***** Data Definition *****/
          $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$update_data,$where_condition) ;
        
          if($query_result)
            $this->session->set_flashdata('success', "Delivery Confirmed");
          else
            $this->session->set_flashdata('error', "Confirm Delivery Failed");

          redirect('dispatch');
        }
      }
    }





    /*******************************
      Change Order Status
    *******************************/
    public function change_order_status($response_type) {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect('inhouse');
      }
      else {
        $this->form_validation->set_rules('order_id','Order Number','trim|required');
        $this->form_validation->set_rules('status','Status','trim|required');
        $this->form_validation->set_rules('reason_for_cancel','Reason For Cancelling','trim|required');

        if($this->form_validation->run() === FALSE) {
          if($response_type = "async"){
            $return_data['error'] = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());;
            print_r(json_encode($return_data));
          }
          else if($response_type = "sync") {
            $error_msg = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
            $this->session->set_flashdata('error',$error_msg);
            redirect('inhouse');
          }
        }
        else {
          $this->load->model('globals/model_update');
          /********** Data Definition **********/
          $dbres = self::$_Default_DB;
          $tablename = "laundry_orders";
          $update_data = [
            'status' => $this->input->post('status'), 
            'modified_by' => $_SESSION['user']['id'], 
            'modified_date'=>gmdate('Y-m-d H:i:s'),
            'reason_for_cancel' => $this->input->post('reason_for_cancel')
          ];
          $where_condition = ['id' => $this->input->post('order_id')];
          if($response_type = "sync")
            $return_dataType = "php_object";
          else if($response_type = "async")
            $return_dataType = "json";
          /********** Data Definition **********/
          $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$update_data,$where_condition) ;
        
          if($response_type == "sync") {
            if($query_result)
              $this->session->set_flashdata('success', "Successful");
            else
              $this->session->set_flashdata('error', "Action Failed");

            redirect($_SERVER['HTTP_REFERER']);
          }
          else if($response = "async") {
            if($query_result)
              $return_data['success'] = "Status Changed";
            else
              $return_data['error'] = "Action Failed";

            print_r(json_encode($return_data));
          }
          
        }
      }
    }
  /**************** Data Insertion ********************/


  /************ Optimization Functions ****************/
  public function order_status($status = array(), $return_dataType = "php_object") {
    # loading models
      $this->load->model('globals/model_retrieval');

    # Params Definition
    $dbres = self::$_Default_DB;
    $tablename = "vw_orderlist_summary";
    $condition = [
      'where_condition' => $status
    ];
    
    $cancelled_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
    
    if($return_dataType == "json") {
      print_r(json_encode($return_data));
      exit;
    }
    else {
      if(!isset($cancelled_orders['DB_ERROR']))
        $return_data = (empty($cancelled_orders)) ? 0 : sizeof($cancelled_orders);
      else
        $return_data = 0;

      return $return_data;
    }
  }
  /************ Optimization Functions ****************/

    
}//End of Class
