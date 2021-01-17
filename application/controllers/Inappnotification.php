<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inappnotification extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xEncUserId;
	private $_xToken;
    private $_xRoleId;
    private $_xIsFirstLogin;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
        $this->ci->load->library('api/inappnotification_lib');
        $this->ci->load->library('global_lib');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];        
        $this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
        $this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];
        $this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];

    }

    public function getNotification(){
        $xCurrDate = date('Y-m-d');
        $xCurrDate = 'all';
        $xJsonResult = $this->ci->inappnotification_lib->getNotification( $xCurrDate );
        $this->output
            ->set_content_type('application/json')
            ->set_output($xJsonResult);
    }


}