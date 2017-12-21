<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller 
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
        $data['title'] = " All Reports"; 
        $this->load->view('header',$data); 
        $this->load->view('reports',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /**************** Interface ********************/

  /**************** Data Retrieval ********************/
    /*******************************
      Retrieve Order Records 
    *******************************/
    public function fetch_order() 
    {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $return_data['error'] = "Permission Denied. Please Contact Admin";
        print_r(json_encode($return_data));
      }
      else {
        $this->form_validation->set_rules('order_type','Order Type','trim');
        $this->form_validation->set_rules('customer','Customer','trim');
        $this->form_validation->set_rules('daterange','Date Range','trim|required');

        if($this->form_validation->run() === FALSE) {
          $return_data['error'] ="Validation Error";
          print_r(json_encode($return_data));
        }
        else {

          $order_temp = $this->input->post('order_type');
          $customer_temp = $this->input->post('customer');
          $daterange_temp = $this->input->post('daterange');

          if(empty($order_temp) && empty($customer_temp)) {
            $return_data['error'] ="No Selection Made";
            print_r(json_encode($return_data)); exit;
          }

          # Loading Model 
          $this->load->model('globals/model_retrieval');

          $dbres = self::$_Views_DB;
          $tablename = "vw_orderlist_summary";
          $return_dataType = "php_object";
          /***** Defining where clauses ********/
          $order_options = [
            'No Selection' => array('status !=' => "Deleted"),
            'All Orders' => array('status !=' => "Deleted"),
            'Pending Orders' => array('status'=>"Pending"),
            'Pending Balances' => array('balance !='=>"0"),
            'Processing Orders' => array('status'=>"Processing"),
            'Dispatch Orders' => array('status'=>"Dispatch"),
            'Delivered Orders' => array('status'=>"Delivered"),
            'Cancelled Orders' => array('status'=>"Cancelled")
          ];

          $customer_options = [
            'All Customers' => array('client_id !=' => "-1"),
            'No Selection' => array('client_id !=' => "-1")
          ];

          if(array_key_exists($order_temp, $order_options)) 
            $order = $order_options[$order_temp];

          if(array_key_exists($customer_temp, $customer_options))
            $customer = $customer_options[$customer_temp];
          else
            $customer = array('client_id'=>$customer_temp);
          
          $where_condition = array_merge($order,$customer);
          /***** Defining where clauses ********/
          $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$where_condition); 
          
          if($query_result) 
            $return_data = $query_result;
          else 
            $return_data = array();
          
          print_r(json_encode($return_data));
        }
      }
    }
  /**************** Data Retrieval ********************/
    public function printout() 
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
        $data['title'] = " Reports"; 
        $this->load->view('printout',$data); 
        /***************** Interface *****************/
      }
    }
  
}//End of Class
