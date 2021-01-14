<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchantsupport extends CI_Controller{


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

	}

	public function getCustomerByEmail(){

		$arrResult 		= array();
		$email 			= $this->input->post('m');

		$rs 			= $this->mquery->getCustomerDataByEmail( $email );

		if( count($rs) > 0 ){

			$arrResult  = array( 'errCode' 		=> '00',
								 'name'	  		=> $rs[0]->name,
								 'photo'  		=> $rs[0]->photo,
								 'phoneNumber' 	=> $rs[0]->phoneNumber,
								 'status'		=> $rs[0]->status,
								 'id'			=> $this->converter->encode($rs[0]->accountId));
 		
		}else{

			$arrResult  = array( 'errCode' 		=> '01',
								 'errMsg'		=> 'Data not found');

		}

		echo json_encode( $arrResult );

	}

	public function save(){

		$supportType			= $this->input->post('x_type_support');
		$merchantId 			= $this->converter->decode($this->input->post('x_merchant_id'));
		$accountId 				= $this->converter->decode($this->input->post('x_acc_id'));
		$commision				= $this->input->post('x_support_commision');

		$arrUpdateData 			= array();
		$arrUpdateWhere 		= array();

		if( $supportType == 'Merchant Referal' ){

			$arrUpdateData		= array( 'accountReferalId'		=> $accountId,
										 'referalValue'			=> $commision );
			$arrUpdateWhere		= array( 'merchantId'			=> $merchantId );

		}else if( $supportType == 'Sales Support' ){

			$arrUpdateData		= array( 'accountSalesSupportReferalId'		=> $accountId,
										 'salesSupportReferalValue'			=> $commision );
			$arrUpdateWhere		= array( 'merchantId'						=> $merchantId );

		}else if( $supportType == 'Technical Support' ){

			$arrUpdateData		= array( 'accountTechnicalSupportReferalId'		=> $accountId,
										 'technicalSupportReferalValue'			=> $commision );
			$arrUpdateWhere		= array( 'merchantId'							=> $merchantId );

		}

		$this->mgeneral->update( $arrUpdateWhere, $arrUpdateData, 'ms_merchants' );


		$arrResult  = array( 'errCode' 		=> '00',
							 'errMsg'		=> 'Merchant support update successfully');

		echo json_encode( $arrResult );

	}

}