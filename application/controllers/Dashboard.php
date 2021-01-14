<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

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
			$xId = ( $this->_xEncUserId != null && $this->_xEncUserId <> '' ? $this->_xEncUserId : 0 );
			$data = $this->ci->profile_lib->getProfile( $xId );
			$data['isPNS'] = $this->ci->session->userdata['SESSION_SIMPEG_J'];

			$template['konten'] = $this->load->view('dashboard', $data, true);

			$this->load->view('template/container',$template);

		}

	}

	public function showContainer(){
		$xModule = $this->input->post('module');
		$data['roleId'] = $this->ci->session->userdata['SESSION_SIMPEG_D'];
		if( $xModule == 'birthday' ){
			$data['rsBirthday'] = $this->ci->dashboard_lib->getTodayEmployeeBirthday( $this->_xEncUserId );
			$this->load->view('dashboard/dashboard_birthday', $data);
		}else if( $xModule == 'pendidikan_terakhir' ){			
			$data['rsPendidikan'] = $this->ci->dashboard_lib->getPendidikanTerakhir( $this->_xEncUserId );
			$this->load->view('dashboard/dashboard_pendidikan_terakhir', $data);
		}else if( $xModule == 'pmk' ){			
			$data['rsPMK'] = $this->ci->dashboard_lib->getPeninjauanMasaKerja( $this->_xEncUserId );
			$this->load->view('dashboard/dashboard_pmk', $data);
		}else if( $xModule == 'news' ){			
			$data['rsNews'] = $this->ci->dashboard_lib->getNews();
			$this->load->view('dashboard/dashboard_news', $data);
		}else if( $xModule == 'skp' ){			
			if( $this->_xRoleId != 1 && $this->_xRoleId != 3 ){
				$data['rsSKP'] = $this->ci->dashboard_lib->getSKP($this->_xEncUserId);
				$data['xRoleId'] = $this->_xRoleId;
			}
			
			$this->load->view('dashboard/dashboard_skp', $data);
		}else if( $xModule == 'attendance_info' ){
			if( $this->_xRoleId != 1 && $this->_xRoleId != 3 ){
				$data['rsAttendanceInfo'] = $this->ci->dashboard_lib->getAttendanceInfo($this->_xEncUserId);
				$data['xRoleId'] = $this->_xRoleId;
			}
			
			$this->load->view('dashboard/dashboard_attendance', $data);
		}
	}

}

?>