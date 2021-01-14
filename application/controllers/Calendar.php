<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Calendar extends CI_Controller{
        protected $ci;

        function __construct(){
            parent::__construct();
            $this->ci =& get_instance();
            $this->ci->load->library('api/calendar_lib');

            $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];        
        }   

        public function index(){

            if( $this->_xIsFirstLogin == 1 ){
              redirect("index.php/employee/changePassword", "refresh");
            }else{
      
                $setting = "";
                $template = $this->template->load($setting);        
      
                $data = array('title' => 'Kalendar Libur');
                $template['konten'] = $this->load->view('master/holiday/list', $data, true);
                   
                $this->load->view('template/container',$template);
      
            }
          }

        public function getHolidayDate(){
            $xJsonResult = $this->ci->calendar_lib->getCalendarHoliday('', 0, 0);
            $this->output
                ->set_content_type('application/json')
                ->set_output($xJsonResult);
        }
    }

?>