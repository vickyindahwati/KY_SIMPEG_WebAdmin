<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller{

  protected $ci;

	private $_xUserId;
	private $_xToken;
  private $_xUnorId;
  private $_xEncUserId;
  private $_xIsFirstLogin;

	function __construct(){

    		parent::__construct();

    		$this->ci =& get_instance();
    		$this->ci->load->library('api/employee_lib');
        $this->ci->load->library('api/master_lib');
        $this->ci->load->library('global_lib');
    		$this->load->library('upload_file');
    		$this->load->library('acl');

    		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
        $this->_xUnorId = $this->ci->session->userdata['SESSION_SIMPEG_H'];
        $this->_xEncUserId = $this->ci->session->userdata['SESSION_SIMPEG_G'];
        $this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];
        

  }
    
  public function index(){

      $setting = "";
      $template = $this->template->load($setting);        

      if( $this->ci->acl->has_permission('DATA_PEGAWAI') ){

        if( $this->_xIsFirstLogin == 1 ){
          redirect("index.php/employee/changePassword", "refresh");
        }else{
          $template['konten'] = $this->load->view('master/employee/list', $data, true);
        }
        
        #load container for template view        
       
      }else{
        $data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
        $template['konten'] = $this->load->view('errors/no_permission', $data, true);
      }
             
      $this->load->view('template/container',$template);
  		
  }

  public function showHierarchy(){

      $setting = "";
      $template = $this->template->load($setting);        

      $data['xUnorId'] = $this->_xUnorId;
      $template['konten'] = $this->load->view('master/employee/hierarchy', $data, true);
      #load container for template view        
             
      $this->load->view('template/container',$template);
      
  }

  /* =============== GENERAL FUNCTION ===============*/

  public function getTableData(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');     
    $xModule = $this->input->post('module');
    // echo "MODULE : " . $xModule;
    $jsonResult = $this->ci->employee_lib->getTableData( $xModule,
                                                           $this->_xUserId,
                                                           $xId,
                                                           str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
                                                           $xLength,
                                                           $xStart,
                                                           $xDraw );
    $this->output
        ->set_header('Access-Control-Allow-Origin: *')
        ->set_content_type('application/json')
        ->set_output($jsonResult);
  }

  public function deleteData(){
      $xId = $this->input->post('x_confirm_delete_id');       
      $xModule = $this->input->post('x_confirm_delete_module');
      $jsonResult = $this->ci->employee_lib->deleteData( $xModule,
                                                         $this->_xUserId,
                                                         $xId );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  public function showTableList(){
    $data 						= array();
  	$this->load->view('master/employee/data', $data);
  }

  public function getData(){
      $xKeyword = $this->input->post('search');
      $xStart = $this->input->post('start');
      $xLength = $this->input->post('length');
      $xDraw = $this->input->post('draw');
      $xType = $this->input->post('type'); //1=>Pegawai 2=> Non Pegawai (Data Keluarga)

      $jsonResult = $this->ci->employee_lib->getEmployeeList( $this->_xUserId,
                                                              str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
                                                              $xLength,
                                                              $xStart,
                                                              $xDraw,
                                                              $xType );

      $this->output
        ->set_header('Access-Control-Allow-Origin: *')
      	->set_content_type('application/json')
      	->set_output($jsonResult);

  }

  /*Job Experience*/
  public function showJobExperienceTableList(){
    if( $this->_xIsFirstLogin == 1 ){
      redirect("index.php/employee/changePassword", "refresh");
    }else{
      $xId = $this->input->post('id');              
      $data = array('id' => $xId);
      $this->load->view('master/employee/job_experience_data', $data);
    }
    
  }

  public function getJobExperienceHistoryData(){
      $xId = $this->input->post('id');
      $xKeyword = $this->input->post('search');
      $xStart = $this->input->post('start');
      $xLength = $this->input->post('length');
      $xDraw = $this->input->post('draw');        
      $xType = $this->input->post('type');
      $jsonResult = $this->ci->employee_lib->getJobExperienceHistory( $this->_xUserId,
                                                                      $xId,
                                                                      str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
                                                                      $xLength,
                                                                      $xStart,
                                                                      $xDraw,
                                                                      $xType );

      $this->output
      	->set_content_type('application/json')
      	->set_output($jsonResult);

  }

  public function saveJobExperienceHistory(){

	    $xArrResult = array();
      $xUserId = $this->input->post('x_id');
      $xJobExperienceId = $this->input->post('x_job_experience_id');
      $xInstansi = $this->input->post('x_instansi');
      $xJabatan = $this->input->post('x_jabatan');
      $xTahun = $this->input->post('x_mulai_tahun');
      $xBulan = $this->input->post('x_mulai_bulan');
      $xFile = $this->input->post('x_file_pengalaman_kerja');

      $xType = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addJobExperienceHistory( $this->_xUserId, 
                                                                      $xJobExperienceId,
                                                                      $xUserId,
                                                                      $xInstansi,
                                                                      $xJabatan,
                                                                      $xTahun,
                                                                      $xBulan,
                                                                      $xFile );
      
	    $this->output
      	->set_content_type('application/json')
      	->set_output($xArrResult);
  }
  
  public function confirmJobExperienceHistory(){

	    $xArrResult = array();
      $xId = $this->input->post('x_confirm_jobexperience_id');
      $xUserId = $this->input->post('x_confirm_jobexperience_user_id');
      $xType = $this->input->post('x_confirm_jobexperience_type');

      $xArrResult = $this->ci->employee_lib->confirmJobExperienceHistory( $this->_xUserId, 
                                                                              $xId,
                                                                              $xUserId,
                                                                              $xType );
      
	    $this->output
      	->set_content_type('application/json')
      	->set_output($xArrResult);
  }	
  
  /*SK CPNS*/
  public function showSKCPNS(){
      $xId = $this->input->post('id');              
      $data = array('id' => $xId);
      $data['module'] = 'skcpns';
      $data['rsGolongan'] = $this->ci->master_lib->getGolonganList();
      $data['rs'] = $this->ci->employee_lib->getSKCPNS( $this->_xUserId, $xId );
	    $this->load->view('master/employee/sk_cpns_data', $data);
  } 

  public function saveSKCPNS(){
    $xArrResult = array();

    $xArrResult = $this->ci->employee_lib->saveSKCPNS( $this->_xUserId,
                                                        $this->input->post('x_skcpns_user_id'),
                                                        $this->input->post('x_mulai_tanggal'),
                                                        $this->input->post('x_nip_pejabat'),
                                                        $this->input->post('x_nama_pejabat'),
                                                        $this->input->post('x_no_surat_keputusan'),
                                                        $this->input->post('x_tgl_keputusan'),
                                                        $this->input->post('x_no_surat_diklat'),
                                                        $this->input->post('x_tgl_diklat'),
                                                        $this->input->post('x_no_surat_uji_kesehatan'),
                                                        $this->input->post('x_tgl_uji_kesehatan'),
                                                        $this->input->post('x_no_skck'),
                                                        $this->input->post('x_tgl_skck'),
                                                        $this->input->post('x_golongan_ruang'),
                                                        $this->input->post('x_pengambilan_sumpah'),
                                                        $this->input->post('x_file_skcpns'),
                                                        $this->input->post('x_file_skck') );
      
    $this->output
      	->set_content_type('application/json')
      	->set_output($xArrResult);

  }

  /*SK-PNS*/
  public function showSKPNS(){
      $xId = $this->input->post('id');              
      $data = array('id' => $xId);
      $data['module'] = 'skpns';
      $data['rsGolongan'] = $this->ci->master_lib->getGolonganList();
      $data['rs'] = $this->ci->employee_lib->getSKPNS( $this->_xUserId, $xId );
      $this->load->view('master/employee/sk_pns_data', $data);
  } 

  public function saveSKPNS(){
    $xArrResult = array();

    $xArrResult = $this->ci->employee_lib->saveSKPNS( $this->_xUserId,
                                                        $this->input->post('x_skpns_user_id'),
                                                        $this->input->post('x_mulai_tanggal'),
                                                        $this->input->post('x_nip_pejabat'),
                                                        $this->input->post('x_nama_pejabat'),
                                                        $this->input->post('x_no_surat_keputusan'),
                                                        $this->input->post('x_tgl_keputusan'),
                                                        $this->input->post('x_no_surat_diklat'),
                                                        $this->input->post('x_tgl_diklat'),
                                                        $this->input->post('x_no_surat_uji_kesehatan'),
                                                        $this->input->post('x_tgl_uji_kesehatan'),
                                                        $this->input->post('x_golongan_ruang'),
                                                        $this->input->post('x_pengambilan_sumpah'),
                                                        $this->input->post('x_file_skpns') );
      
    $this->output
          ->set_content_type('application/json')
          ->set_output($xArrResult);

  }

  /*SK-PENSIUN*/
  public function showSKPensiun(){
      $xId = $this->input->post('id');              
      $data = array('id' => $xId);
      $data['module'] = 'skpensiun';
      $data['rsGolongan'] = $this->ci->master_lib->getGolonganList();
      $arrUnitKerja = $this->ci->master_lib->getUnitKerjaList();
      $rs = $this->ci->employee_lib->getSKPensiun( $this->_xUserId, $xId );
      $data['rs'] = $rs;

      $tree = $this->ci->global_lib->buildTree( $arrUnitKerja['data'] );
      $option = $this->ci->global_lib->printTree( $tree, $rs->data->unit_kerja_id );
      $data['option'] = $option;

      $this->load->view('master/employee/sk_pensiun_data', $data);
  } 

  public function saveSKPensiun(){
    $xArrResult = array();

    $xArrResult = $this->ci->employee_lib->saveSKPensiun( $this->_xUserId,
                                                        $this->input->post('x_skpensiun_user_id'),
                                                        $this->input->post('x_no_bkn'),
                                                        $this->input->post('x_tgl_bkn'),
                                                        $this->input->post('x_no_sk_pensiun'),
                                                        $this->input->post('x_tgl_pensiun'),
                                                        $this->input->post('x_tmt_pensiun'),
                                                        $this->input->post('x_golongan_id'),
                                                        $this->input->post('x_masa_kerja_thn'),
                                                        $this->input->post('x_masa_kerja_bln'),
                                                        $this->input->post('x_unit_kerja_id') );
      
    $this->output
          ->set_content_type('application/json')
          ->set_output($xArrResult);

  }

  /*===Riwayat Pegawai ===*/
  /*Riwayat Pangkat*/
  public function showRiwayatPangkatTableList(){
    $xId = $this->input->post('id');              
    $data = array('id' => $xId);
    $this->load->view('master/employee/riwayat_pangkat_data', $data);
  }

  public function getRiwayatPangkat(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');        
    $xType = '';//$this->input->post('type');
    $jsonResult = $this->ci->employee_lib->getRiwayatPangkat( $this->_xUserId,
                                                              $xId,
                                                              str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
                                                              $xLength,
                                                              $xStart,
                                                              $xDraw,
                                                              $xType );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  // Riwayat Jabatan
  public function showRiwayatJabatanTableList(){
    $xId = $this->input->post('id');              
    $data = array('id' => $xId);
    $this->load->view('master/employee/riwayat_jabatan_data', $data);
  }

  public function getRiwayatJabatan(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');       
    $xType = '';//$this->input->post('type');

    //echo "Start : " . $xStart . " | " . $xLength;

    $jsonResult = $this->ci->employee_lib->getRiwayatJabatan( $this->_xUserId,
                                                              $xId,
                                                              str_replace(" ", "%20", str_replace(" ", "%20", $xKeyword['value'])),
                                                              $xLength,
                                                              $xStart,
                                                              $xDraw,
                                                              $xType );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  /*Riwayat Pendidikan*/
  public function showRiwayatPendidikanUmumTableList(){
    $xId = $this->input->post('id');              
    $data = array('id' => $xId);
    $this->load->view('master/employee/riwayat_pendidikanumum_data', $data);
  }

  public function getRiwayatPendidikanUmum(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');        
    $xType = '';//$this->input->post('type');
    $jsonResult = $this->ci->employee_lib->getRiwayatPendidikanUmum( $this->_xUserId,
                                                                     $xId,
                                                                     str_replace(" ", "%20", $xKeyword['value']),
                                                                     $xLength,
                                                                     $xStart,
                                                                     $xDraw,
                                                                     $xType );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  /*Riwayat Pendidikan Diklat*/
  public function showRiwayatPendidikanDiklatTableList(){
    $xId = $this->input->post('id');              
    $data = array('id' => $xId);
    $this->load->view('master/employee/riwayat_pendidikandiklat_data', $data);
  }

  public function getRiwayatPendidikanDiklat(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');        
    $xType = '';//$this->input->post('type');
    $jsonResult = $this->ci->employee_lib->getRiwayatPendidikanDiklat( $this->_xUserId,
                                                                       $xId,
                                                                       str_replace(" ", "%20", $xKeyword['value']),
                                                                       $xLength,
                                                                       $xStart,
                                                                       $xDraw,
                                                                       $xType );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  /*=== KELUARGA ===*/
  /*Orang Tua*/
  public function showKeluargaTableList(){
    $xId = $this->input->post('id');           
    $xDataType = $this->input->post('type');
    $data['id'] = $xId;
    $data['dataType'] = $xDataType;
    $page = "";
    if( $xDataType == 1 ){
      $page = "orang_tua_data";
    }else if( $xDataType == 2 ){
      $page = "suami_istri_data";
    }else if( $xDataType == 3 ){
      $page = "anak_data";
      $data['rsDDSuamiIstri'] = $this->employee_lib->getDropdownSuamiIstri($this->_xUserId,
                                                                          $xId,
                                                                          str_replace(" ", "%20", $xKeyword['value']),
                                                                          $xLength,
                                                                          $xStart,
                                                                          $xDraw,
                                                                          $xType);
    }

    $this->load->view('master/employee/' . $page, $data);
  }

  public function getKeluargaData(){
      $xId = $this->input->post('id');
      $xParentUserFamilyId = $this->input->post('parentUserFamilyId');
      $xKeyword = $this->input->post('search');
      $xStart = $this->input->post('start');
      $xLength = $this->input->post('length');
      $xDraw = $this->input->post('draw');        
      $xType = $this->input->post('type');
      $jsonResult = $this->ci->employee_lib->getKeluarga( $this->_xUserId,
                                                          $xId,
                                                          $xParentUserFamilyId,
                                                          str_replace(" ", "%20", $xKeyword['value']),
                                                          $xLength,
                                                          $xStart,
                                                          $xDraw,
                                                          $xType );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  /*Suami / Istri*/
  public function showUserTableList(){
    $data             = array();
    $this->load->view('master/employee/user_data', $data);
  }

  public function showUserForm(){
    $data             = array();
    $data['rsAgama']  = $this->master_lib->getMaster("agama");
    $data['rsStatusNikah']  = $this->master_lib->getMaster("status_nikah");
    $data['xAct'] = ( $this->input->post('act') == "" ? "add" : $this->input->post('act') ) ;
    if( $this->input->post('act') == "edit" ){
      $jsonResult = $this->employee_lib->getDetailData("/user/profile", 0, $this->input->post('id'));
      $data['rsProfile'] = json_decode($jsonResult);
    }

    $this->load->view('master/employee/user_form', $data);
  }

  public function saveUserFamily(){
      $xArrResult = array();

      $xArrResult = $this->ci->employee_lib->saveUserFamily( $this->_xUserId,
                                                             $this->input->post('x_add_nama'),
                                                             $this->input->post('x_add_gelar_depan'),
                                                             $this->input->post('x_add_gelar_belakang'),
                                                             $this->input->post('x_add_tempat_lahir'),
                                                             $this->input->post('x_add_tgl_lahir'),
                                                             $this->input->post('x_add_jenis_kelamin'),
                                                             $this->input->post('x_add_agama'),
                                                             $this->input->post('x_add_email'),
                                                             $this->input->post('x_add_nik'),
                                                             $this->input->post('x_add_alamat'),
                                                             $this->input->post('x_add_no_hp'),
                                                             $this->input->post('x_add_no_telp'),
                                                             $this->input->post('x_add_status_nikah'),
                                                             $this->input->post('x_add_akte_kelahiran'),
                                                             $this->input->post('x_add_status_hidup'),
                                                             $this->input->post('x_add_tgl_meninggal'),
                                                             $this->input->post('x_add_akte_meninggal'),
                                                             $this->input->post('x_add_tgl_npwp'),
                                                             $this->input->post('x_add_no_npwp'),
                                                             $this->input->post('x_act_suamiistri'),
                                                             $this->input->post('x_act_suamiistri_id') );
        
      $this->output
            ->set_content_type('application/json')
            ->set_output($xArrResult);
  }

  public function saveFamily(){
      $xArrResult = array();

      $xArrResult = $this->ci->employee_lib->saveFamily( $this->_xUserId,
                                                         $this->input->post('x_id'),
                                                         $this->input->post('x_act'),
                                                         $this->input->post('x_suamiistri_id'),
                                                         $this->input->post('x_suamiistri_user_family_id'),
                                                         $this->input->post('x_suamiistri_relasi_id'),
                                                         $this->input->post('x_tgl_menikah'),
                                                         $this->input->post('x_akte_menikah'),
                                                         $this->input->post('x_tgl_cerai'),
                                                         $this->input->post('x_akte_cerai'),
                                                         $this->input->post('x_is_pns'));
        
      $this->output
            ->set_content_type('application/json')
            ->set_output($xArrResult);
  }

  public function saveAnak(){
      $xArrResult = array();

      $xArrResult = $this->ci->employee_lib->saveAnak( $this->_xUserId,
                                                         $this->input->post('x_id'),
                                                         $this->input->post('x_act'),
                                                         $this->input->post('x_anak_id'),
                                                         $this->input->post('x_anak_user_family_id'),
                                                         $this->input->post('x_anak_parent_user_family_id'),
                                                         3,
                                                         $this->input->post('x_status_anak'));
        
      $this->output
            ->set_content_type('application/json')
            ->set_output($xArrResult);
  }

  /*=== PMK ===*/
  public function showPMKTableList(){
    $xId = $this->input->post('id');  
    $data['id'] = $xId;
    $data['rsJenisPMK']  = $this->master_lib->getMaster("jenis_pmk","");
    $this->load->view('master/employee/pmk_data', $data);
  }

  public function getPMKData(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');       

    $jsonResult = $this->ci->employee_lib->getPMK( $this->_xUserId,
                                                    $xId,
                                                    str_replace(" ", "%20", $xKeyword['value']),
                                                    $xLength,
                                                    $xStart,
                                                    $xDraw );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  /*=== PENGHARGAAN ===*/
  public function showPenghargaanTableList(){
    $xId = $this->input->post('id');  
    $data['id'] = $xId;
    $this->load->view('master/employee/penghargaan_data', $data);
  }

  public function getPenghargaanData(){
    $xId = $this->input->post('id');
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');       

    $jsonResult = $this->ci->employee_lib->getPenghargaan( $this->_xUserId,
                                                          $xId,
                                                          str_replace(" ", "%20", $xKeyword['value']),
                                                          $xLength,
                                                          $xStart,
                                                          $xDraw );

    //echo "RESULT : " . $jsonResult;

    $this->output
      ->set_content_type('application/json')
      ->set_output($jsonResult);
  }

  /*=== Kursus ===*/
   public function showKursusTableList(){
      $xId = $this->input->post('id');  
      $data['id'] = $xId;
      $this->load->view('master/employee/kursus_data', $data);
    }

    public function getKursusData(){
      $xId = $this->input->post('id');
      $xKeyword = $this->input->post('search');
      $xStart = $this->input->post('start');
      $xLength = $this->input->post('length');
      $xDraw = $this->input->post('draw');       

      $jsonResult = $this->ci->employee_lib->getKursus( $this->_xUserId,
                                                      $xId,
                                                      str_replace(" ", "%20", $xKeyword['value']),
                                                      $xLength,
                                                      $xStart,
                                                      $xDraw );

      //echo "RESULT : " . $jsonResult;

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);
    }

  /* === DP3 ===*/
  public function showDP3TableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsJenisJabatan']  = $this->master_lib->getMaster("jenis_jabatan");
    $this->load->view('master/employee/dp3_data', $data);
  }

  public function getDP3Data(){
      $xId = $this->input->post('id');
      $xKeyword = $this->input->post('search');
      $xStart = $this->input->post('start');
      $xLength = $this->input->post('length');
      $xDraw = $this->input->post('draw');        
      $jsonResult = $this->ci->employee_lib->getDP3( $this->_xUserId,
                                                      $xId,
                                                      str_replace(" ", "%20", $xKeyword['value']),
                                                      $xLength,
                                                      $xStart,
                                                      $xDraw );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  public function saveDP3(){

      $xArrResult = array();
      $xDP3Id = $this->input->post('x_dp3_id');
      $xUserId = $this->input->post('x_id');
      $xJenisJabatanId = $this->input->post('x_addedit_jenis_jabatan');
      $xTahun = $this->input->post('x_addedit_tahun');
      $xKesetiaan = $this->input->post('x_addedit_kesetiaan');
      $xTanggungJawab = $this->input->post('x_addedit_tanggung_jawab');
      $xKejujuran = $this->input->post('x_addedit_kejujuran');
      $xPrakarsa = $this->input->post('x_addedit_prakarsa');
      $xPrestasiKerja = $this->input->post('x_addedit_prestasi_kerja');
      $xKetaatan = $this->input->post('x_addedit_ketaatan');
      $xKerjasama = $this->input->post('x_addedit_kerjasama');
      $xKepemimpinan = $this->input->post('x_addedit_kepemimpinan');
      $xJumlah = $this->input->post('x_addedit_jumlah');
      $xNilaiRata = $this->input->post('x_addedit_nilai_rata');
      $xPejabatPenilaiId = $this->input->post('x_addedit_pejabat_penilai_id');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addDP3( $this->_xUserId, 
                                                      $xUserId,
                                                      $xJenisJabatanId,
                                                      $xTahun,
                                                      $xKesetiaan,
                                                      $xTanggungJawab,
                                                      $xKejujuran,
                                                      $xPrakarsa,
                                                      $xPrestasiKerja,
                                                      $xKetaatan,
                                                      $xKerjasama,
                                                      $xKepemimpinan,
                                                      $xJumlah,
                                                      $xNilaiRata,
                                                      $xPejabatPenilaiId,
                                                      $xDP3Id,
                                                      $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  public function deleteDP3(){
      $xId = $this->input->post('id');       
      $jsonResult = $this->ci->employee_lib->deleteDP3( $this->_xUserId,
                                                        $xId );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  /* === HUKUMAN DISIPLIN ===*/
  public function showHukdisTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsJenisHukuman']  = $this->master_lib->getMaster("jenis_hukuman");
    $this->load->view('master/employee/hukdis_data', $data);
  }  

  public function saveHukdis(){

      $xArrResult = array();
      $xHukDisId = $this->input->post('x_hukdis_id');
      $xUserId = $this->input->post('x_id');
      $xJenisHukuman = $this->input->post('x_addedit_jenis_hukuman');
      $xNoSkHd = $this->input->post('x_addedit_sk_hd');
      $xTglSkHd = $this->input->post('x_addedit_tgl_sk_hd');
      $xTmtHd = $this->input->post('x_addedit_tmt_hd');
      $xMasaHukumanTahun = $this->input->post('x_addedit_masa_hukuman_tahun');
      $xMasaHukumanBulan = $this->input->post('x_addedit_masa_hukuman_bulan');
      $xNoPp = $this->input->post('x_addedit_no_pp');
      $xAlasanHukuman = $this->input->post('x_addedit_alasan_hukuman');
      $xKeterangan = $this->input->post('x_addedit_keterangan');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addHukdis( $this->_xUserId, 
                                                        $xUserId,
                                                        $xJenisHukuman,
                                                        $xNoSkHd,
                                                        $xTglSkHd,
                                                        $xTmtHd,
                                                        $xMasaHukumanTahun,
                                                        $xMasaHukumanBulan,
                                                        $xNoPp,
                                                        $xAlasanHukuman,
                                                        $xKeterangan,
                                                        $xHukDisId,
                                                        $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  /* === PWK ===*/
  public function showPWKTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsKppn']  = $this->master_lib->getMaster("kppn");
    $data['rsSatuanKerja']  = $this->master_lib->getMaster("satuan_kerja");
    $data['rsLokasi']  = $this->master_lib->getMaster("lokasi");
    $data['rsUnor']  = $this->master_lib->getMaster("unor");
    $this->load->view('master/employee/pwk_data', $data);
  }  

  public function savePWK(){

      $xArrResult = array();
      $xPwkId = $this->input->post('x_pwk_id');
      $xUserId = $this->input->post('x_id');
      $xKppn = $this->input->post('x_addedit_pwk_kppn');
      $xSatuanKerja = $this->input->post('x_addedit_pwk_satuan_kerja');
      $xLokasi = $this->input->post('x_addedit_pwk_lokasi');
      $xUnor = $this->input->post('x_addedit_pwk_unor');
      $xNoSK = $this->input->post('x_addedit_pwk_no_sk');
      $xTglSK = $this->input->post('x_addedit_pwk_tgl_sk');
      $xTmtPemindahan = $this->input->post('x_addedit_pwk_tmt_pemindahan');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addPWK( $this->_xUserId, 
                                                      $xUserId,
                                                      $xKppn,
                                                      $xSatuanKerja,
                                                      $xLokasi,
                                                      $xUnor,
                                                      $xNoSK,
                                                      $xTglSK,
                                                      $xTmtPemindahan,
                                                      $xPwkId,
                                                      $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  /* === PINDAH INSTANSI ===*/
  public function showPindahInstansiTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsPangkat']  = $this->master_lib->getMaster("pangkat");
    $data['rsInstansiKerja']  = $this->master_lib->getMaster("instansi_kerja");
    $data['rsSatuanKerja']  = $this->master_lib->getMaster("satuan_kerja");
    $data['rsUnor']  = $this->master_lib->getMaster("unor");
    $data['rsJabatanFungsional']  = $this->master_lib->getMaster("jabatan_fungsional");
    $data['rsInstansiInduk']  = $this->master_lib->getMaster("instansi_induk");
    $data['rsSatkerInduk']  = $this->master_lib->getMaster("satuan_kerja_induk");    
    $data['rsLokasi']  = $this->master_lib->getMaster("lokasi");
    $data['rsKppn']  = $this->master_lib->getMaster("kppn");
    $data['rsJabatanFungsionalUmum']  = $this->master_lib->getMaster("jabatan_fungsional_umum");
    $this->load->view('master/employee/pindah_instansi_data', $data);
  }  

  public function savePindahInstansi(){

      $xArrResult = array();
      $xPindahInstansiId = $this->input->post('x_pindahinstansi_id');
      $xUserId = $this->input->post('x_id');
      $xJenisPemindahan = $this->input->post('x_addedit_pindahinstansi_jenis_pemindahan');
      $xJenisPegawai = $this->input->post('x_addedit_pindahinstansi_jenis_pegawai');
      $xJenisJabatanLama = $this->input->post('x_addedit_pindahinstansi_jenis_jataban_lama');
      $xJenisJabatanBaru = $this->input->post('x_addedit_pindahinstansi_jenis_jataban_baru');
      $xInstansiKerjaLama = $this->input->post('x_addedit_pindahinstansi_instansi_kerja_lama');
      $xInstansiKerjaBaru = $this->input->post('x_addedit_pindahinstansi_instansi_kerja_baru');
      $xSatuanKerjaLama = $this->input->post('x_addedit_pindahinstansi_satuan_kerja_lama');
      $xSatuanKerjaBaru = $this->input->post('x_addedit_pindahinstansi_satuan_kerja_baru');
      $xUnorLama = $this->input->post('x_addedit_pindahinstansi_unor_lama');
      $xUnorBaru = $this->input->post('x_addedit_pindahinstansi_unor_baru');
      $xJabatanFungsionalLama = $this->input->post('x_addedit_pindahinstansi_jabatan_fungsional_lama');
      $xJabatanFungsionalBaru = $this->input->post('x_addedit_pindahinstansi_jabatan_fungsional_baru');
      $xInstansiIndukLama = $this->input->post('x_addedit_pindahinstansi_instansi_induk_lama');
      $xInstansiIndukBaru = $this->input->post('x_addedit_pindahinstansi_instansi_induk_baru');
      $xSatuanKerjaIndukLama = $this->input->post('x_addedit_pindahinstansi_satuan_kerja_induk_lama');
      $xSatuanKerjaIndukBaru = $this->input->post('x_addedit_pindahinstansi_satuan_kerja_induk_baru');
      $xLokasiKerjaLama = $this->input->post('x_addedit_pindahinstansi_lokasi_kerja_lama');
      $xLokasiKerjaBaru = $this->input->post('x_addedit_pindahinstansi_lokasi_kerja_baru');
      $xKPPNBaru = $this->input->post('x_addedit_pindahinstansi_kppn_baru');
      $xJabatanFungsionalUmumBaru = $this->input->post('x_addedit_pindahinstansi_jabatan_fungsional_umum_baru');
      $xNoSuratInstansiAsal = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_asal');
      $xTglSK1 = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_1');
      $xNoSuratInstansiAsalProv = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_asal_prov');
      $xTglSK2 = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_2');
      $xNoSuratInstansiTujuan = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tujuan');
      $xTglSK3 = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_3');
      $xNoSuratInstansiTujuanProv = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tujuan_prov');
      $xTglSK4 = $this->input->post('x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_4');
      $xNoSK = $this->input->post('x_addedit_pindahinstansi_no_sk');
      $xTglSK = $this->input->post('x_addedit_pindahinstansi_tgl_sk');
      $xTmtPi = $this->input->post('x_addedit_pindahinstansi_tmt_pi');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addPindahInstansi( $this->_xUserId, 
                                                                $xUserId,
                                                                $xJenisPemindahan,
                                                                $xJenisPegawai,
                                                                $xJenisJabatanLama,
                                                                $xJenisJabatanBaru,
                                                                $xInstansiKerjaLama,
                                                                $xInstansiKerjaBaru,
                                                                $xSatuanKerjaLama,
                                                                $xSatuanKerjaBaru,
                                                                $xUnorLama,
                                                                $xUnorBaru,
                                                                $xJabatanFungsionalLama,
                                                                $xJabatanFungsionalBaru,
                                                                $xInstansiIndukLama,
                                                                $xInstansiIndukBaru,
                                                                $xSatuanKerjaIndukLama,
                                                                $xSatuanKerjaIndukBaru,
                                                                $xLokasiKerjaLama,
                                                                $xLokasiKerjaBaru,
                                                                $xKPPNBaru,
                                                                $xJabatanFungsionalUmumBaru,
                                                                $xNoSuratInstansiAsal,
                                                                $xTglSK1,
                                                                $xNoSuratInstansiAsalProv,
                                                                $xTglSK2,
                                                                $xNoSuratInstansiTujuan,
                                                                $xTglSK3,
                                                                $xNoSuratInstansiTujuanProv,
                                                                $xTglSK4,
                                                                $xNoSK,
                                                                $xTglSK,
                                                                $xTmtPi,
                                                                $xPindahInstansiId,
                                                                $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }


  /* === CLTN ===*/
  public function showCLTNTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsJenisCLTN']  = $this->master_lib->getMaster("jenis_cltn");
    $this->load->view('master/employee/cltn_data', $data);
  }  

  /* === HISTORY UNOR ===*/
  public function showHistoryUnorTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;    
    $this->load->view('master/employee/unor_data', $data);
  } 

  /* === HISTORY PEMBERHENTIAN ===*/
  public function showHistoryPemberhentianTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;    
    $this->load->view('master/employee/pemberhentian_data', $data);
  }

  /* === HISTORY ANGKA KREDIT ===*/
  public function showHistoryAngkaKreditTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;    
    $this->load->view('master/employee/angka_kredit_data', $data);
  } 

  public function saveCLTN(){

      $xArrResult = array();
      $xCLTNId = $this->input->post('x_cltn_id');
      $xUserId = $this->input->post('x_id');
      $xJenisCLTN = $this->input->post('x_addedit_cltn_jenis_cltn');
      $xNoSK = $this->input->post('x_addedit_cltn_no_sk');
      $xTglSK = $this->input->post('x_addedit_cltn_tgl_skep');
      $xTglAwal = $this->input->post('x_addedit_cltn_tgl_awal');
      $xTglAkhir = $this->input->post('x_addedit_cltn_tgl_akhir');
      $xTglAktif = $this->input->post('x_addedit_cltn_tgl_aktif');
      $xNoBKN = $this->input->post('x_addedit_cltn_no_bkn');
      $xTglBKN = $this->input->post('x_addedit_cltn_tgl_bkn');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addCLTN( $this->_xUserId, 
                                                      $xUserId,
                                                      $xJenisCLTN,
                                                      $xNoSK,
                                                      $xTglSK,
                                                      $xTglAwal,
                                                      $xTglAkhir,
                                                      $xTglAktif,
                                                      $xNoBKN,
                                                      $xTglBKN,
                                                      $xCLTNId,
                                                      $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  /* === SKP ===*/
  public function showSKP(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;    
    $data['rsJenisJabatan']  = $this->master_lib->getMaster("jenis_jabatan_skp");
    $this->load->view('master/employee/skp_data', $data);
  } 

  /* === PROFESI ===*/
  public function showProfesiTableList(){
    $xId = $this->input->post('id');              
    $data['id'] = $xId;
    $data['rsJenisProfesi']  = $this->master_lib->getMaster("jenis_profesi");
    $this->load->view('master/employee/profesi_data', $data);
  }  

  public function saveProfesi(){

      $xArrResult = array();
      $xProfesiId = $this->input->post('x_profesi_id');
      $xUserId = $this->input->post('x_id');
      $xJenisProfesi = $this->input->post('x_addedit_profesi_jenis_profesi');
      $xPenyelenggara = $this->input->post('x_addedit_profesi_penyelenggara');
      $xTahunLulus = $this->input->post('x_addedit_profesi_tahun_lulus');

      $xAct = $this->input->post('x_act');

      $xArrResult = $this->ci->employee_lib->addProfesi($this->_xUserId, 
                                                        $xUserId, 
                                                        $xJenisProfesi,
                                                        $xPenyelenggara,
                                                        $xTahunLulus,
                                                        $xProfesiId,
                                                        $xAct );
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  /*SK CPNS*/
  public function showCPNSPNS(){
      $xId = $this->input->post('id');              
      $data = array('id' => $xId);
      $data['module'] = 'skcpns';
      $data['rsPengadaan'] = $this->ci->master_lib->getMaster("jenis_pengadaan");
      $this->load->view('master/employee/cpnspns_data', $data);
  }

  /* DOSIER */
  public function saveDosier(){
      $xArrResultSave = array();
      $xArrResult = array();

      if( $this->input->post('x_file_kartu_pegawai') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           1,
                                                           $this->input->post('x_file_kartu_pegawai'));
        
      }

      if( $this->input->post('x_file_ktp') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           2,
                                                           $this->input->post('x_file_ktp'));
        
      }

      if( $this->input->post('x_file_kartu_keluarga') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           3,
                                                           $this->input->post('x_file_kartu_keluarga'));
        
      }

      if( $this->input->post('x_file_buku_tabungan') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           4,
                                                           $this->input->post('x_file_buku_tabungan'));
        
      }

      if( $this->input->post('x_file_npwp') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           5,
                                                           $this->input->post('x_file_npwp'));
        
      }

      if( $this->input->post('x_file_lhkpn') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           6,
                                                           $this->input->post('x_file_lhkpn'));
        
      }

      if( $this->input->post('x_file_askes_bpjs') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           7,
                                                           $this->input->post('x_file_askes_bpjs'));
        
      }

      if( $this->input->post('x_file_taspen') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                           $this->input->post('x_user_id_dosier'),
                                                           8,
                                                           $this->input->post('x_file_taspen'));
        
      }
      
      $xArrResult['status_code'] = '00';
      $xArrResult['status_msg'] = 'Data Dosier berhasil disimpan';
      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($xArrResult));
  }


  /*Non Aktif Pegawai*/
  public function nonActiveEmployee(){
      $xArrResult = array();
      $xAdminId = $this->_xUserId;
      $xUserId = $this->input->post('x_id_nonactive');
      $xTypeId = $this->input->post('x_type_id');
      $xNoSK = $this->input->post('x_no_sk');
      $xTglSK = $this->input->post('x_tgl_sk');
      $xFileSK = $this->input->post('x_file_sk_nonactive');
      $xTglEfektif = $this->input->post('x_tgl_efektif');

      $xArrResult = $this->ci->employee_lib->nonActiveEmployee($xAdminId, $xUserId,   
                                                               $xTypeId,
                                                               $xNoSK,
                                                               $xTglSK,
                                                               $xFileSK,
                                                               $xTglEfektif );

      if( $this->input->post('x_file_sk_nonactive') != "" ){
        $xArrResultSave = $this->ci->employee_lib->saveDosier( $this->_xUserId,
                                                               $this->input->post('x_id_nonactive'),
                                                               $xTypeId,
                                                               $this->input->post('x_file_sk_nonactive'));
        
      }
      
      $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);
  }

  public function changePassword(){

      $setting = "";
      $template = $this->template->load($setting);        
      $data['id'] = $this->_xEncUserId;

      $template['konten'] = $this->load->view('change_password', $data, true);
             
      $this->load->view('template/container',$template);
      
  }

  public function doChangePassword(){
    $xId  = $this->input->post("x_user_id");
    $xOldPassword = $this->input->post("x_old_password");
    $xNewPassword = $this->input->post("x_new_password");

    $xResult = $this->ci->employee_lib->doChangePassword( $xId, $xOldPassword, $xNewPassword );
    if( $xResult['status_code'] == '00' ){
      $arr_result = array( 'status_code' => '00', 'status_msg' => $xResult['status_msg'] );

      $xSessionData     = array( 'SESSION_MSG_RESET_PASSWORD' => $xResult['status_msg'] ) ;

      $this->session->set_userdata($xSessionData);

      redirect("index.php/login/logout", "refresh");
      //$this->load->view('login',$arr_result);
    }else{
      $arr_result = array( 'status_code' => '-99', 'status_msg' => $xResultForgotPassword['status_msg'] );
      $xSessionData     = array( 'SESSION_MSG_RESET_PASSWORD' => $xResult['status_msg'] ) ;
      $this->session->set_userdata($xSessionData);
      redirect("index.php/employee/changePassword", "refresh");
      //$this->load->view('change_password',$arr_result);
    }
  }


  /* =============== Upload File ===============*/
  /** Job Experience */
	public function uploadJobExperienceHistory(){
		$arr_result 	= array();
		$fileName  		= 
		$upload			= $this->upload_file->doUploadFlile("files/job_experience", "x_file_pengalaman_kerja", "PengalamanKerja_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}

	public function cancelUploadJobExperienceHistory(){
		$this->upload_file->cancelUpload("files/job_experience");
  }
    
  /** SK CPNS */
  public function uploadSKCPNS(){
		$arr_result 	= array();
		$fileName  		= 
		$upload			= $this->upload_file->doUploadFlile("files/skcpns", "x_file_skcpns", "SK-CPNS_");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKCPNS(){
		$this->upload_file->cancelUpload("files/skcpns");
  }
  
  public function uploadSKCK(){
		$arr_result 	= array();
		$fileName  		= 
		$upload			= $this->upload_file->doUploadFlile("files/skcpns/skck", "x_file_skck", "SKCK");
		$arr_result[]	= $upload['file_name'];
		echo json_encode( $arr_result );
	}
	public function cancelUploadSKCK(){
		$this->upload_file->cancelUpload("files/skcpns/skck");
	}

  public function uploadSKPNS(){
    $arr_result   = array();
    $fileName     = 
    $upload     = $this->upload_file->doUploadFlile("files/skpns", "x_file_skpns", "SK-PNS_");
    $arr_result[] = $upload['file_name'];
    echo json_encode( $arr_result );
  }
  public function cancelUploadSKPNS(){
    $this->upload_file->cancelUpload("files/skpns");
  }

  public function uploadSKNonActive(){
    $arr_result   = array();
    $path = "";
    $prefixFile = "";
    $typeId = $this->input->post('type_id');

    if( $typeId == '14' ){
      $path = "pensiun";
      $prefixFile = "SKPENSIUN_";
    }else if( $typeId == '15' ){
      $path = "pindah_instansi";
      $prefixFile = "SKPINDAHINSTANSI_";
    }else if( $typeId == '12' ){
      $path = "pemberhentian";
      $prefixFile = "SKPEMBERHENTIAN_";
    }else{
      $path = "pemberhentian";
      $prefixFile = "SKPEMBERHENTIAN_";
    }

    $upload     = $this->ci->upload_file->doUploadFlile("files/profiles/" . $path, "x_file_sk_nonactive", $prefixFile);
    $arr_result[] = $upload['file_name'];
    echo json_encode( $arr_result );
  }

  public function cancelUploadSKNonActive(){
    $this->upload_file->cancelUpload("files/profiles/pemberhentian");
  }



}

?>