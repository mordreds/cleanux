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
    /*******************************
      index interface
    *******************************/
    public function index() {
      if(empty($_SESSION['user']['username']))
        redirect('access');
      
      elseif(!in_array('reports', $_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error', "Permission Denied. Contact Admin");
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

        /****** Additional Functions  ****************/
          # Including Controller Overview
            require_once(APPPATH.'modules/overview/controllers/Overview.php');
            $overview_controller = new Overview();
           
          # Global Variable Declaration
            $dbres = self::$_Default_DB;
            $return_dataType="php_object";
            $all_weekly_sales = $weekly_orders = $services_count = array();
            $tablename = "vw_orderlist_summary";
            $laundry_orders = "laundry_orders";
    
          # Total Monthly Orders
            $months = array_reverse(array(
              1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
              5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
              9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
            ),TRUE);
            $current_month = gmdate('F');
            $months = array_splice($months,(12 - gmdate('m')),12,TRUE); 
            
            foreach ($months as $key => $month_name) {
              # Total Number Of Orders
                $condition = [
                  'where_condition' => array('Month(date_created)' => gmdate('m',strtotime($month_name)))
                ];
                $monthly_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
                
                if(!isset($monthly_orders['DB_ERROR']))
                  $data['monthly_stat'][$month_name]['total_orders'] = sizeof($monthly_orders);
                else
                  $data['monthly_stat'][$month_name]['total_orders'] = 0;
              # Total Number Of Orders

              # Total Pending Orders
                $condition = [
                  'wherein_condition' => array('status' => 'Pending,Processing','Month(date_created)' => gmdate('m',strtotime($month_name)))
                ];
                //print "<pre>"; print_r($condition); print "</pre>"; print "<br/><br/>";
                $pending_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
                if(!isset($pending_orders['DB_ERROR']))
                  $data['monthly_stat'][$month_name]['pending_orders'] = (empty($pending_orders)) ? 0 : sizeof($pending_orders);
                else
                  $data['monthly_stat'][$month_name]['pending_orders'] = 0;
              # Total Pending Orders

              # Total Overdue Orders
                $condition = [
                  'where_condition' => array('Month(due_date) ' => gmdate('m',strtotime($month_name)), 'status !=' => 'Delivered')
                ];
                //print "<pre>"; print_r($condition); print "</pre>"; print "<br/><br/>";
                $overdue_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
                
                if(!isset($overdue_orders['DB_ERROR']))
                  $data['monthly_stat'][$month_name]['overdue_orders'] = sizeof($overdue_orders);
                else
                  $data['monthly_stat'][$month_name]['overdue_orders'] = 0;
                
              # Total Delivered Orders
                $condition = [
                  'where_condition' => array('status' => 'Delivered','Month(date_created)' => gmdate('m',strtotime($month_name)))
                ];
                //print "<pre>"; print_r($condition); print "</pre>"; print "<br/><br/>";
                $delivered_orders = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType);
                if(!isset($delivered_orders['DB_ERROR']))
                  $data['monthly_stat'][$month_name]['delivered_orders'] = (empty($pending_orders)) ? 0 : sizeof($delivered_orders);
                else
                  $data['monthly_stat'][$month_name]['delivered_orders'] = 0;
              # Total Delivered Orders

              # Total Cash Recieved in the month
                $condition = [
                  'fields' => array('service_charge','tax_value','delivery_cost'),
                  'where_condition' => array('Month(date_created)' => gmdate('m',strtotime($month_name)))
                ];
                $monthly_cash_received = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
               
                # Computing Balances Paid today
                $condition = [
                  'fields' => array('balance_paid'),
                  'where_condition' => array('Month(balance_payment_date)' => gmdate('m',strtotime($month_name)))
                ];
                $balance_paid_today = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
                
                if(!isset($monthly_cash_received['DB_ERROR']) && !isset($balance_paid_today['DB_ERROR'])) {
                  $temp_store_1 = array_merge($monthly_cash_received,$balance_paid_today);
                  foreach ($temp_store_1 as $value) {
                    $delivery_cost = (empty(@$value->delivery_cost)) ? 0 : @$value->delivery_cost;
                    $amount_paid = (empty(@$value->service_charge)) ? 0 : @$value->service_charge;
                    $balance_paid = (empty(@$value->balance_paid)) ? 0 : @$value->balance_paid;
                    $tax_payable = (empty(@$value->tax_value)) ? 0 : @$value->tax_value;
                    
                    @$data['monthly_stat'][$month_name]['total_cash'] += $amount_paid + $balance_paid;
                    @$data['monthly_stat'][$month_name]['tax_payable'] += $tax_payable;
                    @$data['monthly_stat'][$month_name]['total_delivery_cash'] += $delivery_cost;
                  }
                  
                  if(empty($data['monthly_stat'][$month_name]['total_cash']))
                    $data['monthly_stat'][$month_name]['total_cash'] = 0;
                  if(empty($data['monthly_stat'][$month_name]['tax_payable']))
                    $data['monthly_stat'][$month_name]['tax_payable'] = 0;
                  if(empty($data['monthly_stat'][$month_name]['total_delivery_cash']))
                    $data['monthly_stat'][$month_name]['total_delivery_cash'] = 0;
                }
                else {
                  $data['monthly_stat'][$month_name]['total_cash'] = 0;
                  $data['monthly_stat'][$month_name]['tax_payable'] = 0;
                }

                //print "<pre>"; print_r($data['monthly_stat'][$month_name]); print "</pre> <br/><br/>";
              # Total Cash in the month

              # Total Clients Count
                $client_tablename = "laundry_clients";
                $condition = [
                  'where_condition' => array('status' => 'active','Month(date_created)' => gmdate('m',strtotime($month_name)))
                ];
                //print "<pre>"; print_r($condition);  print "</pre>"; print "<br/><br/>";
                $total_customers = $this->model_retrieval->retrieve_allinfo($dbres,$client_tablename,$condition,$return_dataType);
                if(!isset($total_customers['DB_ERROR']))
                  $data['monthly_stat'][$month_name]['new_customers'] = (empty($pending_orders)) ? 0 : sizeof($total_customers);
                else
                  $data['monthly_stat'][$month_name]['new_customers'] = 0;
            }
          
          
          /*
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
                    $services_count[$value['service_name']] += $value['total_sums'];
                  else 
                    $services_count[$value['service_name']] = 1;
                }
              }
            }
            else {
              $services_count['Empty Data'] = 1;
              $services_count['Empty Data'] = 1;
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
              foreach ($all_prices as $prices) { 
                $services_array[$prices->id] = array('code' => $prices->service_code, 'name' => $prices->service_name); 
              }
            }

          # Setting Weekly Dates
            $weekstart = $forloop_start = date('Y-m-d',strtotime('monday this week'));
            $weekstop = $forloop_stop = date('Y-m-d',strtotime('sunday this week 23:59:59'));

          # Retrieving data from weekly date
            $tablename = "vw_orderlist_summary";

            while ($forloop_start <= $forloop_stop) {
              $search_date = $forloop_start;
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
                if(!empty($services_ordered)) {
                  foreach ($services_ordered as $key => $value) {
                    $weekly_orders[$key][$array_search_key] = 0;
                  }
                }
              }

              $forloop_start = date ("Y-m-d", strtotime("+1 days", strtotime($forloop_start)));
            }

          # Traversing thru Day of the week
            $days_of_week=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

            foreach ($days_of_week as $day_of_week) {
              
              foreach ($weekly_orders as $key => $service_name_array) {

                if(array_key_exists($day_of_week, $service_name_array)) 
                  $new_weekly_orders[$key][$day_of_week] = $weekly_orders[$key][$day_of_week];
                
                else 
                  $new_weekly_orders[$key][$day_of_week] = 0;
              }

            }
            
            //print "<pre>"; print_r($new_weekly_orders); print "</pre>"; exit;
        /****** Additional Functions  ****************/  

        /***************** Interface *****************/
          $data['title'] = "Report Overview"; 
          $data['monthly_services_count'] = $services_count;
          $data['weekly_report'] = @$new_weekly_orders;

          //print "<pre>"; print_r($data); print "</pre> <br/><br/>";exit;
          $this->load->view('header',$data); 
          $this->load->view('summary',$data); 
          $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }

    /*******************************
      Generate Special Report
    *******************************/
    public function generate_report() 
    {
      # Permission Check
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

        /***************** Interface *****************/
        $data['title'] = " All Reports"; 
        $this->load->view('header',$data); 
        $this->load->view('report',$data); 
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
          /**** Creating Start & End Date ******/
          $dates = explode('-', $this->input->post('daterange'));
          $start_date = date('Y-m-d',strtotime($dates[0]));
          $end_date = date('Y-m-d',strtotime($dates[1]));

          if($start_date == $end_date)
            $daterange = ['DATE(date_created)' => $start_date];
          else
            $daterange = ['DATE(date_created) >=' => $start_date, 'DATE(date_created) <=' => $end_date,];
          /**** Creating Start & End Date ******/
          //print $start_date; exit;

          if(empty($order_temp) && empty($customer_temp)) {
            $return_data['error'] ="No Selection Made";
            print_r(json_encode($return_data)); exit;
          }
          # Loading Model 
          $this->load->model('globals/model_retrieval');

          $dbres = self::$_Default_DB;
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
          
          $where_condition =['where_condition' => array_merge($order,$customer,$daterange)];
          /***** Defining where clauses ********/
          $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition,$return_dataType); 
          
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
        $data['_Default_DB'] = self::$_Default_DB;
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
