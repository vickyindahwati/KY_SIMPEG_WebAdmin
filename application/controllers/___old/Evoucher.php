<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EVoucher extends CI_Controller{

	private $lengthVoucherCode;

	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

		$this->lengthVoucherCode = 7;

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

	public function deleteAssignedCustomer(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );
		$voucherId  = $this->mgeneral->getValue( 'voucherId', array( 'voucherCustomerId' => $id ), 'ms_evouchercustomers' );

		$this->mgeneral->delete( array( 'voucherCustomerId' => $id ), 'ms_evouchercustomers' );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> 'Successfully delete assigned customer.',
							 'id'		=> $this->converter->encode( $voucherId ) );

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

	public function customer(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Customer\'s e-Voucher';
		$data['eVoucherId']			= $this->uri->segment(3);
		
		$template['konten']			= $this->load->view('master/evoucher/customer_evoucher_list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getCustomerEVoucherData(){

		$eVoucherId 		= $this->converter->decode($this->input->post( 'id' ));

		if( $this->input->post( 'id' ) != null && !empty($this->input->post( 'id' )) ){

			$data 						= array();
	 
			$data['rs']					= $this->mquery->getCustomerEVoucher( $eVoucherId );

			$this->load->view('master/evoucher/customer_evoucher_data', $data);

		}

	}	

	public function searchByAccountNumber(){

		$arrResult 				= array();

		$accountNumber 			= $this->input->post('x_account_number');

		$rs 					= $this->mquery->getCustomerDetailByAccountNumber( $accountNumber );

		if( count($rs) > 0 ){

			$arrResult				= array( 'errCode'		=> '00',
											 'errMsg'		=> 'OK',
											 'email'		=> $rs[0]->email,
											 'phoneNumber'	=> $rs[0]->phoneNumber,
											 'name'			=> $rs[0]->customerName,
											 'id'			=> $this->converter->encode($rs[0]->customerId) );

		}else{
			$arrResult				= array( 'errCode'	=> '-99',
											 'errMsg'	=> 'Data not found' );
		}

		echo json_encode($arrResult);

	}

	public function assignToCustomer(){

		$session_user_id 	= $this->converter->decode($this->session->userdata['SESSION_AYRS_A']);

		$customerId 		= $this->converter->decode( $this->input->post( 'x_customer_id' ) );
		$voucherId 			= $this->converter->decode( $this->input->post( 'x_voucher_id' ) );
		$rs 				= $this->mgeneral->getWhere( array('voucherId'	=> $voucherId), 'ms_evoucherproducts' );

		$arrResult 			= array();

		$arrData			= array( 'voucherId'	=> $voucherId,
									 'customerId'	=> $customerId,
									 'voucherCode'	=> $this->generateVoucherCode(),
									 'startDate'	=> $rs[0]->startDate,
									 'endDate'		=> $rs[0]->endDate,
									 'created'		=> date('Y-m-d H:i:s'),
									 'createdUser'	=> $session_user_id
									);

		$lastId 			= $this->mgeneral->save( $arrData, 'ms_evouchercustomers' );

		if( $lastId > 0 ){
			$arrResult 		= array( 'errCode'	=> '00', 
									 'errMsg'	=> 'Add Customer Successfully',
									 'id'		=> $lastId,
									 'voucherId'=> $this->converter->encode( $voucherId ) );
 		}else{
 			$arrResult 		= array( 'errCode'	=> '-99', 
									 'errMsg'	=> 'Failed add eVoucher Customer!' );
 		}

 		echo json_encode($arrResult);

	}

	public function generateVoucherCode(){

		$flagMatch 			= true;
		$voucherCode  		= "";

		while( $flagMatch ){

			$voucherCode 	= $this->converter->radomAlphaNumeric( $this->lengthVoucherCode );
			$count 			= $this->mgeneral->getValue( "COUNT(0)",
														 array( 'voucherCode' => $voucherCode, 'status'	=> 1 ),
														 'ms_evouchercustomers' );

			if( $count == 0 ){
				$flagMatch = false;
			}

		}

		return $voucherCode;


	}

	

}

?>