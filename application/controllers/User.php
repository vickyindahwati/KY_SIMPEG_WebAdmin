<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	protected $ci;
	private $_xUserId;
	private $_xToken;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->load->library('upload_file');
		$this->load->library('acl');
		$this->load->library('api/user_lib');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
		$this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'User';		
		$template['konten']			= $this->load->view('master/user/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function doConfirmUpdateProfile(){

		$xArrResult = array();
		$xAdminId = $this->_xUserId;
		$xUserId = $this->input->post('x_confirm_id');
		$xType = $this->input->post('x_confirm_type');

		$xArrResult = $this->ci->user_lib->doConfirmUpdate( $xUserId, $xType, $xAdminId);
		$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);

	}
	

}

?>