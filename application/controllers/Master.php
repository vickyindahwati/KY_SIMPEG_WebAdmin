<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{

    protected $ci;

	private $_xUserId;
	private $_xToken;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/master_lib');
		$this->load->library('upload_file');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
        

    }

}
?>