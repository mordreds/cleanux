<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MX_Controller 
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
        $data['title'] = " SMS"; 
        $this->load->view('header',$data); 
        $this->load->view('sms',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
   /**************** Interface ********************/

    /**************** Insertion ********************/

    /*******************************
      order Search
    *******************************/
    public function send_sms() {
      if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles'])) {
        $this->session->set_flashdata('error',"Permission Denied. Please Contact Admin");
        redirect('sms');
      }
      else {
        $this->form_validation->set_rules('to','Service ID','trim|required');
        $this->form_validation->set_rules('subject','Service Name','trim|required');
        $this->form_validation->set_rules('message','Weight','trim|required');

        if($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('error', "All Fields Required");
          redirect('sms');
        }
        else {
          # Assigning to session variable
          $key = "058289f6054524bbd6fa";
          $sender_id = "BGs";
          $to = $this->input->post('to');
          $message = $this->input->post('message');
          $mnotify_error_messages = [
            '1000' => "Sending SMS Successful",
            '1002' => "Sms Sending Failed",
            '1003' => "Insufficient SMS Balance",
            '1005' => "Invalid Recipient Phone Number",
          ];

          if(!empty($key) && !empty($sender_id) && !empty($to) && !empty($message)) {
            $url = "https://apps.mnotify.net/smsapi?key=".$key."&to=".$to."&msg=".$message."&sender_id=".$sender_id;
            $url_result = file_get_contents($url);
            
            if(array_key_exists($url_result, $mnotify_error_messages)) {
              if($url_result == 1000)
                $this->session->set_flashdata('success',$mnotify_error_messages[$url_result]);
              else
                $this->session->set_flashdata('error',$mnotify_error_messages[$url_result]);
            }
            else
              $this->session->set_flashdata('error',"SMS Failed");
          }
          
          redirect("sms"); exit;
        }
      }
    }

    /**************** Insertion ********************/
  
}//End of Class
