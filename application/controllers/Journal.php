<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xEncUserId;
	private $_xToken;
  	private $_xRoleId;

  	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
    	$this->ci->load->library('api/journal_lib');
		$this->ci->load->library('api/employee_lib');
    	$this->ci->load->library('api/master_lib');
   		$this->ci->load->library('global_lib');
    	$this->ci->load->library('export_lib');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
    	$this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];        
    	$this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
   	 	$this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];

  	}

  	public function index(){

    	$setting = "";
      	$template = $this->template->load($setting);        

      	$data['xRoleId'] = $this->_xRoleId;
      	$data['rsUnorInduk']  = $this->master_lib->getMaster("unorInduk");
      	$template['konten'] = $this->load->view('master/journal/list', $data, true);
             
      	$this->load->view('template/container',$template);

  	}

  	public function showTableList(){
    	$data             = array();
    	$this->load->view('master/journal/data', $data);
  	}

  	public function getTableData(){
	    $xId = $this->input->post('id');
	    $xKeyword = $this->input->post('search');
	    $xStart = $this->input->post('start');
	    $xLength = $this->input->post('length');
	    $xDraw = $this->input->post('draw');     
	    $xModule = $this->input->post('module');
	    $xJournalDate = $this->input->post('x_journal_date');
	    $xUnorInduk = $this->input->post('x_search_unor_induk');
	    $xOrderColumn = $this->input->post('order');
	    // echo "MODULE : " . $xModule;
	    $jsonResult = $this->ci->journal_lib->getJournalList( $this->_xEncUserId,
	                                                           $this->_xRoleId,
	                                                           str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
	                                                           $xJournalDate,
	                                                           $xUnorInduk,
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

	public function save(){
		
		$xArrResult = array();
		$xJournalDate = $this->input->post('x_journal_date');
		$xSubject = $this->input->post('x_subject');
		$xBody = $this->input->post('x_body');

		$xArrResult = $this->ci->journal_lib->saveJournal( $this->_xEncUserId, $xJournalDate, $xSubject, $xBody );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);

	}

	public function cancel(){
		
		$xArrResult = array();
		$xId = $this->input->post('x_confirm_cancel_id');

		$xArrResult = $this->ci->journal_lib->cancelJournal( $xId );

		$this->output
      		->set_content_type('application/json')
      		->set_output($xArrResult);

	}

}

?>