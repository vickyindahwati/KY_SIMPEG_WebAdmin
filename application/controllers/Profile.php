<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xToken;
	private $_xIsFirstLogin;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->library('api/profile_lib');
		$this->ci->load->library('api/employee_lib');
		$this->ci->load->library('api/master_lib');
		$this->ci->load->library('upload_file');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
		$this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
		$this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
		$this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];

	}


	public function index()
	{

		/*if( $this->ci->acl->has_permission('IDENTITAS') ){
			echo "Anda punya akses";
		}else{
			echo "Anda tidak punya akses";
		}*/
		#get template design

		if( $this->_xIsFirstLogin == 1 ){
	      redirect("index.php/employee/changePassword", "refresh");
	    }else{
	      	$setting = "";
			$template = $this->template->load($setting);	
			$data = array();        
			$data['isHasData'] = 0;
			$data['title'] = 'Keluarga';	

			$xId = ( $this->input->get('id') != null && $this->input->get('id') <> '' ? $this->input->get('id') : $this->_xUserId );
			$data = $this->ci->profile_lib->getProfile( $xId );
			$xArrUserPending = $this->checkUserPending($xId);
			$data['id'] = $xId;
			if( $xArrUserPending['status_code'] == '00' ){			
				$data['isHasUpdateData'] = 1;
				$data['newData'] = $xArrUserPending['new_data'];
				$data['oldData'] = $xArrUserPending['old_data'];
			}else{
				$xArrUserPending = $this->ci->profile_lib->getLastRequestUpdate( $xId );
				if( $xArrUserPending['status_code'] == '00' ){
					$data['isHasUpdateData'] = 0;
					$data['confirmStatus'] = $xArrUserPending['confirm_status'];
					$data['reason'] = $xArrUserPending['reason'];
					$data['userConfirm'] = $xArrUserPending['user_confirm'];
					$data['confirmAt'] = $xArrUserPending['confirm_at'];
					$data['requestAt'] = $xArrUserPending['request_at'];
				}
			}

			$template['konten'] = $this->load->view('profile', $data, true);
			#load container for template view
			$this->load->view('template/container',$template);
	    }		

	}

	public function getPendingData(){
		$data = array();
		$xId = $this->input->post('id');
		$xArrUserPending = $this->checkUserPending( $xId );
		if( $xArrUserPending['status_code'] == '00' ){
			$data['isHasUpdateData'] = 1;
			$data['newData'] = $xArrUserPending['new_data'];
			$data['oldData'] = $xArrUserPending['old_data'];
			$data['id'] = $xArrUserPending['id'];
		}
		$this->load->view('profile_pending_data', $data);
	}

	private function checkUserPending( $pId ){
		$xArrResult = array();
		$xArrResult = $this->ci->profile_lib->checkUserPending( $pId );
		return $xArrResult;
	}

	public function updateProfile(){

		$xArrResult = array();
		//$xUserId = $this->_xUserId;
		$xUserId = $this->input->post('x_id_update_profile');
		$xTelepon = $this->input->post('x_telepon');
		$xEmail = $this->input->post('x_email');
		$xAlamatTinggal = $this->input->post('x_alamat_tinggal');
		$xAlamatKTP = $this->input->post('x_alamat_ktp');

		$xArrResult = $this->ci->profile_lib->updateProfile( $xUserId, $xTelepon, $xEmail, $xAlamatTinggal, $xAlamatKTP );
		$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);
	}

	public function confirmUpdateProfile(){

		$xArrResult = array();
		$xId = $this->input->post('x_confirm_id');
		$xType = $this->input->post('x_confirm_type');
		$xReason = $this->input->post('x_reason');

		$xArrResult = $this->ci->profile_lib->confirmUpdateProfile( $xId, $xType, $xReason, $this->_xEncUserId );
		$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);
	}

	public function uploadPhoto(){

		$xArrResult = array();
		$xUserId = $this->input->post('x_id_update_photo');
		$xPhoto = $this->input->post('x_photo_profile');

		$xArrResult = $this->ci->profile_lib->uploadPhoto( $xUserId, $xPhoto );
		$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);
	}	

	public function saveUploadSK(){

		$xArrResult = array();

		$xIdPMK = '';
		$xFile = '';
		$xDosierFileType = 0;
		$xUserId = 0;
		$xModule = $this->input->post('x_sk_module');
		if( $xModule == 'pmk' ){
			$xIdPMK = $this->input->post('x_id_pmk');
			$xFile = $this->input->post('x_file_pmk');
			$rsFileType  = $this->master_lib->getMaster("file_type_by_code",$xModule);
			$xDosierFileType = $rsFileType->id;
			$xUserId = $this->input->post('x_user_id_pmk');
		}else if( $xModule == 'hukdis' ){
			$xIdPMK = $this->input->post('x_id_hukdis');
			$xFile = $this->input->post('x_file_hukdis');
			$rsFileType  = $this->master_lib->getMaster("file_type_by_code",$xModule);
			$xDosierFileType = $rsFileType->id;
			$xUserId = $this->input->post('x_user_id_hukdis');
		}else if( $xModule == 'history_unor' ){
			$xIdPMK = $this->input->post('x_id_unor');
			$xFile = $this->input->post('x_file_unor');
			$rsFileType  = $this->master_lib->getMaster("file_type_by_code",$xModule);
			$xDosierFileType = $rsFileType->id;
			$xUserId = $this->input->post('x_user_id_unor');
		}else if( $xModule == 'pemberhentian' ){
			$xIdPMK = $this->input->post('x_id_pemberhentian');
			$xFile = $this->input->post('x_file_pemberhentian');
			$rsFileType  = $this->master_lib->getMaster("file_type_by_code",$xModule);
			$xDosierFileType = $rsFileType->id;
			$xUserId = $this->input->post('x_user_id_pemberhentian');
		}else if( $xModule == 'angka_kredit' ){
			$xIdPMK = $this->input->post('x_id_angkakredit');
			$xFile = $this->input->post('x_file_angkakredit');
			$rsFileType  = $this->master_lib->getMaster("file_type_by_code",$xModule);
			$xDosierFileType = $rsFileType->id;
			$xUserId = $this->input->post('x_user_id_angkakredit');
		}

		

		$xArrResult = $this->ci->profile_lib->uploadSK( $this->_xUserId, $xIdPMK, $xFile, $xModule );
		/*$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);*/

        $xArrResult = $this->ci->employee_lib->saveDosier( $this->_xUserId, $xUserId, $xDosierFileType, $xFile );
		$this->output
        	->set_content_type('application/json')
        	->set_output($xArrResult);
	}

	/*Upload File*/
	public function uploadProfilePhoto(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("photos/profile/original", "x_photo_profile", "Photo_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadProfilePhoto(){
		$this->upload_file->cancelUpload("photos/profile/original");
	}

	public function uploadKartuPegawai(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/kartu_pegawai", "x_file_kartu_pegawai", "KartuPegawai_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_KARTU_PEGAWAI . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadKartuPegawai(){
		$this->upload_file->cancelUpload("files/profiles/kartu_pegawai");
	}

	public function uploadKTP(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/ktp", "x_file_ktp", "KTP_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_KTP . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadKTP(){
		$this->upload_file->cancelUpload("files/profiles/ktp");
	}

	public function uploadKK(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/kartu_keluarga", "x_file_kartu_keluarga", "KK_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_KARTU_KELUARGA . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadKK(){
		$this->upload_file->cancelUpload("files/profiles/kartu_keluarga");
	}

	public function uploadBukuTabungan(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/buku_tabungan", "x_file_buku_tabungan", "BukuTabungan_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_BUKU_TABUNGAN . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadBukuTabungan(){
		$this->upload_file->cancelUpload("files/profiles/buku_tabungan");
	}

	public function uploadNPWP(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/npwp", "x_file_npwp", "NPWP_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_NPWP . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadNPWP(){
		$this->upload_file->cancelUpload("files/profiles/npwp");
	}

	public function uploadLHKPN(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/lhkpn", "x_file_lhkpn", "LHKPN_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_LHKPN . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadLHKPN(){
		$this->upload_file->cancelUpload("files/profiles/lhkpn");
	}

	public function uploadASKES(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/askes_bpjs", "x_file_askes_bpjs", "ASKESBPJS_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_ASKES_BPJS . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadASKES(){
		$this->upload_file->cancelUpload("files/profiles/askes_bpjs");
	}

	public function uploadTASPEN(){
		$arr_result 	= array();
		
		$upload			= $this->upload_file->doUploadFlile("files/profiles/taspen", "x_file_taspen", "TASPEN_");
		$arr_result['file_name']	= $upload['file_name'];
		$arr_result['path_file']	= CONST_PATH_TASPEN . $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadTASPEN(){
		$this->upload_file->cancelUpload("files/profiles/taspen");
	}


	/*Upload File SK*/
	public function uploadSKPMK(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("files/profiles/pmk", "x_file_pmk", "SKPMK_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKPMK(){
		$this->upload_file->cancelUpload("files/profiles/pmk");
	}

	public function uploadSKHukdis(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("files/profiles/hukdis", "x_file_hukdis", "SKHUKDIS_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKHukdis(){
		$this->upload_file->cancelUpload("files/profiles/hukdis");
	}

	public function uploadSKUnor(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("files/profiles/unor", "x_file_unor", "SKUNOR_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKUnor(){
		$this->upload_file->cancelUpload("files/profiles/unor");
	}

	public function uploadSKPemberhentian(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("files/profiles/pemberhentian", "x_file_pemberhentian", "SKPEMBERHENTIAN_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKPemberhentian(){
		$this->upload_file->cancelUpload("files/profiles/pemberhentian");
	}

	public function uploadSKAngkaKredit(){
		$arr_result 	= array();
		
		$upload			= $this->ci->upload_file->doUploadFlile("files/profiles/angka_kredit", "x_file_angkakredit", "SKANGKAKREDIT_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKAngkaKredit(){
		$this->upload_file->cancelUpload("files/profiles/angka_kredit");
	}

	public function batchResizePhoto(){
		$pathPhoto = 'P:\PROJECTS\XAMPP7\htdocs\KomisiYudisial\simpeg\admin\uploads\photos\profile';
		$arrFiles = scandir($pathPhoto . '\original');
		/*for( $i = 0; $i < count($arrFiles); $i++ ){
			if( $arrFiles[$i] <> "." && $arrFiles[$i] <> ".." ){
				$this->upload_file->resize( './uploads/photos/profile/original/' . $arrFiles[$i], 
										    './uploads/photos/profile/resize/',
										    '128','128' );
			}
		}*/

		/*if( $arrFiles[2] <> "." && $arrFiles[2] <> ".." ){
				$this->upload_file->resize( './uploads/photos/profile/original/' . $arrFiles[2], 
										    './uploads/photos/profile/resize/',
										    '128','128' );
				
			}*/

		$this->upload_file->resizeImage($pathPhoto . '\original\196110241983021001.jpg',
										$pathPhoto . '\resize\196110241983021001.jpg',
										128,128,100);
	}


}

?>