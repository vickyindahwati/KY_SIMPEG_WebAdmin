<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller{

	protected $ci;

	private $_xUserId;
	private $_xEncUserId;
	private $_xToken;
  private $_xRoleId;
  private $_xIsFirstLogin;

	function __construct(){

		parent::__construct();

		$this->ci =& get_instance();
    $this->ci->load->library('api/profile_lib');
		$this->ci->load->library('api/employee_lib');
    $this->ci->load->library('api/master_lib');
    $this->ci->load->library('api/inappnotification_lib');
    $this->ci->load->library('global_lib');
    $this->ci->load->library('export_lib');
    $this->load->library('ciqrcode');
		$this->load->library('upload_file');
		$this->load->library('acl');

		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
    $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];        
    $this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
    $this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];
    $this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];

  }

	public function adjustAnualLeave(){

		$xArrResult = array();
    $xUserId = $this->input->post('x_id_adjust_leave');
    $xYearN = $this->input->post('x_cuti_tahun_n');
    $xYearN_1 = $this->input->post('x_cuti_tahun_n_1');
    $xYearN_2 = $this->input->post('x_cuti_tahun_n_2');
    $xTangguhkan = $this->input->post('x_cuti_ditangguhkan');

    $xArrResult = $this->ci->employee_lib->adjustAnualLeave( $this->_xUserId, 
                                                                    	$xUserId,
                                                                    	$xYearN,
                                                                    	$xYearN_1,
                                                                    	$xYearN_2,
                                                                   	$xTangguhkan );
    
    $this->output
    	->set_content_type('application/json')
    	->set_output($xArrResult);

	}

	public function index(){

      if( $this->_xIsFirstLogin == 1 ){
        redirect("index.php/employee/changePassword", "refresh");
      }else{

  		  $setting = "";
      	$template = $this->template->load($setting);        

      	if( $this->ci->acl->has_permission('PENGAJUAN_CUTI') ){

      		$data['rsTujuanJabatan'] = $this->master_lib->getMaster("tujuan_jabatan");
      		$data['rsJenisCuti'] = $this->master_lib->getMaster("jenis_cuti");
          $data['rsAnualLeaveInfo'] = $this->employee_lib->getAnualLeaveInfo( $this->_xEncUserId );
          $data['xLeaveId'] = $this->input->get('id');
          $data['xNid'] = $this->input->get('nid');
        	$template['konten'] = $this->load->view('master/leave/list', $data, true);
        	#load container for template view        
       
      	}else{
        	$data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
        	$template['konten'] = $this->load->view('errors/no_permission', $data, true);
      	}
             
      	$this->load->view('template/container',$template);

      }
	}

	public function showLeaveTableList(){
    $data = array();
    $data['xLeaveId'] = $this->input->post('id');
    //$data['']
  	$this->load->view('master/leave/data', $data);
  }

	public function getLeaveDataTableList(){
	  $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');
    $xModule = $this->input->post('module');
    $xOrderColumn = $this->input->post('order');

    $xStatus = $this->input->post('status');
    $xTglMulaiCuti = $this->input->post('tgl_mulai_cuti');
    $xTglBerakhirCuti = $this->input->post('tgl_berakhir_cuti');
    $xJenisCutiId = $this->input->post('jenis_cuti');

    $jsonResult = $this->ci->employee_lib->getLeaveTableData( $xModule,
                                                              $xId,
      			                                                   $this->_xEncUserId,
                                                               $this->_xRoleId,
      			                                                   str_replace(" ", "%20", $xKeyword['value']),
                                                               $xStatus,
      			                                                   $xTglMulaiCuti,
                                                               $xTglBerakhirCuti,
      			                                                   $xJenisCutiId,
      			                                                   $xLength,
      			                                                   $xStart,
      			                                                   $xDraw,
                                                               $xOrderColumn[0]['column'],
                                                               $xOrderColumn[0]['dir'] );
    $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  public function saveLeave(){

	    $xArrResult = array();
      $xTujuanJabatan = $this->input->post('x_tujuan_jabatan');
      $xJenisCuti = $this->input->post('x_jenis_cuti');
      $xCatatanCuti = $this->input->post('x_catatan_cuti');
      $xAlasanCuti = $this->input->post('x_alasan_cuti');
      $xTglMulai = $this->input->post('x_tgl_mulai');
      $xTglBerakhir = $this->input->post('x_tgl_berakhir');
      $xLamaCuti = $this->input->post('x_lama_cuti');
      $xAlamatCuti = $this->input->post('x_alamat_cuti');
      $xTelp = $this->input->post('x_telp');

      /*Get Detail Data*/
      $rsProfile = $this->ci->profile_lib->getProfile( $this->_xEncUserId );

      if( $rsProfile['data']['jabatan_struktural']['name'] <> '' ){
        $xJabatan = $rsProfile['data']['jabatan_struktural']['name'];
      }else if( $rsProfile['data']['jabatan_fungsional']['name'] <> '' ){
        $xJabatan = $rsProfile['data']['jabatan_fungsional']['name'];
      }else if( $rsProfile['data']['jabatan_fungsional_umum']['name'] <> '' ){
        $xJabatan = $rsProfile['data']['jabatan_fungsional_umum']['name'];
      }

      $xNamaPegawai = $rsProfile['data']['name'];
      $xNIP = $rsProfile['data']['nip'];
      $xMasaKerja = $rsProfile['data']['masa_kerja_tahun'] . " Tahun " . $rsProfile['data']['masa_kerja_bulan'] . " Bulan";
      $xUnitKerja = $rsProfile['data']['unor']['name'];

      $xArrResult = $this->ci->employee_lib->addLeave( $this->_xEncUserId, 
  													                           $this->_xUserId, 
                                                       $xTujuanJabatan,
                                                       $xJenisCuti,
                                                       $xCatatanCuti,
                                                       $xAlasanCuti,
                                                       $xTglMulai,
                                                       $xTglBerakhir,
                                                       $xLamaCuti,
                                                       $xAlamatCuti,
                                                       $xTelp,
                                                       $xNamaPegawai,
                                                       $xNIP,
                                                       $xJabatan,
                                                       $xMasaKerja,
                                                       $xUnitKerja );
      
	    $this->output
      	->set_content_type('application/json')
      	->set_output($xArrResult);
  }

  public function generateForm(){
    
    try {
      $xId = $this->uri->segment(3);
      $rsLeaveDetail = $this->ci->employee_lib->getLeaveDetail( $xId );
      $rsUserAnualLeaveDetail = $this->employee_lib->getAnualLeaveInfo( $rsLeaveDetail['user_id'] );
      $rsLastLeaveNote = $this->employee_lib->getLastLeaveNote( $xId, $this->_xEncUserId, $rsLeaveDetail['jenis_cuti']['id'] );

      /*Generate QRCode*/
      $arrQRCodeParam['data']   = $rsLeaveDetail['no_reference'];
      $arrQRCodeParam['savename'] = FCPATH . 'uploads/files/leave/qrcode/' . $rsLeaveDetail['no_reference'] . '.png';
      $arrQRCodeParam['size']   = 1024;
      $this->ciqrcode->generate( $arrQRCodeParam );

      // echo FCPATH . 'uploads/files/leave/qrcode/' . $rsLeaveDetail['no_reference'] . '.png';

      if( file_exists( FCPATH . 'uploads/files/leave/qrcode/' . $rsLeaveDetail['no_reference'] . '.png' ) ){
        $pathQRCode = CONST_IMG_QRCODE . $rsLeaveDetail['no_reference'] . '.png';
      }

      // echo "<br><br>" . $pathQRCode;

      $this->ci->export_lib->exportLeaveForm( $rsLeaveDetail, $rsUserAnualLeaveDetail, $rsLastLeaveNote['catatan_cuti'], $pathQRCode );
    } catch (Exception $ex) {
      echo ">>> Exception : " . $ex->getMessage();
    }       

  }

  public function updateStatusLeave(){

    $xArrResult = array();
    $xId = $this->input->post('x_id_leave');
    $xNid = $this->input->post('x_nid');

    $xTglMulai = $this->input->post('x_receive_leave_tgl_mulai');
    $xTglBerakhir = $this->input->post('x_receive_leave_tgl_berakhir');
    $xLamaCuti = $this->input->post('x_receive_leave_lama_cuti');

    $xPertimbanganAtasanLangsung = $this->input->post('x_receive_leave_pertimbangan_atasan');
    $xKeputusanPejabat = $this->input->post('x_receive_leave_keputusan_pejabat');
    $xCatatanCuti = $this->input->post('x_receive_leave_catatan_cuti');

    $xObjResult = $this->ci->employee_lib->updateStatusLeave( $xId,
                                                              $this->_xUserId,

                                                              $xTglMulai,
                                                              $xTglBerakhir,
                                                              $xLamaCuti,

                                                              $xPertimbanganAtasanLangsung,
                                                              $xKeputusanPejabat,
                                                              $xCatatanCuti );

    $this->ci->inappnotification_lib->updateFlagProcessedNotification( $xNid, 'leave' );
    
    $this->output
      ->set_content_type('application/json')
      ->set_output($xObjResult);
  }

  public function saveChangeLeave(){

      $xArrResult = array();
      $xIdLeave = $this->input->post('x_id_leave_change');
      $xTglMulai = $this->input->post('x_receive_leave_tgl_mulai_change');
      $xTglBerakhir = $this->input->post('x_receive_leave_tgl_berakhir_change');
      $xLamaCuti = $this->input->post('x_receive_leave_lama_cuti_change');

      $xArrResultCancelLeave = $this->ci->employee_lib->cancelLeave( $xIdLeave,
                                                                     $this->_xUserId );

      $xArrResult = $this->ci->employee_lib->changeLeave( $xIdLeave,
                                                          $this->_xUserId,
                                                          $xTglMulai,
                                                          $xTglBerakhir,
                                                          $xLamaCuti );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  public function canceLeave(){

    $xArrResult = array();
    $xId = $this->input->post('x_confirm_cancel_id');
    $xNid = $this->input->post('x_confirm_cancel_nid');

    $xArrResult = $this->ci->employee_lib->cancelLeave( $xId,
                                                        $this->_xUserId );
    $this->ci->inappnotification_lib->updateFlagProcessedNotification( $xNid, 'leave' );                                                        
    
    $this->output
      ->set_content_type('application/json')
      ->set_output($xArrResult);
  }

  public function pageReceiveLeaveReceipt(){
    $setting = "";
    $template = $this->template->load($setting);        

    if( $this->ci->acl->has_permission('PENERIMAAN_BERKAS_CUTI') ){

      $template['konten'] = $this->load->view('master/leave/receive_leave', $data, true);
      #load container for template view        
   
    }else{
      $data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
      $template['konten'] = $this->load->view('errors/no_permission', $data, true);
    }
         
    $this->load->view('template/container',$template);
  }

  public function showLeaveDetail(){
    $data = array();
    $this->load->view('master/leave/receive_leave_detail', $data);
  }

  // Before for inapp notification
  public function getPendingLeave(){
    $xCurrDate = date('Y-m-d');
    $xCurrDate = 'all';
    $xJsonResult = $this->ci->employee_lib->getPendingLeave( $xCurrDate );
    $this->output
        ->set_content_type('application/json')
        ->set_output($xJsonResult);
  }

}

?>