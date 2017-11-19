<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License extends MX_Controller 
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
        $data['title'] = "Settings"; 
        $this->load->view('header',$data); 
        $this->load->view('license',$data); 
        $this->load->view('footer'); 
        /***************** Interface *****************/
      }
    }
  
}//End of Class
