<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{

	private $_xRoleId;
	private $_xUserId;
	private $_xEncUserId;
	private $_xIsFirstLogin;

	function __construct(){

		parent::__construct();
		$this->ci =& get_instance();

		$this->ci->load->library('api/dashboard_lib');
		$this->ci->load->library('global_lib');
		$this->ci->load->library('api/profile_lib');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
		$this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
		$this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];
		$this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];

	}


	public function index()
	{

		#get template design

		if( $this->_xIsFirstLogin == 1 ){
        		redirect("index.php/employee/changePassword", "refresh");
      	}else{

			$setting = "";

			$template = $this->template->load($setting);	

			$data = array();

			$template['konten'] = $this->load->view('layanan', $data, true);

			$this->load->view('template/container',$template);

		}

	}

}

?>