<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller{


	protected $dbHashKey;
	private $roleId;
	private $userId;
	private $userFullName;

	private $msg;

	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');
		$this->load->library('../controllers/mail_template');
		$this->load->library('ciqrcode');

		$this->dbHashKey	= $this->config->item('dbHashKey');

		$this->userId 		= $this->converter->decode( $this->session->userdata['SESSION_AYRS_A'] );
		$this->roleId 		= $this->session->userdata['SESSION_AYRS_D'];
		$this->userFullName	= $this->session->userdata['SESSION_AYRS_C'];

	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Merchant';
		
		$template['konten']			= $this->load->view('master/merchant/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getMerchantData(){

		$data 						= array();

		//$data['title']				= 'Informasi';
		/*$data['rsAnnouncement']		= $this->mgeneral->getWhere( array( 'year'	=> date('Y') ), 
																		'ms_announcements', 
																		'departmentId', 
																		'ASC' );*/
		$data['rs']						= $this->mquery->getMerchantData( $this->userId, $this->roleId );
		$data['roleId']					= $this->roleId;

		$this->load->view('master/merchant/data', $data);

	}


	public function save(){

		$session_user_id 								= $this->session->userdata['SESSION_AYRS_A'];		
		$act 											= $this->input->post('x_act');
		$arr_result										= array();

		$merchantName									= $this->input->post('x_name');
		$logo											= $this->input->post('x_file_icon');
		$logoHistory									= $this->input->post('x_file_icon_history');
		$photoLandscape									= $this->input->post('x_file_landscape');
		$email											= $this->input->post('x_email');
		$contactName									= $this->input->post('x_contact');
		$contactPhone									= $this->input->post('x_contact_phone');
		$merchantRebateType								= $this->input->post('x_rebate_type');
		$merchantRebateValue							= $this->input->post('x_rebate_value');

		$invoiceName									= $this->input->post('x_inv_name');
		$companyName									= $this->input->post('x_inv_company');
		$address										= $this->input->post('x_inv_address');
		$city											= $this->input->post('x_inv_city');
		$state											= $this->input->post('x_inv_state');
		$zip											= $this->input->post('x_inv_zip');

		$userId 										= $this->converter->decode( $session_user_id );		
		$status 										= ( $this->roleId == 1 ? 1 : 0 );	

		$randomPassword1 								= $this->converter->random(6);
		$randomPassword2 								= $this->converter->random(6);
		$randomPassword3 								= $this->converter->random(6);

		$pksFile										= $this->input->post('x_pks_file');

		if( $act == 'add' ){	

			$arrParamSP 								= array( $merchantName,
																 $logo,
																 $logoHistory,
																 $photoLandscape,
																 $status,
																 $email,
																 $contactName,
																 $contactPhone,
																 $merchantRebateType,
																 $merchantRebateValue,
																 $userId,
																 0,
																 $pksFile,

																 $invoiceName,
																 $companyName,
																 $address,
																 $city,
																 $state,
																 $zip,

																 $randomPassword1,
																 $randomPassword2,
																 $randomPassword3,
																 /*'123456',
																 '123456',
																 '123456',*/


																 $this->converter->getMD5Key(),
																 $this->converter->getDBKey(),
																 1 );
			$sqlSP 										= 'CALL sp_register_merchant(' . $this->mgeneral->printDataBinding( 25 ) . ')';
			$rsSP 										= $this->mgeneral->callStoreProc( $sqlSP, $arrParamSP );

			

			if( $rsSP[0]->errCode == '00' ){		

				/*### SEND ACCOUNT INFO TO MERCHANT VIA EMAIL ###*/
				
				$rsEncRandomPassword1			= $this->converter->encode( $randomPassword1 );
				$rsEncRandomPassword2			= $this->converter->encode( $randomPassword2 );
				$rsEncRandomPassword3			= $this->converter->encode( $randomPassword3 );

				$arrPendingEmail 			= array( 'merchantId'			=> $rsSP[0]->merchantId,
													 'merchantName'			=> $merchantName,
													 'superAdminAccount'	=> $rsSP[0]->superadminAccount,
													 'passwordSuperAdmin' 	=> $rsEncRandomPassword1,
													 'dataEntryAccount'		=> $rsSP[0]->dataEntryAccount,
													 'passwordDataEntry'	=> $rsEncRandomPassword2,
													 'cashierAccount'		=> $rsSP[0]->cashierAccount,
													 'passwordCashier'		=> $rsEncRandomPassword3,
													 'email' 				=> $email,
													 'merchantAccountNumber'=> $rsSP[0]->merchantAccountNumber,
													 'status'				=> 0,
													 'created'				=> date('Y-m-d H:i:s'),
													 'createdUser'			=> $this->userId);

				$pendingId 					= $this->mgeneral->save( $arrPendingEmail, 'tr_pendingmerchantaccountemail' );

				//Create Email to admin backoffice ayares

				$adminMail 				= $this->mgeneral->getValue( 'value',
																	 array( 'settingPurpose'	=> 'backoffice_ayares_email',
																	 		'settingType'		=> 'mail_admin' ),
																	 'ms_settings' );

				$arrDataEmail 			= array( 'merchantName'				=> $merchantName,
												 'merchantAccountNumber'	=> $rsSP[0]->merchantAccountNumber,
												 'rebateType'				=> ( $merchantRebateType == 1 ? 'Per Transaction' : 'Per Item' ),
												 'rebate'					=> $merchantRebateValue . " %",
												 'inputBy'					=> $this->userFullName,
												 'created'					=> date('Y-m-d H:i:s'),
												 'email'					=> $adminMail );

				$arrResultCreateEmail 	= $this->mail_template->createMailNewMerchantToBackofficeAYARES( $arrDataEmail );

				if( $rsSP[0]->errCode == '00' ){
					$this->msg 				= 'Register merchant Successfully. Please wait until our admin approve your request.';
				}else{
					$this->msg  			= $rsSP[0]->errMsg;
				}

				/*

				$arrMailTemplate 		= $this->mail_template->getEMailTemplate('merchant_registration');		

				$title 					= $arrMailTemplate['title'];
				$body 					= $arrMailTemplate['body'];

				$body 					= str_replace("[#merchant_name#]", $merchantName, $body);
				$body 					= str_replace("[#url_merchant#]", CONST_MERCHANT_URL, $body);

				$body 					= str_replace("[#username_admin#]", $rsSP[0]->superadminAccount, $body);
				$body 					= str_replace("[#password_admin#]", $randomPassword1, $body);

				$body 					= str_replace("[#username_cashier#]", $rsSP[0]->cashierAccount, $body);
				$body 					= str_replace("[#password_cashier#]", $randomPassword3, $body);

				$body 					= str_replace("[#username_dataentry#]", $rsSP[0]->dataEntryAccount, $body);
				$body 					= str_replace("[#password_dataentry#]", $randomPassword2, $body);

				$this->mgeneral->save( array( 'body'				=> $body,
											  'createDate' 			=> date('Y-m-d H:i:s'),
											  'destinationAccount'	=> $email,
											  'subject'				=> $title,
											  'type'				=> 'email'),
									   "tr_smsemailqueue" );

								
				$arr_result				= array( 'errCode'		=> '00',
											 	 'errMsg'		=> 'Successfully Add Merchant.<br>Merchant Account Number : <strong>' . $rsSP[0]->merchantAccountNumber . '</strong><br>');*/

				$arr_result				= array( 'errCode'	=> $rsSP[0]->errCode,
												 'errMsg'	=> $this->msg );

			}else{

				$arr_result				= array( 'errCode'		=> '-99',
											 	 'errMsg'		=> ' Failed Add Merchant. Err : ' . $rsSP[0]->errMsg );				
			}

		}else{

			$id 										= $this->converter->decode( $this->input->post('x_id') );
			$fileLogo									= $this->input->post('x_file');

			$arrParamSP 								= array( $merchantName,
																 $logo,
																 $logoHistory,
																 $photoLandscape,
																 $status,
																 $email,
																 $contactName,
																 $contactPhone,
																 $merchantRebateType,
																 $merchantRebateValue,
																 $userId,
																 $id,
																 $pksFile,

																 $invoiceName,
																 $companyName,
																 $address,
																 $city,
																 $state,
																 $zip,

																 $randomPassword1,
																 $randomPassword2,
																 $randomPassword3,
																 /*'123456',
																 '123456',
																 '123456',*/


																 $this->converter->getMD5Key(),
																 $this->converter->getDBKey(),
																 2 );



			$sqlSP 										= 'CALL sp_register_merchant(' . $this->mgeneral->printDataBinding( 25 ) . ')';
			$rsSP 										= $this->mgeneral->callStoreProc( $sqlSP, $arrParamSP );

			if( $rsSP[0]->errCode == '00' ){

				$arr_result				= array( 'errCode'		=> '00',
											 	 'errMsg'		=> 'Successfully Update Merchant');

			}else{

				$arr_result				= array( 'errCode'		=> '-99',
											 	 'errMsg'		=> ' Failed Add Merchant.' );				
			}

		}

		echo json_encode($arr_result);

	}


	public function delete(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );

		$this->mgeneral->delete( array( 'merchantId' => $id ), 'ms_merchants' );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> 'Successfully delete merchant.' );

		echo json_encode($arrResult);

	}

	public function uploadFileIcon(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("merchant/icon", "x_file_icon");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFileIcon(){

		$this->upload_file->cancelUpload("merchant/icon");

	}


	public function uploadFileIconHistory(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("merchant/icon/40x60", "x_file_icon_history");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFileIconHistory(){

		$this->upload_file->cancelUpload("merchant/icon/40x60");

	}


	public function uploadFileLandscape(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("merchant/landscape", "x_file_landscape");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFileLandscape(){

		$this->upload_file->cancelUpload("merchant/landscape");

	}


	public function uploadPKSFile(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadPKSFile("merchant/pks", "x_pks_file");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadPKSFile(){

		$this->upload_file->cancelUploadPKSFile("merchant/pks");

	}


	public function doConfirmMerchantData(){

		$merchantId 			= $this->converter->decode( $this->input->post('x_app_merchant_id') );
		$type 					= $this->input->post('x_app_type');
		$arrResult 				= array();

		if( $type == 'approve' ){

			// Update status merchant
			$this->mgeneral->update( array( 'merchantId'	=> $merchantId ),
									 array( 'status'		=> 1 ),
									 'ms_merchants' );

			// Update status on merchant user access
			$this->mgeneral->update(  array( 'merchantId'	=> $merchantId ),
									  array( 'status'		=> 1 ),
									  'ms_merchantuseraccess' );

			// Get pending account merchant
			$rsPendingEmail 			= $this->mgeneral->getWhere( array( 'merchantId'	=> $merchantId ),
																	 'tr_pendingmerchantaccountemail',
																	 'pendingId',
																	 'DESC',
																	 1 );

			$arrDataEmail 			= array( 'merchantName'			=> $rsPendingEmail[0]->merchantName,
											 'superadminAccount' 	=> $rsPendingEmail[0]->superAdminAccount,
											 'cashierAccount' 		=> $rsPendingEmail[0]->cashierAccount,
											 'dataEntryAccount' 	=> $rsPendingEmail[0]->dataEntryAccount,
											 'randomPassword1'		=> $this->converter->decode( $rsPendingEmail[0]->passwordSuperAdmin ),
											 'randomPassword2'		=> $this->converter->decode( $rsPendingEmail[0]->passwordDataEntry ),
											 'randomPassword3'		=> $this->converter->decode( $rsPendingEmail[0]->passwordCashier ),
											 'email'				=> $rsPendingEmail[0]->email,
											 'merchantAccountNumber'=> $rsPendingEmail[0]->merchantAccountNumber);

			$arrResultCreateEmail 	= $this->mail_template->createMailMerchantAccountInfo( $arrDataEmail );

			$arrResult 				= array( 'errCode'	=> '00',
											 'errMsg'	=> 'Merchant Successfully confirmed' );

		}else{


			// Update status merchant
			$this->mgeneral->update( array( 'merchantId'	=> $merchantId ),
									 array( 'status'		=> -1 ),
									 'ms_merchants' );

			$arrResult 				= array( 'errCode'	=> '00',
											 'errMsg'	=> 'Merchant Successfully rejected' );

		}

		echo json_encode( $arrResult );

	}

	public function resetWebAdminMerchantAccess(){

		$arrResult  									= array();

		$merchantId 									= $this->converter->decode($this->input->post("x_reset_password_merchant_id"));

		$randomPassword 								= $this->converter->random(6);

		/*Create Random password*/
		$encRandomPassword								= strtoupper(md5($randomPassword . $this->converter->getMD5Key()));

		/*Update Superadmin Password*/
		$this->mgeneral->update( array( 'merchantId'	=> $merchantId, "roleId"	=> 1 ),
								 array( 'userPassword'	=> $encRandomPassword ),
								 "ms_merchantuseraccess" );

		/*Get superadmin login*/
		$userLogin 										= $this->mgeneral->getValue( "userLogin",
																					 array( "merchantId"	=> $merchantId,
																					 		"roleId"		=> 1 ),
																					 "ms_merchantuseraccess" );

		/*Send info via email*/
		$rsMerchant 									= $this->mquery->getMerchantByMerchantId( $merchantId );
		if( count($rsMerchant) > 0 ){

			$arrDataEmail 			= array( 'merchantName'			=> $rsMerchant[0]->merchantName,
											 'superadminAccount' 	=> $userLogin,
											 'randomPassword1'		=> $randomPassword,
											 'email'				=> $rsMerchant[0]->email);

			$arrResultCreateEmail 	= $this->mail_template->createMailResetPasswordWebAdminMerchant( $arrDataEmail );

			$arrResult 				= array( 'errCode'	=> '00',
											 'errMsg'	=> 'Merchant Successfully reset password' );			

		}else{

			$arrResult 				= array( 'errCode'	=> '-99',
											 'errMsg'	=> 'Merchant not found' );

		}

		echo json_encode( $arrResult );

	}

	public function getDecode(){
		echo $this->converter->decode('mQbn83sK2aKKEjSZxGh5C70ryoe7hR0a0B--SWLG-Go');
	}

	/*private function generateMerchantUserAccess( $merchantId, $branchId){

		$userLogin 		= "";
		$userPassword 	= "";
		$userName 		= "";

		//1. Generate Super Admin
		$userLogin 		= "super_" . $merchantId;
		$userPassword 	= $this->converter->random(6);
		$userName 		= "Super Admin";
		$this->mgeneral->save( array( 'branchId'	=> $branchId,
									  'merchantId'	=> $merchantId,
									  'roleId'		=> 1,
									  'status'		=> 1,
									  'userLogin'	=> $userLogin,
									  'userPassword'=> md5( $userPassword, $this->dbHashKey ),
									  'userName'	=> $userName ),
							   'ms_merchantuseraccess' );


		//2. Generate Kasir Akses (default)
		$userLogin 		= "kasir_" . $merchantId;
		$userPassword 	= $this->converter->random(6);
		$userName 		= "Kasir (Default)";
		$this->mgeneral->save( array( 'branchId'	=> $branchId,
									  'merchantId'	=> $merchantId,
									  'roleId'		=> 3,
									  'status'		=> 1,
									  'userLogin'	=> $userLogin,
									  'userPassword'=> md5( $userPassword, $this->dbHashKey ),
									  'userName'	=> $userName ),
							   'ms_merchantuseraccess' );

		//3. Generate Data Entry Akses (default)
		$userLogin 		= "dataentry_" . $merchantId;
		$userPassword 	= $this->converter->random(6);
		$userName 		= "Data Entry (Default)";
		$this->mgeneral->save( array( 'branchId'	=> $branchId,
									  'merchantId'	=> $merchantId,
									  'roleId'		=> 2,
									  'status'		=> 1,
									  'userLogin'	=> $userLogin,
									  'userPassword'=> md5( $userPassword, $this->dbHashKey ),
									  'userName'	=> $userName ),
							   'ms_merchantuseraccess' );



	}*/

	/*private function addHQBranchMerchant( $merchantId, $merchantName ){

		$brachId 	= 0;

		$arrData	= array( 'address'		=> '',
							 'branchName' 	=> 'HQ ' . $merchantName,
							 'merchantId'	=> $merchantId );

		$table 		= 'ms_merchantbranches';	

		$branchId 	= $this->mgeneral->save( $arrData, $table );

		return $branchId;

	}*/

	public function generateMerchantQRCode(){

		$arrQRCodeParam 			= array();
		$arrResult 					= array();

		$merchantId 				= $this->input->post( 'id' );
		// $merchantId 				= $this->uri->segment(4);
		$rs 						= $this->mquery->getMerchantByMerchantId( $this->converter->decode($merchantId) );

		$accountNumber 				= $rs[0]->accountNumber;

		$arrQRCodeParam['data']		= $accountNumber;
		$arrQRCodeParam['savename']	= FCPATH . 'uploads/merchant/qrcode/' . $accountNumber . '.png';
		$arrQRCodeParam['size']		= 1024;
		$this->ciqrcode->generate( $arrQRCodeParam );

		if( file_exists( FCPATH . 'uploads/merchant/qrcode/' . $accountNumber . '.png' ) ){
			$arrResult 				= array( 'errCode'	=> '00',
											 'errMsg'	=> 'OK',
											 'path'		=> CONST_MERCHANT_QRCODE . $accountNumber . '.png',
											 'fileName' => $accountNumber . '.png' );
		}else{
			$arrResult 				= array( 'errCode'	=> '-99',
											 'errMsg'	=> 'Generate QRCode failed');
		}

		echo json_encode($arrResult);

	}

	public function merchantInvoice(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$decodedMerchantId 			= $this->converter->decode( $this->uri->segment(3) );
		$rsMerchant 				= $this->mquery->getMerchantByMerchantId( $decodedMerchantId );
		
		$merchantName 				= $rsMerchant[0]->merchantName;
		$data['title']				= 'Merchant - <strong>' . $merchantName . '</strong>';
		$data['merchantId']			= $this->uri->segment(3);
		$template['konten']			= $this->load->view('master/merchant/invoice/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getMerchantInvoiceData(){

		$data 							= array();

		$invoiceDate 					= $this->input->post('x_invoice_date');
		$keyword 						= $this->input->post('x_keyword');		
		$merchantId 					= $this->converter->decode( $this->input->post('x_merchant_id') );

		if( $invoiceDate != '' ){
			$arrDate 						= explode(" - ", $invoiceDate);
	        $arrStartDate 					= explode("/",$arrDate[0]);
	        $arrEndDate 					= explode("/",$arrDate[1]);

	        $startDate						= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
	        $endDate 						= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];
		}

		$data['rs']						= $this->mquery->getMerchantInvoice( $keyword, $startDate, $endDate, $merchantId );

		$this->load->view('master/merchant/invoice/data', $data);

	}	

	public function generateInvoice(){

		$sessionUserId 					= $this->session->userdata['SESSION_AYRS_A'];		
		$act 							= $this->input->post('x_act');
		$arrResult						= array();

		$merchantId 					= $this->converter->decode( $this->input->post( 'x_id' ) );
		$year 							= $this->input->post( 'x_year' );
		$month 							= $this->input->post( 'x_month' );

		/*Check if there is already invoice for year and month selected*/
		$rs 							= $this->mquery->isInvoiceAvailable( $merchantId, $year, $month );

		if( $rs[0]->rowNumber > 0  ){

			$arrResult 					= array( 'errCode'	=> '-99',
												 'errMsg'	=> 'Invoice already generated.' );

		}else{

			if( $act == 'generate' ){

				$arrParamSP 	 			= array( $merchantId,
												     $year,
												     $month,
												     $sessionUserId );

				$sqlSP 						= ' CALL sp_create_invoices(' . $this->mgeneral->printDataBinding(4) . ') ';
				$rsSP 						= $this->mgeneral->callStoreProc( $sqlSP, $arrParamSP );

				if( $rsSP[0]->errCode == '00' ){

					$arrResult 					= array( 'errCode'	=> '00',
												 	     'errMsg'	=> 'Invoice successfully generated.' );

				}

			}else{
				$arrResult 					= array( 'errCode'	=> '-99',
												 	 'errMsg'	=> 'Invoice can\'t generated.' );
			}

		}

		echo json_encode( $arrResult );

	}

}



?>