<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertise extends CI_Controller{

	private $userId;

	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');
		$this->load->library('../controllers/storeprocedure');

		$this->userId 		= $this->converter->decode( $this->session->userdata['SESSION_AYRS_A'] );

	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Merchant';
		$data['rsCompany']			= $this->mgeneral->getWhere( array('status' => 1, 'isDelete' => 0), 'ms_companies' );
		
		$template['konten']			= $this->load->view('master/advertise/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getAdvertiseData(){

		$data 						= array();

		$keyword 					= $this->input->post('x_keyword');
		$startDate 					= $this->input->post('x_start_date');
		$endDate 					= $this->input->post('x_end_date');
 
		$data['rs']					= $this->mquery->getAdvertiseData( $keyword, $startDate, $endDate );

		$this->load->view('master/advertise/data', $data);

	}


	public function save(){

		$arrResult 										= array();

		$session_user_id 								= $this->session->userdata['SESSION_AYRS_A'];		
		$act 											= $this->input->post('x_act');
		$arrResult										= array();
		$data 											= array();
		$periodDate										= $this->input->post('x_period');

		$startDate 										= "";
		$endDate 										= "";

		if( $periodDate <> '' ){

			$arrDate 									= explode(" - ", $periodDate);
			$arrStartDate 								= explode("/",$arrDate[0]);
			$arrEndDate 								= explode("/",$arrDate[1]);

			$startDate									= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
			$endDate 									= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];

		}

		$companyId								= $this->input->post('x_company');
		$file									= $this->input->post('x_file');
		$sequence								= $this->input->post('x_sequence');		
		$status									= $this->input->post('x_status');
		$advertiseType							= $this->input->post('x_advertise_type');
		$advertiseRebate 						= $this->input->post('x_advertise_rebate');
		$balance 								= $this->input->post('x_advertise_balance');

		if( $act == 'add' ){

			$param 								= array( $advertiseType,
														 $companyId,
														 $file,
														 $sequence,
														 $startDate,
														 $endDate,
														 $advertiseRebate,
														 $status,
														 $balance,
														 $this->userId,
														 1,
														 0 );

			$arrResult 						 	= $this->storeprocedure->SP_Advertise( $param );

		}else{

			$id 								= $this->converter->decode( $this->input->post('x_id') );

			$param 								= array( $advertiseType,
														 $companyId,
														 $file,
														 $sequence,
														 $startDate,
														 $endDate,
														 $advertiseRebate,
														 $status,
														 $balance,
														 $this->userId,
														 2,
														 $id );

			$arrResult 						 	= $this->storeprocedure->SP_Advertise( $param );

		}

		echo json_encode( $arrResult );
	}


	public function save2(){

		$session_user_id 								= $this->session->userdata['SESSION_AYRS_A'];		
		$act 											= $this->input->post('x_act');
		$arrResult										= array();
		$data 											= array();

		$periodDate										= $this->input->post('x_period');

		if( $periodDate <> '' ){

			$arrDate 									= explode(" - ", $periodDate);
			$arrStartDate 								= explode("/",$arrDate[0]);
			$arrEndDate 								= explode("/",$arrDate[1]);

			$data['startDate']							= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
			$data['endDate']							= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];

		}

		$data['companyId']								= $this->input->post('x_company');
		$file											= $this->input->post('x_file');
		$data['sequence']								= $this->input->post('x_sequence');		
		$data['status']									= $this->input->post('x_status');
		$data['advertiseType']							= $this->input->post('x_advertise_type');
		$data['advertiseRebate'] 						= $this->input->post('x_advertise_rebate');

		if( $act == 'add' ){	

			

			if( $file <> '' ){
				$data['file']							= $file;
			}

			$advertiseId 								= $this->mgeneral->save( $data, 'ms_advertises' );

			if( (int)$advertiseId > 0 ){

				/*Start : */
				/*Add to account data if advertiseType = 2*/
				$dataAccount['accountNumber']				= $this->storeprocedure->generateAccountNumber();
				$dataAccount['accountCategory']				= "advertiser";
				$dataAccount['accountType']					= 0;
				$dataAccount['balance']						= $this->input->post('x_advertise_balance');
				$dataAccount['memberId']					= $advertiseId;
				$dataAccount['status']						= 1;
				$accountId 									= $this->mgeneral->save( $dataAccount, 'ms_accounts' );
				/*End*/

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully Add Advertise ');

			}else{

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Failed Add Advertise');

			}

		}else{

			$id 										= $this->converter->decode( $this->input->post('x_id') );
			$file										= $this->input->post('x_file');

			if( $file <> '' ){
				$data['file']							= $file;
			}

			$this->mgeneral->update( array( 'advertiseId'	=> $id ),
									 $data,
									 'ms_advertises' );

			$arrResult									= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully update Advertise');

		}

		echo json_encode($arrResult);

	}


	public function delete(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );

		$this->mgeneral->delete( array( 'advertiseId' => $id ), 'ms_advertises' );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> 'Successfully delete advertise.' );

		echo json_encode($arrResult);

	}

	public function uploadFile(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("advertisement", "x_file", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFile(){

		$this->upload_file->cancelUpload("advertisement");

	}

}

?>