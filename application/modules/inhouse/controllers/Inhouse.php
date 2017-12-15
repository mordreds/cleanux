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
        $data['title'] = "Inhouse"; 
        $this->load->view('header',$data); 
        $this->load->view('inhouse',$data); 
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

          $dbres = self::$_Views_DB;
          $tablename = "vw_laundry_order_comments";
          $return_dataType = "php_object";
          $where_condition = array('order_id' => $this->input->post('order_id'));
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

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error',"Validation Error");
          redirect('inhouse');
        }
        else {
          $this->load->model('globals/model_update');
          /***** Data Definition *****/
          $id = $this->input->post('dispatch_order_id');
          $dbres = self::$_Default_DB;
          $tablename = "laundry_orders";
          $update_data = ['status' => "Dispatch", 'modified_by' => $_SESSION['user']['id']];
          $return_dataType="php_object";
          $delete_confirmed = $this->input->post('delete_item');
          $where_condition = ['id' => $id];
          /***** Data Definition *****/
          $query_result = $this->model_update->update_info($dbres,$tablename,$return_dataType,$update_data,$where_condition) ;
        
          if($query_result)
            $this->session->set_flashdata('success', "Order Moved For Dispatch");
          else
            $this->session->set_flashdata('error', "Moving Order Failed");

          redirect('inhouse');
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
  /**************** Data Insertion ********************/
    
    
}//End of Class
