<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends MX_Controller 
{
  /*******************************
    Constructor 
  *******************************/
  public function __construct() 
  {
    parent::__construct();
  }

  /**************** Interface ********************/
    public function index() {
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
          $return_dataType="php_object";
          # Total Users
          $dbres = self::$_Permission_DB;
          $tablename = "vw_user_details";
          $condition = "id not in (1,2)";
          $total_users = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
          if(!isset($total_users['DB_ERROR']))
            $data['total_users'] = sizeof($total_users);
          else
            $data['total_users'] = 0;
          # Total Clients
          $dbres = self::$_Default_DB;
          $tablename = "laundry_clients";
          $condition = array();
          $total_customers = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
          if(!isset($total_customers['DB_ERROR']))
            $data['total_customers'] = sizeof($total_customers);
          else
            $data['total_customers'] = 0;
          # Total Pending Orders
          $dbres = self::$_Views_DB;
          $tablename = "vw_orderlist_summary";
          $condition = array('status' => "Pending");
          $pending_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
          if(!isset($pending_orders['DB_ERROR']))
            $data['pending_orders'] = sizeof($pending_orders);
          else
            $data['pending_orders'] = 0;
          # Total Monthly Orders
          $dbres = self::$_Views_DB;
          $tablename = "vw_orderlist_summary";
          $condition = "Month(date_created) = ".gmdate('m')." And status ='Delivered'";
          $month_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$return_dataType,$condition);
          if(!isset($month_orders['DB_ERROR']))
            $data['month_orders'] = sizeof($month_orders);
          else
            $data['month_orders'] = 0;

        /****** Additional Functions  ****************/

        /***************** Interface *****************/
        $data['title'] = "Statistics"; 
        $this->load->view('header',$data); 
        $this->load->view('statistics',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /**************** Interface ********************/
    
    
}//End of Class
