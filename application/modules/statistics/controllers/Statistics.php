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
          $data['_Default_DB'] = self::$_Default_DB;
          $data['page_controller'] = $this->uri->segment(1);
          $data['controller_function'] = $this->uri->segment(2);
        /****** Required Parameters To Render A Page ******/

        /****** Additional Functions  ****************/
          # Including Controller Overview
            require_once(APPPATH.'modules/overview/controllers/Overview.php');
            $overview_controller = new Overview();
           
          # Global Variable Declaration
            $dbres = self::$_Default_DB;
            $return_dataType="php_object";
            $all_weekly_sales = $weekly_orders = $services_count = array();
          
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

          # Total Awaiting Orders
            $condition = [
              'where_condition' => array('status' => 'Dispatch')
            ];
            $awaiting_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            if(!isset($awaiting_orders['DB_ERROR']))
              $data['awaiting_orders'] = sizeof($awaiting_orders);
            else
              $data['awaiting_orders'] = 0;

          # Total Delivered Orders
            $condition = [
              'where_condition' => array('status' => 'Delivered')
            ];
            $delivered_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            if(!isset($delivered_orders['DB_ERROR']))
              $data['delivered_orders'] = sizeof($delivered_orders);
            else
              $data['delivered_orders'] = 0;
          
          # Total Daily Orders Recieved
            $condition  = [
              'where_condition' =>  array('DATE(date_created)' => gmdate('Y-m-d'))
            ];
            $daily_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!isset($daily_orders['DB_ERROR'])) {
              $data['daily_orders'] = sizeof($daily_orders);
              $total_cash = 0;
              foreach ($daily_orders as $order) {
                $total_cash += $order->amount_paid;
              }
              $data['total_cash'] = $total_cash;
            }
            else 
              $data['daily_orders'] = 0;
            
          
          # Total Monthly Orders
            $condition = [
              'where_condition' => array('Month(date_created)' => gmdate('m'))
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
          
          # Retrieving all services
            $tablename = "laundry_services";
            $condition = [
              'fields' => array('id','name','code'),
              'where_condition' => array('status' => "active")
            ];
            $all_services = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(!empty($all_services)) {
              foreach ($all_services as $value) {
                @$services_ref[$value->id] = $value->name;
              }
            }

          # Total Monthly Services Stats
            if(!empty($monthly_orders)) {
              foreach ($monthly_orders as $order) {
                $full_order_details = $overview_controller->search_order_details_by_orderno($order->id,null,$return_dataType); 
                
                foreach ($full_order_details as $key => $value) {
                  if(array_key_exists($value['service_name'], @$services_count)) 
                    $services_count["'".$value['service_name']."'"] += 1;
                  else
                    $services_count["'".$value['service_name']."'"] = 1;
                }
              }
            }
            
          # Retrieving all services thru prices
            $tablename = "vw_laundry_prices";
            $condition = [
              'where_condition' => array('status' => "active")
            ];
            $all_prices = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
            
            if(isset($all_prices['DB_ERROR'])) 
              $this->session->set_flashdata('error', $all_prices['DB_ERROR']);
            else {
              foreach ($all_prices as $prices) { $services_array[$prices->id] = array('code' => $prices->service_code, 'name' => $prices->service_name); }
            }

          # Setting Weekly Dates
            $weekstart = date('Y-m-d',strtotime('monday this week'));
            $weekstop = date('Y-m-d',strtotime('sunday this week 23:59:59'));
            $forloop_start = str_replace('-', '', $weekstart);
            $forloop_stop = str_replace('-', '', $weekstop);

            for ($weekstart; $weekstart < $weekstop ; $weekstart = date_add($weekstart,strtotime("+1 day"))) {
              print $weekstart."<br/><br/>";
            }
            exit;
          # Retrieving data from weekly date
            $tablename = "vw_orderlist_summary";
            
           /* for($forloop_start; $forloop_start <= $forloop_stop; $forloop_start++) {
              $search_date = date('Y-m-d',strtotime($forloop_start));
              $condition = [
                'where_condition' => array('DATE(date_created)' => $search_date)
              ];
              $adays_record = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
             
              # Querying Order Details
              $array_search_key = date('l',strtotime($search_date));

              if(!empty($adays_record)) {
                foreach ($adays_record as $adays_order) {
                  $condition = [
                    'where_condition' => array('order_id' => $adays_order->id),
                  ];
                  $record_details = $overview_controller->search_order_details_by_orderno($adays_order->id,NULL,$return_dataType);
                  
                  foreach ($record_details as $record) {
                    $service_name = $record['service_name'];
                    $services_ordered[$service_name] = 1;

                    if(@array_key_exists($array_search_key, $weekly_orders[$service_name])) 
                      $weekly_orders[$service_name][$array_search_key] += $record['total_sums'];
                    else
                      $weekly_orders[$service_name][$array_search_key] = ($record['total_sums']) ? $record['total_sums'] : 0;
                  }
                }
              }
              # Data Syncing & Reconciliation From Empty Transaction
              else {
                if(!empty($services_ordered))
                foreach ($services_ordered as $key => $value) {
                  $weekly_orders[$key][$array_search_key] = 0;
                }
              }
            }*/
            //print "<pre>"; print_r($weekly_orders); print "</pre>"; exit;
        /****** Additional Functions  ****************/  

        /***************** Interface *****************/
          $data['title'] = "Statistics"; 
          $data['monthly_services_count'] = $services_count;
          $data['weekly_report'] = $weekly_orders;
          //print "<pre>"; print_r($data); print "</pre> <br/><br/>";exit;
          $this->load->view('header',$data); 
          $this->load->view('statistics',$data); 
          $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  /**************** Interface ********************/
    
    
}//End of Class
