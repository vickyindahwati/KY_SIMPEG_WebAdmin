 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller{

	protected $elementOption;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');
		$this->load->library('export');
		

	}


	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Keluarga';
		
		$template['konten']			= $this->load->view('master/family/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}


	public function tableView(){		

		$data['title']				= 'Family Data';		

		$this->load->view('master/family/data', $data);

	}


	public function form(){

		#get template design
		$this->load->library('../controllers/master');

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Family';

		$data['rs_branch']			= $this->mgeneral->getWhere( array(), 'branches', 'branch_name', 'ASC' );

		$data['rs_bloodtype']			= $this->master->getBloodType();
		$data['rs_position']			= $this->master->getPositionInFamily();
		$data['rs_schooltitle']			= $this->master->getSchoolTitle();
		$data['rs_school']				= $this->master->getSchool();
		$data['rs_occupation']			= $this->master->getOccupation();
		$data['rs_occupation_status']	= $this->master->getOccupationStatus();
		$data['rs_industry_sector']		= $this->master->getIndustrySector();
		$data['rs_province']			= $this->master->getProvince();
		$data['rs_milestone']			= $this->master->getMilestone();
		
		$template['konten']			= $this->load->view('master/family/form', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function uploadPhoto(){

		$arr_result 	= array();

		$upload			= $this->upload_file->upload_img("photo/profile", "x_file");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadPhoto(){

		$this->upload_file->cancelUpload("photo/profile");

	}


	public function getCityByProvinceId(){

		$this->load->library('../controllers/master');

		$provinceId 	= $this->input->post( 'id' );

		$this->master->getCityByProvinceId( $provinceId );

	}

	public function getKecamatanByCityId(){

		$this->load->library('../controllers/master');

		$id 	= $this->input->post( 'id' );

		$this->master->getKecamatanByCityId( $id );

	}

	public function getKelurahanByKecamatanId(){

		$this->load->library('../controllers/master');

		$id 	= $this->input->post( 'id' );

		$this->master->getKelurahanByKecamatanId( $id );

	}

	public function getZipCodeByKelurahan(){

		$this->load->library('../controllers/master');

		$id 	= $this->input->post( 'id' );

		$this->master->getZipCodeByKelurahan( $id );

	}


	public function save(){

		$session_user_id 								= $this->session->userdata['SESSION_PRJ_A'];
		$act 											= $this->input->post('x_act');

		/*Get All element first*/
		/*1. Family element*/

		$houseHoldType									= $this->input->post('x_hh_type');

		$data_family['branch_id']						= $this->input->post('x_branch');
		$data_family['kkj_number']						= $this->input->post('x_kkj');
		$data_family['house_holder_name']				= $this->input->post('x_house_hold_name');
		$data_family['register_date']					= $this->input->post('x_register_date');
		$data_family['emergency_person_name']			= $this->input->post('x_emergency_person_name');
		$data_family['emergency_person_address']		= $this->input->post('x_emergency_person_address');
		$data_family['emergency_phone_number']			= $this->input->post('x_emergency_phone_number');
		$data_family['emergency_person_relation'] 		= $this->input->post('emergency_person_relation');
		$data_family['created']							= $this->input->post('x_register_date');
		$data_family['created_user']					= $this->input->post('x_register_date');

		/*2. Person Element*/
		$data_person['full_name']						= $this->input->post('x_house_hold_name');
		$data_person['birth_place']						= $this->input->post('x_birth_place');
		$data_person['birth_date']						= $this->input->post('x_birth_date');
		$data_person['sex']								= $this->input->post('x_gender');
		$data_person['marital_status']					= $this->input->post('x_marital_status');
		$data_person['register_date']					= date('Y-m-d');
		$data_person['position_in_family_id']			= $this->input->post('x_position_in_family');
		$data_person['ktp_number']						= $this->input->post('x_ktp_number');
		$data_person['identity_type']					= 5;//$this->input->post('');
		$data_person['address']							= $this->input->post('x_address');
		$data_person['province_id']						= $this->input->post('x_province');
		$data_person['city_id']							= $this->input->post('x_city');
		$data_person['district_id']						= $this->input->post('x_kecamatan');
		$data_person['village_id']						= $this->input->post('x_kelurahan');
		$data_person['zip_code']						= $this->input->post('x_zipcode');
		$data_person['rt_rw']							= $this->input->post('x_rtrw');
		$data_person['home_phone_number_1']				= $this->input->post('x_home_phone_1');
		$data_person['home_phone_number_2']				= $this->input->post('x_home_phone_2');
		$data_person['cell_phone_number_1']				= $this->input->post('x_hp_1');
		$data_person['cell_phone_number_2']				= $this->input->post('x_hp_2');
		$data_person['email']							= $this->input->post('x_email');
		$data_person['photo']							= $this->input->post('x_file');
		$data_person['school_id']						= $this->input->post('x_school');
		$data_person['school_title_id']					= $this->input->post('x_school_title');
		$data_person['branch_id']						= $this->input->post('x_branch');
		$data_person['blood_type']						= $this->input->post('x_blood_type_id');
		$data_person['occupation_id']					= $this->input->post('x_occupation');
		$data_person['occupation_position']				= $this->input->post('x_occupation_position');
		$data_person['occupation_status']				= $this->input->post('x_status_occupation');
		$data_person['company_name']					= $this->input->post('x_company_name');
		$data_person['office_phone']					= $this->input->post('x_company_telephone');
		$data_person['office_address']					= $this->input->post('x_company_address');
		$data_person['industry_id']						= $this->input->post('x_industry');
		$data_person['sms_flag']						= $this->input->post('x_flag_sms');
		$data_person['email_flag']						= $this->input->post('x_flag_email');

		if( $act == 'add-family' ){

			$arr_value['created']		= date('Y-m-d H:i:s');
			$arr_value['created_user']	= $this->converter->decode( $session_user_id );		

			if( $houseHoldType == 2 ){

				/*1. Call Store Procedure to Add Person Data*/
				$arrSPFamily 				= array( '',
													 $data_person['full_name'],
													 $data_person['birth_place'],
													 $data_person['birth_date'],
													 $data_person['sex'],
													 $data_person['marital_status'],
													 $data_person['register_date'],
													 $data_person['position_in_family_id'],
													 $data_person['blood_type'],
													 $data_person['identity_type'],
													 $data_person['ktp_number'],
													 $data_person['address'],
													 $data_person['province_id'],
													 $data_person['city_id'],
													 $data_person['district_id'],
													 $data_person['village_id'],
													 $data_person['zip_code'],
													 $data_person['rt_rw'],
													 $data_person['home_phone_number_1'],
													 $data_person['home_phone_number_2'],
													 $data_person['cell_phone_number_1'],
													 $data_person['cell_phone_number_2'],
													 $data_person['email'],
													 $data_person['school_title_id'],
													 $data_person['school_id'],
													 $data_person['occupation_id'],
													 $data_person['occupation_position'],
													 $data_person['occupation_status'],
													 $data_person['company_name'],
													 $data_person['office_phone'],
													 $data_person['office_address'],
													 $data_person['industry_id'],
													 $arr_value['created_user'],
													 $data_person['branch_id'],
													 $data_person['photo'],
													 '',
													 1,
													 0,
													 '',
													 '',
													 $data_person['sms_flag'],
													 $data_person['email_flag'],
													 $this->config->item('dbAESKey'),
													 1,
													 0,
													 0,
													 0 );

				$store_proc         = "CALL V2_sp_register_persons(" . $this->mgeneral->printDataBinding( 47 ) . ")";

				$rsSPFamily 				= $this->mgeneral->callStoreProc( $store_proc, $arrSPFamily );

				echo "zip code : " . $this->input->post('x_zipcode') . "<br>";
				echo "Identity Type : " . $data_person['identity_type'] . "<br>";
				echo "RT/RW : " . $data_person['rt_rw'] . "<br>";
				echo "branch_id : " . $data_person['branch_id'] . "<br>";

				echo "vStatus : " . $rsSPFamily[0]->vStatus;
				echo "vMsg : " . $rsSPFamily[0]->vMsg;
				echo "vKAJ : " . $rsSPFamily[0]->vKAJ;
				echo "vAddedPersonID : " . $rsSPFamily[0]->vAddedPersonID;

			}

		}


	}


}