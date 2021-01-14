<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_template{

	protected $ci;

	function __construct(){

		$this->ci 				=& get_instance();
		$this->ci->load->model('mquery');	
		$this->ci->load->model('mgeneral');	

	}

	public function getEMailTemplate( $settingPurpose ){

		$rs		= $this->ci->mquery->getMailTemplate( $settingPurpose );

		$arrResult = array( 'title'	=> $rs[0]->value,
							'body'	=> $rs[1]->value );

		return $arrResult;

	}	

	public function createMailMerchantAccountInfo( $arrData ){

		/*Get info template*/
		$arrMailTemplate 		= $this->getEMailTemplate('merchant_registration');		

		$title 					= $arrMailTemplate['title'];
		$body 					= $arrMailTemplate['body'];

		$body 					= str_replace("[#merchant_name#]", $arrData['merchantName'], $body);
		$body 					= str_replace("[#url_merchant#]", CONST_MERCHANT_URL, $body);

		$body 					= str_replace("[#username_admin#]", $arrData['superadminAccount'], $body);
		$body 					= str_replace("[#password_admin#]", $arrData['randomPassword1'], $body);

		$body 					= str_replace("[#username_cashier#]", $arrData['cashierAccount'], $body);
		$body 					= str_replace("[#password_cashier#]", $arrData['randomPassword3'], $body);

		$body 					= str_replace("[#username_dataentry#]", $arrData['dataEntryAccount'], $body);
		$body 					= str_replace("[#password_dataentry#]", $arrData['randomPassword2'], $body);

		$this->ci->mgeneral->save( array( 'body'				=> $body,
									  'createDate' 			=> date('Y-m-d H:i:s'),
									  'destinationAccount'	=> $arrData['email'],
									  'subject'				=> $title,
									  'type'				=> 'email'),
							   "tr_smsemailqueue" );

						
		$arrResult				= array( 'errCode'		=> '00',
									 	 'errMsg'		=> 'Successfully Add Merchant.<br>Merchant Account Number : <strong>' . $arrData['merchantAccountNumber'] . '</strong><br>');

		return $arrResult;

	}


	public function createMailNewMerchantToBackofficeAYARES( $arrData ){

		/*Get info template*/
		$arrMailTemplate 		= $this->getEMailTemplate('admin_notif_merchant_registration');		

		$title 					= $arrMailTemplate['title'];
		$body 					= $arrMailTemplate['body'];

		$body 					= str_replace("[#merchant_name#]", $arrData['merchantName'], $body);
		$body 					= str_replace("[#account_number#]", $arrData['merchantAccountNumber'], $body);
		$body 					= str_replace("[#rebate_type#]", $arrData['rebateType'], $body);
		$body 					= str_replace("[#rebate#]", $arrData['rebate'], $body);
		$body 					= str_replace("[#tech_support_name#]", $arrData['inputBy'], $body);
		$body 					= str_replace("[#created#]", $arrData['created'], $body);

		$this->ci->mgeneral->save( array( 'body'				=> $body,
									  'createDate' 			=> date('Y-m-d H:i:s'),
									  'destinationAccount'	=> $arrData['email'],
									  'subject'				=> $title,
									  'type'				=> 'email'),
							   "tr_smsemailqueue" );

						
		$arrResult				= array( 'errCode'		=> '00',
									 	 'errMsg'		=> 'Successfully ');

		return $arrResult;

	}

	public function createMailResetPasswordWebAdminMerchant( $arrData ){

		/*Get info template*/
		$arrMailTemplate 		= $this->getEMailTemplate('web_admin_merchant_reset_password');		

		$title 					= $arrMailTemplate['title'];
		$body 					= $arrMailTemplate['body'];

		$body 					= str_replace("[#merchant_name#]", $arrData['merchantName'], $body);
		$body 					= str_replace("[#url_merchant#]", CONST_MERCHANT_URL, $body);

		$body 					= str_replace("[#username_admin#]", $arrData['superadminAccount'], $body);
		$body 					= str_replace("[#password_admin#]", $arrData['randomPassword1'], $body);

		$this->ci->mgeneral->save( array( 'body'				=> $body,
									  	  'createDate' 			=> date('Y-m-d H:i:s'),
									      'destinationAccount'	=> $arrData['email'],
									      'subject'				=> $title,
									      'type'				=> 'email'),
							       "tr_smsemailqueue" );

						
		$arrResult				= array( 'errCode'		=> '00',
									 	 'errMsg'		=> 'Successfully Reset Password Merchant.');

		return $arrResult;

	}


}