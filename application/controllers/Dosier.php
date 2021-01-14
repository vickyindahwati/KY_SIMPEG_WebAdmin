<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosier extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xEncUserId;
	private $_xToken;
  	private $_xRoleId;

  	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/employee_lib');
	    $this->ci->load->library('api/master_lib');
	    $this->ci->load->library('global_lib');
	    $this->ci->load->library('export_lib');
	    $this->load->library('ciqrcode');
		$this->load->library('upload_file');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
	    $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];        
	    $this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
	    $this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];

	}

	public function index(){

    	$setting = "";
      	$template = $this->template->load($setting);        

      	if( $this->ci->acl->has_permission('DOSIER') ){
      		
        	$template['konten'] = $this->load->view('master/dosier/list', $data, true);
        	#load container for template view        
       
      	}else{
        	$data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
        	$template['konten'] = $this->load->view('errors/no_permission', $data, true);
      	}
             
      	$this->load->view('template/container',$template);

	}

	public function showDosierTableList(){
	    $data = array();
	    $data['xId'] = $this->input->post('id');
	    $data['rsFileType'] = $this->master_lib->getMaster("file_type");
	  	$this->load->view('master/dosier/data', $data);
	}

	public function getDosierDataTableList(){
	  	$xId = $this->input->post('id');
	    $xKeyword = $this->input->post('search');
	    $xStart = $this->input->post('start');
	    $xLength = $this->input->post('length');
	    $xDraw = $this->input->post('draw');
	    $xOrderColumn = $this->input->post('order');

	    $xFileTypeId = $this->input->post('file_type');

	    $jsonResult = $this->ci->employee_lib->getDosierTableData( $xId,
	                                                               $this->_xRoleId,
	      			                                               $xKeyword['value'],
	      			                                               $xFileTypeId,
	      			                                               $xLength,
	      			                                               $xStart,
	      			                                               $xDraw,
	                                                               $xOrderColumn[0]['column'],
	                                                               $xOrderColumn[0]['dir'] );
	    $this->output
	        ->set_content_type('application/json')
	        ->set_output($jsonResult);

  }

}