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
          $this->load->library('../../overview/controllers/overview');
          $data['_Default_DB'] = self::$_Default_DB;
           $data['page_controller'] = $this->uri->segment(1);
           $data['controller_function'] = $this->uri->segment(2);
        /****** Required Parameters To Render A Page ******/

        /****** Additional Functions  ****************/
          # Global Variable Declaration
            $dbres = self::$_Default_DB;
            $return_dataType="php_object";
            $all_weekly_sales = array();
          
          # Total Users Count 
            $tablename = "vw_user_details";
            $condition = [
              'where_condition' => array('group_name !=' => "System"),
            ];

            $total_users = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!isset($total_users['DB_ERROR']))
              $data['total_users'] = sizeof($total_users);
            else
              $data['total_users'] = 0;
          
          # Total Clients Count
            $tablename = "laundry_clients";
            $condition = array();
            $total_customers = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            if(!isset($total_customers['DB_ERROR']))
              $data['total_customers'] = sizeof($total_customers);
            else
              $data['total_customers'] = 0;
            
            $tablename = "vw_orderlist_summary";
          
          # Total Pending Orders
            $condition = [
              'wherein_condition' => array('status' => 'Pending,Processing')
            ];
            $pending_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            if(!isset($pending_orders['DB_ERROR']))
              $data['pending_orders'] = sizeof($pending_orders);
            else
              $data['pending_orders'] = 0;
          
          # Total Daily Orders Recieved
            $condition  = [
              'where_condition' =>  array('DATE(date_created)' => gmdate('Y-m-d'))
            ];
            $daily_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!isset($daily_orders['DB_ERROR']))
              $data['daily_orders'] = sizeof($daily_orders);
            else
              $data['daily_orders'] = 0;
          
          # Total Monthly Orders
            $condition = [
              'where_condition' => array('Month(date_created)' => gmdate('m'), 'status' => "Delivered")
            ];
            $monthly_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!isset($monthly_orders['DB_ERROR']))
              $data['monthly_orders'] = sizeof($monthly_orders);
            else
              $data['monthly_orders'] = 0;
          
          # Total Overdue Orders
            $condition = [
              'where_condition' => array('due_date <' => 'Now()', 'status !=' => 'Delivered')
            ];
            $overdue_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!isset($overdue_orders['DB_ERROR']))
              $data['overdue_orders'] = sizeof($overdue_orders);
            else
              $data['overdue_orders'] = 0;

          # Total Monthly Services Stats
            if(!empty($monthly_orders)) {
              $services_count = array();
              foreach ($monthly_orders as $order) {
                $full_order_details = $this->overview->search_order_details_by_orderno($order->id,null,"PHP"); 
                
                foreach ($full_order_details as $key => $value) {
                  if(array_key_exists($value['service_name'], @$services_count)) 
                    $services_count["'".$value['service_name']."'"] += 1;
                  else
                    $services_count["'".$value['service_name']."'"] = 1;
                }
              }
            }
            $data['monthly_services_count'] = $services_count;
          
          # Retrieving all services into array
            $tablename = "vw_laundry_prices";
            $condition = [
              'fields' => array('id','service_name'),
              'where_condition' => array('status' => "active")
            ];
            $all_prices = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(isset($all_prices['DB_ERROR'])) 
              $this->session->set_flashdata('error', $all_prices['DB_ERROR']);
            else {
              foreach ($all_prices as $prices) { $services_array[$prices->id] = $prices->service_name; }
            }
            
          /*# Total Weekly Services Stats
            if(!empty($weekly_orders)) {
              $weekly_orders = array();
              foreach ($weekly_orders as $order) {
                $full_order_details = $this->overview->search_order_details_by_orderno($order->id,null,"PHP"); 
                
                foreach ($full_order_details as $key => $value) {
                  if(array_key_exists($value['service_name'], @$weekly_orders)) 
                    $weekly_orders["'".$value['service_name']."'"] += 1;
                  else
                    $weekly_orders["'".$value['service_name']."'"] = 1;
                }
              }
          }*/
          
          # Setting Weekly Dates
            $weekstart = date('Y-m-d',strtotime('monday this week'));
            $weekstop = date('Y-m-d',strtotime('sunday this week 23:59:59'));
            $forloop_start = str_replace('-', '', $weekstart);
            $forloop_stop = str_replace('-', '', $weekstop);

          # Retrieving data from weekly date
            $tablename = "vw_orderlist_summary";

            for($forloop_start; $forloop_start <= $forloop_stop; $forloop_start++) {
              $search_date = date('Y-m-d',strtotime($forloop_start));
              $condition = [
                'where_condition' => array('DATE(date_created)' => $search_date , 'status !=' => "Delivered")
              ];
              $a_days_record = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
              
              if(!empty($a_days_record)) {
                # Querying Order Details
                $tablename_2 = "laundry_order_details";
                foreach ($a_days_record as $week_orders) {
                  $condition = [
                    'where_condition' => array('order_id' => $week_orders->id),
                  ];
                  $record_details = $this->model_retrieval->retrieve_allinfo($dbres,$tablename_2,$condition,$return_dataType);

                  if(!empty($record_details)) {
                    $temp_price_list = explode('|', $record_details[0]->pricelist_ids);
                    if(!empty($temp_price_list)) {
                      foreach ($temp_price_list as $price) {
                        if(array_key_exists($price, $services_array))
                      }
                    }
                  }
                }
              }

              //print date('l',strtotime($forloop_start))."<br/><br/> ";

              //print "<pre>"; print_r($orders); print "</pre> <br/><br/>";
            }
            exit;
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
