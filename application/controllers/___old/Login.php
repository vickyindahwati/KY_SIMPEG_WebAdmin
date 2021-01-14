<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	protected $ci;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();

		$this->ci->load->model('mquery');
		$this->ci->load->library("validation/validate_user");

	}


	public function index(){

		$arr_data['err_no']		= "";

		$this->ci->load->view('login', $arr_data);

	}


	public function doLogin()
	{		
		$arr_result 	= array();
		$result_login 	= array();	
		$session_data	= array();

		$username		= $this->input->post("x_username");
		$password		= $this->input->post("x_password");
		$type			= $this->input->post("x_type");

		if( $type == "1" ){

			$result_login 	= $this->ci->validate_user->loginAdmin( $username, $password );

			$page_home 		= "";


			if( $result_login['errCode'] == '00' ){

				$arr_allowed_menu 		= array();

				/*Get Admin Detail*/
				$dt_admin_detail		= $this->ci->mquery->getDetailUser( $username , 
																			$password
																		  );

				$userId 				= $this->ci->converter->encode( $dt_admin_detail[0]->userId );
				$userLogin				= $this->ci->converter->encode( $dt_admin_detail[0]->userLogin );
				$userRole				= $dt_admin_detail[0]->roleId;
				$userName 				= $dt_admin_detail[0]->userName;

				$session_data			= array( 'SESSION_AYRS_A' 	=> $userId,
										 		 'SESSION_AYRS_B' 	=> $userLogin,
										 		 'SESSION_AYRS_C'	=> $userName,
										 		 'SESSION_AYRS_D'	=> $userRole ) ;

				$this->session->set_userdata($session_data);

				redirect("index.php/dashboard", "refresh");

			}else{

				$arr_result = $result_login;

				$this->load->view('login',$arr_result);

			}

		}else if( $type == "2" ){

			$resultLogin 	= $this->ci->validate_user->loginManagement( $username, $password );

			//var_dump($resultLogin);break;

			if( $resultLogin['errCode'] == '00' ){

				$dtAdminDetail 		= $this->ci->mquery->getMemberDetail( $username, $password );

				$session_data			= array( 'SESSION_AYRS_A' 	=> $dtAdminDetail[0]->customerId,
										 		 'SESSION_AYRS_B' 	=> $dtAdminDetail[0]->customerName,
										 		 'SESSION_AYRS_C'	=> $username,
										 		 'SESSION_AYRS_D'	=> 4 ) ;

				$this->session->set_userdata($session_data);

				//echo "adaddas";break;

				redirect("index.php/dashboard", "refresh");

			}else{

				$arr_result = $result_login;

				$this->load->view('login',$arr_result);

			}

		}	

	}
		

	function logout()

	{

		$this->session->sess_destroy();

		redirect("index.php/login","refresh");

	}

}


?>