<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	protected $ci;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();

		$this->ci->load->model('mquery');

		$this->ci->load->library('api/login_lib');

	}


	public function index(){

		$this->ci->load->view('login', $arr_data);

	}

	public function forgotPassword(){

		$arr_data['err_no']		= "";
		$this->ci->load->view('forgot_password', $arr_data);

	}

	public function doForgotPassword(){
		$xNIP		= $this->input->post("x_nip");
		$xResultForgotPassword = $this->ci->login_lib->doForgotPassword( $xNIP );
		if( $xResultForgotPassword['status_code'] == '00' ){
			$arr_result = array( 'status_code' => '00', 'status_msg' => $xResultForgotPassword['status_msg'] );

			$xSessionData			= array( 'SESSION_MSG_RESET_PASSWORD' => $xResultForgotPassword['status_msg'] ) ;

			$this->session->set_userdata($xSessionData);

			redirect("index.php/login");
			//$this->load->view('login',$arr_result);
		}else{
			$arr_result = array( 'status_code' => '-99', 'status_msg' => $xResultForgotPassword['status_msg'] );
			//redirect("index.php/login/forgotPassword", "refresh");
			$this->load->view('forgot_password',$arr_result);
		}
	}


	public function doLogin()
	{		
		$xArrResult 	= array();
		$xResultLogin 	= array();	
		$xSessionData	= array();

		$xUsername		= $this->input->post("x_username");
		$xPassword		= $this->input->post("x_password");

		$xResultLogin 	= $this->ci->login_lib->doLogin($xUsername, $xPassword);
		$page_home 		= "";


		if( $xResultLogin['status_code'] == '00' ){

			$arr_allowed_menu 		= array();

			$xUserId 				= $xResultLogin['data']['id'];
			$xEncryptedUserId 		= $xResultLogin['data']['encrypted_id'];
			$xUserName 				= $xResultLogin['data']['name'];
			$xNIP 					= $xResultLogin['data']['nip'];
			$xPicture 				= $xResultLogin['data']['picture'];
			$xToken					= $xResultLogin['token'];
			$xRoleId 				= $xResultLogin['data']['role']['id'];
			$xRiwayatJabatanId 		= $xResultLogin['data']['riwayat_jabatan_id'];
			$xIsFirstLogin 			= $xResultLogin['data']['is_first_login'];
			$xIsPNS 				= $xResultLogin['data']['is_pns'];

			$xSessionData			= array( 'SESSION_SIMPEG_A' 	=> $xUserId,
											 'SESSION_SIMPEG_B' 	=> $xNIP,
											 'SESSION_SIMPEG_C'		=> $xUserName,
											 'SESSION_SIMPEG_D'		=> $xRoleId,
											 'SESSION_SIMPEG_E'		=> $xToken,
											 'SESSION_SIMPEG_F'		=> $xPicture,
											 'SESSION_SIMPEG_G'		=> $xEncryptedUserId,
											 'SESSION_SIMPEG_H'		=> $xRiwayatJabatanId,
											 'SESSION_SIMPEG_I'		=> $xIsFirstLogin,
											 'SESSION_SIMPEG_J'		=> $xIsPNS ) ;

			$this->session->set_userdata($xSessionData);

			redirect("index.php/dashboard", "refresh");

		}else{

			$arr_result = array();
			if( empty($xResultLogin) ){
				$arr_result = array( 'status_code' => '-99', 'status_msg' => 'Web API not running' );
			}else{
				$arr_result = $xResultLogin;
			}		

			$this->load->view('login',$arr_result);

		}

	}
		

	function logout()

	{

		$this->session->sess_destroy();

		redirect("index.php/login","refresh");

	}

}


?>