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
       if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else
      {
        /****** Required Parameters To Render A Page ******/
        $this->load->model('access/model_access');
        $this->load->model('globals/model_retrieval');
        $data['_Default_DB'] = self::$_Default_DB;
        /****** Required Parameters To Render A Page ******/

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
    
    
}//End of Class
