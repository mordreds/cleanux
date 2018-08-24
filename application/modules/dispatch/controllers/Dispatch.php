<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispatch extends MX_Controller 
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

      elseif (!in_array('dispatch', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', "Permission Denied. Contact Admin");
        redirect($_SERVER['HTTP_REFERER']);
      }
      
      else {
        /****** Required Parameters To Render A Page ******/
          $this->load->model('access/model_access');
          $this->load->model('globals/model_retrieval');
          $data['_Default_DB'] = self::$_Default_DB;
        /****** Required Parameters To Render A Page ******/

        # Global Variable Declaration
          $dbres = self::$_Default_DB;
          $return_dataType="php_object";
          $tablename = "vw_orderlist_summary";

        # Total Delivered Orders
          $condition = [
            'where_condition' => array('status' => 'Delivered')
          ];
          $delivered_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);

          if(!isset($delivered_orders['DB_ERROR']))
            $data['delivered_orders'] = (empty($delivered_orders)) ? 0 : sizeof($delivered_orders);
          else
            $data['delivered_orders'] = 0;

        /***************** Interface *****************/
          $data['page_controller'] = $this->uri->segment(1);
          $data['controller_function'] = $this->uri->segment(2);
          $data['title'] = "Dispatch"; 

          $this->load->view('header',$data); 
          $this->load->view('dispatch',$data); 
          $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
    
    /*******************************
      Index Function
    *******************************/
    public function delivered() { 
      # Permission Check
       if(!isset($_SESSION['user']['username']))
        redirect('access/login');
      else if(!in_array('dispatch', $_SESSION['user']['roles'])) {
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
        
        /***************** Interface *****************/
        $data['title'] = "Delivered Orders"; 

        $this->load->view('header',$data); 
        $this->load->view('delivered',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
    
}//End of Class
