<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EVoucher extends CI_Controller{


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'e-Voucher';
		$data['rsMerchant']			= $this->mgeneral->getWhere( array('status'	=> 1), 'ms_merchants' );
		
		$template['konten']			= $this->load->view('master/evoucher/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getEVoucherData(){

		$data 						= array();

		$keyword 					= $this->input->post('x_keyword');
 
		$data['rs']					= $this->mquery->getEVoucherData( $keyword );

		$this->load->view('master/evoucher/data', $data);

	}


	public function save(){

		$session_user_id 								= $this->converter->decode($this->session->userdata['SESSION_AYRS_A']);		
		$act 											= $this->input->post('x_act');
		$arrResult										= array();
		$data 											= array();

		$data['merchantId']								= $this->input->post('x_merchant');
		$data['productName']							= $this->input->post('x_product_name');
		$data['voucherValue']							= $this->input->post('x_voucher');
		$file											= $this->input->post('x_file');

		$periodDate										= $this->input->post('x_period');

		if( $periodDate <> '' ){

			$arrDate 									= explode(" - ", $periodDate);
			$arrStartDate 								= explode("/",$arrDate[0]);
			$arrEndDate 								= explode("/",$arrDate[1]);

			$data['startDate']							= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
			$data['endDate']							= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];

		}
		
		$data['status']									= $this->input->post('x_status');

		if( $act == 'add' ){	

			if( $file <> '' ){
				$data['photo']							= $file;
			}

			$data['created']							= date('Y-m-d H:i:s');
			$data['createdUser']						= $session_user_id;

			$voucherId 									= $this->mgeneral->save( $data, 'ms_evoucherproducts' );

			if( (int)$voucherId > 0 ){

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully Add eVoucher');

			}else{

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Failed Add eVoucher');

			}

		}else{

			$id 										= $this->converter->decode( $this->input->post('x_id') );
			$file										= $this->input->post('x_file');

			$data['modified']							= date('Y-m-d H:i:s');
			$data['modifiedUser']						= $session_user_id;

			if( $file <> '' ){
				$data['photo']							= $file;
			}

			$this->mgeneral->update( array( 'voucherId'	=> $id ),
									 $data,
									 'ms_evoucherproducts' );

			$arrResult									= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully update eVoucher');

		}

		echo json_encode($arrResult);

	}


	public function delete(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );

		$this->mgeneral->delete( array( 'voucherId' => $id ), 'ms_evoucherproducts' );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> 'Successfully delete eVoucher.' );

		echo json_encode($arrResult);

	}

	public function uploadFile(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("evoucher", "x_file", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFile(){

		$this->upload_file->cancelUpload("evoucher");

	}


	public function getAccountDetail(){

		$accountNumber 			= $this->input->post('x_account_number');
		$arrResult 				= array();

		if( $accountNumber <> '' ){

			

		}

		echo json_encode( $arrResult );

	}

}

?>