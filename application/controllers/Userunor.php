<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userunor extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xToken;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/userunor_lib');
		$this->ci->load->library('api/master_lib');
		$this->ci->load->library('api/employee_lib');
		$this->ci->load->library('global_lib');
		$this->ci->load->library('upload_file');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
		$this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
		$this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];

	}

	public function index()
	{

	}

	public function header(){
		$setting = "";
		$template = $this->template->load($setting);	
		$data = array();        
		$data['title'] = 'TEMPLATE HIRARKI';			

		$template['konten'] = $this->load->view('master/userunor/user_unor_header_list', $data, true);
		#load container for template view
		$this->load->view('template/container',$template);
	}

	public function detail(){
		$setting = "";
		$template = $this->template->load($setting);	
		$data = array();        				
		$data['xUnorHeaderId'] = $this->uri->segment(3);
      	$xHeaderDetail = $this->ci->master_lib->getMasterById( $this->_xUserId, '/user/jabatan/header/detail', $this->uri->segment(3) );
      	$data['xHeaderName'] = $xHeaderDetail['unor_header_name'];
      	$data['title'] = 'PETA JABATAN HIRARKI - <strong>' . $data['xHeaderName'] . '</strong>';	
		$template['konten'] = $this->load->view('master/userunor/user_unor_detail_list', $data, true);
		#load container for template view
		$this->load->view('template/container',$template);
	}

	public function showTableList_Header(){
    	$data 						= array();
  		$this->load->view('master/userunor/user_unor_header_data', $data);
  	}

  	public function showTableList_Detail(){
    	$data 						= array();
    	$data['xUnorHeaderId']		= $this->input->post('x_header_id');

    	// Get Jabatan
    	$arrDbUnor  = $this->ci->master_lib->getMaster_2("unor");
    	$tree = $this->ci->global_lib->buildTree( $arrDbUnor['data'] );
      	$option = $this->ci->global_lib->printTree( $tree, 15 );
      	$data['optionJabatan'] = $option;

      	// Get User
      	$arrDbUser = $this->ci->master_lib->getMaster_2("user");
      	$dropdownOption = $this->ci->global_lib->buildDropdownOption_User( $arrDbUser['data'] );
      	//echo "OPTION : " . $dropdownOption;      	
      	$data['optionUsername'] = $dropdownOption;

  		$this->load->view('master/userunor/user_unor_detail_data', $data);
  	}

	public function getTableData(){
	    $xKeyword = $this->input->post('search');
	    $xStart = $this->input->post('start');
	    $xLength = $this->input->post('length');
	    $xDraw = $this->input->post('draw');     
	    $xModule = $this->input->post('module');
	    $xId = $this->input->post('id');
	    // echo "MODULE : " . $xModule;
	    $jsonResult = $this->ci->employee_lib->getTableData( $xModule,
                                                           $this->_xUserId,
                                                           $xId,
                                                           str_replace(" ", "%20", $xKeyword['value']),
                                                           $xLength,
                                                           $xStart,
                                                           $xDraw );
	    $this->output
	        ->set_content_type('application/json')
	        ->set_output($jsonResult);
	}

	public function saveUnorHeader(){
		$xArrResult = array();
      	$xUnorHeaderId = $this->input->post('x_id_userunorheader');
      	$xType = $this->input->post('x_act');

      	$xCode = $this->input->post('x_code');
      	$xName = $this->input->post('x_name');
      	//$xEfectiveDate = $this->input->post('x_efective_date');

      	$xArrResult = $this->ci->userunor_lib->addUnorHeader( $this->_xUserId, 
                                                          	  $xUnorHeaderId,
                                                          	  $xCode,
                                                          	  $xName,
                                                          	  $xEfectiveDate,
                                                          	  $xType );
      	$this->output
	      	->set_content_type('application/json')
	      	->set_output($xArrResult);
	}

	public function delete(){
      $xId = $this->input->post('x_confirm_delete_id');       
      $xModule = $this->input->post('x_confirm_delete_module');
      $jsonResult = $this->ci->employee_lib->deleteData( $xModule,
                                                         $this->_xUserId,
                                                         $xId );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  	}

  	public function saveUnorDetail(){
		$xArrResult = array();
		$xId = $this->input->post('x_id_userunordetail');
      	$xUnorHeaderId = $this->input->post('x_id_userunorheader');
      	$xAct = $this->input->post('x_act');

      	$xUnorId = $this->input->post('x_unor_id');
      	$xUserId = $this->input->post('x_user_name');
      	$xEfectiveDate = $this->input->post('x_efective_date');


      	$xArrResult = $this->ci->userunor_lib->addUnorDetail( $this->_xUserId, 
      														  $xId,
                                                          	  $xUnorHeaderId,
                                                          	  $xUnorId,
                                                          	  $xUserId,
                                                          	  $xEfectiveDate,
                                                          	  $xAct );
      	$this->output
	      	->set_content_type('application/json')
	      	->set_output($xArrResult);
	}

}
?>