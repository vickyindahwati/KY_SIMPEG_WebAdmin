<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterunor extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xToken;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/unor_lib');
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
		$setting = "";
      	$template = $this->template->load($setting);        

      	if( $this->ci->acl->has_permission('UNOR') ){

	        $template['konten'] = $this->load->view('master/unor/list', $data, true);
        
        	#load container for template view        
       
      	}else{
        	$data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
        	$template['konten'] = $this->load->view('errors/no_permission', $data, true);
      	}
             
      	$this->load->view('template/container',$template);
	}

	public function showTableList(){
    	$data 						= array();
    	
    	$arrDbUnor  = $this->ci->master_lib->getMaster_2("unor");
    	// $arrDbUnor  = $this->ci->master_lib->getUnitKerjaList();
    	$tree = $this->ci->global_lib->buildTree( $arrDbUnor['data'] );
      	$option = $this->ci->global_lib->printTree( $tree, 15 );
      	$data['option'] = $option;
      	$data['unorData'] = $arrDbUnor['data'];
  		$this->load->view('master/unor/data', $data);
  	}

	public function getTableData(){
	    $xId = $this->input->post('id');
	    $xKeyword = $this->input->post('search');
	    $xStart = $this->input->post('start');
	    $xLength = $this->input->post('length');
	    $xDraw = $this->input->post('draw');     
	    $xModule = $this->input->post('module');
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

	public function save(){

		$xArrResult = array();

		$xAct = $this->input->post('x_act');

		$xId = $this->input->post('x_id_unor');
		$xName = $this->input->post('x_unor_name');
		$xParentId = $this->input->post('x_unor_parent_id');
		$xType = $this->input->post('x_unor_type');

		$xArrResult = $this->ci->unor_lib->save( $this->_xUserId,
												 $xId,
												 $xName,
												 $xParentId,
												 $xType,
												 $xAct );

		$this->output
      	->set_content_type('application/json')
      	->set_output($xArrResult);

	}

}