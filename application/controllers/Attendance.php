<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xToken;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/attendance_lib');
		$this->ci->load->library('api/master_lib');
		$this->ci->load->library('api/employee_lib');
		$this->ci->load->library('global_lib');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
		$this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
		$this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];

	}

	public function index(){
		$setting = "";
      	$template = $this->template->load($setting);        

      	$data['xRoleId'] = $this->_xRoleId;

      	if( $this->ci->acl->has_permission('KEHADIRAN') ){

	        if( $this->_xIsFirstLogin == 1 ){
	          redirect("index.php/employee/changePassword", "refresh");
	        }else{

      		  $data['rsUnorInduk']  = $this->master_lib->getMaster("unorInduk");
	          $template['konten'] = $this->load->view('master/attendance/list', $data, true);
	        }
        
        #load container for template view        
       
	    }else{
	        $data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
	        $template['konten'] = $this->load->view('errors/no_permission', $data, true);
	    }
             
      	$this->load->view('template/container',$template);
	}

	public function clockIn(){
		$xArrResult = array();

		$xGeoLocLatitude = $this->input->post('x_geoloc_latitude_clockin');
		$xGeoLocLongitude = $this->input->post('x_geoloc_longitude_clockin');
		$xClockIn = $this->input->post('x_time_clockin');

		$xArrResult = $this->ci->attendance_lib->clockIn( $this->_xEncUserId, $xGeoLocLatitude, $xGeoLocLongitude, $xClockIn );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);
	}

	public function clockOut(){
		$xArrResult = array();

		$xGeoLocLatitude = $this->input->post('x_geoloc_latitude_clockout');
		$xGeoLocLongitude = $this->input->post('x_geoloc_longitude_clockout');
		$xClockOut = $this->input->post('x_time_clockout');

		$xArrResult = $this->ci->attendance_lib->clockOut( $this->_xEncUserId, $xGeoLocLatitude, $xGeoLocLongitude, $xClockOut );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);
	}

	public function updateHealthyCheckStatus(){
		$xArrResult = array();

		$xHealthTypeId = $this->input->post('x_health_type_id');
		$xHealthDescription = $this->input->post('x_health_description');

		$xArrResult = $this->ci->attendance_lib->updateHealthyCheckStatus( $this->_xEncUserId, $xHealthTypeId, $xHealthDescription );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);
	}

	public function updateHealthyCheckStatusClockout(){
		$xArrResult = array();

		$xHealthTypeId = $this->input->post('x_health_type_id_clockout');
		$xHealthDescription = $this->input->post('x_health_description_clockout');

		$xArrResult = $this->ci->attendance_lib->updateHealthyCheckStatusClockout( $this->_xEncUserId, $xHealthTypeId, $xHealthDescription );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);
	}

	public function showTableList(){
    	$data             = array();
    	$this->load->view('master/attendance/data', $data);
  	}

  	public function getTableData(){
	    $xId = $this->input->post('id');
	    $xKeyword = $this->input->post('search');
	    $xStart = $this->input->post('start');
	    $xLength = $this->input->post('length');
	    $xDraw = $this->input->post('draw');     
	    $xModule = $this->input->post('module');
	    $xAttendanceDate = $this->input->post('x_search_attendance_date');
	    $xUnorIndukId = $this->input->post('x_search_unor_induk');
	    $xKondisiKesehatan = $this->input->post('x_kondisi_kesehatan');
	    $xOrderColumn = $this->input->post('order');
	    // echo "MODULE : " . $xModule;
	    $jsonResult = $this->ci->attendance_lib->getAttendanceReport( $this->_xEncUserId,
	                                                           $this->_xRoleId,
	                                                           str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
	                                                           $xAttendanceDate,
	                                                           $xUnorIndukId,
	                                                           $xKondisiKesehatan,
	                                                           $xLength,
	                                                           $xStart,
	                                                           $xDraw,
	                                                           $xOrderColumn[0]['column'],
                                                               $xOrderColumn[0]['dir'] );
	    //echo "Result : ";
	    //var_dump($jsonResult);
	    $this->output
	        ->set_content_type('application/json')
	        ->set_output($jsonResult);
	}
}
?>